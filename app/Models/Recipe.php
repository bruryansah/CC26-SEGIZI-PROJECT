<?php
// app/Models/Recipe.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'ingredients', 'instructions',
        'image', 'prep_time', 'cook_time', 'servings',
        'calories', 'protein', 'carbs', 'fat', 'fiber', 'sugar', 'sodium',
        'tags', 'difficulty', 'meal_type', 'user_id', 'is_published',
        'view_count', 'rating_avg', 'rating_count',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'instructions' => 'array',
        'tags' => 'array',
        'calories' => 'decimal:2',
        'protein' => 'decimal:2',
        'carbs' => 'decimal:2',
        'fat' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // Check if current user favorited this
    public function getIsFavoritedAttribute()
    {
        if (!Auth::check()) return false;
        return $this->favorites()->where('user_id', Auth::id())->exists();
    }

    // Scope for published
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Scope for filters
    public function scopeFilter($query, array $filters)
    {
        // Search by title/description
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Meal type
        if (!empty($filters['meal_type'])) {
            $query->where('meal_type', $filters['meal_type']);
        }

        // Difficulty
        if (!empty($filters['difficulty'])) {
            $query->where('difficulty', $filters['difficulty']);
        }

        // Tags (vegan, keto, etc)
        if (!empty($filters['tags'])) {
            $tags = is_array($filters['tags']) ? $filters['tags'] : [$filters['tags']];
            foreach ($tags as $tag) {
                $query->whereJsonContains('tags', $tag);
            }
        }

        // Nutrition ranges
        if (!empty($filters['calories_min'])) {
            $query->where('calories', '>=', $filters['calories_min']);
        }
        if (!empty($filters['calories_max'])) {
            $query->where('calories', '<=', $filters['calories_max']);
        }
        if (!empty($filters['protein_min'])) {
            $query->where('protein', '>=', $filters['protein_min']);
        }
        if (!empty($filters['carbs_max'])) {
            $query->where('carbs', '<=', $filters['carbs_max']);
        }
        if (!empty($filters['fat_max'])) {
            $query->where('fat', '<=', $filters['fat_max']);
        }

        // Sort
        $sort = $filters['sort'] ?? 'newest';
        match ($sort) {
            'newest' => $query->latest(),
            'oldest' => $query->oldest(),
            'calories_asc' => $query->orderBy('calories', 'asc'),
            'calories_desc' => $query->orderBy('calories', 'desc'),
            'protein_desc' => $query->orderBy('protein', 'desc'),
            'rating' => $query->orderBy('rating_avg', 'desc'),
            'popular' => $query->orderBy('view_count', 'desc'),
            default => $query->latest(),
        };

        return $query;
    }
}
