<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle, CardFooter } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { 
    Select, 
    SelectContent, 
    SelectGroup, 
    SelectItem, 
    SelectLabel, 
    SelectTrigger, 
    SelectValue 
} from '@/components/ui/select';
import { Flame, Info, RefreshCcw, User, Activity } from 'lucide-vue-next';

const age = ref<number | null>(null);
const gender = ref('male');
const weight = ref<number | null>(null);
const height = ref<number | null>(null);
const activity = ref('1.2');
const tdeeResult = ref<number | null>(null);

const breadcrumbs = [
    { title: 'Calorie Calculator', href: '/calorie-calculator' },
];

const calculateCalorie = () => {
    if (age.value && weight.value && height.value) {
        let bmr = 0;
        if (gender.value === 'male') {
            bmr = (10 * weight.value) + (6.25 * height.value) - (5 * age.value) + 5;
        } else {
            bmr = (10 * weight.value) + (6.25 * height.value) - (5 * age.value) - 161;
        }
        tdeeResult.value = bmr * parseFloat(activity.value);
    }
};

const reset = () => {
    age.value = null;
    gender.value = 'male';
    weight.value = null;
    height.value = null;
    activity.value = '1.2';
    tdeeResult.value = null;
};

const calorieGoals = computed(() => {
    if (!tdeeResult.value) return [];
    return [
        { label: 'Menurunkan Berat Badan', calories: Math.round(tdeeResult.value - 500), description: 'Defisit 500 kkal untuk penurunan bertahap.', variant: 'secondary' as const },
        { label: 'Menjaga Berat Badan', calories: Math.round(tdeeResult.value), description: 'Kebutuhan energi harian Anda saat ini.', variant: 'default' as const },
        { label: 'Menaikkan Berat Badan', calories: Math.round(tdeeResult.value + 500), description: 'Surplus 500 kkal untuk penambahan berat badan.', variant: 'outline' as const },
    ];
});
</script>

