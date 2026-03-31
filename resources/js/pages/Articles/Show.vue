<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Separator } from '@/components/ui/separator';
import { ArrowLeft, Calendar, Clock, Share2, Facebook, Twitter, Link as LinkIcon, Quote } from 'lucide-vue-next';

import hidrasiImage from '../../../images/hidrasi.jpg';
import tidurImage from '../../../images/tidur.jpg';
import nutrisiImage from '../../../images/nutrisi tulang.jpg';

const props = defineProps<{
    article: string | number;
}>();

const allArticles = [
    {
        id: 1,
        title: '7 Kunci Hidrasi untuk Metabolisme',
        author: 'Dr. Sarah Gizi',
        category: 'Gaya Hidup Sehat',
        date: '12 Mar 2026',
        readTime: '8 min baca',
        image: hidrasiImage,
        content: [
            { type: 'p', text: 'Berpuasa bukan berarti kita mengesampingkan asupan nutrisi bagi tubuh. Sebaliknya, saat berpuasa, tubuh membutuhkan perhatian ekstra untuk tetap terhidrasi dan berenergi sepanjang hari.' },
            { type: 'h2', text: 'Pentingnya Hidrasi' },
            { type: 'p', text: 'Air adalah komponen kunci bagi metabolisme tubuh yang sehat. Tanpanya, tubuh tidak dapat memproses nutrisi secara maksimal.' },
            { type: 'quote', text: 'Hidrasi bukan sekadar menghilangkan haus, tapi menyeimbangkan sistem internal tubuh Anda.' }
        ]
    },
    {
        id: 2,
        title: 'Mitos Diet Karbohidrat Terbongkar',
        author: 'Dr. John Doe',
        category: 'Mitos & Fakta',
        date: '14 Mar 2026',
        readTime: '6 min baca',
        image: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=1200&auto=format&fit=crop',
        content: [
            { type: 'p', text: 'Benarkah nasi putih adalah musuh utama? Simak penjelasan sains mengenai konsumsi karbohidrat kompleks vs sederhana.' },
            { type: 'h2', text: 'Pentingnya Karbohidrat' },
            { type: 'p', text: 'Karbohidrat adalah sumber energi utama tubuh. Menghindari karbohidrat sepenuhnya justru dapat menurunkan metabolisme dan fungsi otak.' },
            { type: 'quote', text: 'Kuncinya adalah jenis dan porsinya, bukan menghindarinya sama sekali.' }
        ]
    },
    {
        id: 3,
        title: 'Pentingnya Tidur untuk Pemulihan Otot',
        author: 'Ade Rai-mon',
        category: 'Gaya Hidup Sehat',
        date: '15 Mar 2026',
        readTime: '10 min baca',
        image: tidurImage,
        content: [
            { type: 'p', text: 'Banyak orang mengira pembentukan otot terjadi saat latihan. Kenyataannya, otot Anda tumbuh dan pulih saat Anda sedang beristirahat, terutama saat tidur nyenyak.' },
            { type: 'h2', text: 'Siklus Tidur yang Baik' },
            { type: 'p', text: 'Tidur 7-8 jam per malam memastikan hormon pertumbuhan dilepaskan secara optimal untuk memperbaiki jaringan tubuh yang rusak.' },
            { type: 'quote', text: 'Tidur adalah bentuk latihan pasif yang paling efektif untuk kemajuan fisik Anda.' }
        ]
    },
    {
        id: 4,
        title: 'Nutrisi Penting untuk Kesehatan Tulang',
        author: 'Prof. Bone',
        category: 'Nutrisi & Gizi',
        date: '20 Mar 2026',
        readTime: '5 min baca',
        image: nutrisiImage,
        content: [
            { type: 'p', text: 'Kesehatan tulang melampaui sekadar kalsium. Vitamin D, magnesium, dan vitamin K2 adalah orkestra mineral yang bekerja bersama melindungi densitas tulang Anda.' },
            { type: 'h2', text: 'Sumber Nutrisi Tulang' },
            { type: 'p', text: 'Ikan salmon, sayuran hijau, dan sinar matahari pagi adalah kombinasi terbaik untuk menjaga kerangka tubuh Anda tetap kuat hingga hari tua.' }
        ]
    }
];

const articleId = (props.article || 1).toString();
const articleData = allArticles.find(a => a.id.toString() === articleId) || allArticles[0];
</script>


