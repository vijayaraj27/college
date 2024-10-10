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
    private function buildTreeView($menus, $parent = 0, $level = 0, $prelevel = -1)
    {
        $html = '';
        foreach ($menus as $menu) {
            if ($parent == $menu->parent_id) {
                if ($level > $prelevel) {
                    $html .= ($html == '') ? '<ul class="" id="">' : '<ul class="dropdown-menu">';
                }
                if ($level == $prelevel) {
                    $html .= '</li>';
                   // $menu_arrow = '';
                }
                if ($level > $prelevel) {
                    $prelevel = $level;
                    //$menu_arrow = '';
                }
                if($menu->is_parent_present==1)
                {
                    $menu_arrow = '&nbsp;<span class="caret"></span>';
                }
                else{
                    $menu_arrow = '';
                }
                $html .= '<li class=""><a href="#">' . $menu->menu .$menu_arrow. '</a>';
                $level++;
                $html .= $this->buildTreeView($menus, $menu->id, $level, $prelevel);
                $level--;
            }
        }
        if ($level == $prelevel) {
           // $menu_arrow = '';
            $html .= '</li></ul>';
        }
        return $html;
    }
}
