<?php

namespace App\Http\Controllers;

use App\Models\NutritionLog;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get latest BMI log
        $latestBmi = NutritionLog::where('user_id', $user->id)
            ->where('type', 'bmi')
            ->latest()
            ->first();

        // Get latest calorie calculation
        $latestCalorie = NutritionLog::where('user_id', $user->id)
            ->where('type', 'calorie')
            ->latest()
            ->first();

        // Get recent logs (last 5)
        $recentLogs = NutritionLog::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($log) {
                return [
                    'id' => $log->id,
                    'type' => $log->type,
                    'value' => $log->type === 'bmi' ? $log->data['bmi'] : $log->data['calories'] . ' kcal',
                    'status' => $log->type === 'bmi' ? $this->getBmiStatus($log->data['bmi']) : null,
                    'statusColor' => $log->type === 'bmi' ? $this->getBmiColor($log->data['bmi']) : null,
                    'created_at' => $log->created_at->diffForHumans(),
                ];
            });

        // Get favorite recipes

        // Get recommendations based on user preferences (simplified)
        $recommendations = Recipe::where('is_published', true)
            ->inRandomOrder()
            ->take(1)
            ->get();

        return Inertia::render('Dashboard', [
            'stats' => [
                'lastBmi' => $latestBmi ? round($latestBmi->data['bmi'], 1) : null,
                'bmiStatus' => $latestBmi ? [
                    'label' => $this->getBmiStatus($latestBmi->data['bmi']),
                    'color' => $this->getBmiColor($latestBmi->data['bmi']),
                ] : null,
                'dailyCalories' => $latestCalorie ? round($latestCalorie->data['calories']) : null,
                'totalLogs' => NutritionLog::where('user_id', $user->id)->count(),
            ],
            'recentLogs' => $recentLogs,
            'recommendations' => $recommendations,
        ]);
    }

    private function getBmiStatus($bmi)
    {
        if ($bmi < 18.5) return 'Kurus';
        if ($bmi < 25) return 'Normal';
        if ($bmi < 30) return 'Overweight';
        return 'Obesitas';
    }

    private function getBmiColor($bmi)
    {
        if ($bmi < 18.5) return 'text-blue-600';
        if ($bmi < 25) return 'text-green-600';
        if ($bmi < 30) return 'text-yellow-600';
        return 'text-red-600';
    }
}