<template>
    <Head title="Calorie Calculator" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-1 flex-col gap-6 p-6 lg:p-8">
            <div class="max-w-3xl mx-auto w-full">
                <Card class="border-none shadow-xl dark:bg-zinc-900/50 backdrop-blur-sm overflow-hidden">
                    <CardHeader class="pb-4">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="p-2 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                                <Flame class="w-6 h-6 text-orange-600 dark:text-orange-400" />
                            </div>
                            <div>
                                <CardTitle class="text-2xl font-bold uppercase tracking-tight">Kalkulator Kalori</CardTitle>
                                <CardDescription>Estimasi kebutuhan energi harian Anda berdasarkan profil fisik dan aktivitas.</CardDescription>
                            </div>
                        </div>
                    </CardHeader>

                    <CardContent class="grid gap-8 p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <Label for="gender" class="text-xs font-bold uppercase text-zinc-500">Jenis Kelamin</Label>
                                <Select v-model="gender">
                                    <SelectTrigger id="gender" class="h-11 border-zinc-200 dark:border-zinc-700">
                                        <SelectValue placeholder="Pilih Gender" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="male">Laki-laki</SelectItem>
                                        <SelectItem value="female">Perempuan</SelectItem>
                                    </SelectContent>
                                </Select>
                            </div>

                            <div class="space-y-2">
                                <Label for="age" class="text-xs font-bold uppercase text-zinc-500">Usia (Tahun)</Label>
                                <Input id="age" type="number" v-model="age" placeholder="Contoh: 25" class="h-11" />
                            </div>

                            <div class="space-y-2">
                                <Label for="weight" class="text-xs font-bold uppercase text-zinc-500">Berat Badan (kg)</Label>
                                <Input id="weight" type="number" v-model="weight" placeholder="Contoh: 65" class="h-11" />
                            </div>

                            <div class="space-y-2">
                                <Label for="height" class="text-xs font-bold uppercase text-zinc-500">Tinggi Badan (cm)</Label>
                                <Input id="height" type="number" v-model="height" placeholder="Contoh: 170" class="h-11" />
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <Label for="activity" class="text-xs font-bold uppercase text-zinc-500">Tingkat Aktivitas</Label>
                                <Select v-model="activity">
                                    <SelectTrigger id="activity" class="h-11 border-zinc-200 dark:border-zinc-700">
                                        <SelectValue placeholder="Pilih Aktivitas" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="1.2">Sangat Jarang Olahraga (Sedentari)</SelectItem>
                                        <SelectItem value="1.375">Jarang Olahraga (1-3 hari/minggu)</SelectItem>
                                        <SelectItem value="1.55">Cukup Olahraga (3-5 hari/minggu)</SelectItem>
                                        <SelectItem value="1.725">Sering Olahraga (6-7 hari/minggu)</SelectItem>
                                        <SelectItem value="1.9">Sangat Sering Olahraga & Pekerjaan Fisik</SelectItem>
                                    </SelectContent>
                                </Select>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <Button @click="calculateCalorie" class="flex-1 h-12 bg-orange-600 hover:bg-orange-700 text-white text-lg font-bold transition-all shadow-lg hover:shadow-orange-500/20">
                                Hitung TDEE
                            </Button>
                            <Button variant="outline" @click="reset" class="h-12 px-6">
                                <RefreshCcw class="w-5 h-5" />
                            </Button>
                        </div>

                        <Transition
                            enter-active-class="transition duration-500 ease-out"
                            enter-from-class="transform translate-y-8 opacity-0"
                            enter-to-class="transform translate-y-0 opacity-100"
                        >
                            <div v-if="tdeeResult" class="mt-4 space-y-6">
                                <div class="p-8 rounded-3xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-2xl relative overflow-hidden group">
                                    <div class="relative z-10 text-center space-y-2">
                                        <p class="text-orange-100 text-sm font-bold uppercase tracking-widest">Kebutuhan Kalori Harian (TDEE)</p>
                                        <div class="text-6xl font-black">
                                            {{ Math.round(tdeeResult) }} <span class="text-2xl opacity-80">kkal</span>
                                        </div>
                                        <p class="text-orange-500 bg-white/90 px-4 py-1.5 rounded-full inline-block text-xs font-black uppercase mt-4">Estimasi Total Harian</p>
                                    </div>
                                    <Activity class="absolute -bottom-6 -right-6 w-32 h-32 text-white/10 transform rotate-12 group-hover:scale-110 transition-transform duration-500" />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <Card v-for="goal in calorieGoals" :key="goal.label" class="border-zinc-100 dark:border-zinc-800 shadow-sm hover:border-orange-200 dark:hover:border-orange-900 transition-colors">
                                        <CardContent class="p-6 text-center space-y-3">
                                            <p class="text-[10px] font-black uppercase text-zinc-400">{{ goal.label }}</p>
                                            <div class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">
                                                {{ goal.calories }} <span class="text-sm font-medium opacity-50">kkal</span>
                                            </div>
                                            <p class="text-[11px] text-zinc-500 leading-tight">{{ goal.description }}</p>
                                        </CardContent>
                                    </Card>
                                </div>
                            </div>
                        </Transition>
                    </CardContent>

                    <CardFooter class="bg-zinc-50/50 dark:bg-zinc-800/30 border-t border-zinc-100 dark:border-zinc-800 p-6">
                        <div class="flex gap-4 text-xs text-zinc-500 dark:text-zinc-400">
                            <Info class="w-5 h-5 shrink-0 text-orange-400" />
                            <div>
                                <p class="font-bold text-zinc-600 dark:text-zinc-300 mb-1">Catatan Penting:</p>
                                <p class="leading-relaxed">Hasil ini dihitung menggunakan rumus Mifflin-St Jeor. Hasil yang diberikan adalah estimasi dan dapat bervariasi berdasarkan metabolisme individu, komposisi tubuh, dan faktor kesehatan lainnya.</p>
                            </div>
                        </div>
                    </CardFooter>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
