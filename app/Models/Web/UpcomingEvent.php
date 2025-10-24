<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class UpcomingEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'title',
        'description',
        'event_date',
        'event_time',
        'venue',
        'attach',
        'link',
        'status',
        'display_order',
    ];

    protected $casts = [
        'event_date' => 'date',
        'status' => 'boolean',
    ];

    /**
     * Get the department that owns the event
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Scope for home page events (department_id is null)
     */
    public function scopeHomePage($query)
    {
        return $query->whereNull('department_id');
    }

    /**
     * Scope for department-specific events
     */
    public function scopeForDepartment($query, $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }

    /**
     * Scope for active events
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope for ordering
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('event_date', 'desc')->orderBy('display_order', 'asc');
    }
}

