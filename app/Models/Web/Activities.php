<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

 protected $table = 'department_activities';
   
    public $timestamps = true;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $fillable = [
        'departmentId', 
        'designationId', 
        'title', 
        'imageFile', 
        'description', 
        'departmentActivity',    
        'studentParticipation',  
        'interInstituteEventsWinningPrize',  
        'industrialVisit',        
        'createdAt', 
        'updatedAt'
    ];

    
 
}