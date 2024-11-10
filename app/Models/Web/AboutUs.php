<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

 protected $table = 'department_about_us';
   //protected $table = 'about_us';
    public $timestamps = true;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    // protected $fillable = [
    //     'language_id', 'label', 'title', 'short_desc', 'description', 'features', 'attach', 'video_id', 'button_text', 'mission_title', 'mission_desc', 'mission_icon', 'mission_image', 'vision_title', 'vision_desc', 'vision_icon', 'vision_image', 'status',
    // ];

    protected $fillable = [
        'departmentId', 
        'designationId', 
        'slider', 
        'sectionAbout', 
        'vision', 
        'mission', 
        'coreValue', 
        'departmentSectionImage', 
        'testimonial', 
        'programmeEducationalObjectives', 
        'programmeOutcomes', 
        'programmeSpecificOutcomes', 
        'contact', 
        'createdAt', 
        'updatedAt'
    ];

    // public function language()
    // {
    //     return $this->belongsTo(Language::class, 'language_id');
    // }
}
