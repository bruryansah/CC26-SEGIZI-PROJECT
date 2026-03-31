<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, ChevronRight } from 'lucide-vue-next';

import hidrasiImage from '../../../images/hidrasi.jpg';
import tidurImage from '../../../images/tidur.jpg';
import nutrisiImage from '../../../images/nutrisi tulang.jpg';

const searchQuery = ref('');
const activeCategory = ref('Semua');

const categories = ['Semua', 'Gaya Hidup Sehat', 'Mitos & Fakta', 'Nutrisi & Gizi'];

const articles = [
    {
        id: 1,
        title: '7 Kunci Hidrasi untuk Metabolisme',
        excerpt: 'Temukan bagaimana konsumsi air yang cukup dapat mempercepat pembakaran lemak harian Anda.',
        category: 'Gaya Hidup Sehat',
        image: hidrasiImage,
    },
    {
        id: 2,
        title: 'Mitos Diet Karbohidrat Terbongkar',
        excerpt: 'Benarkah nasi putih adalah musuh utama? Simak penjelasan sains mengenai konsumsi karbohidrat kompleks vs sederhana.',
        category: 'Mitos & Fakta',
        image: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&auto=format&fit=crop',
    },
    {
        id: 3,
        title: 'Pentingnya Tidur untuk Pemulihan Otot',
        excerpt: 'Pelajari mengapa istirahat yang cukup sangat penting bagi pemulihan fisik dan mental Anda.',
        category: 'Gaya Hidup Sehat',
        image: tidurImage,
    },
    {
        id: 4,
        title: 'Nutrisi Penting untuk Kesehatan Tulang',
        excerpt: 'Daftar zat gizi mikro yang sering terabaikan namun krusial bagi kesehatan jangka panjang.',
        category: 'Nutrisi & Gizi',
        image: nutrisiImage,
    }
];

const filteredArticles = computed(() => {
    return articles.filter(article => {
        const matchesSearch = article.title.toLowerCase().includes(searchQuery.value.toLowerCase());
        const matchesCategory = activeCategory.value === 'Semua' || article.category === activeCategory.value;
        return matchesSearch && matchesCategory;
    });
});
</script>

<template>
    <Head title="Artikel & Edukasi Gizi" />

    <GuestLayout>
        <div class="flex flex-1 flex-col p-6 lg:p-10 bg-white min-h-screen">
            <!-- Header section -->
            <div class="max-w-[1400px] mx-auto w-full text-center space-y-4 mb-12">
                <h1 class="text-3xl font-extrabold text-zinc-900">Artikel & Edukasi Gizi</h1>
                <p class="text-zinc-500 font-medium">Pelajari pola makan sehat dan gaya hidup seimbang.</p>
                
                <!-- Search and Filters -->
                <div class="max-w-2xl mx-auto space-y-6 pt-4">
                    <div class="relative group">
                        <Search class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400 group-focus-within:text-green-500 transition-colors" />
                        <Input 
                            v-model="searchQuery" 
                            placeholder="Cari artikel..." 
                            class="pl-12 h-12 bg-white border-zinc-200 rounded-full shadow-sm"
                        />
                    </div>
                    
                    <div class="flex flex-wrap justify-center gap-2">
                        <Button 
                            v-for="cat in categories" 
                            :key="cat"
                            :variant="activeCategory === cat ? 'default' : 'secondary'"
                            class="rounded-full px-6 h-9 text-xs font-bold"
                            :class="activeCategory === cat ? 'bg-green-500 hover:bg-green-600' : 'bg-gray-100 hover:bg-gray-200 text-zinc-700'"
                            @click="activeCategory = cat"
                        >
                            {{ cat }}
                        </Button>
                    </div>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="max-w-[1200px] mx-auto w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <Link 
                    v-for="article in filteredArticles" 
                    :key="article.id" 
                    :href="`/articles/${article.id}`"
                    class="group"
                >
                    <Card class="h-full overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 rounded-[24px] bg-white">
                        <div class="relative aspect-[16/11] overflow-hidden">
                            <img 
                                :src="article.image" 
                                :alt="article.title"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            />
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <div class="bg-green-500 text-white text-[10px] font-black uppercase px-3 py-1 rounded-full">
                                    {{ article.category }}
                                </div>
                            </div>
                        </div>
                        
                        <CardContent class="p-8 space-y-4">
                            <h3 class="font-extrabold text-lg text-zinc-900 leading-snug">
                                {{ article.title }}
                            </h3>
                            <p class="text-[13px] text-gray-500 leading-relaxed line-clamp-2">
                                {{ article.excerpt }}
                            </p>
                            
                            <div class="pt-2">
                                <div class="inline-flex items-center gap-2 bg-[#36d362] text-white px-5 py-2 rounded-full text-[12px] font-bold hover:bg-green-500 transition-colors">
                                    Baca Selengkapnya
                                    <ChevronRight class="w-4 h-4" />
                                </div>
                            </div>
                        </CardContent>
                    </Card>
                </Link>
            </div>
        </div>
    </GuestLayout>
</template>

