<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class NotificationBoard extends Model
{
    use HasFactory;

    protected $table = 'notifications_board';

    protected $fillable = [
        'department_id',
        'title',
        'description',
        'notification_date',
        'attach',
        'link',
        'is_new',
        'status',
        'display_order',
    ];

    protected $casts = [
        'notification_date' => 'date',
        'is_new' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Get the department that owns the notification
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Scope for home page notifications (department_id is null)
     */
    public function scopeHomePage($query)
    {
        return $query->whereNull('department_id');
    }

    /**
     * Scope for department-specific notifications
     */
    public function scopeForDepartment($query, $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }

    /**
     * Scope for active notifications
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
        return $query->orderBy('notification_date', 'desc')->orderBy('display_order', 'asc');
    }
}

