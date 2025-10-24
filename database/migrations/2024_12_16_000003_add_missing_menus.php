<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;
use App\Models\Web\Page;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Fix structural issues first
        $this->fixMenuStructure();
        
        // Add missing menus
        $this->addMissingMenus();
        
        // Create pages for new menus
        $this->createPagesForNewMenus();
    }

    /**
     * Fix menu structure issues
     */
    private function fixMenuStructure()
    {
        // Fix IQAC - should be at main level, not under Others
        \DB::table('menu')->where('id', 82)->update(['parent_id' => 0]);
        
        // Fix NISP, NIRF, AISHE - should be at main level
        \DB::table('menu')->whereIn('id', [90, 91, 92])->update(['parent_id' => 0]);
        
        // Fix Cells/Committee - should be at main level, not under Extra curricular
        \DB::table('menu')->where('id', 93)->update(['parent_id' => 0]);
    }

    /**
     * Add all missing menus
     */
    private function addMissingMenus()
    {
        $newMenus = [
            // Add Research (main level) - ID 120
            ['id' => 120, 'menu' => 'Research', 'parent_id' => 0, 'is_parent_present' => null, 'status' => 0],
            
            // Add LCS under Academics (parent: 24) - ID 121
            ['id' => 121, 'menu' => 'LCS', 'parent_id' => 24, 'is_parent_present' => null, 'status' => 0],
            
            // Add 2023 under Regulations > UG (parent: 45) - ID 122
            ['id' => 122, 'menu' => '2023', 'parent_id' => 45, 'is_parent_present' => null, 'status' => 0],
            
            // Add 2023 under Regulations > PG (parent: 50) - ID 123
            ['id' => 123, 'menu' => '2023', 'parent_id' => 50, 'is_parent_present' => null, 'status' => 0],
            
            // Add Idea Lab section (main level) - ID 130
            ['id' => 130, 'menu' => 'Idea Lab', 'parent_id' => 0, 'is_parent_present' => 1, 'status' => 0],
            
            // Idea Lab submenus
            ['id' => 131, 'menu' => 'Chief Mentor', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 132, 'menu' => 'Faculty Coordinators', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 133, 'menu' => 'Steering Committee Members', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 134, 'menu' => 'Tech Gurus', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 135, 'menu' => 'Student Ambassador', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 136, 'menu' => 'Events', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 137, 'menu' => 'Internship', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 138, 'menu' => 'Department Coordinators', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            ['id' => 139, 'menu' => 'Tender Notice', 'parent_id' => 130, 'is_parent_present' => null, 'status' => 0],
            
            // Add Information Desk under Quick Links (parent: 109) - ID 140
            ['id' => 140, 'menu' => 'Information Desk', 'parent_id' => 109, 'is_parent_present' => null, 'status' => 0],
            
            // Add ICOACT-2025 (main level) - ID 141
            ['id' => 141, 'menu' => 'ICOACT-2025', 'parent_id' => 0, 'is_parent_present' => null, 'status' => 0],
        ];

        foreach ($newMenus as $menuData) {
            // Check if menu already exists
            $exists = \DB::table('menu')->where('id', $menuData['id'])->exists();
            if (!$exists) {
                \DB::table('menu')->insert($menuData);
            }
        }
    }

    /**
     * Create pages for new menus (excluding regulation years)
     */
    private function createPagesForNewMenus()
    {
        // Research page
        $this->createPageIfNotExists('research', 'Research', 
            '<h2>Research at PSR Engineering College</h2>
            <p>PSR Engineering College is committed to fostering a culture of research and innovation. As an <strong>Anna University Authorized Research Center for 7 Ph.D Programmes</strong> and <strong>Recognized as Scientific & Industrial Research Organization</strong>, we encourage faculty and students to engage in cutting-edge research.</p>
            
            <h3>Research Highlights</h3>
            <ul>
                <li><strong>275+ Patents filed</strong> in 2024-25</li>
                <li><strong>Patent Award</strong> from IPR (Govt of India) and Anna University</li>
                <li><strong>Anna University Authorized Research Center</strong> for 7 Ph.D Programs</li>
                <li><strong>Recognized as Scientific & Industrial Research Organization</strong></li>
                <li>State-of-the-art research laboratories</li>
                <li>Industry-academia collaboration</li>
                <li>Research publications in reputed journals</li>
            </ul>
            
            <h3>Ph.D Programs</h3>
            <ul>
                <li>Computer Science & Engineering (CSE)</li>
                <li>Electronics & Communication Engineering (ECE)</li>
                <li>Electrical and Electronics Engineering (EEE)</li>
                <li>Mechanical Engineering (MECH)</li>
                <li>Civil Engineering (CIVIL)</li>
                <li>Science & Humanities (Physics)</li>
            </ul>
            
            <h3>Research Areas</h3>
            <p>Our faculty and research scholars work on diverse areas including Artificial Intelligence, Data Science, IoT, Renewable Energy, Advanced Materials, Biotechnology, and more.</p>',
            'Research - PSR Engineering College',
            'Research activities, Ph.D programs, 275+ patents filed at PSR Engineering College - Anna University Research Center.'
        );

        // LCS page
        $this->createPageIfNotExists('lcs', 'LCS', 
            '<h2>Learning Content System (LCS)</h2>
            <p>The Learning Content System at PSR Engineering College provides students with access to digital learning resources, course materials, and online content to enhance their learning experience.</p>
            
            <h3>Features</h3>
            <ul>
                <li>Online course materials and lecture notes</li>
                <li>Video lectures and tutorials</li>
                <li>Digital library resources</li>
                <li>Assignment submission system</li>
                <li>Interactive learning modules</li>
                <li>24/7 access to learning resources</li>
            </ul>',
            'LCS - PSR Engineering College',
            'Learning Content System (LCS) at PSR Engineering College - Digital learning resources and course materials.'
        );

        // Idea Lab pages
        $this->createPageIfNotExists('idea-lab', 'Idea Lab', 
            '<h2>Idea Lab - Innovation and Incubation</h2>
            <p>The Idea Lab at PSR Engineering College is a dedicated space for innovation, creativity, and entrepreneurship. It provides students with resources, mentorship, and opportunities to transform their ideas into reality.</p>
            
            <h3>Our Mission</h3>
            <p>To foster innovation, encourage entrepreneurship, and provide a platform for students to develop and implement their ideas.</p>
            
            <h3>Facilities</h3>
            <ul>
                <li>State-of-the-art prototyping equipment</li>
                <li>Mentorship from industry experts</li>
                <li>Funding support for innovative projects</li>
                <li>Industry connections and networking opportunities</li>
                <li>Workshops and training programs</li>
                <li>Internship placements</li>
            </ul>',
            'Idea Lab - PSR Engineering College',
            'Idea Lab at PSR Engineering College - Innovation, incubation, and entrepreneurship center for students.'
        );

        $this->createPageIfNotExists('chief-mentor', 'Chief Mentor', 
            '<h2>Chief Mentor - Idea Lab</h2>
            <p>The Chief Mentor of Idea Lab provides strategic guidance and mentorship to students and faculty in their innovation and entrepreneurship journey.</p>',
            'Chief Mentor - Idea Lab - PSR Engineering College',
            'Chief Mentor of Idea Lab at PSR Engineering College.'
        );

        $this->createPageIfNotExists('faculty-coordinators', 'Faculty Coordinators', 
            '<h2>Faculty Coordinators - Idea Lab</h2>
            <p>Faculty Coordinators work closely with students to guide their projects, provide technical expertise, and facilitate innovation activities.</p>',
            'Faculty Coordinators - Idea Lab - PSR Engineering College',
            'Faculty Coordinators for Idea Lab at PSR Engineering College.'
        );

        $this->createPageIfNotExists('steering-committee-members', 'Steering Committee Members', 
            '<h2>Steering Committee Members</h2>
            <p>The Steering Committee comprises eminent members from academia, industry, and entrepreneurship who guide the Idea Lab\'s strategic direction.</p>',
            'Steering Committee - Idea Lab - PSR Engineering College',
            'Steering Committee members of Idea Lab at PSR Engineering College.'
        );

        $this->createPageIfNotExists('tech-gurus', 'Tech Gurus', 
            '<h2>Tech Gurus</h2>
            <p>Tech Gurus are industry experts and technical mentors who provide guidance on latest technologies and industry best practices.</p>',
            'Tech Gurus - Idea Lab - PSR Engineering College',
            'Tech Gurus and technical mentors at PSR Engineering College Idea Lab.'
        );

        $this->createPageIfNotExists('student-ambassador', 'Student Ambassador', 
            '<h2>Student Ambassadors</h2>
            <p>Student Ambassadors represent the Idea Lab, organize events, and help fellow students engage with innovation activities.</p>',
            'Student Ambassadors - Idea Lab - PSR Engineering College',
            'Student Ambassadors of Idea Lab at PSR Engineering College.'
        );

        $this->createPageIfNotExists('idea-lab-events', 'Idea Lab Events', 
            '<h2>Idea Lab Events</h2>
            <p>The Idea Lab organizes various events including hackathons, innovation challenges, workshops, and industry interactions to promote entrepreneurship and innovation culture.</p>',
            'Events - Idea Lab - PSR Engineering College',
            'Innovation events, hackathons, and workshops at PSR Engineering College Idea Lab.'
        );

        $this->createPageIfNotExists('internship', 'Internship', 
            '<h2>Internship Opportunities</h2>
            <p>The Idea Lab facilitates internship opportunities with startups, industry partners, and research organizations, providing students with practical experience and industry exposure.</p>',
            'Internship - Idea Lab - PSR Engineering College',
            'Internship opportunities through Idea Lab at PSR Engineering College.'
        );

        $this->createPageIfNotExists('department-coordinators', 'Department Coordinators', 
            '<h2>Department Coordinators</h2>
            <p>Department Coordinators from each department facilitate Idea Lab activities and promote innovation within their respective departments.</p>',
            'Department Coordinators - Idea Lab - PSR Engineering College',
            'Department Coordinators for Idea Lab at PSR Engineering College.'
        );

        $this->createPageIfNotExists('tender-notice', 'Tender Notice', 
            '<h2>Tender Notices</h2>
            <p>Official tender notices and procurement announcements from PSR Engineering College and Idea Lab.</p>',
            'Tender Notice - PSR Engineering College',
            'Tender notices and procurement announcements from PSR Engineering College.'
        );

        // Information Desk
        $this->createPageIfNotExists('information-desk', 'Information Desk', 
            '<h2>Information Desk</h2>
            <p>The Information Desk at PSR Engineering College provides comprehensive information and assistance to students, parents, and visitors.</p>
            
            <h3>Services</h3>
            <ul>
                <li>General information about the college</li>
                <li>Admission enquiries</li>
                <li>Campus directions and guidance</li>
                <li>Event information</li>
                <li>Contact information for various departments</li>
            </ul>
            
            <h3>Contact</h3>
            <p><strong>Phone:</strong> 80125 31321 / 80125 31323 / 80125 31325<br>
            <strong>Email:</strong> contact@psr.edu.in</p>',
            'Information Desk - PSR Engineering College',
            'Information desk for enquiries and assistance at PSR Engineering College, Sivakasi.'
        );

        // ICOACT-2025
        $this->createPageIfNotExists('icoact-2025', 'ICOACT-2025', 
            '<h2>ICOACT-2025</h2>
            <h3>International Conference on Advances in Computing Technology</h3>
            <p>PSR Engineering College proudly hosts ICOACT-2025, an international conference bringing together researchers, academicians, and industry professionals to share knowledge and innovations in computing technology.</p>
            
            <h3>Conference Details</h3>
            <p>ICOACT-2025 provides a platform for presenting research papers, attending workshops, and networking with experts from around the world.</p>
            
            <h3>Call for Papers</h3>
            <p>We invite original research papers, case studies, and reviews in various areas of computing technology.</p>
            
            <h3>Contact</h3>
            <p>For more information, please contact:<br>
            <strong>Email:</strong> contact@psr.edu.in<br>
            <strong>Phone:</strong> 80125 31321</p>',
            'ICOACT-2025 - PSR Engineering College',
            'International Conference on Advances in Computing Technology (ICOACT-2025) at PSR Engineering College.'
        );
    }

    /**
     * Helper method to create a page if it doesn't exist
     */
    private function createPageIfNotExists($slug, $title, $description, $metaTitle, $metaDescription)
    {
        $existingPage = Page::where('slug', $slug)->first();
        if (!$existingPage) {
            Page::create([
                'language_id' => 1,
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'meta_title' => $metaTitle,
                'meta_description' => $metaDescription,
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
        // Remove added menus
        \DB::table('menu')->where('id', '>=', 120)->delete();
        
        // Revert structure changes
        \DB::table('menu')->where('id', 82)->update(['parent_id' => 105]); // IQAC back under Others
        \DB::table('menu')->whereIn('id', [90, 91, 92])->update(['parent_id' => 105]); // NISP/NIRF/AISHE back under Others
        \DB::table('menu')->where('id', 93)->update(['parent_id' => 85]); // Cells back under Extra curricular
        
        // Remove pages
        $slugs = ['research', 'lcs', 'idea-lab', 'chief-mentor', 'faculty-coordinators', 
                  'steering-committee-members', 'tech-gurus', 'student-ambassador', 
                  'idea-lab-events', 'internship', 'department-coordinators', 'tender-notice',
                  'information-desk', 'icoact-2025'];
        Page::whereIn('slug', $slugs)->delete();
    }
};

