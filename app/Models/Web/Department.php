<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description', 'status'
    ];
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
