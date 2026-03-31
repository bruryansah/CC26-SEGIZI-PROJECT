<!-- resources/js/Pages/Home.vue -->
<script setup>
import { Link, Head } from '@inertiajs/vue3'
import GuestLayout from '@/layouts/GuestLayout.vue'

defineOptions({ layout: GuestLayout })

// Data untuk stats
const stats = [
    { value: '500+', label: 'Resep Sehat' },
    { value: '50K+', label: 'Pengguna Aktif' },
    { value: '4.9', label: 'Rating App' }
]

// Data untuk fitur
const features = [
    {
        icon: 'fa-utensils',
        color: 'bg-primary-100 text-primary-600',
        title: 'Resep Bergizi',
        description: 'Koleksi resep sehat dengan informasi nutrisi lengkap dan langkah-langkah mudah diikuti.'
    },
    {
        icon: 'fa-filter',
        color: 'bg-secondary/10 text-secondary',
        title: 'Filter Nutrisi',
        description: 'Cari resep berdasarkan kandungan protein, karbohidrat, lemak, atau kebutuhan diet khusus.'
    },
    {
        icon: 'fa-weight-scale',
        color: 'bg-accent/10 text-accent',
        title: 'Kalkulator BMI',
        description: 'Pantau status berat badan Anda dengan kalkulator BMI yang akurat dan interpretasi hasil.'
    },
    {
        icon: 'fa-fire',
        color: 'bg-yellow-100 text-yellow-600',
        title: 'Kalori Harian',
        description: 'Estimasi kebutuhan kalori personal berdasarkan usia, berat, tinggi, dan tingkat aktivitas.'
    }
]

// Data untuk resep populer
const recipes = [
    {
        id: 1,
        title: 'Buddha Bowl Quinoa',
        image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&h=300&fit=crop',
        calories: 450,
        time: '20 menit',
        rating: 4.8,
        tags: ['Vegan', 'High Fiber'],
        description: 'Quinoa, alpukat, edamame, dan sayuran segar dengan dressing tahini.'
    },
    {
        id: 2,
        title: 'Salmon Panggang Lemon',
        image: 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=500&h=300&fit=crop',
        calories: 380,
        time: '30 menit',
        rating: 4.9,
        tags: ['High Protein', 'Keto'],
        description: 'Salmon segar dengan bumbu lemon dan dill, disajikan dengan asparagus.'
    },
    {
        id: 3,
        title: 'Smoothie Bowl Berry',
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&h=300&fit=crop',
        calories: 280,
        time: '10 menit',
        rating: 4.7,
        tags: ['Breakfast', 'Low Fat'],
        description: 'Smoothie blueberry dengan topping granola, chia seed, dan buah segar.'
    }
]

// Data untuk artikel
const articles = [
    {
        category: 'Nutrisi',
        categoryColor: 'bg-primary-100 text-primary-700',
        readTime: '5 menit',
        title: '5 Nutrisi Esensial yang Sering Diabaikan',
        description: 'Kenali nutrisi penting yang mungkin kurang dari pola makan harian Anda.',
        image: 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?w=500&h=250&fit=crop'
    },
    {
        category: 'Olahraga',
        categoryColor: 'bg-secondary/10 text-secondary',
        readTime: '8 menit',
        title: 'Panduan Lengkap untuk Pemula: HIIT vs Steady Cardio',
        description: 'Mana yang lebih baik untuk membakar lemak? Pelajari perbedaannya.',
        image: 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=500&h=250&fit=crop'
    },
    {
        category: 'Gaya Hidup',
        categoryColor: 'bg-accent/10 text-accent',
        readTime: '6 menit',
        title: 'Mindful Eating: Teknik Makan dengan Penuh Perhatian',
        description: 'Ubahlah hubungan Anda dengan makanan melalui praktik mindful eating.',
        image: 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?w=500&h=250&fit=crop'
    }
]
</script>

