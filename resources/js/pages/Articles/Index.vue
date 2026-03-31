<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Search, ChevronRight } from 'lucide-vue-next';

const searchQuery = ref('');
const activeCategory = ref('Semua');

const categories = ['Semua', 'Diet', 'Gizi', 'Pola makan', 'Lifestyle'];

const articles = [
    {
        id: 1,
        title: '9 Tips Pola Hidup Sehat untuk pemula',
        excerpt: 'blablablablablablablablablablablabla blablablablablablablablablablablabla',
        category: 'Diet',
        image: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&auto=format&fit=crop',
    },
    {
        id: 2,
        title: '9 Tips Pola Hidup Sehat untuk pemula',
        excerpt: 'blablablablablablablablablablablabla blablablablablablablablablablablabla',
        category: 'Gizi',
        image: 'https://images.unsplash.com/photo-1543332164-6e82f355badc?w=800&auto=format&fit=crop',
    },
    {
        id: 3,
        title: '9 Tips Pola Hidup Sehat untuk pemula',
        excerpt: 'blablablablablablablablablablablabla blablablablablablablablablablablabla',
        category: 'Pola makan',
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&auto=format&fit=crop',
    },
    {
        id: 4,
        title: '9 Tips Pola Hidup Sehat untuk pemula',
        excerpt: 'blablablablablablablablablablablabla blablablablablablablablablablablabla',
        category: 'Lifestyle',
        image: 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=800&auto=format&fit=crop',
    },
    {
        id: 5,
        title: '9 Tips Pola Hidup Sehat untuk pemula',
        excerpt: 'blablablablablablablablablablablabla blablablablablablablablablablablabla',
        category: 'Diet',
        image: 'https://images.unsplash.com/photo-1490474418585-ba9bad8fd0ea?w=800&auto=format&fit=crop',
    },
    {
        id: 6,
        title: '9 Tips Pola Hidup Sehat untuk pemula',
        excerpt: 'blablablablablablablablablablablabla blablablablablablablablablablablabla',
        category: 'Diet',
        image: 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=800&auto=format&fit=crop',
    },
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
                                class="w-full h-full object-cover grayscale brightness-75 contrast-125"
                            />
                            <!-- Placeholder Overlay Text -->
                            <div class="absolute inset-0 flex items-center justify-center p-4">
                                <span class="text-6xl font-black text-white/90 tracking-tighter uppercase leading-none">MALAS</span>
                            </div>
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

