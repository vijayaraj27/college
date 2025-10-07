<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
class MenuController extends Controller
{
    public function index()
    {
        try {
            $menus =Menu::where('status', 0)->get();
            $treeView = $this->buildTreeView($menus);
           // dd($treeView);
            return view('web.layouts.menu', ['treeView' => $treeView]);
        } catch (\Exception $e) {
            // Log or display the error message
           // dd($e->getMessage());
        }
    }
    public function generateBreadcrumb($pageTitle, $pageSlug = null)
    {
        $breadcrumbItems = [];
        
        // Try multiple matching strategies
        $menuItem = null;
        
        // 1. Exact match by title
        $menuItem = Menu::where('menu', $pageTitle)->first();
        
        // 2. If no exact match, try by slug
        if (!$menuItem && $pageSlug) {
            $menuItem = Menu::where('menu', 'LIKE', '%' . $pageTitle . '%')->first();
        }
        
        // 3. If still no match, try to convert slug to menu name
        if (!$menuItem && $pageSlug) {
            $menuName = ucwords(str_replace(['-', '_'], ' ', $pageSlug));
            $menuItem = Menu::where('menu', $menuName)->first();
        }
        
        if ($menuItem) {
            // Build breadcrumb path from root to current item
            $currentItem = $menuItem;
            $path = [];
            
            // Traverse up the hierarchy
            while ($currentItem) {
                array_unshift($path, $currentItem);
                $currentItem = $currentItem->parent_id ? Menu::find($currentItem->parent_id) : null;
            }
            
            // Generate breadcrumb items
            foreach ($path as $index => $item) {
                if ($index === count($path) - 1) {
                    // Last item (current page)
                    $breadcrumbItems[] = ['title' => $item->menu, 'url' => null, 'active' => true];
                } else {
                    // Generate URL for parent items
                    $url = '#';
                    if ($item->menu == 'Home') {
                        $url = url('/');
                    } elseif ($this->isDepartmentProgram($item->menu)) {
                        // Handle department program links
                        $departmentSlug = $this->getDepartmentSlug($item->menu);
                        $url = url('/department/' . $departmentSlug);
                    } else {
                        // Convert menu name to slug and check if page exists
                        $slug = strtolower(str_replace([' ', '&', '/'], ['-', 'and', '-'], $item->menu));
                        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
                        $slug = trim($slug, '-');
                        
                        $pageExists = \App\Models\Web\Page::where('slug', $slug)->where('status', 1)->exists();
                        if ($pageExists) {
                            $url = url('/' . $slug);
                        }
                    }
                    $breadcrumbItems[] = ['title' => $item->menu, 'url' => $url, 'active' => false];
                }
            }
        } else {
            // Fallback: Home -> Current Page
            $breadcrumbItems = [
                ['title' => 'Home', 'url' => url('/'), 'active' => false],
                ['title' => $pageTitle, 'url' => null, 'active' => true]
            ];
        }
        
        return $breadcrumbItems;
    }

    private function isDepartmentProgram($menuName)
    {
        // Check if this is a department program by looking for department names
        $departmentPrograms = [
            'Artificial Intelligence & Data Science (AI & DS)',
            'Bio Medical(BM)',
            'Bio-Technology (BT)',
            'Civil Engineering (CIVIL)',
            'Computer Science and Engineering (CSE)',
            'Electrical and Electronics Engineering (EEE)',
            'Electronics & Communication Engineering (ECE)',
            'Information Technology (IT)',
            'Mechanical Engineering (MECH)',
            'Science and Humanities (S&H)',
            'Applied Electronics (AE)',
            'Engineering Design (ED)',
            'Master of Business Administration (MBA)',
            'Power Electronics and Drives (PED)',
            'Structural Engineering (SE)'
        ];
        
        return in_array($menuName, $departmentPrograms);
    }

    private function getDepartmentSlug($menuName)
    {
        // Map menu names to department slugs
        $departmentSlugMap = [
            'Artificial Intelligence & Data Science (AI & DS)' => 'artificial-intelligence-data-science',
            'Bio Medical(BM)' => 'bio-medical',
            'Bio-Technology (BT)' => 'bio-technology',
            'Civil Engineering (CIVIL)' => 'civil-engineering',
            'Computer Science and Engineering (CSE)' => 'computer-science-engineering',
            'Electrical and Electronics Engineering (EEE)' => 'electrical-electronics-engineering',
            'Electronics & Communication Engineering (ECE)' => 'electronics-communication-engineering',
            'Information Technology (IT)' => 'information-technology',
            'Mechanical Engineering (MECH)' => 'mechanical-engineering',
            'Science and Humanities (S&H)' => 'science-humanities',
            'Applied Electronics (AE)' => 'applied-electronics',
            'Engineering Design (ED)' => 'engineering-design',
            'Master of Business Administration (MBA)' => 'master-business-administration',
            'Power Electronics and Drives (PED)' => 'power-electronics-drives',
            'Structural Engineering (SE)' => 'structural-engineering'
        ];
        
        return $departmentSlugMap[$menuName] ?? strtolower(str_replace([' ', '&', '/', '(', ')'], ['-', 'and', '-', '', ''], $menuName));
    }

    public function buildTreeView($menus, $parent = 0, $level = 0, $prelevel = -1)
    {
        $html = '';
        foreach ($menus as $menu) {
            if ($parent == $menu->parent_id) {
                if ($level > $prelevel) {
                    $html .= ($html == '') ? '<ul class="" id="">' : '<ul class="" id="">';
                }
                if ($level == $prelevel) {
                    $html .= '</li>';
                }
                if ($level > $prelevel) {
                    $prelevel = $level;
                }
                
                // Check if menu has children
                $hasChildren = $menus->where('parent_id', $menu->id)->count() > 0;
                $menu_arrow = $hasChildren ? '&nbsp;<span class="caret"></span>' : '';
                
                // Generate proper URL based on menu item
                $url = '#';
                if ($menu->menu == 'Home') {
                    $url = url('/');
                } else {
                    // Special handling for department programs
                    if ($this->isDepartmentProgram($menu->menu)) {
                        $departmentSlug = $this->getDepartmentSlug($menu->menu);
                        $url = url('/department/' . $departmentSlug);
                    } else {
                        // For other menu items, try to find corresponding page by slug
                        $slug = strtolower(str_replace([' ', '&', '/'], ['-', 'and', '-'], $menu->menu));
                        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
                        $slug = trim($slug, '-');
                        
                        // Check if a page exists with this slug
                        $pageExists = \App\Models\Web\Page::where('slug', $slug)->where('status', 1)->exists();
                        if ($pageExists) {
                            $url = url('/' . $slug);
                        }
                    }
                }
                
                $html .= '<li class=""><a href="' . $url . '">' . $menu->menu . $menu_arrow . '</a>';
                $level++;
                $html .= $this->buildTreeView($menus, $menu->id, $level, $prelevel);
                $level--;
            }
        }
        if ($level == $prelevel) {
            $html .= '</li></ul>';
        }
        return $html;
    }
}
