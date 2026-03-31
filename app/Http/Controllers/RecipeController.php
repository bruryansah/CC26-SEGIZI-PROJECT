<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only([
            'search', 'meal_type', 'difficulty', 'tags',
            'calories_min', 'calories_max', 'protein_min',
            'carbs_max', 'fat_max', 'sort', 'favorites_only'
        ]);

        $query = Recipe::published()->filter($filters);

        // If favorites only and user logged in
        if (!empty($filters['favorites_only']) && Auth::check()) {
            $query->whereHas('favorites', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }

        $recipes = $query->paginate(12)->withQueryString();

        // Transform for Vue
        $recipes->getCollection()->transform(function ($recipe) {
            return [
                'id' => $recipe->id,
                'title' => $recipe->title,
                'slug' => $recipe->slug,
                'description' => $recipe->description,
                'image' => $recipe->image,
                'calories' => $recipe->calories,
                'protein' => $recipe->protein,
                'carbs' => $recipe->carbs,
                'fat' => $recipe->fat,
                'prep_time' => $recipe->prep_time,
                'cook_time' => $recipe->cook_time,
                'difficulty' => $recipe->difficulty,
                'tags' => $recipe->tags,
                'rating_avg' => $recipe->rating_avg,
                'rating_count' => $recipe->rating_count,
                'is_favorited' => $recipe->is_favorited,
            ];
        });

        // Available filter options
        $filterOptions = [
            'meal_types' => ['breakfast', 'lunch', 'dinner', 'snack'],
            'difficulties' => ['easy', 'medium', 'hard'],
            'common_tags' => ['vegan', 'vegetarian', 'keto', 'high-protein', 'low-carb', 'gluten-free', 'dairy-free', 'quick'],
            'sort_options' => [
                ['value' => 'newest', 'label' => 'Terbaru'],
                ['value' => 'popular', 'label' => 'Paling Populer'],
                ['value' => 'rating', 'label' => 'Rating Tertinggi'],
                ['value' => 'calories_asc', 'label' => 'Kalori: Rendah ke Tinggi'],
                ['value' => 'calories_desc', 'label' => 'Kalori: Tinggi ke Rendah'],
                ['value' => 'protein_desc', 'label' => 'Protein Tertinggi'],
            ],
        ];

        return Inertia::render('Recipes/Index', [
            'recipes' => $recipes,
            'filters' => $filters,
            'filterOptions' => $filterOptions,
        ]);
    }

    public function show(Recipe $recipe)
    {
        if (!$recipe->is_published) {
            abort(404);
        }

        $recipe->increment('view_count');

        return Inertia::render('Recipes/Show', [
            'recipe' => [
                'id' => $recipe->id,
                'title' => $recipe->title,
                'slug' => $recipe->slug,
                'description' => $recipe->description,
                'ingredients' => $recipe->ingredients,
                'instructions' => $recipe->instructions,
                'image' => $recipe->image,
                'prep_time' => $recipe->prep_time,
                'cook_time' => $recipe->cook_time,
                'servings' => $recipe->servings,
                'difficulty' => $recipe->difficulty,
                'meal_type' => $recipe->meal_type,
                'tags' => $recipe->tags,
                'nutrition' => [
                    'calories' => $recipe->calories,
                    'protein' => $recipe->protein,
                    'carbs' => $recipe->carbs,
                    'fat' => $recipe->fat,
                    'fiber' => $recipe->fiber,
                    'sugar' => $recipe->sugar,
                    'sodium' => $recipe->sodium,
                ],
                'rating_avg' => $recipe->rating_avg,
                'rating_count' => $recipe->rating_count,
                'is_favorited' => $recipe->is_favorited,
                'author' => $recipe->user?->name ?? 'SeGizi Team',
                'created_at' => $recipe->created_at->format('d M Y'),
            ],
        ]);
    }

    public function favorites()
    {

        return Inertia::render('Recipes/Favorites', [
        ]);
    }

    public function toggleFavorite(Recipe $recipe)
    {
        $user = Auth::user();
        $favorite = $recipe->favorites()->where('user_id', $user->id)->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Resep dihapus dari favorit';
        } else {
            $recipe->favorites()->create(['user_id' => $user->id]);
            $message = 'Resep ditambahkan ke favorit';
        }

        return back()->with('success', $message);
    }
}
