<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import laukImage from '../../images/lauk.png';
import GuestLayout from '@/layouts/GuestLayout.vue';
import hidrasiImage from '../../images/hidrasi.jpg';
import tidurImage from '../../images/tidur.jpg';
import nutrisiImage from '../../images/nutrisi tulang.jpg';
import carbonaraImage from '../../images/carbonara.jpg';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);

// Filters
const activeRecipeFilter = ref('Semua');
const activeArticleFilter = ref('Semua');

// Data
const recipes = [
    {
        id: 1,
        title: 'Salmon Panggang Lemon',
        category: 'Tinggi Protein',
        calories: 450,
        tag: 'Gizi Baik',
        description: 'Salmon segar yang dipanggang dengan irisan lemon dan rempah pilihan untuk asupan protein maksimal.',
        image: 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=800&auto=format&fit=crop',
    },
    {
        id: 2,
        title: 'Salad Quinoa Mediterania',
        category: 'Rendah Kalori',
        calories: 280,
        tag: 'Serat Tinggi',
        description: 'Perpaduan quinoa, mentimun, dan tomat ceri yang segar, sempurna untuk makan siang ringan Anda.',
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&auto=format&fit=crop',
    },
    {
        id: 3,
        title: 'Pasta Carbonara Gandum',
        category: 'Tinggi Kalori',
        calories: 620,
        tag: 'Energi Ekstra',
        description: 'Pasta gandum utuh dengan saus carbonara creamy tanpa krim, kaya akan karbohidrat kompleks.',
        image: carbonaraImage,
    }
];

const articles = [
    {
        id: 1,
        title: '7 Kunci Hidrasi untuk Metabolisme',
        category: 'Gaya Hidup Sehat',
        description: 'Temukan bagaimana konsumsi air yang cukup dapat mempercepat pembakaran lemak harian Anda.',
        image: hidrasiImage,
    },
    {
        id: 2,
        title: 'Mitos Diet Karbohidrat Terbongkar',
        category: 'Mitos & Fakta',
        description: 'Benarkah nasi putih adalah musuh utama? Simak penjelasan sains mengenai konsumsi karbohidrat kompleks vs sederhana.',
        image: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&auto=format&fit=crop',
    },
    {
        id: 3,
        title: 'Pentingnya Tidur untuk Pemulihan Otot',
        category: 'Gaya Hidup Sehat',
        description: 'Pelajari mengapa istirahat yang cukup sangat penting bagi pemulihan fisik dan mental Anda.',
        image: tidurImage,
    },
    {
        id: 4,
        title: 'Nutrisi Penting untuk Kesehatan Tulang',
        category: 'Nutrisi & Gizi',
        description: 'Daftar zat gizi mikro yang sering terabaikan namun krusial bagi kesehatan jangka panjang.',
        image: nutrisiImage,
    }
];

// Computeds
const filteredRecipes = computed(() => {
    if (activeRecipeFilter.value === 'Semua') return recipes;
    return recipes.filter(r => r.category === activeRecipeFilter.value);
});

const filteredArticles = computed(() => {
    if (activeArticleFilter.value === 'Semua') return articles;
    return articles.filter(a => a.category === activeArticleFilter.value);
});
</script>

