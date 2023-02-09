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
            $category = Category::where('name', $filters['category'])->first();
            if ($category) {
                $query->where('category_id', '=', $category->id);
            }
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
