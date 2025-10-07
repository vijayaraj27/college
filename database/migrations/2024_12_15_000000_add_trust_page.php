<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
        // Insert Trust page if it doesn't exist
        $existingPage = Page::where('id', 3)->first();
        
        if (!$existingPage) {
            Page::create([
                'id' => 3,
                'language_id' => 1,
                'title' => 'Trust',
                'slug' => 'trust',
                'description' => '<h2>About PSR Trust</h2>
<p>P.S.R. Engineering College Trust is a philanthropic institution founded by the illustrious sons of P.S.Ramasamy Naidu. Established with the noble mission to promote quality education in the backward area of Virudhunagar District, the trust has been committed to providing excellent education and research opportunities.</p>

<h3>Our Vision</h3>
<p>To be a leading educational trust that transforms lives through quality education and creates responsible citizens for the nation.</p>

<h3>Our Mission</h3>
<p>To provide world-class education and research opportunities that nurture innovation, creativity, and excellence among students while contributing to the socio-economic development of the region.</p>

<h3>Trust Objectives</h3>
<ul>
    <li>To establish and maintain educational institutions of excellence</li>
    <li>To promote research and development in engineering and technology</li>
    <li>To provide scholarships and financial assistance to deserving students</li>
    <li>To contribute to the community through various social initiatives</li>
    <li>To maintain the highest standards of academic integrity and ethics</li>
</ul>

<h3>Trust Members</h3>
<p>Our trust is governed by a dedicated board of trustees who bring decades of experience in education, industry, and social service. They are committed to upholding the values and vision of our founder.</p>

<h3>Contact Information</h3>
<p>For more information about PSR Trust and its initiatives, please contact us through the college administration.</p>',
                'meta_title' => 'PSR Trust - P.S.R. Engineering College',
                'meta_description' => 'Learn about PSR Trust, its mission, vision, and commitment to quality education in Virudhunagar District.',
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
        Page::where('id', 3)->delete();
    }
};
