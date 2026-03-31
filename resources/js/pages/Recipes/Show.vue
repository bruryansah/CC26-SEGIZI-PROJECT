<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import carbonaraImage from '../../../images/carbonara.jpg';
import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Separator } from '@/components/ui/separator';
import { ArrowLeft, Clock, Flame, Users, ChefHat, CheckCircle2, ShoppingBasket } from 'lucide-vue-next';

const props = defineProps<{
    recipe: string | number;
}>();

const allRecipes = [
    {
        id: 1,
        title: 'Salmon Panggang Lemon',
        category: 'Makan Malam',
        calories: 450,
        time: '25 min',
        servings: '1 porsi',
        description: 'Salmon segar yang dipanggang dengan irisan lemon dan rempah pilihan untuk asupan protein maksimal.',
        image: 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=1200&auto=format&fit=crop',
        ingredients: ['1 Potong Salmon', '1 Buah Lemon', 'Garam & Lada', 'Minyak Zaitun'],
        instructions: ['Panaskan oven', 'Bumbui salmon', 'Panggang selama 15 menit'],
        nutrition: { protein: '30g', carbs: '2g', fat: '15g', fiber: '0g' }
    },
    {
        id: 2,
        title: 'Salad Quinoa Mediterania',
        category: 'Sarapan',
        calories: 280,
        time: '15 min',
        servings: '2 porsi',
        description: 'Perpaduan quinoa, mentimun, dan tomat ceri yang segar, sempurna untuk makan siang ringan Anda.',
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=1200&auto=format&fit=crop',
        ingredients: ['1 cup Quinoa', 'Mentimun', 'Tomat Ceri'],
        instructions: ['Rebus Quinoa', 'Potong sayuran', 'Campur semua bahan'],
        nutrition: { protein: '12g', carbs: '45g', fat: '8g', fiber: '10g' }
    },
    {
        id: 3,
        title: 'Pasta Carbonara Gandum',
        category: 'Makan Malam',
        calories: 620,
        time: '20 min',
        servings: '1 porsi',
        description: 'Pasta gandum utuh dengan saus carbonara creamy tanpa krim, kaya akan karbohidrat kompleks.',
        image: carbonaraImage,
        ingredients: ['Pasta Gandum', 'Telur', 'Keju Parmesan', 'Daging Asap'],
        instructions: ['Rebus pasta', 'Campur telur dan keju', 'Aduk pasta panas dengan saus'],
        nutrition: { protein: '25g', carbs: '65g', fat: '22g', fiber: '5g' }
    },
    {
        id: 4,
        title: 'Pecel Sayur Madiun',
        category: 'Makan Siang',
        calories: 320,
        time: '30 min',
        servings: '2 porsi',
        description: 'Pecel sayur khas Madiun dengan bumbu kacang gurih dan sayuran segar pilihan.',
        image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=1200&auto=format&fit=crop',
        ingredients: ['Bayam', 'Tauge', 'Kacang Panjang', 'Bumbu Pecel'],
        instructions: ['Rebus semua sayuran', 'Siapkan bumbu kacang', 'Siram bumbu ke sayuran'],
        nutrition: { protein: '8g', carbs: '35g', fat: '12g', fiber: '7g' }
    }
];

const recipeId = (props.recipe || 1).toString();
const recipeData = allRecipes.find(r => r.id.toString() === recipeId) || allRecipes[0];
</script>