<template>
    <Head title="Welcome" />

    <GuestLayout>
        <!-- Hero Section -->
        <section class="bg-[#EAFBF0] py-20 px-8 md:px-20 flex flex-col md:flex-row items-center justify-between min-h-[600px] relative z-0">
            <div class="md:w-1/2 md:pr-10">
                <h1 class="text-4xl md:text-[54px] font-extrabold text-[#111] leading-[1.1] tracking-tight">
                    Makanan untuk hidup <br>
                    bukan hidup untuk <br>
                    makanan
                </h1>
                <p class="text-gray-800 font-medium text-[18px] mt-8 max-w-[450px] leading-relaxed">
                    Hitung kebutuhan kalori <br>
                    harianmu, temukan resep sehat <br>
                    dan mulai perjalanan hidup <br>
                    sehat hari ini.
                </p>
                <div class="flex gap-4 pt-10">
                    <Link href="/bmi-calculator" class="px-8 py-3.5 text-white bg-[#36d362] rounded-lg font-bold hover:bg-green-500 transition shadow-sm border border-transparent">
                        Hitung Kalori
                    </Link>
                    <Link href="/recipes" class="px-8 py-3.5 text-black bg-transparent border border-gray-400 rounded-lg font-bold hover:bg-gray-50 transition">
                        Menu Makanan
                    </Link>
                </div>
            </div>
            
            <div class="md:w-1/2 mt-12 md:mt-0 flex justify-end relative">
                <!-- Ilustrasi Makanan -->
                <img :src="laukImage" 
                     alt="Ilustrasi Makanan" 
                     class="w-full max-w-[600px] object-contain">
            </div>
        </section>

        <!-- Menu Populer Section -->
        <section class="py-24 px-8 md:px-20 max-w-[1400px] mx-auto">
            <div class="text-center mb-16 relative">
                <h2 class="text-3xl font-extrabold text-black">
                    Menu <span class="text-[#ff9d29]">Populer</span>
                </h2>
                <p class="text-gray-600 font-medium mt-3">Temukan berbagai resep sehat dan lezat.</p>
                
                <!-- Filters wrapped in a single grey pill -->
                <div class="flex justify-center mt-10">
                    <div class="inline-flex items-center bg-[#F3F4F0] rounded-full px-6 md:px-8 py-2.5 gap-4 md:gap-8 overflow-x-auto scrollbar-hide max-w-full">
                        <button 
                            @click="activeRecipeFilter = 'Semua'"
                            :class="activeRecipeFilter === 'Semua' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Semua</button>
                        <button 
                            @click="activeRecipeFilter = 'Tinggi Kalori'"
                            :class="activeRecipeFilter === 'Tinggi Kalori' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Tinggi Kalori</button>
                        <button 
                            @click="activeRecipeFilter = 'Rendah Kalori'"
                            :class="activeRecipeFilter === 'Rendah Kalori' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Rendah Kalori</button>
                        <button 
                            @click="activeRecipeFilter = 'Tinggi Protein'"
                            :class="activeRecipeFilter === 'Tinggi Protein' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Tinggi Protein</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 transition-all duration-500">
                <Link v-for="recipe in filteredRecipes" :key="recipe.id" :href="`/recipes/${recipe.id}`" class="group animate-in fade-in slide-in-from-bottom-4 duration-500">
                    <div class="h-full bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="relative overflow-hidden aspect-[16/11]">
                            <img :src="recipe.image" :alt="recipe.title" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="bg-[#36d362] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                                    {{ recipe.category }}
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-[20px] font-black text-black mb-3 text-left">{{ recipe.title }}</h3>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-[#36d362] text-sm font-black">{{ recipe.calories }} Kalori</span>
                                <span class="bg-[#ff9d29]/20 text-[#ff9d29] text-[10px] font-bold px-3 py-1 rounded-full">{{ recipe.tag }}</span>
                            </div>
                            <p class="text-gray-500 text-[14px] mb-8 leading-relaxed line-clamp-2 text-left">
                                {{ recipe.description }}
                            </p>
                            <div class="inline-flex items-center text-[13px] font-bold text-white bg-[#36d362] px-6 py-2.5 rounded-lg hover:bg-green-600 transition">
                                Lihat Resep &rarr;
                            </div>
                        </div>
                    </div>
                </Link>
            </div>

            <div class="mt-16 text-center">
                <Link href="/recipes" class="inline-flex items-center text-[15px] font-bold text-white bg-[#36d362] px-10 py-3.5 rounded-lg hover:bg-green-600 transition shadow-lg shadow-green-100">
                    Lihat Semua Makanan &rarr;
                </Link>
            </div>
        </section>

        <!-- Artikel Populer Section -->
        <section class="py-24 px-8 md:px-20 max-w-[1400px] mx-auto overflow-hidden">
            <div class="text-center mb-16 relative">
                <h2 class="text-3xl font-extrabold text-black">
                    Artikel <span class="text-[#ff9d29]">Populer</span>
                </h2>
                <p class="text-gray-500 font-medium mt-3">Pelajari pola makan sehat dan gaya hidup seimbang.</p>
                
                <!-- Filters wrapped in a single grey pill -->
                <div class="flex justify-center mt-10">
                    <div class="inline-flex items-center bg-[#F3F4F0] rounded-full px-6 md:px-8 py-2.5 gap-4 md:gap-8 overflow-x-auto scrollbar-hide max-w-full">
                        <button 
                            @click="activeArticleFilter = 'Semua'"
                            :class="activeArticleFilter === 'Semua' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Semua</button>
                        <button 
                            @click="activeArticleFilter = 'Gaya Hidup Sehat'"
                            :class="activeArticleFilter === 'Gaya Hidup Sehat' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Gaya Hidup Sehat</button>
                        <button 
                            @click="activeArticleFilter = 'Mitos & Fakta'"
                            :class="activeArticleFilter === 'Mitos & Fakta' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Mitos & Fakta</button>
                        <button 
                            @click="activeArticleFilter = 'Nutrisi & Gizi'"
                            :class="activeArticleFilter === 'Nutrisi & Gizi' ? 'text-[#36d362]' : 'text-black'"
                            class="text-[13px] font-bold hover:text-[#36d362] transition whitespace-nowrap"
                        >Nutrisi & Gizi</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 transition-all duration-500">
                <Link v-for="article in filteredArticles" :key="article.id" :href="`/articles/${article.id}`" class="group animate-in fade-in slide-in-from-bottom-4 duration-500">
                    <div class="h-full bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="relative overflow-hidden aspect-[16/11]">
                            <img :src="article.image" :alt="article.title" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="bg-[#36d362] text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                                    {{ article.category.split(' ')[0] }}
                                </span>
                            </div>
                        </div>
                        <div class="p-8 text-left">
                            <h3 class="text-[18px] font-black text-black mb-3">{{ article.title }}</h3>
                            <p class="text-gray-500 text-[13px] mb-8 leading-relaxed line-clamp-3">
                                {{ article.description }}
                            </p>
                            <div class="inline-flex items-center gap-2 bg-[#36d362] text-white px-5 py-2.5 rounded-md text-[13px] font-bold hover:bg-green-600 transition">
                                Baca Selengkapnya &rarr;
                            </div>
                        </div>
                    </div>
                </Link>
            </div>

            <div class="mt-16 text-center">
                <Link href="/articles" class="inline-flex items-center text-[15px] font-bold text-white bg-[#36d362] px-10 py-3.5 rounded-lg hover:bg-green-600 transition shadow-lg shadow-green-100">
                    Lihat Semua Artikel &rarr;
                </Link>
            </div>
        </section>
    </GuestLayout>
</template>



<style>
/* You can add extra styling here if needed */
</style>