<template>
    <Head title="SeGizi - Aplikasi Healthy Lives & Well-Being" />

    <!-- Hero Section -->
    <section class="relative min-h-screen gradient-hero flex items-center pt-20 overflow-hidden">
        <!-- Background Blobs -->
        <div class="blob bg-primary-300 w-96 h-96 rounded-full top-20 -left-20"></div>
        <div class="blob bg-secondary w-80 h-80 rounded-full bottom-20 -right-20"></div>
        <div class="blob bg-accent w-64 h-64 rounded-full top-1/2 left-1/3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center space-x-2 bg-white/80 backdrop-blur px-4 py-2 rounded-full mb-6 shadow-sm">
                        <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium text-gray-700">SDGs Goal 3: Healthy Lives & Well-Being</span>
                    </div>

                    <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 leading-tight mb-6">
                        Hidup Sehat <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary">
                            Mulai dari Gizi
                        </span>
                    </h1>

                    <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Temukan resep bergizi, hitung kebutuhan kalori harian, dan monitor kesehatan Anda dengan mudah.
                        SeGizi - teman setia untuk gaya hidup sehat Anda.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <Link href="/recipes" class="bg-primary-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-primary-700 transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center space-x-2">
                            <span>Jelajahi Resep</span>
                            <i class="fas fa-arrow-right"></i>
                        </Link>
                        <Link href="/calculator/bmi" class="bg-white text-gray-800 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-50 transition shadow-lg hover:shadow-xl border border-gray-200 flex items-center justify-center space-x-2">
                            <i class="fas fa-calculator text-primary-600"></i>
                            <span>Hitung BMI</span>
                        </Link>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 mt-12 pt-8 border-t border-gray-200/50">
                        <div v-for="stat in stats" :key="stat.label">
                            <div class="text-3xl font-bold text-primary-600">{{ stat.value }}</div>
                            <div class="text-sm text-gray-600 mt-1">{{ stat.label }}</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Image/Illustration -->
                <div class="relative">
                    <div class="relative floating">
                        <div class="bg-white rounded-3xl shadow-2xl p-6 max-w-md mx-auto">
                            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&h=400&fit=crop"
                                 alt="Healthy Food"
                                 class="w-full h-64 object-cover rounded-2xl mb-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-900">Salad Quinoa</h3>
                                    <p class="text-sm text-gray-500">320 kalori • 15g protein</p>
                                </div>
                                <div class="flex space-x-1">
                                    <i v-for="n in 5" :key="n" class="fas fa-star text-yellow-400"></i>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-4">
                                <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-xs font-medium">Vegan</span>
                                <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-xs font-medium">High Protein</span>
                                <span class="bg-accent/10 text-accent px-3 py-1 rounded-full text-xs font-medium">Gluten Free</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Cards -->
                    <div class="absolute -top-8 -right-8 bg-white rounded-2xl shadow-xl p-4 floating-delayed">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-calculator text-primary-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">BMI Calculator</p>
                                <p class="font-bold text-gray-900">Normal Range</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-4 -left-8 bg-white rounded-2xl shadow-xl p-4 floating">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-fire text-accent text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Kalori Harian</p>
                                <p class="font-bold text-gray-900">2,200 kcal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-primary-600 text-2xl"></i>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Fitur Utama</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Semua yang Anda butuhkan untuk memulai gaya hidup sehat dalam satu aplikasi
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div v-for="feature in features" :key="feature.title"
                     class="glass-card rounded-3xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div :class="['w-16 h-16 rounded-2xl flex items-center justify-center mb-6', feature.color]">
                        <i :class="['fas text-2xl', feature.icon]"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ feature.title }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ feature.description }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Calculator Preview Section -->
    <section class="py-24 bg-gradient-to-br from-primary-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">
                        Hitung Kesehatan Anda <br>
                        <span class="text-primary-600">dalam Hitungan Detik</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Gunakan kalkulator BMI dan kebutuhan kalori kami untuk mengetahui status kesehatan Anda
                        dan merencanakan pola makan yang ideal.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-primary-600 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Perhitungan Akurat</h4>
                                <p class="text-gray-600">Berdasarkan standar WHO dan Harris-Benedict equation</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-primary-600 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Rekomendasi Personal</h4>
                                <p class="text-gray-600">Dapatkan saran nutrisi yang disesuaikan dengan hasil Anda</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-primary-600 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Riwayat Tracking</h4>
                                <p class="text-gray-600">Simpan dan pantau perkembangan BMI Anda dari waktu ke waktu</p>
                            </div>
                        </div>
                    </div>

                    <Link href="/calculator/bmi" class="inline-block mt-10 bg-primary-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-primary-700 transition shadow-lg hover:shadow-xl">
                        Coba Kalkulator
                    </Link>
                </div>

                <!-- Calculator Card Preview -->
                <div class="bg-white rounded-3xl shadow-2xl p-8">
                    <div class="flex space-x-4 mb-6">
                        <button class="flex-1 py-3 rounded-xl bg-primary-600 text-white font-medium">BMI Calculator</button>
                        <button class="flex-1 py-3 rounded-xl bg-gray-100 text-gray-600 font-medium">Kalori Harian</button>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Berat Badan (kg)</label>
                            <input type="number" placeholder="70" disabled
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tinggi Badan (cm)</label>
                            <input type="number" placeholder="175" disabled
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-500">
                        </div>

                        <div class="p-4 bg-primary-50 rounded-xl border border-primary-100 mt-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">BMI Preview</p>
                                    <p class="text-3xl font-bold text-primary-600">22.9</p>
                                </div>
                                <div class="text-right">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Normal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recipes Preview Section -->
    <section id="resep" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">Resep Populer</h2>
                    <p class="text-gray-600">Temukan resep sehat yang paling banyak disukai</p>
                </div>
                <Link href="/recipes" class="mt-4 md:mt-0 text-primary-600 font-semibold flex items-center space-x-2 hover:text-primary-700 transition">
                    <span>Lihat Semua Resep</span>
                    <i class="fas fa-arrow-right"></i>
                </Link>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="recipe in recipes" :key="recipe.id"
                     class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img :src="recipe.image" :alt="recipe.title"
                             class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 left-4 flex gap-2">
                            <span v-for="tag in recipe.tags" :key="tag"
                                  class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-medium text-primary-700">
                                {{ tag }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold text-gray-900">{{ recipe.title }}</h3>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <span class="text-sm font-medium text-gray-700">{{ recipe.rating }}</span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">{{ recipe.description }}</p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                <span><i class="fas fa-clock mr-1"></i> {{ recipe.time }}</span>
                                <span><i class="fas fa-fire mr-1"></i> {{ recipe.calories }} kcal</span>
                            </div>
                            <Link :href="`/recipes/${recipe.id}`" class="text-primary-600 font-medium text-sm hover:text-primary-700">
                                Lihat Detail
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section id="artikel" class="py-24 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Artikel Edukasi</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Pelajari tips dan pengetahuan seputar gaya hidup sehat dari para ahli
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <article v-for="article in articles" :key="article.title"
                         class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                    <img :src="article.image" :alt="article.title" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-3">
                            <span :class="['px-2 py-1 rounded text-xs font-medium', article.categoryColor]">{{ article.category }}</span>
                            <span>• {{ article.readTime }} baca</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-primary-600 transition cursor-pointer">
                            {{ article.title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ article.description }}</p>
                        <Link href="/articles" class="text-primary-600 font-medium text-sm flex items-center space-x-1 hover:text-primary-700 transition">
                            <span>Baca Selengkapnya</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </Link>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-primary-600 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full"
                 style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Mulai Perjalanan Sehat Anda Hari Ini
            </h2>
            <p class="text-xl text-primary-100 mb-10 max-w-2xl mx-auto">
                Bergabung dengan 50,000+ pengguna yang telah mengubah gaya hidup mereka bersama SeGizi
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <Link href="/register" class="bg-white text-primary-600 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-xl transform hover:-translate-y-1">
                    Daftar Gratis
                </Link>
                <Link href="/recipes" class="bg-primary-700 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-primary-800 transition border-2 border-primary-500">
                    Jelajahi Resep
                </Link>
            </div>
        </div>
    </section>
</template>

<style scoped>
.gradient-hero {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
}
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}
.floating {
    animation: float 6s ease-in-out infinite;
}
.floating-delayed {
    animation: float 6s ease-in-out infinite;
    animation-delay: 3s;
}
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
.blob {
    position: absolute;
    filter: blur(40px);
    opacity: 0.4;
    z-index: 0;
}
</style>
