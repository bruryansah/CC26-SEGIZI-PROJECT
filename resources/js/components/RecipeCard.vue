<!-- resources/js/Components/RecipeCard.vue -->
<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
    recipe: Object,
    showFavorite: {
        type: Boolean,
        default: true
    }
})

const toggleFavorite = () => {
    if (!route().params.user) {
        // Redirect to login if not authenticated
        router.visit('/login')
        return
    }

    router.post(`/recipes/${props.recipe.id}/favorite`, {}, {
        preserveScroll: true,
        preserveState: true,
    })
}

const difficultyColor = {
    easy: 'bg-green-100 text-green-700',
    medium: 'bg-yellow-100 text-yellow-700',
    hard: 'bg-red-100 text-red-700',
}

const difficultyLabel = {
    easy: 'Mudah',
    medium: 'Sedang',
    hard: 'Sulit',
}
</script>

<template>
    <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
        <!-- Image -->
        <div class="relative overflow-hidden aspect-[4/3]">
            <img :src="recipe.image || '/images/recipe-placeholder.jpg'"
                 :alt="recipe.title"
                 class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">

            <!-- Badges -->
            <div class="absolute top-3 left-3 flex gap-2 flex-wrap">
                <span v-for="tag in recipe.tags.slice(0, 2)" :key="tag"
                      class="bg-white/90 backdrop-blur px-2 py-1 rounded-full text-xs font-medium text-primary-700">
                    {{ tag }}
                </span>
            </div>

            <!-- Favorite Button -->
            <button v-if="showFavorite" @click.prevent="toggleFavorite"
                    class="absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-sm hover:scale-110 transition">
                <i :class="['fas', recipe.is_favorited ? 'fa-heart text-red-500' : 'fa-heart text-gray-400 hover:text-red-400']"></i>
            </button>

            <!-- Difficulty Badge -->
            <div class="absolute bottom-3 left-3">
                <span :class="['px-2 py-1 rounded-full text-xs font-medium', difficultyColor[recipe.difficulty]]">
                    {{ difficultyLabel[recipe.difficulty] }}
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="p-5">
            <div class="flex items-start justify-between mb-2">
                <h3 class="font-bold text-lg text-gray-900 line-clamp-1 group-hover:text-primary-600 transition">
                    {{ recipe.title }}
                </h3>
                <div class="flex items-center space-x-1 flex-shrink-0 ml-2">
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <span class="text-sm font-medium text-gray-700">{{ recipe.rating_avg }}</span>
                </div>
            </div>

            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ recipe.description }}</p>

            <!-- Nutrition Info -->
            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                <div class="flex space-x-3">
                    <span class="flex items-center">
                        <i class="fas fa-fire mr-1 text-orange-500"></i>
                        {{ Math.round(recipe.calories) }} kcal
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-drumstick-bite mr-1 text-primary-500"></i>
                        {{ Math.round(recipe.protein) }}g protein
                    </span>
                </div>
                <span class="flex items-center">
                    <i class="fas fa-clock mr-1"></i>
                    {{ recipe.prep_time + recipe.cook_time }} menit
                </span>
            </div>

            <!-- CTA -->
            <Link :href="`/recipes/${recipe.slug || recipe.id}`"
                  class="block w-full text-center bg-gray-50 text-gray-700 py-2.5 rounded-xl font-medium hover:bg-primary-600 hover:text-white transition">
                Lihat Resep
            </Link>
        </div>
    </div>
</template>
