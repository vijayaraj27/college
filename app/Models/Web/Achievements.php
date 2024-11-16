<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievements extends Model
{
    use HasFactory;

 protected $table = 'department_achievements';
   
    public $timestamps = true;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $fillable = [
        'departmentId', 
        'designationId', 
        'title', 
        'imageFile', 
        'description', 
        'staffAchievements', 
        'studentAchievements', 
        'departmentSectionImage', 
        'studentAchievementsTableFormat', 
        'studentAchievementsAppeciationList', 
        'createdAt', 
        'updatedAt'
    ];

 
}
