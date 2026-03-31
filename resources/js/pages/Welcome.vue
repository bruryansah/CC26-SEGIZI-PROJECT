<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import laukImage from '../../images/lauk.png';
import GuestLayout from '@/layouts/GuestLayout.vue';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
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
                    <div class="inline-flex items-center bg-[#F3F4F0] rounded-full px-8 py-2.5 gap-8">
                        <button class="text-[13px] font-bold text-black hover:text-green-600 transition">Tinggi Kalori</button>
                        <button class="text-[13px] font-bold text-black hover:text-green-600 transition">Rendah Kalori</button>
                        <button class="text-[13px] font-bold text-black hover:text-green-600 transition">Tinggi Protein</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <Link href="/recipes/1" class="group">
                    <div class="h-full bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=600" alt="Egg Roll Tahu" class="w-full h-[240px] object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="bg-green-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Tinggi Protein</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-[20px] font-black text-black mb-3 text-left">Egg Roll Tahu</h3>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-[#36d362] text-sm font-black">350 Kalori</span>
                                <span class="bg-[#ff9d29]/20 text-[#ff9d29] text-[10px] font-bold px-3 py-1 rounded-full">Gizi Baik</span>
                            </div>
                            <p class="text-gray-500 text-[14px] mb-8 leading-relaxed line-clamp-2 text-left">
                                Call out a feature, benefit, or value of your site or product that can stand on its own.
                            </p>
                            <div class="inline-flex items-center text-[13px] font-bold text-white bg-[#36d362] px-6 py-2.5 rounded-lg hover:bg-green-600 transition">
                                Lihat Resep &rarr;
                            </div>
                        </div>
                    </div>
                </Link>
                <!-- Card 2 -->
                <Link href="/recipes/2" class="group">
                    <div class="h-full bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=600" alt="Egg Roll Tahu" class="w-full h-[240px] object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="bg-green-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Tinggi Protein</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-[20px] font-black text-black mb-3 text-left">Egg Roll Tahu</h3>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-[#36d362] text-sm font-black">350 Kalori</span>
                                <span class="bg-[#ff9d29]/20 text-[#ff9d29] text-[10px] font-bold px-3 py-1 rounded-full">Gizi Baik</span>
                            </div>
                            <p class="text-gray-500 text-[14px] mb-8 leading-relaxed line-clamp-2 text-left">
                                Call out a feature, benefit, or value of your site or product that can stand on its own.
                            </p>
                            <div class="inline-flex items-center text-[13px] font-bold text-white bg-[#36d362] px-6 py-2.5 rounded-lg hover:bg-green-600 transition">
                                Lihat Resep &rarr;
                            </div>
                        </div>
                    </div>
                </Link>
                <!-- Card 3 -->
                <Link href="/recipes/3" class="group">
                    <div class="h-full bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=600" alt="Egg Roll Tahu" class="w-full h-[240px] object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="bg-green-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Tinggi Protein</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-[20px] font-black text-black mb-3 text-left">Egg Roll Tahu</h3>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-[#36d362] text-sm font-black">350 Kalori</span>
                                <span class="bg-[#ff9d29]/20 text-[#ff9d29] text-[10px] font-bold px-3 py-1 rounded-full">Gizi Baik</span>
                            </div>
                            <p class="text-gray-500 text-[14px] mb-8 leading-relaxed line-clamp-2 text-left">
                                Call out a feature, benefit, or value of your site or product that can stand on its own.
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
                    <div class="inline-flex items-center bg-[#F3F4F0] rounded-full px-8 py-2.5 gap-8">
                        <button class="text-[13px] font-bold text-black transition">Gaya Hidup Sehat</button>
                        <button class="text-[13px] font-bold text-black transition">Mitos & Fakta</button>
                        <button class="text-[13px] font-bold text-black transition">Nutrisi & Gizi</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Article Card 1 -->
                <Link v-for="i in 3" :key="i" :href="`/articles/${i}`" class="group">
                    <div class="h-full bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                        <div class="relative overflow-hidden aspect-[16/11]">
                            <img src="https://images.unsplash.com/photo-1505253716362-afaea1d3d1af?auto=format&fit=crop&q=80&w=600" alt="Article" class="w-full h-full object-cover grayscale brightness-75 contrast-125">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-6xl font-black text-white px-4 leading-none tracking-tighter uppercase">MALAS</span>
                            </div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-green-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">Diet</span>
                            </div>
                        </div>
                        <div class="p-8 text-left">
                            <h3 class="text-[18px] font-black text-black mb-3">9 Tips Pola Hidup Sehat untuk pemula</h3>
                            <p class="text-gray-500 text-[13px] mb-8 leading-relaxed line-clamp-3">
                                Inisilah kals asdsad asdsad ad sad ad s ad sa d as d sa d sa d sa d sa d s ad sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d sa d
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
