<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Web\Page;
use App\Models\Language;
use Illuminate\Support\Str;

class UpdateIQACPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iqac:update-pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update IQAC main page and create sub-pages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $languageId = Language::version()->id;
        
        // Update main IQAC page (ID 66)
        $this->info("Updating IQAC main page (ID 66)...");
        $mainPage = Page::find(66);
        
        if (!$mainPage) {
            $this->error("Page with ID 66 not found!");
            return Command::FAILURE;
        }
        
        // IQAC Main Content
        $mainContent = '<h2>Internal Quality Assurance Cell (IQAC)</h2>

<h3>VISION</h3>
<p>To ensure quality culture as the prime concern for PSREC through institutionalizing and internalizing all the initiatives taken with internal and external support.</p>

<h3>OBJECTIVE</h3>
<ul>
    <li>To ensure quality culture as the prime concern for PSREC through institutionalizing and internalizing all the initiatives taken with internal and external support.</li>
    <li>To promote measures for institutional functioning towards quality enhancement through internalization of quality culture and institutionalization of best practices.</li>
</ul>

<h3>STRATEGIES</h3>
<p><strong>IQAC shall evolve mechanisms and procedures for:</strong></p>
<ul>
    <li>Ensuring timely, efficient and progressive performance of academic & administrative tasks.</li>
    <li>Relevant and quality academic/ research programmes.</li>
    <li>Equitable access to and affordability of academic programmes for various sections of society.</li>
    <li>Optimization and integration of modern methods of teaching and learning.</li>
    <li>The credibility of assessment and evaluation process.</li>
    <li>Ensuring the adequacy, maintenance and proper allocation of support structure and services.</li>
    <li>Sharing of research findings and networking with other institutions in India and abroad.</li>
</ul>

<h3>FUNCTIONS</h3>
<ul>
    <li>Parameters for various academic and administrative activities of the institution.</li>
    <li>Facilitating the creation of a learner-centric environment conducive to quality education and faculty maturation to adopt the required knowledge and technology for participatory teaching and learning process.</li>
    <li>Collection and analysis of feedback from all stakeholders on quality-related institutional processes.</li>
    <li>Dissemination of information on various quality parameters to all stakeholders.</li>
    <li>Organization of inter and intra institutional workshops, seminars on quality related themes and promotion of quality circles.</li>
    <li>Documentation of the various programmes / activities leading to quality improvement.</li>
    <li>Acting as a nodal agency of the Institution for coordinating quality-related activities, including adoption and dissemination of best practices.</li>
    <li>Periodical conduct of Academic and Administrative Audit and its follow-up.</li>
    <li>Preparation and submission of the Annual Quality Assurance Report (AQAR) as per guidelines and parameters of NAAC.</li>
</ul>

