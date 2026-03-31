<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import carbonaraImage from '../../../images/carbonara.jpg';
import { Card, CardContent } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { 
    Select, 
    SelectContent, 
    SelectItem, 
    SelectTrigger, 
    SelectValue 
} from '@/components/ui/select';
import { Search, ChevronRight } from 'lucide-vue-next';

const searchQuery = ref('');
const activeCategory = ref('Semua');

const categories = [
    { name: 'Semua', count: 20 },
    { name: 'Sarapan', count: 5 },
    { name: 'Makan Siang', count: 12 },
    { name: 'Makan Malam', count: 8 },
    { name: 'Cemilan', count: 3 },
];

const recipes = [
    {
        id: 1,
        title: 'Salmon Panggang Lemon',
        category: 'Makan Malam',
        image: 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=800&auto=format&fit=crop',
        description: 'Salmon segar yang dipanggang dengan irisan lemon dan rempah pilihan untuk asupan protein maksimal.',
        calories: 450,
    },
    {
        id: 2,
        title: 'Salad Quinoa Mediterania',
        category: 'Sarapan',
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&auto=format&fit=crop',
        description: 'Perpaduan quinoa, mentimun, dan tomat ceri yang segar, sempurna untuk makan siang ringan Anda.',
        calories: 280,
    },
    {
        id: 3,
        title: 'Pasta Carbonara Gandum',
        category: 'Makan Malam',
        image: carbonaraImage,
        description: 'Pasta gandum utuh dengan saus carbonara creamy tanpa krim, kaya akan karbohidrat kompleks.',
        calories: 620,
    },
    {
        id: 4,
        title: 'Pecel Sayur Madiun',
        category: 'Makan Siang',
        image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800&auto=format&fit=crop',
        description: 'Pecel sayur khas Madiun dengan bumbu kacang gurih dan sayuran segar pilihan.',
        calories: 320,
    }
];

const filteredRecipes = computed(() => {
    return recipes.filter(recipe => {
        const matchesSearch = recipe.title.toLowerCase().includes(searchQuery.value.toLowerCase());
        const matchesCategory = activeCategory.value === 'Semua' || recipe.category === activeCategory.value;
        return matchesSearch && matchesCategory;
    });
});
</script>

<template>
    <Head title="Menu Makanan Sehat" />

    <GuestLayout>
        <div class="flex flex-1 flex-col p-6 lg:p-10 bg-white min-h-screen">
            <!-- Header Section -->
            <div class="max-w-[1400px] mx-auto w-full space-y-4 mb-12">
                <h1 class="text-3xl font-extrabold text-zinc-900 leading-tight">
                    Temukan Menu Makanan <br> Sehat Pilihanmu
                </h1>
                <p class="text-zinc-500 font-medium max-w-lg">
                    Berbagai resep sehat, lezat, dan sesuai kebutuhan nutrisi harianmu
                </p>
            </div>

            <div class="max-w-[1400px] mx-auto w-full flex flex-col lg:flex-row gap-10">
                <!-- Sidebar -->
                <aside class="w-full lg:w-[320px] shrink-0 space-y-6">
                    <div class="overflow-hidden border border-gray-100 rounded-[20px] shadow-sm">
                        <div class="bg-[#36d362] px-6 py-4">
                            <h2 class="text-white font-bold text-lg">Kategori Menu</h2>
                        </div>
                        <div class="bg-white">
                            <button 
                                v-for="cat in categories" 
                                :key="cat.name"
                                @click="activeCategory = cat.name"
                                class="w-full flex items-center justify-between px-6 py-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition-colors"
                                :class="{ 'text-[#36d362] font-bold': activeCategory === cat.name }"
                            >
                                <span class="text-sm font-medium">{{ cat.name }}</span>
                                <span class="flex items-center justify-center min-w-[24px] h-6 px-2 text-[10px] bg-white border border-gray-200 rounded-full text-zinc-500 shadow-sm">
                                    {{ cat.count }}
                                </span>
                            </button>
                        </div>
                    </div>
                </aside>

                <!-- Content area -->
                <div class="flex-1 space-y-8">
                    <!-- Filters row -->
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                        <div class="relative w-full sm:w-[400px]">
                            <Search class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400 font-bold" />
                            <Input 
                                v-model="searchQuery" 
                                placeholder="Cari menu makanan..." 
                                class="pl-12 h-10 bg-white border-zinc-200 rounded-lg shadow-sm"
                            />
                        </div>
                        
                        <Select>
                            <SelectTrigger class="w-full sm:w-[150px] h-10 border-zinc-200 rounded-lg text-zinc-500 font-medium">
                                <SelectValue placeholder="Pilih" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="terbaru">Terbaru</SelectItem>
                                <SelectItem value="populer">Populer</SelectItem>
                            </SelectContent>
                        </Select>
                    </div>

                    <!-- Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <Link 
                            v-for="recipe in filteredRecipes" 
                            :key="recipe.id" 
                            :href="`/recipes/${recipe.id}`"
                            class="group"
                        >
                            <Card class="overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 rounded-[24px] bg-white">
                                <div class="relative aspect-[16/11] overflow-hidden">
                                    <img 
                                        :src="recipe.image" 
                                        :alt="recipe.title"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    />
                                    <div class="absolute top-4 left-4">
                                        <div class="bg-green-500 text-white text-[10px] font-black uppercase px-3 py-1 rounded-full">
                                            {{ recipe.category }}
                                        </div>
                                    </div>
                                </div>
                                <CardContent class="p-8 space-y-4">
                                    <h3 class="font-extrabold text-lg text-zinc-900 leading-snug">
                                        {{ recipe.title }}
                                    </h3>
                                    <p class="text-[13px] text-gray-500 leading-relaxed font-medium line-clamp-2">
                                        {{ recipe.description }}
                                    </p>
                                    <div class="pt-2">
                                        <div class="inline-flex items-center gap-2 bg-[#36d362] text-white px-5 py-2 rounded-lg text-[12px] font-bold hover:bg-green-500 transition-colors">
                                            Baca Selengkapnya
                                            <ChevronRight class="w-4 h-4" />
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>


<style scoped>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
