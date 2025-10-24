<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Web\Page;

return new class extends Migration
{
    private $oldSiteUrl = 'https://psr.edu.in';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update pages with content mapping from old site
        $this->updateAdministrationPages();
        $this->updateAcademicsPages();
        $this->updateAccreditationPages();
        $this->updateExaminationPages();
        $this->updateInfrastructurePages();
        $this->updateSinglePages();
        $this->updateExtraCurricularPages();
        $this->updateOtherPages();
    }

    /**
     * Update Administration section pages
     */
    private function updateAdministrationPages()
    {
        // Trust
        $this->updatePage('trust', [
            'title' => 'Trust',
            'description' => $this->getTrustContent(),
            'meta_title' => 'Trust - PSR Engineering College',
            'meta_description' => 'P.S.R. Engineering College Trust is a philanthropic institution founded by the illustrious sons of P.S.Ramasamy Naidu.',
        ]);

        // Correspondent
        $this->updatePage('correspondent', [
            'title' => 'Correspondent',
            'description' => $this->getCorrespondentContent(),
            'meta_title' => 'Correspondent - PSR Engineering College',
            'meta_description' => 'Message from the Correspondent of PSR Engineering College, Sivakasi.',
        ]);

        // Principal
        $this->updatePage('principal', [
            'title' => 'Principal',
            'description' => $this->getPrincipalContent(),
            'meta_title' => 'Principal - PSR Engineering College',
            'meta_description' => 'Message from the Principal of PSR Engineering College, an Autonomous Institution.',
        ]);

        // Governing Council
        $this->updatePage('governing-council', [
            'title' => 'Governing Council',
            'description' => '<h2>Governing Council</h2><p>The Governing Council of PSR Engineering College provides strategic direction and oversight to ensure the institution maintains its high standards of education and governance as an Autonomous Institution affiliated to Anna University, Chennai.</p>',
            'meta_title' => 'Governing Council - PSR Engineering College',
            'meta_description' => 'Governing Council of PSR Engineering College - Members and responsibilities.',
        ]);

        // Academic Council
        $this->updatePage('academic-council', [
            'title' => 'Academic Council',
            'description' => '<h2>Academic Council</h2><p>The Academic Council is responsible for maintaining academic standards, curriculum development, and ensuring quality education at PSR Engineering College.</p>',
            'meta_title' => 'Academic Council - PSR Engineering College',
            'meta_description' => 'Academic Council of PSR Engineering College - Responsible for academic excellence and curriculum development.',
        ]);

        // Finance Committee
        $this->updatePage('finance-committee', [
            'title' => 'Finance Committee',
            'description' => '<h2>Finance Committee</h2><p>The Finance Committee oversees the financial management and ensures optimal utilization of resources at PSR Engineering College.</p>',
            'meta_title' => 'Finance Committee - PSR Engineering College',
            'meta_description' => 'Finance Committee of PSR Engineering College - Financial oversight and management.',
        ]);

        // Policies and Procedures
        $this->updatePage('policies-and-procedures', [
            'title' => 'Policies and Procedures',
            'description' => '<h2>Policies and Procedures</h2><p>PSR Engineering College follows comprehensive policies and procedures to ensure fair, transparent, and effective functioning of all institutional activities in compliance with AICTE and Anna University guidelines.</p>',
            'meta_title' => 'Policies and Procedures - PSR Engineering College',
            'meta_description' => 'Institutional policies and procedures at PSR Engineering College.',
        ]);

        // Milestones
        $this->updatePage('milestones', [
            'title' => 'Milestones',
            'description' => $this->getMilestonesContent(),
            'meta_title' => 'Milestones - PSR Engineering College',
            'meta_description' => 'Major milestones achieved by PSR Engineering College since its establishment in 1998.',
        ]);

        // Mandatory Disclosure
        $this->updatePage('mandatory-disclosure', [
            'title' => 'Mandatory Disclosure',
            'description' => '<h2>Mandatory Disclosure</h2><p>All mandatory disclosures as per AICTE and regulatory body requirements are available here for PSR Engineering College, an Autonomous Institution approved by AICTE and affiliated to Anna University, Chennai.</p>',
            'meta_title' => 'Mandatory Disclosure - PSR Engineering College',
            'meta_description' => 'Mandatory disclosure as per AICTE norms for PSR Engineering College.',
        ]);
    }

    /**
     * Update Academics section pages
     */
    private function updateAcademicsPages()
    {
        $this->updatePage('academics', [
            'title' => 'Academics',
            'description' => '<h2>Academic Excellence at PSR</h2><p>PSR Engineering College, an Autonomous Institution affiliated to Anna University, offers comprehensive academic programs designed to prepare students for successful careers in engineering and technology.</p><p>The college offers Engineering Education at UG, PG and Ph.D levels with NBA and NAAC A+ accreditation.</p>',
            'meta_title' => 'Academics - PSR Engineering College',
            'meta_description' => 'Academic programs and excellence at PSR Engineering College - UG, PG and Ph.D programs.',
        ]);

        $this->updatePage('syllabus', [
            'title' => 'Syllabus',
            'description' => '<h2>Course Syllabus</h2><p>Comprehensive syllabus for all UG and PG programs offered by PSR Engineering College as per Anna University curriculum and autonomous regulations.</p>',
            'meta_title' => 'Syllabus - PSR Engineering College',
            'meta_description' => 'Course syllabus for UG and PG programs at PSR Engineering College.',
        ]);

        $this->updatePage('nptel', [
            'title' => 'NPTEL',
            'description' => '<h2>NPTEL Integration</h2><p>PSR Engineering College actively participates in NPTEL (National Programme on Technology Enhanced Learning) courses to enhance the learning experience of students with quality online courses from IITs and IISc.</p>',
            'meta_title' => 'NPTEL - PSR Engineering College',
            'meta_description' => 'NPTEL courses and integration at PSR Engineering College.',
        ]);

        $this->updatePage('academic-feedback', [
            'title' => 'Academic Feedback',
            'description' => '<h2>Academic Feedback System</h2><p>PSR Engineering College maintains a comprehensive feedback system to ensure continuous improvement in teaching-learning processes. Student feedback is collected regularly and acted upon to enhance academic quality.</p>',
            'meta_title' => 'Academic Feedback - PSR Engineering College',
            'meta_description' => 'Academic feedback system at PSR Engineering College for continuous improvement.',
        ]);

        $this->updatePage('calendar-of-activities', [
            'title' => 'Calendar of Activities',
            'description' => '<h2>Academic Calendar</h2><p>Annual academic calendar with important dates, events, examinations, and activities at PSR Engineering College.</p>',
            'meta_title' => 'Academic Calendar - PSR Engineering College',
            'meta_description' => 'Academic calendar and important dates at PSR Engineering College.',
        ]);
    }

    /**
     * Update Accreditation pages
     */
    private function updateAccreditationPages()
    {
        $this->updatePage('accreditations', [
            'title' => 'Accreditations',
            'description' => '<h2>Accreditations and Recognition</h2><p>PSR Engineering College has received prestigious accreditations recognizing its commitment to quality education:</p><ul><li><strong>NAAC Accredited with A+ Grade</strong></li><li><strong>NBA Accreditation</strong> for multiple programs</li><li><strong>ISO 9001:2015 Certified Organization</strong></li><li><strong>Autonomous Status</strong> by Anna University</li></ul>',
            'meta_title' => 'Accreditations - PSR Engineering College',
            'meta_description' => 'PSR Engineering College - NAAC A+ accredited, NBA accredited, ISO certified institution.',
        ]);

        $this->updatePage('naac', [
            'title' => 'NAAC',
            'description' => '<h2>NAAC Accreditation</h2><h3>Accredited with A+ Grade</h3><p>PSR Engineering College is proud to be accredited by NAAC (National Assessment and Accreditation Council) with A+ Grade, demonstrating our commitment to quality education and continuous improvement.</p><p>The NAAC accreditation is a testimony to our excellence in teaching, research, infrastructure, and overall institutional performance.</p>',
            'meta_title' => 'NAAC Accreditation - PSR Engineering College',
            'meta_description' => 'PSR Engineering College is NAAC accredited with A+ Grade - Quality education recognized.',
        ]);

        $this->updatePage('nba', [
            'title' => 'NBA',
            'description' => '<h2>NBA Accreditation</h2><p>Several programs at PSR Engineering College are accredited by NBA (National Board of Accreditation), ensuring that our programs meet international quality standards and benchmarks.</p><p>NBA accreditation validates the quality of our engineering education and enhances career opportunities for our graduates.</p>',
            'meta_title' => 'NBA Accreditation - PSR Engineering College',
            'meta_description' => 'NBA accredited programs at PSR Engineering College - Quality engineering education.',
        ]);
    }

    /**
     * Update Examination pages
     */
    private function updateExaminationPages()
    {
        $this->updatePage('examinations', [
            'title' => 'Examinations',
            'description' => '<h2>Examination System</h2><p>PSR Engineering College maintains a comprehensive and transparent examination system as an Autonomous Institution, ensuring fair evaluation of students.</p>',
            'meta_title' => 'Examinations - PSR Engineering College',
            'meta_description' => 'Examination system and procedures at PSR Engineering College.',
        ]);

        $this->updatePage('controller-of-exam', [
            'title' => 'Controller of Examinations',
            'description' => '<h2>Controller of Examinations</h2><p>The Controller of Examinations office manages all examination-related activities including scheduling, conduct, evaluation, and results publication at PSR Engineering College.</p>',
            'meta_title' => 'Controller of Examinations - PSR Engineering College',
            'meta_description' => 'Office of Controller of Examinations at PSR Engineering College.',
        ]);

        $this->updatePage('exam-results', [
            'title' => 'Exam Results',
            'description' => '<h2>Examination Results</h2><p>Access examination results and academic records for PSR Engineering College students.</p>',
            'meta_title' => 'Exam Results - PSR Engineering College',
            'meta_description' => 'Examination results for PSR Engineering College students.',
        ]);

        $this->updatePage('automation-system', [
            'title' => 'Automation System',
            'description' => '<h2>Examination Automation System</h2><p>PSR Engineering College uses an advanced examination automation system for efficient management of examinations, answer script evaluation, and result processing.</p>',
            'meta_title' => 'Exam Automation System - PSR Engineering College',
            'meta_description' => 'Automated examination management system at PSR Engineering College.',
        ]);
    }

    /**
     * Update Infrastructure pages
     */
    private function updateInfrastructurePages()
    {
        $this->updatePage('infrastructure', [
            'title' => 'Infrastructure',
            'description' => $this->getInfrastructureContent(),
            'meta_title' => 'Infrastructure - PSR Engineering College',
            'meta_description' => 'World-class infrastructure facilities at PSR Engineering College across 47 acres campus.',
        ]);

        $this->updatePage('library', [
            'title' => 'Library',
            'description' => '<h2>Central Library</h2><p>The Central Library at PSR Engineering College is our greatest resource, housing an extensive collection of books, journals, patents, and digital resources to support learning and research.</p><h3>Features:</h3><ul><li>Huge volume of books and journals</li><li>Patent database access</li><li>Digital library resources</li><li>E-journals and online databases</li><li>Reading halls and study spaces</li><li>Department libraries for specialized resources</li></ul>',
            'meta_title' => 'Library - PSR Engineering College',
            'meta_description' => 'World-class central library with extensive collection at PSR Engineering College.',
        ]);

        $this->updatePage('transport', [
            'title' => 'Transport',
            'description' => '<h2>Transport Facility</h2><p>PSR Engineering College provides comfortable and safe transportation services for students and faculty members. The college operates around 26 college buses covering extensive routes.</p><p><strong>Contact:</strong> 98949 12162</p>',
            'meta_title' => 'Transport Facility - PSR Engineering College',
            'meta_description' => 'Transport facilities with 26 buses at PSR Engineering College, Sivakasi.',
        ]);

        $this->updatePage('cafeteria', [
            'title' => 'Cafeteria',
            'description' => '<h2>Cafeteria</h2><p>The College has a spacious and airy canteen providing a variety of wholesome, tasty snacks and food at reasonable prices. The cafeteria maintains high standards of hygiene and offers nutritious meals to students and staff.</p>',
            'meta_title' => 'Cafeteria - PSR Engineering College',
            'meta_description' => 'Spacious cafeteria with hygienic food facilities at PSR Engineering College.',
        ]);

        $this->updatePage('health-club', [
            'title' => 'Health Club',
            'description' => '<h2>Health Club</h2><p>An experienced medical practitioner in the cadre of Civil Surgeon visits the Institute periodically and looks after the medical needs of the students. Well-equipped health club and fitness facilities are available for physical wellness.</p>',
            'meta_title' => 'Health Club - PSR Engineering College',
            'meta_description' => 'Health club and fitness facilities at PSR Engineering College.',
        ]);

        $this->updatePage('medical-centre', [
            'title' => 'Medical Centre',
            'description' => '<h2>Medical Centre</h2><p>On-campus medical facility with qualified medical professionals for student healthcare. Regular health check-ups and medical assistance are provided to ensure student well-being.</p>',
            'meta_title' => 'Medical Centre - PSR Engineering College',
            'meta_description' => 'On-campus medical centre at PSR Engineering College for student healthcare.',
        ]);

        $this->updatePage('hostel', [
            'title' => 'Hostel',
            'description' => '<h2>Hostel Accommodation</h2><p>PSR Engineering College provides comfortable and secure hostel facilities for outstation students with all necessary amenities for a conducive living and learning environment.</p>',
            'meta_title' => 'Hostel - PSR Engineering College',
            'meta_description' => 'Hostel facilities for students at PSR Engineering College, Sivakasi.',
        ]);

        // Other infrastructure items
        $infrastructureItems = [
            ['slug' => 'bank', 'title' => 'Bank', 'content' => '<h2>Banking Facility</h2><p>On-campus banking facility for the convenience of students and staff.</p>'],
            ['slug' => 'internet-centre', 'title' => 'Internet Centre', 'content' => '<h2>Internet Centre</h2><p>High-speed internet connectivity and modern computer facilities with unlimited net access for students.</p>'],
            ['slug' => 'store-facility', 'title' => 'Store Facility', 'content' => '<h2>Store and Supplies</h2><p>Campus store providing stationery and essential supplies for students.</p>'],
            ['slug' => 'wifi-connectivity', 'title' => 'Wifi Connectivity', 'content' => '<h2>WiFi Campus</h2><p>Campus-wide WiFi connectivity ensuring seamless internet access across the 47 acres campus.</p>'],
            ['slug' => 'indoor-stadium', 'title' => 'Indoor Stadium', 'content' => '<h2>Indoor Stadium</h2><p>Spacious indoor stadium for sports and recreational activities.</p>'],
        ];

        foreach ($infrastructureItems as $item) {
            $this->updatePage($item['slug'], [
                'title' => $item['title'],
                'description' => $item['content'],
                'meta_title' => $item['title'] . ' - PSR Engineering College',
                'meta_description' => $item['title'] . ' facilities at PSR Engineering College.',
            ]);
        }
    }

    /**
     * Update single major pages
     */
    private function updateSinglePages()
    {
        // Admission
        $this->updatePage('admission', [
            'title' => 'Admission',
            'description' => $this->getAdmissionContent(),
            'meta_title' => 'Admission 2025-26 - PSR Engineering College',
            'meta_description' => 'Admissions open for 2025-26 at PSR Engineering College - UG, PG programs. AICTE approved, Anna University affiliated.',
        ]);

        // Placement
        $this->updatePage('placement', [
            'title' => 'Placement',
            'description' => $this->getPlacementContent(),
            'meta_title' => 'Placement - PSR Engineering College',
            'meta_description' => '800+ placement offers with highest package of 27 LPA at PSR Engineering College.',
        ]);

        // IQAC
        $this->updatePage('iqac', [
            'title' => 'IQAC',
            'description' => '<h2>Internal Quality Assurance Cell (IQAC)</h2><p>The IQAC at PSR Engineering College ensures continuous quality improvement in all academic and administrative activities. It works towards maintaining and enhancing the quality culture of the institution.</p>',
            'meta_title' => 'IQAC - PSR Engineering College',
            'meta_description' => 'Internal Quality Assurance Cell at PSR Engineering College for quality education.',
        ]);
    }

    /**
     * Update Extra Curricular pages
     */
    private function updateExtraCurricularPages()
    {
        $this->updatePage('extra-curricular', [
            'title' => 'Extra Curricular',
            'description' => '<h2>Extra-Curricular Activities</h2><p>PSR Engineering College believes in holistic development through various extra-curricular activities. Students actively participate in cultural events, sports, technical clubs, and social service activities.</p>',
            'meta_title' => 'Extra Curricular Activities - PSR Engineering College',
            'meta_description' => 'Extra-curricular activities and student clubs at PSR Engineering College.',
        ]);

        $extraCurricularItems = [
            ['slug' => 'nss', 'title' => 'NSS', 'content' => '<h2>National Service Scheme (NSS)</h2><p>The NSS unit at PSR Engineering College encourages students to participate in community service and social welfare activities, developing social responsibility and leadership skills.</p>'],
            ['slug' => 'ncc', 'title' => 'NCC', 'content' => '<h2>National Cadet Corps (NCC)</h2><p>NCC training at PSR Engineering College develops discipline, leadership, and patriotism among students.</p>'],
            ['slug' => 'yrc', 'title' => 'YRC', 'content' => '<h2>Youth Red Cross (YRC)</h2><p>YRC activities promote humanitarian service and health awareness among students at PSR.</p>'],
            ['slug' => 'rrc', 'title' => 'RRC', 'content' => '<h2>Red Ribbon Club (RRC)</h2><p>RRC at PSR Engineering College works towards creating awareness about health issues and promoting healthy lifestyles.</p>'],
        ];

        foreach ($extraCurricularItems as $item) {
            $this->updatePage($item['slug'], [
                'title' => $item['title'],
                'description' => $item['content'],
                'meta_title' => $item['title'] . ' - PSR Engineering College',
                'meta_description' => $item['title'] . ' activities at PSR Engineering College.',
            ]);
        }
    }

    /**
     * Update Other pages
     */
    private function updateOtherPages()
    {
        $this->updatePage('nisp', [
            'title' => 'NISP',
            'description' => '<h2>NISP</h2><p>National Innovation and Start-up Policy initiatives at PSR Engineering College.</p>',
            'meta_title' => 'NISP - PSR Engineering College',
            'meta_description' => 'NISP initiatives at PSR Engineering College.',
        ]);

        $this->updatePage('nirf', [
            'title' => 'NIRF',
            'description' => '<h2>NIRF</h2><p>National Institutional Ranking Framework (NIRF) data and rankings for PSR Engineering College.</p>',
            'meta_title' => 'NIRF - PSR Engineering College',
            'meta_description' => 'NIRF rankings and data for PSR Engineering College.',
        ]);

        $this->updatePage('aishe', [
            'title' => 'AISHE',
            'description' => '<h2>AISHE</h2><p>All India Survey on Higher Education (AISHE) data for PSR Engineering College.</p>',
            'meta_title' => 'AISHE - PSR Engineering College',
            'meta_description' => 'AISHE data for PSR Engineering College.',
        ]);

        // Cells and Committees
        $this->updatePage('anti-ragging', [
            'title' => 'Anti Ragging',
            'description' => '<h2>Anti-Ragging Committee</h2><p>PSR Engineering College has zero-tolerance policy towards ragging. The Anti-Ragging Committee ensures a safe and harassment-free campus environment for all students.</p>',
            'meta_title' => 'Anti Ragging - PSR Engineering College',
            'meta_description' => 'Anti-ragging policy and committee at PSR Engineering College.',
        ]);

        $this->updatePage('women-empowerment-cell', [
            'title' => 'Women Empowerment Cell',
            'description' => '<h2>Women Empowerment Cell</h2><p>The Women Empowerment Cell at PSR Engineering College works towards creating a safe and supportive environment for women students and staff, promoting gender equality and women\'s rights.</p>',
            'meta_title' => 'Women Empowerment Cell - PSR Engineering College',
            'meta_description' => 'Women empowerment initiatives at PSR Engineering College.',
        ]);

        $this->updatePage('grievance-redressal-system', [
            'title' => 'Grievance Redressal System',
            'description' => '<h2>Grievance Redressal System</h2><p>PSR Engineering College maintains an effective grievance redressal mechanism to address student and staff concerns promptly and fairly.</p>',
            'meta_title' => 'Grievance Redressal - PSR Engineering College',
            'meta_description' => 'Grievance redressal system at PSR Engineering College.',
        ]);

        $this->updatePage('careers', [
            'title' => 'Careers',
            'description' => '<h2>Career Opportunities</h2><p>PSR Engineering College invites applications from qualified and experienced candidates for various teaching and non-teaching positions.</p>',
            'meta_title' => 'Careers - PSR Engineering College',
            'meta_description' => 'Job opportunities and career openings at PSR Engineering College.',
        ]);
    }

    // Content generation methods
    
    private function getTrustContent()
    {
        return '<div class="page-content">
            <h2>About PSR Trust</h2>
            <h3>P.S.R. Engineering College Trust</h3>
            <p>P.S.R. Engineering College Trust is a philanthropic institution founded by the illustrious sons of <strong>P.S.Ramasamy Naidu</strong>. The trust was established with the noble mission to promote engineering education in the backward area of Virudhunagar District.</p>
            
            <p>The college was established in the year <strong>1998</strong> with a vision to contribute to society through excellence in technical education with societal values and thus become a valuable resource for industry and humanity.</p>
            
            <h3>PS Ramasamy Telugu Minority Educational and Charitable Trust</h3>
            <p>The PS Ramasamy Telugu Minority Educational and Charitable Trust was established in 1998 with an objective of imparting quality education mainly to the rural people of the southern part of Tamil Nadu.</p>
            
            <h3>Vision</h3>
            <p>To contribute to society through excellence in technical education with societal values and thus a valuable resource for industry and humanity.</p>
            
            <h3>Core Values</h3>
            <ul>
                <li>Quality</li>
                <li>Teamwork</li>
                <li>Transparency & Integrity</li>
                <li>Societal Services</li>
                <li>Woman Empowerment</li>
            </ul>
        </div>';
    }

    private function getCorrespondentContent()
    {
        return '<div class="page-content">
            <h2>Correspondent</h2>
            <h3>Message from the Correspondent</h3>
            <p>Welcome to P.S.R. Engineering College, an Autonomous Institution approved by AICTE and affiliated to Anna University, Chennai.</p>
            
            <p>PSR Engineering College has been at the forefront of technical education since 1998, nurturing young minds to become skilled professionals and responsible citizens. Our institution is committed to scripting a unique chapter of excellent education and research in vital fields like Engineering, IT, and Management.</p>
            
            <p>The college offers Engineering Education to men and women at UG, PG, and Ph.D levels, focusing on total personality development.</p>
            
            <h3>Contact Information</h3>
            <p><strong>Phone:</strong> 80125 31321 / 80125 31323 / 80125 31325<br>
            <strong>Email:</strong> contact@psr.edu.in</p>
        </div>';
    }

    private function getPrincipalContent()
    {
        return '<div class="page-content">
            <h2>Principal</h2>
            <h3>Principal\'s Message</h3>
            <p>It is my privilege to lead PSR Engineering College, an esteemed Autonomous Institution accredited by NAAC with A+ Grade and NBA.</p>
            
            <p>At P.S.R. Engineering College, we are committed to academic excellence and holistic development of our students. Our institution has achieved remarkable milestones including:</p>
            
            <ul>
                <li><strong>Autonomous Status</strong> from Anna University</li>
                <li><strong>NAAC Accreditation with A+ Grade</strong></li>
                <li><strong>NBA Accreditation</strong> for multiple programs</li>
                <li><strong>ISO 9001:2015 Certification</strong></li>
                <li><strong>275+ Patents filed</strong> in 2024-25</li>
                <li><strong>Anna University Authorized Research Center</strong> for 7 Ph.D Programmes</li>
                <li><strong>Recognized as Scientific & Industrial Research Organization</strong></li>
            </ul>
            
            <p>Our campus spreads across 47 acres with world-class infrastructure and facilities. We ensure that every student receives quality education with strong industry connections and excellent placement opportunities.</p>
        </div>';
    }

    private function getMilestonesContent()
    {
        return '<div class="page-content">
            <h2>Milestones</h2>
            <p>PSR Engineering College has achieved numerous milestones in its journey towards excellence in technical education:</p>
            
            <h3>Recent Achievements</h3>
            <ul>
                <li><strong>2024-25:</strong> 275+ Patents filed</li>
                <li><strong>2024:</strong> Received Patent Award from IPR (Govt of India) and Anna University</li>
                <li><strong>Highest Salary Package:</strong> 27 Lakhs per Annum</li>
                <li><strong>800+ Placement Offers</strong> till date</li>
                <li><strong>NAAC Accreditation:</strong> A+ Grade</li>
                <li><strong>NBA Accreditation:</strong> Multiple programs</li>
                <li><strong>Autonomous Status:</strong> Granted by Anna University</li>
                <li><strong>ISO 9001:2015 Certification</strong></li>
                <li><strong>Anna University Authorized Research Center</strong> for 7 Ph.D Programmes</li>
                <li><strong>Recognized as Scientific & Industrial Research Organization</strong></li>
                <li><strong>47 Acres Eco-Friendly Campus</strong></li>
                <li><strong>50,000+ Alumni</strong> worldwide</li>
            </ul>
            
            <h3>Historical Milestones</h3>
            <ul>
                <li><strong>1998:</strong> College established</li>
                <li><strong>Notable Visit:</strong> Bharat Ratna Dr. APJ Abdul Kalam interacted with PSR students</li>
                <li><strong>Silver Jubilee Year Celebration</strong></li>
                <li><strong>22nd Graduation Day</strong> conducted with distinguished guests</li>
            </ul>
        </div>';
    }

    private function getInfrastructureContent()
    {
        return '<div class="page-content">
            <h2>World-Class Infrastructure</h2>
            <p>PSR Engineering College boasts state-of-the-art infrastructure across its <strong>47-acre eco-friendly campus</strong> to support academic and extracurricular activities.</p>
            
            <h3>Campus Facilities</h3>
            <ul>
                <li><strong>World-Class Library</strong> with huge volume of books, journals, and patents</li>
                <li><strong>Modern Labs</strong> with unlimited net facilities</li>
                <li><strong>Excellent Core Engineering Lab Facilities</strong></li>
                <li><strong>26 College Buses</strong> for transportation</li>
                <li><strong>Spacious Cafeteria</strong> with hygienic food</li>
                <li><strong>Health Club</strong> and medical facilities</li>
                <li><strong>Indoor Stadium</strong> for sports</li>
                <li><strong>Hostel Accommodation</strong> for outstation students</li>
                <li><strong>Campus-wide WiFi Connectivity</strong></li>
                <li><strong>Banking Facility</strong></li>
                <li><strong>Internet Centre</strong></li>
                <li><strong>Store Facility</strong></li>
            </ul>
            
            <h3>Learning Environment</h3>
            <p>The infrastructure supports our mission to provide sustained care and facilities for quality learning experience. Regular corporate training sessions and vibrant campus life ensure holistic development of students.</p>
        </div>';
    }

    private function getAdmissionContent()
    {
        return '<div class="page-content">
            <h2>Admissions Open 2025-2026</h2>
            <p>PSR Engineering College, an <strong>Autonomous Institution</strong> approved by AICTE and affiliated to Anna University, Chennai, invites applications for admission to various UG, PG, and Ph.D programs.</p>
            
            <h3>Why Choose PSR?</h3>
            <ul>
                <li><strong>Autonomous Institution</strong> with academic flexibility</li>
                <li><strong>NAAC Accredited with A+ Grade</strong></li>
                <li><strong>NBA Accredited Programs</strong></li>
                <li><strong>ISO 9001:2015 Certified Organization</strong></li>
                <li><strong>47 Acres Eco-Friendly Campus</strong></li>
                <li><strong>800+ Placement Offers</strong> with highest package of 27 LPA</li>
                <li><strong>World-Class Infrastructure</strong></li>
                <li><strong>Experienced Faculty</strong></li>
                <li><strong>Anna University Authorized Research Center</strong></li>
            </ul>
            
            <h3>Programs Offered</h3>
            
            <h4>UG Programs (BE/B.Tech)</h4>
            <ul>
                <li>Artificial Intelligence & Data Science (AI & DS)</li>
                <li>Bio Medical Engineering (BME)</li>
                <li>Biotechnology (BT)</li>
                <li>Civil Engineering (CIVIL)</li>
                <li>Computer Science and Engineering (CSE)</li>
                <li>Electrical and Electronics Engineering (EEE)</li>
                <li>Electronics & Communication Engineering (ECE)</li>
                <li>Information Technology (IT)</li>
                <li>Mechanical Engineering (MECH)</li>
            </ul>
            
            <h4>PG Programs (ME/MBA)</h4>
            <ul>
                <li>Applied Electronics (AE)</li>
                <li>Computer Science and Engineering (CSE)</li>
                <li>Engineering Design (ED)</li>
                <li>Master of Business Administration (MBA)</li>
                <li>Power Electronics and Drives (PED)</li>
                <li>Structural Engineering (SE)</li>
            </ul>
            
            <h4>Ph.D Programs</h4>
            <ul>
                <li>Computer Science & Engineering (CSE)</li>
                <li>Electronics & Communication Engineering (ECE)</li>
                <li>Electrical and Electronics Engineering (EEE)</li>
                <li>Mechanical Engineering (MECH)</li>
                <li>Civil Engineering (CIVIL)</li>
                <li>Physics</li>
            </ul>
            
            <h3>Contact for Admission</h3>
            <p><strong>Phone:</strong> 80125 31321 / 80125 31323 / 80125 31325<br>
            <strong>Email:</strong> contact@psr.edu.in<br>
            <strong>Address:</strong> P.S.R. Engineering College, Sevalpatti, Sivakasi - 626140, Virudhunagar District, Tamil Nadu, India</p>
            
            <p><a href="#" class="btn btn-primary">Apply Now</a></p>
        </div>';
    }

    private function getPlacementContent()
    {
        return '<div class="page-content">
            <h2>Placement and Training</h2>
            <p>The Training and Placement Cell at PSR Engineering College works diligently to provide excellent career opportunities to students.</p>
            
            <h3>Placement Highlights</h3>
            <ul>
                <li><strong>800+ Offers</strong> till date</li>
                <li><strong>Highest Salary Package:</strong> 27 Lakhs per Annum</li>
                <li><strong>Regular Corporate Training</strong> sessions</li>
                <li><strong>Top Companies</strong> visit for campus recruitment</li>
                <li><strong>100% Placement Assistance</strong></li>
            </ul>
            
            <h3>Recent Placement Drives</h3>
            <ul>
                <li><strong>Placement Day 2024-25:</strong> Chief Guest Ms Radhika Ravi, India Head Campus Hiring, Premium Engineering and WILP hiring, Wipro</li>
                <li><strong>Placement Day 2023-24:</strong> Successfully conducted with multiple companies</li>
                <li><strong>Placement Day 2022-23:</strong> Record placements achieved</li>
            </ul>
            
            <h3>Training Programs</h3>
            <p>We provide comprehensive training to our students including:</p>
            <ul>
                <li>Technical Skills Development</li>
                <li>Soft Skills Training</li>
                <li>Aptitude Training</li>
                <li>Interview Preparation</li>
                <li>Industry-relevant Certifications</li>
                <li>Internship Opportunities</li>
            </ul>
            
            <h3>Our Mission</h3>
            <p>To expertise our students in order to settle in the recent industrial environment and recruit them in Multi-National Companies. We ensure that every student is industry-ready and gets placed in reputed organizations.</p>
            
            <h3>Student Testimonials</h3>
            <p><em>"I am very thankful to PSR Engineering College for providing me with the guidelines and opportunity to achieve my dream job. You are never too old to set another goal when you have a learner-centric environment with your faculty."</em> - Navani Priya, CSE 2023 Batch</p>
        </div>';
    }

    /**
     * Helper method to update a page
     */
    private function updatePage($slug, $data)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page) {
            $page->update($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert to placeholder content if needed
        // Not implemented as content should be preserved
    }
};

