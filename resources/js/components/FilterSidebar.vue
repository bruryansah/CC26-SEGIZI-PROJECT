<!-- resources/js/Components/FilterSidebar.vue -->
<script setup>
import { Link, router } from '@inertiajs/vue3'
import { reactive, watch, computed } from 'vue'
import debounce from 'lodash/debounce'

const props = defineProps({
    filters: Object,
    filterOptions: Object,
    showFavoritesToggle: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['update:filters'])

// Local state for form
const form = reactive({
    search: props.filters.search || '',
    meal_type: props.filters.meal_type || '',
    difficulty: props.filters.difficulty || '',
    tags: props.filters.tags || [],
    calories_min: props.filters.calories_min || '',
    calories_max: props.filters.calories_max || '',
    protein_min: props.filters.protein_min || '',
    carbs_max: props.filters.carbs_max || '',
    fat_max: props.filters.fat_max || '',
    sort: props.filters.sort || 'newest',
    favorites_only: props.filters.favorites_only || false,
})

// Selected tags display
const selectedTags = computed(() => form.tags)

const toggleTag = (tag) => {
    const index = form.tags.indexOf(tag)
    if (index > -1) {
        form.tags.splice(index, 1)
    } else {
        form.tags.push(tag)
    }
    applyFilters()
}

const applyFilters = debounce(() => {
    const query = {}

    // Only include non-empty values
    Object.keys(form).forEach(key => {
        if (form[key] !== '' && form[key] !== false && form[key] !== null) {
            if (Array.isArray(form[key]) && form[key].length === 0) return
            query[key] = form[key]
        }
    })

    router.get(route('recipes.index'), query, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    })
}, 300)

const clearFilters = () => {
    form.search = ''
    form.meal_type = ''
    form.difficulty = ''
    form.tags = []
    form.calories_min = ''
    form.calories_max = ''
    form.protein_min = ''
    form.carbs_max = ''
    form.fat_max = ''
    form.sort = 'newest'
    form.favorites_only = false

    router.get(route('recipes.index'), {}, {
        preserveState: true,
        preserveScroll: true,
    })
}

const activeFiltersCount = computed(() => {
    let count = 0
    if (form.search) count++
    if (form.meal_type) count++
    if (form.difficulty) count++
    if (form.tags.length > 0) count++
    if (form.calories_min || form.calories_max) count++
    if (form.protein_min) count++
    if (form.carbs_max) count++
    if (form.fat_max) count++
    if (form.favorites_only) count++
    return count
})

watch(() => props.filters, (newFilters) => {
    Object.assign(form, {
        search: newFilters.search || '',
        meal_type: newFilters.meal_type || '',
        difficulty: newFilters.difficulty || '',
        tags: newFilters.tags || [],
        calories_min: newFilters.calories_min || '',
        calories_max: newFilters.calories_max || '',
        protein_min: newFilters.protein_min || '',
        carbs_max: newFilters.carbs_max || '',
        fat_max: newFilters.fat_max || '',
        sort: newFilters.sort || 'newest',
        favorites_only: newFilters.favorites_only || false,
    })
}, { deep: true })
</script>

<template>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-filter mr-2 text-primary-600"></i>
                Filter
            </h3>
            <button v-if="activeFiltersCount > 0" @click="clearFilters"
                    class="text-sm text-red-600 hover:text-red-700 font-medium">
                Reset ({{ activeFiltersCount }})
            </button>
        </div>

        <!-- Search -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Cari Resep</label>
            <div class="relative">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input v-model="form.search" @input="applyFilters"
                       type="text" placeholder="Nama resep atau bahan..."
                       class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition">
            </div>
        </div>

        <!-- Sort -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan</label>
            <select v-model="form.sort" @change="applyFilters"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none bg-white">
                <option v-for="option in filterOptions.sort_options" :key="option.value" :value="option.value">
                    {{ option.label }}
                </option>
            </select>
        </div>

        <!-- Favorites Toggle -->
        <div v-if="showFavoritesToggle && $page.props.auth.user">
            <label class="flex items-center space-x-3 cursor-pointer">
                <input v-model="form.favorites_only" @change="applyFilters" type="checkbox"
                       class="w-5 h-5 text-primary-600 rounded focus:ring-primary-500 border-gray-300">
                <span class="text-sm font-medium text-gray-700">Hanya Favorit Saya</span>
                <i class="fas fa-heart text-red-500 text-sm"></i>
            </label>
        </div>

        <!-- Meal Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Makanan</label>
            <div class="space-y-2">
                <label v-for="type in filterOptions.meal_types" :key="type"
                       class="flex items-center space-x-3 cursor-pointer">
                    <input v-model="form.meal_type" @change="applyFilters" type="radio" :value="type" name="meal_type"
                           class="w-4 h-4 text-primary-600 focus:ring-primary-500 border-gray-300">
                    <span class="text-sm text-gray-700 capitalize">{{ type }}</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input v-model="form.meal_type" @change="applyFilters" type="radio" value=""
                           class="w-4 h-4 text-primary-600 focus:ring-primary-500 border-gray-300">
                    <span class="text-sm text-gray-500">Semua</span>
                </label>
            </div>
        </div>

        <!-- Difficulty -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tingkat Kesulitan</label>
            <div class="flex gap-2">
                <button v-for="diff in filterOptions.difficulties" :key="diff"
                        @click="form.difficulty = form.difficulty === diff ? '' : diff; applyFilters()"
                        :class="['px-3 py-1.5 rounded-full text-sm font-medium transition',
                                 form.difficulty === diff
                                 ? 'bg-primary-600 text-white'
                                 : 'bg-gray-100 text-gray-700 hover:bg-gray-200']">
                    {{ diff === 'easy' ? 'Mudah' : diff === 'medium' ? 'Sedang' : 'Sulit' }}
                </button>
            </div>
        </div>

        <!-- Tags -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tag Diet</label>
            <div class="flex flex-wrap gap-2">
                <button v-for="tag in filterOptions.common_tags" :key="tag"
                        @click="toggleTag(tag)"
                        :class="['px-3 py-1.5 rounded-full text-xs font-medium transition',
                                 selectedTags.includes(tag)
                                 ? 'bg-primary-100 text-primary-700 border border-primary-300'
                                 : 'bg-gray-100 text-gray-600 border border-transparent hover:bg-gray-200']">
                    {{ tag }}
                </button>
            </div>
        </div>

        <!-- Nutrition Range -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">Rentang Nutrisi</label>

            <!-- Calories -->
            <div class="mb-4">
                <label class="text-xs text-gray-500 mb-1 block">Kalori (kcal)</label>
                <div class="flex gap-2">
                    <input v-model.number="form.calories_min" @input="applyFilters" type="number" placeholder="Min"
                           class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 outline-none">
                    <input v-model.number="form.calories_max" @input="applyFilters" type="number" placeholder="Max"
                           class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 outline-none">
                </div>
            </div>

            <!-- Protein -->
            <div class="mb-4">
                <label class="text-xs text-gray-500 mb-1 block">Protein Minimum (g)</label>
                <input v-model.number="form.protein_min" @input="applyFilters" type="number"
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 outline-none">
            </div>

            <!-- Carbs & Fat -->
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Karbo Max (g)</label>
                    <input v-model.number="form.carbs_max" @input="applyFilters" type="number"
                           class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 outline-none">
                </div>
                <div>
                    <label class="text-xs text-gray-500 mb-1 block">Lemak Max (g)</label>
                    <input v-model.number="form.fat_max" @input="applyFilters" type="number"
                           class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 outline-none">
                </div>
            </div>
        </div>
    </div>
</template>
