<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;

 protected $table = 'department_faculties';
   
    public $timestamps = true;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $fillable = [
        'departmentId', 
        'designationId', 
        'title', 
        'imageFile', 
        'description', 
        'teachingStaff', 
        'nonTeachingStaff', 
        'createdAt', 
        'updatedAt'
    ];

 
}