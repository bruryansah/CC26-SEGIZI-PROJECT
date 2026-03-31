<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle, CardFooter } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Scale, Info, RefreshCcw } from 'lucide-vue-next';

const height = ref<number>();
const weight = ref<number>();
const bmiResult = ref<number | null>(null);

const calculateBMI = () => {
    if (height.value && weight.value) {
        const heightInMeters = height.value / 100;
        bmiResult.value = weight.value / (heightInMeters * heightInMeters);
    }
};

const reset = () => {
    height.value = undefined;
    weight.value = undefined;
    bmiResult.value = null;
};

const bmiCategory = computed(() => {
    if (!bmiResult.value) return null;
    if (bmiResult.value < 18.5) return { label: 'Kekurangan Berat Badan', description: 'Anda berada dalam kategori berat badan kurang. Pastikan asupan nutrisi Anda tercukupi.', color: 'text-blue-500', variant: 'secondary' as const };
    if (bmiResult.value < 25) return { label: 'Berat Badan Normal', description: 'Selamat! Berat badan Anda ideal. Pertahankan pola makan dan aktivitas fisik Anda.', color: 'text-green-500', variant: 'default' as const };
    if (bmiResult.value < 30) return { label: 'Kelebihan Berat Badan', description: 'Anda berada dalam kategori pra-obesitas. Perhatikan pola makan dan tingkatkan aktivitas fisik.', color: 'text-yellow-500', variant: 'outline' as const };
    return { label: 'Obesitas', description: 'Anda berada dalam kategori obesitas. Sangat disarankan untuk berkonsultasi dengan ahli gizi.', color: 'text-red-500', variant: 'destructive' as const };
});
</script>

<template>
    <Head title="Kalkulator BMI" />

    <GuestLayout>
        <div class="flex flex-1 flex-col gap-6 p-6 lg:p-20 bg-white min-h-screen">
            <div class="max-w-2xl mx-auto w-full">
                <Card class="border border-gray-100 shadow-xl bg-white rounded-[24px] overflow-hidden">
                    <CardHeader class="pb-8">
                        <div class="flex items-center gap-4 mb-2">
                            <div class="p-3 bg-[#36d362]/10 rounded-2xl">
                                <Scale class="w-8 h-8 text-[#36d362]" />
                            </div>
                            <div>
                                <CardTitle class="text-2xl font-black text-black">Kalkulator BMI</CardTitle>
                                <CardDescription class="text-zinc-500 font-medium mt-1">Hitung Body Mass Index (BMI) Anda untuk mengetahui status gizi.</CardDescription>
                            </div>
                        </div>
                    </CardHeader>

                    <CardContent class="grid gap-8 p-8 pt-0">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-3">
                                <Label for="height" class="text-[15px] font-bold text-black">Tinggi Badan (cm)</Label>
                                <Input 
                                    id="height" 
                                    type="number" 
                                    v-model="height" 
                                    placeholder="Contoh: 170" 
                                    class="h-12 bg-gray-50 border-zinc-200 rounded-xl focus:ring-[#36d362] focus:border-[#36d362]"
                                />
                            </div>
                            <div class="space-y-3">
                                <Label for="weight" class="text-[15px] font-bold text-black">Berat Badan (kg)</Label>
                                <Input 
                                    id="weight" 
                                    type="number" 
                                    v-model="weight" 
                                    placeholder="Contoh: 65" 
                                    class="h-12 bg-gray-50 border-zinc-200 rounded-xl focus:ring-[#36d362] focus:border-[#36d362]"
                                />
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <Button @click="calculateBMI" class="flex-1 h-12 bg-[#36d362] hover:bg-green-600 text-white font-bold rounded-xl shadow-lg shadow-green-100 transition-all text-[15px]">
                                Hitung Sekarang
                            </Button>
                            <Button variant="outline" @click="reset" class="h-12 w-12 p-0 border-zinc-200 rounded-xl hover:bg-gray-50">
                                <RefreshCcw class="w-5 h-5 text-gray-500" />
                            </Button>
                        </div>

                        <Transition
                            enter-active-class="transition duration-300 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                        >
                            <div v-if="bmiResult" class="mt-4 p-8 rounded-[24px] bg-[#EAFBF0] border border-green-100">
                                <div class="text-center space-y-5">
                                    <p class="text-[12px] font-bold text-green-600 uppercase tracking-widest">Hasil BMI Anda</p>
                                    <div class="text-6xl font-black text-black">
                                        {{ bmiResult.toFixed(1) }}
                                    </div>
                                    <div class="flex justify-center">
                                        <Badge class="px-6 py-2 text-[13px] font-black rounded-full uppercase" :class="bmiCategory?.color">
                                            {{ bmiCategory?.label }}
                                        </Badge>
                                    </div>
                                    <p class="text-gray-600 font-medium leading-relaxed max-w-sm mx-auto">
                                        {{ bmiCategory?.description }}
                                    </p>
                                </div>
                            </div>
                        </Transition>
                    </CardContent>

                    <CardFooter class="bg-gray-50 border-t border-gray-100 p-8 rounded-b-[24px]">
                        <div class="flex gap-4 text-[13px] text-zinc-500 leading-relaxed font-medium">
                            <Info class="w-6 h-6 shrink-0 text-[#36d362]" />
                            <p>BMI adalah estimasi lemak tubuh berdasarkan tinggi dan berat badan. BMI tidak mempertimbangkan massa otot atau distribusi lemak secara spesifik.</p>
                        </div>
                    </CardFooter>
                </Card>
            </div>
        </div>
    </GuestLayout>
</template>