<template>
    <Head :title="articleData.title" />

    <GuestLayout>
        <div class="flex flex-1 flex-col p-6 lg:p-10 bg-white min-h-screen">
            <!-- Navigation & Controls -->
            <div class="max-w-4xl mx-auto w-full flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12">
                <Link href="/articles" class="inline-flex items-center gap-2 text-sm font-bold text-zinc-500 hover:text-[#36d362] transition-colors group">
                    <div class="p-1.5 rounded-full bg-zinc-100 group-hover:bg-[#36d362] group-hover:text-white transition-all">
                        <ArrowLeft class="w-4 h-4" />
                    </div>
                    Artikel Lainnya
                </Link>

                <div class="flex items-center gap-2">
                    <Button variant="outline" size="sm" class="rounded-full gap-2 border-zinc-200">
                        <Share2 class="w-3.5 h-3.5" /> Bagikan
                    </Button>
                    <div class="flex gap-1">
                        <Button variant="secondary" size="icon" class="rounded-full w-8 h-8">
                            <Facebook class="w-3.5 h-3.5" />
                        </Button>
                        <Button variant="secondary" size="icon" class="rounded-full w-8 h-8">
                            <Twitter class="w-3.5 h-3.5" />
                        </Button>
                    </div>
                </div>
            </div>

            <!-- Article Content Container -->
            <article class="max-w-4xl mx-auto w-full space-y-12 pb-20">
                <!-- Title & Meta -->
                <div class="space-y-8 text-center sm:text-left">
                    <div class="flex justify-center sm:justify-start gap-3">
                        <Badge class="bg-[#36d362]/10 text-[#36d362] border-none px-4 py-1 text-[10px] font-black uppercase tracking-widest">
                            {{ articleData.category }}
                        </Badge>
                    </div>
                    
                    <h1 class="text-4xl sm:text-6xl font-black text-zinc-900 tracking-tight leading-[1.05]">
                        {{ articleData.title }}
                    </h1>

                    <div class="flex flex-col sm:flex-row items-center gap-6 justify-center sm:justify-start text-xs font-bold text-zinc-400 uppercase tracking-widest">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-400 overflow-hidden">
                                <span class="text-[10px]">SG</span>
                            </div>
                            <span class="text-zinc-900">{{ articleData.author }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="flex items-center gap-1.5"><Calendar class="w-4 h-4 text-[#36d362]" /> {{ articleData.date }}</span>
                            <span class="flex items-center gap-1.5"><Clock class="w-4 h-4 text-[#36d362]" /> {{ articleData.readTime }}</span>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="relative aspect-video rounded-[40px] overflow-hidden shadow-2xl shadow-green-100">
                    <img 
                        :src="articleData.image" 
                        :alt="articleData.title"
                        class="w-full h-full object-cover"
                    />
                </div>

                <!-- Body Text -->
                <div class="space-y-8 max-w-none">
                    <template v-for="(block, index) in articleData.content" :key="index">
                        <p v-if="block.type === 'p'" class="text-lg text-zinc-600 leading-relaxed font-medium">
                            {{ block.text }}
                        </p>
                        
                        <h2 v-else-if="block.type === 'h2'" class="text-3xl font-black text-zinc-900 pt-6 tracking-tight">
                            {{ block.text }}
                        </h2>
                        
                        <div v-else-if="block.type === 'quote'" class="relative py-10 px-8 sm:px-12 my-12 bg-gray-50 rounded-[32px] border-l-8 border-[#36d362] overflow-hidden">
                            <Quote class="absolute -top-4 -right-4 w-32 h-32 text-gray-200 opacity-50" />
                            <p class="relative z-10 text-2xl font-bold text-zinc-800 italic leading-relaxed">
                                "{{ block.text }}"
                            </p>
                        </div>
                    </template>
                </div>

                <!-- Footer / Tagging -->
                <Separator class="bg-zinc-100" />
                
                <div class="flex flex-col sm:flex-row justify-between gap-8 pt-4">
                    <div class="flex flex-wrap gap-2">
                        <Badge variant="outline" class="rounded-full px-4 border-zinc-200 text-zinc-400 font-bold uppercase text-[9px]">Ramadan</Badge>
                        <Badge variant="outline" class="rounded-full px-4 border-zinc-200 text-zinc-400 font-bold uppercase text-[9px]">Puasa Sehat</Badge>
                        <Badge variant="outline" class="rounded-full px-4 border-zinc-200 text-zinc-400 font-bold uppercase text-[9px]">Nutrisi</Badge>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <span class="text-[10px] font-black uppercase text-zinc-400 tracking-widest">Bagikan:</span>
                        <div class="flex gap-2">
                            <Button variant="ghost" size="icon" class="rounded-full text-zinc-400 hover:text-[#36d362]">
                                <Facebook class="w-4 h-4" />
                            </Button>
                            <Button variant="ghost" size="icon" class="rounded-full text-zinc-400 hover:text-[#36d362]">
                                <Twitter class="w-4 h-4" />
                            </Button>
                            <Button variant="ghost" size="icon" class="rounded-full text-zinc-400 hover:text-[#36d362]">
                                <LinkIcon class="w-4 h-4" />
                            </Button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </GuestLayout>
</template>
