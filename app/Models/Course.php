<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'picture'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            $query->join('categories', 'categories.id', '=', 'courses.category_id')
                ->where('categories.name', request('category'));
        }

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses');
    }
}
