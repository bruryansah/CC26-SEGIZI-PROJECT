<!-- resources/js/Pages/Recipes/Index.vue -->
<script setup>
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue'
import GuestLayout from '@/layouts/GuestLayout.vue'
import FilterSidebar from '@/components/FilterSidebar.vue'
import RecipeCard from '@/components/RecipeCard.vue'

const props = defineProps({
    recipes: Object,
    filters: Object,
    filterOptions: Object,
})

// Use AppLayout if authenticated, GuestLayout if not
const layout = props.$page?.props?.auth?.user ? AppLayout : GuestLayout
defineOptions({ layout: layout })
</script>

<template>
    <Head title="Resep Sehat" />

    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Jelajahi Resep Sehat</h1>
            <p class="mt-2 text-gray-600">Temukan {{ recipes.total }}+ resep bergizi untuk gaya hidup sehat Anda</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filter -->
            <aside class="lg:w-80 flex-shrink-0">
                <div class="sticky top-24">
                    <FilterSidebar :filters="filters" :filter-options="filterOptions" />
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <!-- Results Header -->
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-gray-600">
                        Menampilkan {{ recipes.from }}-{{ recipes.to }} dari {{ recipes.total }} resep
                    </p>

                    <!-- Mobile Filter Toggle (if needed) -->
                    <button class="lg:hidden text-sm font-medium text-primary-600">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                </div>

                <!-- Recipe Grid -->
                <div v-if="recipes.data.length > 0" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    <RecipeCard v-for="recipe in recipes.data" :key="recipe.id" :recipe="recipe" />
                </div>

                <!-- Empty State -->
                <div v-else class="text-center py-16 bg-white rounded-2xl border border-gray-200">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada resep ditemukan</h3>
                    <p class="text-gray-600 mb-4">Coba ubah filter atau kata kunci pencarian Anda</p>
                    <button @click="$refs.filterSidebar.clearFilters()"
                            class="text-primary-600 font-medium hover:text-primary-700">
                        Reset Filter
                    </button>
                </div>

                <!-- Pagination -->
                <div v-if="recipes.links.length > 3" class="mt-8 flex justify-center">
                    <div class="flex space-x-2">
                        <Link v-for="(link, index) in recipes.links" :key="index"
                              :href="link.url"
                              :class="['px-4 py-2 rounded-lg text-sm font-medium transition',
                                       link.active
                                       ? 'bg-primary-600 text-white'
                                       : link.url
                                         ? 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'
                                         : 'bg-gray-100 text-gray-400 cursor-not-allowed']"
                              v-html="link.label"
                              :preserve-state="true"
                              :preserve-scroll="true">
                        </Link>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
