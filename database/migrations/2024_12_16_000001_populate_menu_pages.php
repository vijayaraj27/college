<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Web\Page;
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
        // Get all menu items except Home and department-related pages
        $departmentRelatedIds = [31, 32, 33, 34, 35, 36, 37, 38, 39, 45, 46, 47, 48, 49];
        $menus = Menu::whereNotIn('id', $departmentRelatedIds)
                    ->where('id', '!=', 1) // Exclude Home
                    ->get();

        foreach ($menus as $menu) {
            $this->createPageForMenu($menu);
        }
    }

    /**
     * Create a page for a menu item if it doesn't already exist
     */
    private function createPageForMenu($menu)
    {
        // Generate slug from menu name
        $slug = $this->generateSlug($menu->menu);
        
        // Check if page already exists
        $existingPage = Page::where('slug', $slug)->first();
        if ($existingPage) {
            return; // Skip if page already exists
        }

        // Get parent menu for breadcrumb context
        $parentMenu = Menu::find($menu->parent_id);
        $parentContext = $parentMenu ? $parentMenu->menu : '';

        // Generate appropriate content based on menu name
        $content = $this->generateContentForMenu($menu->menu, $parentContext);

        // Create the page
        Page::create([
            'language_id' => 1,
            'title' => $menu->menu,
            'slug' => $slug,
            'description' => $content,
            'meta_title' => $menu->menu . ' - P.S.R. Engineering College',
            'meta_description' => 'Learn about ' . $menu->menu . ' at P.S.R. Engineering College.',
            'status' => 1,
        ]);
    }

    /**
     * Generate a URL-friendly slug from menu name
     */
    private function generateSlug($menuName)
    {
        $slug = strtolower($menuName);
        $slug = str_replace(['&', '/', '(', ')', ' '], ['-and-', '-', '', '', '-'], $slug);
        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    /**
     * Generate content for menu pages
     */
    private function generateContentForMenu($menuName, $parentContext = '')
    {
        $content = '<div class="page-content">';
        $content .= '<h2>' . htmlspecialchars($menuName) . '</h2>';
        
        // Generate contextual content based on menu name
        $descriptions = [
            // Administration
            'Administration' => '<p>The administration of P.S.R. Engineering College comprises experienced leaders dedicated to maintaining excellence in education and institutional governance.</p>',
            'Trust' => '<h3>About PSR Trust</h3><p>P.S.R. Engineering College Trust is a philanthropic institution founded by the illustrious sons of P.S.Ramasamy Naidu. The trust is committed to providing quality technical education and fostering innovation among students.</p>',
            'Correspondent' => '<h3>Correspondent\'s Message</h3><p>Welcome to P.S.R. Engineering College. Our institution has been at the forefront of technical education, nurturing young minds to become skilled professionals and responsible citizens.</p>',
            'Principal' => '<h3>Principal\'s Message</h3><p>It is my privilege to lead this esteemed institution. At P.S.R. Engineering College, we are committed to academic excellence and holistic development of our students.</p>',
            'Governing Council' => '<h3>Governing Council</h3><p>The Governing Council provides strategic direction and oversight to ensure the institution maintains its high standards of education and governance.</p>',
            'Members' => '<h3>Council Members</h3><p>Our council comprises distinguished members from academia, industry, and society who guide the institution towards excellence.</p>',
            'Meeting' => '<h3>Council Meetings</h3><p>Regular meetings are conducted to review institutional progress and make strategic decisions for continuous improvement.</p>',
            'Meetings' => '<h3>Committee Meetings</h3><p>Regular meetings are conducted to ensure effective governance and decision-making.</p>',
            'Academic Council' => '<h3>Academic Council</h3><p>The Academic Council is responsible for maintaining academic standards, curriculum development, and ensuring quality education.</p>',
            'Finance Committee' => '<h3>Finance Committee</h3><p>The Finance Committee oversees the financial management and ensures optimal utilization of resources.</p>',
            'Audit Statement' => '<h3>Audit Statements</h3><p>Annual audit statements and financial reports are available for transparency and accountability.</p>',
            'Policies and Procedures' => '<h3>Institutional Policies and Procedures</h3><p>Our policies ensure fair, transparent, and effective functioning of all institutional activities.</p>',
            'Milestones' => '<h3>Institutional Milestones</h3><p>P.S.R. Engineering College has achieved numerous milestones in its journey towards excellence in technical education.</p>',
            'Approval /Affiliations' => '<h3>Approvals and Affiliations</h3><p>The college is approved by AICTE and affiliated with Anna University, Chennai.</p>',
            'Undertakings' => '<h3>Institutional Undertakings</h3><p>Official undertakings and declarations as per regulatory requirements.</p>',
            'RTI Declaration' => '<h3>Right to Information Declaration</h3><p>RTI information and declarations in compliance with transparency regulations.</p>',
            'Autonomous Undertaking' => '<h3>Autonomous Status Undertaking</h3><p>Documents and undertakings related to autonomous status of the institution.</p>',
            'Organizational Chart' => '<h3>Organizational Structure</h3><p>The organizational chart depicts the administrative hierarchy and reporting structure of the institution.</p>',
            'Mandatory Disclosure' => '<h3>Mandatory Disclosure</h3><p>All mandatory disclosures as per AICTE and regulatory body requirements are available here.</p>',
            
            // Academics
            'Academics' => '<h3>Academic Excellence</h3><p>P.S.R. Engineering College offers comprehensive academic programs designed to prepare students for successful careers in engineering and technology.</p>',
            'Regulations' => '<h3>Academic Regulations</h3><p>Detailed academic regulations governing examination, grading, and academic procedures.</p>',
            'Syllabus' => '<h3>Course Syllabus</h3><p>Comprehensive syllabus for all programs offered by the institution.</p>',
            'NPTEL' => '<h3>NPTEL Integration</h3><p>Information about NPTEL courses and their integration with our curriculum.</p>',
            'Academic Feedback' => '<h3>Academic Feedback System</h3><p>Our feedback system ensures continuous improvement in teaching-learning processes.</p>',
            'Calendar of Activities' => '<h3>Academic Calendar</h3><p>Annual academic calendar with important dates and events.</p>',
            
            // Accreditations
            'Accreditations' => '<h3>Accreditations and Recognition</h3><p>P.S.R. Engineering College has received prestigious accreditations recognizing its commitment to quality education.</p>',
            'NAAC' => '<h3>NAAC Accreditation</h3><p>Information about our NAAC accreditation, assessment reports, and quality initiatives.</p>',
            'NBA' => '<h3>NBA Accreditation</h3><p>Details of NBA accredited programs and quality benchmarks.</p>',
            
            // Examinations
            'Examinations' => '<h3>Examination System</h3><p>Comprehensive examination system ensuring fair and transparent evaluation of students.</p>',
            'Controller of Exam' => '<h3>Controller of Examinations</h3><p>Information about the Controller of Examinations office and its functions.</p>',
            'COE Announcements' => '<h3>Examination Announcements</h3><p>Latest announcements and notifications from the Controller of Examinations.</p>',
            'Download Forms' => '<h3>Examination Forms</h3><p>Download examination-related forms and applications.</p>',
            'Exam Results' => '<h3>Examination Results</h3><p>Access examination results and academic records.</p>',
            'Automation System' => '<h3>Examination Automation</h3><p>Information about our automated examination management system.</p>',
            
            // Infrastructure
            'Infrastructure' => '<h3>World-Class Infrastructure</h3><p>P.S.R. Engineering College boasts state-of-the-art infrastructure to support academic and extracurricular activities.</p>',
            'Library' => '<h3>Central Library</h3><p>Our library houses an extensive collection of books, journals, and digital resources to support learning and research.</p>',
            'Cafeteria' => '<h3>Cafeteria</h3><p>Hygienic and spacious cafeteria serving nutritious meals to students and staff.</p>',
            'Transport' => '<h3>Transport Facility</h3><p>Comfortable and safe transportation services for students and staff.</p>',
            'Bank' => '<h3>Banking Facility</h3><p>On-campus banking facility for the convenience of students and staff.</p>',
            'Health Club' => '<h3>Health and Fitness</h3><p>Well-equipped health club and fitness center for physical wellness.</p>',
            'Internet Centre' => '<h3>Internet Centre</h3><p>High-speed internet connectivity and computer facilities for students.</p>',
            'Store Facility' => '<h3>Store and Supplies</h3><p>Campus store providing stationery and essential supplies.</p>',
            'Wifi Connectivity' => '<h3>WiFi Campus</h3><p>Campus-wide WiFi connectivity ensuring seamless internet access.</p>',
            'Indoor Stadium' => '<h3>Indoor Stadium</h3><p>Spacious indoor stadium for sports and recreational activities.</p>',
            'Medical Centre' => '<h3>Medical Centre</h3><p>On-campus medical facility with qualified medical professionals for student healthcare.</p>',
            'Hostel' => '<h3>Hostel Accommodation</h3><p>Comfortable and secure hostel facilities for outstation students.</p>',
            
            // Admission
            'Admission' => '<h3>Admission Process</h3><p>Information about admission procedures, eligibility criteria, and important dates for various programs.</p><h4>Eligibility</h4><p>Candidates seeking admission must meet the eligibility criteria set by Anna University and AICTE.</p><h4>Application Process</h4><p>Applications can be submitted online through our admission portal during the specified period.</p>',
            
            // Placement
            'Placement' => '<h3>Placement and Training</h3><p>Our Training and Placement Cell works diligently to provide career opportunities to students.</p><h4>Our Recruiters</h4><p>Leading companies from various sectors visit our campus for recruitment.</p><h4>Placement Statistics</h4><p>Consistent placement record with students placed in reputed organizations.</p>',
            
            // Extra Curricular
            'Extra curricular' => '<h3>Extra-Curricular Activities</h3><p>We believe in the holistic development of students through various extra-curricular activities.</p><p>Students participate in cultural events, sports, technical clubs, and social activities.</p>',
            
            // Others
            'Others' => '<h3>Additional Information</h3><p>Other important information and resources for students, parents, and stakeholders.</p>',
        ];

        if (isset($descriptions[$menuName])) {
            $content .= $descriptions[$menuName];
        } else {
            // Generic content for undefined menus
            if ($parentContext) {
                $content .= '<p>This section provides detailed information about ' . htmlspecialchars($menuName) . ' under ' . htmlspecialchars($parentContext) . ' at P.S.R. Engineering College.</p>';
            } else {
                $content .= '<p>This section provides comprehensive information about ' . htmlspecialchars($menuName) . ' at P.S.R. Engineering College.</p>';
            }
            $content .= '<p>For more information, please contact the administration office or visit the campus.</p>';
        }
        
        $content .= '</div>';
        
        return $content;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Get all menu slugs (except Home and departments)
        $departmentRelatedIds = [31, 32, 33, 34, 35, 36, 37, 38, 39, 45, 46, 47, 48, 49];
        $menus = Menu::whereNotIn('id', $departmentRelatedIds)
                    ->where('id', '!=', 1)
                    ->get();
        
        foreach ($menus as $menu) {
            $slug = $this->generateSlug($menu->menu);
            Page::where('slug', $slug)->delete();
        }
    }
};