<h3>CONTACT</h3>
<p><strong>Dr. P. Pitchipoo M.E., Ph.D</strong><br>
Coordinator – IQAC<br>
Professor / Mechanical Engineering<br>
P.S.R Engineering College<br>
Sevalpatti, Sivakasi – 626140<br>
Tamil Nadu, India<br>
Phone: 9841310110<br>
Email: <strong>iqac@psr.edu.in</strong></p>';

        $mainPage->title = 'IQAC';
        $mainPage->slug = 'iqac';
        $mainPage->description = $mainContent;
        $mainPage->meta_title = 'IQAC - Internal Quality Assurance Cell - P.S.R. Engineering College';
        $mainPage->meta_description = 'Internal Quality Assurance Cell (IQAC) at P.S.R. Engineering College ensures quality culture and institutional excellence through various quality enhancement initiatives.';
        $mainPage->save();
        
        $this->info("✓ Main IQAC page updated!");
        
        // Create sub-pages
        $subPages = [
            [
                'title' => 'IQAC Introduction',
                'slug' => 'iqac-introduction',
                'content' => '<h2>Introduction to IQAC</h2>
<p>The Internal Quality Assurance Cell (IQAC) at P.S.R. Engineering College was established to ensure quality culture as the prime concern for the institution through institutionalizing and internalizing all the initiatives taken with internal and external support.</p>

<p>The IQAC is responsible for developing a system for conscious, consistent and catalytic improvement in the overall performance of the institution. It works towards promoting quality enhancement through internalization of quality culture and institutionalization of best practices.</p>

<p>The cell ensures that quality is maintained in all academic and administrative activities of the institution, fostering a learner-centric environment conducive to quality education and faculty development.</p>',
                'meta_title' => 'IQAC Introduction - P.S.R. Engineering College',
                'meta_description' => 'Introduction to Internal Quality Assurance Cell (IQAC) at P.S.R. Engineering College.'
            ],
            [
                'title' => 'IQAC AQAR Reports',
                'slug' => 'iqac-aqar-reports',
                'content' => '<h2>Annual Quality Assurance Report (AQAR)</h2>
<p>The Annual Quality Assurance Report (AQAR) is prepared and submitted annually as per the guidelines and parameters of NAAC. The AQAR documents the various quality enhancement initiatives and activities undertaken by the institution.</p>

<h3>Available AQAR Reports:</h3>
<ul>
    <li>AQAR 2022 - 23</li>
    <li>AQAR 2021 - 22</li>
    <li>AQAR 2020 - 21</li>
    <li>AQAR 2019 - 20</li>
    <li>AQAR 2018 - 19</li>
    <li>AQAR 2017 - 18</li>
    <li>AQAR 2016 - 17</li>
    <li>AQAR 2015 - 16</li>
    <li>AQAR 2014 - 15</li>
</ul>

<p>These reports provide comprehensive documentation of the quality enhancement measures, academic and administrative improvements, and institutional achievements for each academic year.</p>',
                'meta_title' => 'AQAR Reports - IQAC - P.S.R. Engineering College',
                'meta_description' => 'Annual Quality Assurance Reports (AQAR) submitted by IQAC at P.S.R. Engineering College.'
            ],
            [
                'title' => 'IQAC Minutes / Action Taken',
                'slug' => 'iqac-minutes-action-taken',
                'content' => '<h2>IQAC Minutes of Meeting / Action Taken</h2>
<p>The IQAC conducts regular meetings to discuss quality-related issues, review progress, and plan quality enhancement initiatives. The minutes of these meetings and action taken reports are documented for transparency and accountability.</p>

<h3>Available Meeting Minutes:</h3>
<ul>
    <li><a href="https://psr.edu.in/iqac/TWENTY-TWO%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">TWENTY-TWO MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/TWENTY-ONE%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">TWENTY-ONE MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/TWENTIETH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">TWENTIETH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/NINETEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">NINETEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/EIGHTEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">EIGHTEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/SEVENTEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">SEVENTEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/SIXTEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">SIXTEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/FIFTEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">FIFTEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/FOURTEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">FOURTEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/THIRTEENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">THIRTEENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/TWELFTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">TWELFTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/ELEVENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">ELEVENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/TENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">TENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/NINETH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">NINETH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/EIGHTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">EIGHTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/SEVENTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">SEVENTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/SIXTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">SIXTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/FIFTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">FIFTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/FOURTH%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">FOURTH MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/THIRD%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">THIRD MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/SECOND%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">SECOND MEETING <i class="fal fa-external-link"></i></a></li>
    <li><a href="https://psr.edu.in/iqac/FIRST%20MEETING" target="_blank" style="color: #f5874f; text-decoration: none;">FIRST MEETING <i class="fal fa-external-link"></i></a></li>
</ul>

<p>These documents provide detailed records of discussions, decisions, and action items from IQAC meetings, ensuring systematic follow-up and implementation of quality enhancement measures.</p>',
                'meta_title' => 'IQAC Minutes / Action Taken - P.S.R. Engineering College',
                'meta_description' => 'IQAC meeting minutes and action taken reports at P.S.R. Engineering College.'
            ],
            [
                'title' => 'IQAC Members',
                'slug' => 'iqac-members',
                'content' => '<h2>IQAC Members</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sl. No.</th>
            <th>Name of the Member</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1.</td>
            <td>Dr. J. S. Senthil Kumaar Principal</td>
            <td>Chairman</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Mr. R. Solaisamy, Managing Trustee</td>
            <td>Member – Management</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Dr. D. Jebakani, IQAC Coordinator Professor/ Mechanical, Government College of Engineering, Tirunelveli</td>
            <td>Academic Expert</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Mr.R.Rajesh Technical Project Manager, DELL International Services Private Limited, Bangalore.</td>
            <td>Industry & Alumni Member</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Mr. N.R. Balamurugan Managing Director, MI Measuring Instruments, Madurai.</td>
            <td>Industry Member</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Dr.P.Marichamy Dean</td>
            <td>Co-chair</td>
        </tr>
        <tr>
            <td>7.</td>
            <td>Dr. P. Pitchipoo, Professor / Mechanical</td>
            <td>IQAC Coordinator</td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Dr.M.Shahul Hameed, Dean (Research) & Prof & Head /(Civil)</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Dr. A. Ramathilagam, Prof & Head / CSE</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>10.</td>
            <td>Dr. K. Valarmathi , Prof & Head / ECE</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>11.</td>
            <td>Dr. R. Muniraj Prof & Head / EEE</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Dr. H. Kanagasabapathy, Prof & Head /MECH</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>13.</td>
            <td>Dr. Dr. S.Sabarunisha Begum, Prof & Head /BT</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>14.</td>
            <td>Dr. T. Rajkumar Professor and Head / MBA</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>15.</td>
            <td>Prof. D. Sriram Prof & Head / H&S</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>16.</td>
            <td>Dr. R. Rajeswari Controller of Examinations</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>17.</td>
            <td>Dr. P. Kannan Professor / MBA</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>18.</td>
            <td>Dr. R. Ramani, Secretary, PSR Alumni Association</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>19.</td>
            <td>Mr. V. Kannan Office Superintendent</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>20.</td>
            <td>Mr. K.S.V. Balasubramanian Finance Officer</td>
            <td>Member</td>
        </tr>
        <tr>
            <td>21.</td>
            <td>Mr. T. Kaliappan I / ME (ED)</td>
            <td>Student Member</td>
        </tr>
        <tr>
            <td>22.</td>
            <td>Ms. S. Rukkumani IV/ EEE</td>
            <td>Student Member</td>
        </tr>
    </tbody>
</table>',
                'meta_title' => 'IQAC Members - P.S.R. Engineering College',
                'meta_description' => 'List of IQAC members at P.S.R. Engineering College including Chairman, Coordinator, and all committee members.'
            ],
            [
                'title' => 'IQAC Best Practices',
                'slug' => 'iqac-best-practices',
                'content' => '<h2>Best Practices</h2>
<p>The IQAC at P.S.R. Engineering College identifies, documents, and promotes best practices that contribute to quality enhancement in academic and administrative processes.</p>

<p>Best practices are innovative approaches, methods, or processes that have proven to be effective in improving institutional performance and quality. These practices are shared with other institutions and continuously refined based on feedback and outcomes.</p>

<p>The IQAC regularly reviews and updates the best practices to ensure they align with the institution\'s quality objectives and contribute to continuous improvement.</p>',
                'meta_title' => 'IQAC Best Practices - P.S.R. Engineering College',
                'meta_description' => 'Best practices identified and promoted by IQAC at P.S.R. Engineering College.'
            ],
            [
                'title' => 'IQAC Distinctiveness',
                'slug' => 'iqac-distinctiveness',
                'content' => '<h2>Distinctiveness</h2>
<p>The IQAC documents the unique features and distinctive characteristics of P.S.R. Engineering College that set it apart from other institutions.</p>

<p>These distinctive features may include innovative teaching methods, unique research initiatives, special programs, community engagement activities, or any other aspect that makes the institution stand out in terms of quality and excellence.</p>

<p>The distinctiveness of the institution is continuously evaluated and enhanced through quality assurance measures and strategic planning.</p>',
                'meta_title' => 'IQAC Distinctiveness - P.S.R. Engineering College',
                'meta_description' => 'Distinctive features and characteristics of P.S.R. Engineering College documented by IQAC.'
            ],
            [
                'title' => 'IQAC Student Satisfaction Survey',
                'slug' => 'iqac-student-satisfaction-survey',
                'content' => '<h2>Student Satisfaction Survey</h2>
<p>The IQAC conducts regular Student Satisfaction Surveys (SSS) to gather feedback from students on various aspects of the institution including teaching quality, infrastructure, facilities, support services, and overall satisfaction.</p>

<h3>Available Survey Reports:</h3>
<ul>
    <li>SSS 2020 - 21</li>
    <li>SSS 2019 - 20</li>
    <li>SSS 2018 - 19</li>
</ul>

<p>These surveys help the institution identify areas for improvement, understand student needs and expectations, and make data-driven decisions to enhance the quality of education and services provided.</p>

<p>The feedback collected through these surveys is analyzed and used to implement necessary improvements in academic and administrative processes.</p>',
                'meta_title' => 'Student Satisfaction Survey - IQAC - P.S.R. Engineering College',
                'meta_description' => 'Student Satisfaction Survey reports conducted by IQAC at P.S.R. Engineering College.'
            ]
        ];
        
        $this->info("Creating IQAC sub-pages...");
        
        foreach ($subPages as $subPage) {
            // Check if page already exists
            $existingPage = Page::where('slug', $subPage['slug'])->first();
            
            if ($existingPage) {
                // Update existing page
                $existingPage->title = $subPage['title'];
                $existingPage->description = $subPage['content'];
                $existingPage->meta_title = $subPage['meta_title'];
                $existingPage->meta_description = $subPage['meta_description'];
                $existingPage->save();
                $this->info("✓ Updated: {$subPage['title']}");
            } else {
                // Create new page
                Page::create([
                    'language_id' => $languageId,
                    'title' => $subPage['title'],
                    'slug' => $subPage['slug'],
                    'description' => $subPage['content'],
                    'meta_title' => $subPage['meta_title'],
                    'meta_description' => $subPage['meta_description'],
                    'status' => 1,
                ]);
                $this->info("✓ Created: {$subPage['title']}");
            }
        }
        
        $this->info("\n✅ All IQAC pages updated successfully!");
        $this->info("\nPages created/updated:");
        $this->info("- Main IQAC page: /iqac");
        foreach ($subPages as $subPage) {
            $this->info("- {$subPage['title']}: /{$subPage['slug']}");
        }
        
        return Command::SUCCESS;
    }
}