<template>
    <Head :title="recipeData.title" />

    <GuestLayout>
        <div class="flex flex-1 flex-col p-6 lg:p-10 bg-white min-h-screen">
            <!-- Back Button -->
            <div class="mb-8">
                <Link href="/recipes" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-500 hover:text-[#36d362] transition-colors group">
                    <div class="p-1.5 rounded-full bg-white shadow-sm border border-zinc-200 group-hover:bg-[#36d362] group-hover:text-white group-hover:border-[#36d362] transition-all">
                        <ArrowLeft class="w-4 h-4" />
                    </div>
                    Kembali ke Daftar Resep
                </Link>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
                <!-- Left Column: Main Info -->
                <div class="xl:col-span-2 space-y-10 focus-within:outline-none">
                    <!-- Hero Section -->
                    <div class="space-y-6">
                        <div class="inline-flex">
                            <Badge variant="secondary" class="bg-[#36d362]/10 text-[#36d362] border-none px-4 py-1 text-xs font-black uppercase tracking-widest">
                                {{ recipeData.category }}
                            </Badge>
                        </div>
                        <h1 class="text-5xl font-black tracking-tight text-zinc-900 leading-[1.1]">
                            {{ recipeData.title }}
                        </h1>
                        <p class="text-xl text-zinc-500 leading-relaxed max-w-2xl">
                            {{ recipeData.description }}
                        </p>
                        
                        <!-- Quick Stats -->
                        <div class="flex flex-wrap gap-6 pt-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-zinc-100 rounded-2xl">
                                    <Clock class="w-6 h-6 text-[#36d362]" />
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black uppercase text-zinc-400">Waktu</span>
                                    <span class="font-bold">{{ recipeData.time }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-zinc-100 rounded-2xl">
                                    <Flame class="w-6 h-6 text-orange-500" />
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black uppercase text-zinc-400">Kalori</span>
                                    <span class="font-bold">{{ recipeData.calories }} kkal</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 bg-zinc-100 rounded-2xl">
                                    <Users class="w-6 h-6 text-blue-500" />
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-black uppercase text-zinc-400">Porsi</span>
                                    <span class="font-bold">{{ recipeData.servings }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative aspect-video lg:aspect-[21/9] overflow-hidden rounded-[32px] shadow-2xl shadow-green-100">
                        <img 
                            :src="recipeData.image" 
                            :alt="recipeData.title"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <!-- Steps Section -->
                    <div class="space-y-8 pt-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-[#36d362] text-white rounded-lg">
                                <ChefHat class="w-5 h-5" />
                            </div>
                            <h2 class="text-2xl font-black tracking-tight text-zinc-900">Cara Pembuatan</h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div v-for="(step, index) in recipeData.instructions" :key="index" class="flex gap-6 group">
                                <div class="flex-none">
                                    <div class="w-10 h-10 rounded-full bg-zinc-100 flex items-center justify-center font-black text-zinc-400 group-hover:bg-[#36d362] group-hover:text-white transition-colors duration-300">
                                        {{ index + 1 }}
                                    </div>
                                </div>
                                <div class="flex-1 pt-2 border-b border-zinc-100 pb-6">
                                    <p class="text-lg text-zinc-700 leading-relaxed font-medium">
                                        {{ step }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Components/Nutrition -->
                <div class="xl:col-span-1 space-y-8">
                    <!-- Ingredients Card -->
                    <Card class="border border-zinc-200 shadow-xl bg-white rounded-[32px] overflow-hidden">
                        <div class="p-8 space-y-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-orange-100 rounded-lg">
                                    <ShoppingBasket class="w-5 h-5 text-orange-600" />
                                </div>
                                <h2 class="text-xl font-black tracking-tight text-zinc-900">Bahan-bahan</h2>
                            </div>
                            
                            <ul class="space-y-4">
                                <li v-for="item in recipeData.ingredients" :key="item" class="flex items-start gap-3 group">
                                    <CheckCircle2 class="w-5 h-5 text-zinc-200 mt-0.5 group-hover:text-[#36d362] transition-colors" />
                                    <span class="text-zinc-700 font-medium  group-hover:text-black transition-colors">{{ item }}</span>
                                </li>
                            </ul>
                            
                            <!-- Button CTA -->
                            <Button class="w-full h-14 rounded-2xl bg-[#36d362] hover:bg-green-600 text-white text-lg font-bold transition-all shadow-lg shadow-green-100 mt-4">
                                Tambahkan ke Belanja
                            </Button>
                        </div>
                    </Card>

                    <!-- Nutrition Facts Label Style -->
                    <Card class="border border-zinc-200 shadow-xl bg-white rounded-[32px] overflow-hidden border-l-8 border-l-orange-500">
                        <div class="p-8 space-y-6">
                            <div class="space-y-1">
                                <h2 class="text-3xl font-black tracking-tighter uppercase italic">Nutrition Facts</h2>
                                <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest leading-none">Informasi Nilai Gizi Per Porsi</p>
                            </div>
                            
                            <Separator class="bg-zinc-900 h-[6px] rounded-full" />
                            
                            <div class="flex justify-between items-end">
                                <div class="font-black text-lg">Calories</div>
                                <div class="font-black text-4xl leading-none tracking-tighter">{{ recipeData.calories }}</div>
                            </div>

                            <Separator class="bg-zinc-900 h-[3px] rounded-full" />
                            
                            <div class="space-y-3 pt-2">
                                <div class="flex justify-between items-center py-1">
                                    <div class="font-bold flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-blue-500"></div> Protein
                                    </div>
                                    <span class="font-black text-xl">{{ recipeData.nutrition.protein }}</span>
                                </div>
                                <Separator class="bg-zinc-100" />
                                
                                <div class="flex justify-between items-center py-1">
                                    <div class="font-bold flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-yellow-500"></div> Carbs
                                    </div>
                                    <span class="font-black text-xl">{{ recipeData.nutrition.carbs }}</span>
                                </div>
                                <Separator class="bg-zinc-100" />

                                <div class="flex justify-between items-center py-1">
                                    <div class="font-bold flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-red-500"></div> Fat
                                    </div>
                                    <span class="font-black text-xl">{{ recipeData.nutrition.fat }}</span>
                                </div>
                                <Separator class="bg-zinc-100" />

                                <div class="flex justify-between items-center py-1">
                                    <div class="font-bold flex items-center gap-2 text-zinc-400 italic">
                                        Fiber
                                    </div>
                                    <span class="font-black text-xl text-zinc-400">{{ recipeData.nutrition.fiber }}</span>
                                </div>
                            </div>
                        </div>
                    </Card>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
