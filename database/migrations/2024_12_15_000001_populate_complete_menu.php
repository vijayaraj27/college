<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Clear existing menu data
        Menu::truncate();
        
        // Insert complete menu structure
        $menus = [
            // Level 1
            ['id' => 1, 'menu' => 'Home', 'parent_id' => 0, 'is_parent_present' => null, 'status' => 0],
            ['id' => 2, 'menu' => 'Administration', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 30, 'menu' => 'Academics', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 50, 'menu' => 'Accreditations', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 60, 'menu' => 'Examinations', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 70, 'menu' => 'Infrastructure', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 80, 'menu' => 'Admission', 'parent_id' => 0, 'is_parent_present' => null, 'status' => 0],
            ['id' => 90, 'menu' => 'Placement', 'parent_id' => 0, 'is_parent_present' => null, 'status' => 0],
            ['id' => 100, 'menu' => 'Extra curricular', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 110, 'menu' => 'Others', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            
            // Administration submenu (Level 2)
            ['id' => 3, 'menu' => 'Trust', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 4, 'menu' => 'Correspondent', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 5, 'menu' => 'Principal', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 6, 'menu' => 'Governing Council', 'parent_id' => 2, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 9, 'menu' => 'Academic Council', 'parent_id' => 2, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 12, 'menu' => 'Finance Committee', 'parent_id' => 2, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 16, 'menu' => 'Policies and Procedures', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 17, 'menu' => 'Milestones', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 18, 'menu' => 'Approval /Affiliations', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 19, 'menu' => 'Undertakings', 'parent_id' => 2, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 20, 'menu' => 'Organizational Chart', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            ['id' => 21, 'menu' => 'Mandatory Disclosure', 'parent_id' => 2, 'is_parent_present' => null, 'status' => 0],
            
            // Governing Council submenu (Level 3)
            ['id' => 7, 'menu' => 'Members', 'parent_id' => 6, 'is_parent_present' => null, 'status' => 0],
            ['id' => 8, 'menu' => 'Meeting', 'parent_id' => 6, 'is_parent_present' => null, 'status' => 0],
            
            // Academic Council submenu (Level 3)
            ['id' => 10, 'menu' => 'Members', 'parent_id' => 9, 'is_parent_present' => null, 'status' => 0],
            ['id' => 11, 'menu' => 'Meetings', 'parent_id' => 9, 'is_parent_present' => null, 'status' => 0],
            
            // Finance Committee submenu (Level 3)
            ['id' => 13, 'menu' => 'Members', 'parent_id' => 12, 'is_parent_present' => null, 'status' => 0],
            ['id' => 14, 'menu' => 'Meetings', 'parent_id' => 12, 'is_parent_present' => null, 'status' => 0],
            ['id' => 15, 'menu' => 'Audit Statement', 'parent_id' => 12, 'is_parent_present' => null, 'status' => 0],
            
            // Undertakings submenu (Level 3)
            ['id' => 22, 'menu' => 'RTI Declaration', 'parent_id' => 19, 'is_parent_present' => null, 'status' => 0],
            ['id' => 23, 'menu' => 'Autonomous Undertaking', 'parent_id' => 19, 'is_parent_present' => null, 'status' => 0],
            
            // Academics submenu (Level 2)
            ['id' => 31, 'menu' => 'Department', 'parent_id' => 30, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 40, 'menu' => 'Regulations', 'parent_id' => 30, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 41, 'menu' => 'Syllabus', 'parent_id' => 30, 'is_parent_present' => null, 'status' => 0],
            ['id' => 42, 'menu' => 'NPTEL', 'parent_id' => 30, 'is_parent_present' => null, 'status' => 0],
            ['id' => 43, 'menu' => 'Academic Feedback', 'parent_id' => 30, 'is_parent_present' => null, 'status' => 0],
            ['id' => 44, 'menu' => 'Calendar of Activities', 'parent_id' => 30, 'is_parent_present' => null, 'status' => 0],
            
            // Department submenu (Level 3)
            ['id' => 32, 'menu' => 'UG Programs', 'parent_id' => 31, 'is_parent_present' => 1, 'status' => 0],
            ['id' => 33, 'menu' => 'PG Programs', 'parent_id' => 31, 'is_parent_present' => 1, 'status' => 0],
            
            // UG Programs submenu (Level 4)
            ['id' => 34, 'menu' => 'Artificial Intelligence & Data Science (AI & DS)', 'parent_id' => 32, 'is_parent_present' => null, 'status' => 0],
            ['id' => 35, 'menu' => 'Bio Medical(BM)', 'parent_id' => 32, 'is_parent_present' => null, 'status' => 0],
            ['id' => 36, 'menu' => 'Bio-Technology (BT)', 'parent_id' => 32, 'is_parent_present' => null, 'status' => 0],
            ['id' => 37, 'menu' => 'Civil Engineering (CIVIL)', 'parent_id' => 32, 'is_parent_present' => null, 'status' => 0],
            ['id' => 38, 'menu' => 'Computer Science and Engineering (CSE)', 'parent_id' => 32, 'is_parent_present' => null, 'status' => 0],
            ['id' => 39, 'menu' => 'Electrical and Electronics Engineering (EEE)', 'parent_id' => 32, 'is_parent_present' => null, 'status' => 0],
            
            // PG Programs submenu (Level 4)
            ['id' => 45, 'menu' => 'Applied Electronics (AE)', 'parent_id' => 33, 'is_parent_present' => null, 'status' => 0],
            ['id' => 46, 'menu' => 'Computer Science and Engineering (CSE)', 'parent_id' => 33, 'is_parent_present' => null, 'status' => 0],
            ['id' => 47, 'menu' => 'Engineering Design (ED)', 'parent_id' => 33, 'is_parent_present' => null, 'status' => 0],
            ['id' => 48, 'menu' => 'Master of Business Administration (MBA)', 'parent_id' => 33, 'is_parent_present' => null, 'status' => 0],
            ['id' => 49, 'menu' => 'Power Electronics and Drives (PED)', 'parent_id' => 33, 'is_parent_present' => null, 'status' => 0],
            
            // Accreditations submenu (Level 2)
            ['id' => 51, 'menu' => 'NAAC', 'parent_id' => 50, 'is_parent_present' => null, 'status' => 0],
            ['id' => 52, 'menu' => 'NBA', 'parent_id' => 50, 'is_parent_present' => null, 'status' => 0],
            
            // Examinations submenu (Level 2)
            ['id' => 61, 'menu' => 'Controller of Exam', 'parent_id' => 60, 'is_parent_present' => null, 'status' => 0],
            ['id' => 62, 'menu' => 'COE Announcements', 'parent_id' => 60, 'is_parent_present' => null, 'status' => 0],
            ['id' => 63, 'menu' => 'Download Forms', 'parent_id' => 60, 'is_parent_present' => null, 'status' => 0],
            ['id' => 64, 'menu' => 'Exam Results', 'parent_id' => 60, 'is_parent_present' => null, 'status' => 0],
            ['id' => 65, 'menu' => 'Automation System', 'parent_id' => 60, 'is_parent_present' => null, 'status' => 0],
            
            // Infrastructure submenu (Level 2)
            ['id' => 71, 'menu' => 'Library', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 72, 'menu' => 'Cafeteria', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 73, 'menu' => 'Transport', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 74, 'menu' => 'Bank', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 75, 'menu' => 'Health Club', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 76, 'menu' => 'Internet Centre', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 77, 'menu' => 'Store Facility', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 78, 'menu' => 'Wifi Connectivity', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 79, 'menu' => 'Indoor Stadium', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
            ['id' => 80, 'menu' => 'Medical Centre', 'parent_id' => 80, 'is_parent_present' => null, 'status' => 0],
            ['id' => 81, 'menu' => 'Hostel', 'parent_id' => 70, 'is_parent_present' => null, 'status' => 0],
        ];
        
        foreach ($menus as $menuData) {
            Menu::create($menuData);
        }
        
        // Create corresponding pages for menu items that should have pages
        $this->createPageIfNotExists('trust', 'Trust', '<h2>About PSR Trust</h2><p>P.S.R. Engineering College Trust is a philanthropic institution founded by the illustrious sons of P.S.Ramasamy Naidu.</p>');
        $this->createPageIfNotExists('correspondent', 'Correspondent', '<h2>Correspondent</h2><p>Information about the correspondent will be added here.</p>');
        $this->createPageIfNotExists('principal', 'Principal', '<h2>Principal</h2><p>Information about the principal will be added here.</p>');
    }
    
    private function createPageIfNotExists($slug, $title, $description)
    {
        $existingPage = \App\Models\Web\Page::where('slug', $slug)->first();
        if (!$existingPage) {
            \App\Models\Web\Page::create([
                'id' => \App\Models\Web\Page::max('id') + 1,
                'language_id' => 1,
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'meta_title' => $title . ' - P.S.R. Engineering College',
                'meta_description' => 'Learn about ' . $title . ' at P.S.R. Engineering College.',
                'status' => 1,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Menu::truncate();
    }
};
