<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'department_research';
   
    public $timestamps = true;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'departmentId', 
        'designationId', 
        'title', 
        'imageFile', 
        'description', 
        'phdHoldersList',   
        'annaUniversityRecognizedSuperviorsNameList',  
        'listOfCandidatesPursuingPhdUnderDepartmentSupervisors',  
        'listOfDepartmentFacultiesPursuingPhd',   
        'phdAwardedUnderDepartmentSupervisor',   
        'supervisor',   
        'funds',   
        'valueAddedGroup',             
        'createdAt', 
        'updatedAt'
    ];
}