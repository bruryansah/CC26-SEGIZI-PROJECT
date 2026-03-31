<!-- resources/js/Layouts/GuestLayout.vue -->
<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    title: String
})
</script>

<template>
    <div class="min-h-screen bg-white font-sans text-gray-800">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <Link href="/" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-leaf text-white text-lg"></i>
                        </div>
                        <span class="text-2xl font-bold text-primary-800">SeGizi</span>
                    </Link>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-8">
                        <Link href="/" class="text-gray-700 hover:text-primary-600 font-medium transition">Beranda</Link>
                        <Link href="/recipes" class="text-gray-700 hover:text-primary-600 font-medium transition">Resep</Link>
                        <Link href="/articles" class="text-gray-700 hover:text-primary-600 font-medium transition">Artikel</Link>
                        <Link href="/calculator/bmi" class="text-gray-700 hover:text-primary-600 font-medium transition">Kalkulator</Link>
                    </div>

                    <!-- Auth Buttons -->
                    <div class="hidden md:flex items-center space-x-4">
                        <Link href="/login" class="text-primary-600 font-medium hover:text-primary-700 transition">Masuk</Link>
                        <Link href="/register" class="bg-primary-600 text-white px-6 py-2.5 rounded-full font-medium hover:bg-primary-700 transition shadow-lg">
                            Daftar
                        </Link>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-700 text-2xl" @click="toggleMobileMenu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-show="mobileMenuOpen" class="md:hidden bg-white/95 backdrop-blur-lg border-t">
                <div class="px-4 py-4 space-y-3">
                    <Link href="/" class="block text-gray-700 py-2 font-medium">Beranda</Link>
                    <Link href="/recipes" class="block text-gray-700 py-2 font-medium">Resep</Link>
                    <Link href="/articles" class="block text-gray-700 py-2 font-medium">Artikel</Link>
                    <Link href="/calculator/bmi" class="block text-gray-700 py-2 font-medium">Kalkulator</Link>
                    <hr class="my-2">
                    <Link href="/login" class="block text-primary-600 font-medium py-2">Masuk</Link>
                    <Link href="/register" class="block bg-primary-600 text-white py-3 rounded-full font-medium text-center">Daftar</Link>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="pt-20">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-12">
                    <!-- Brand -->
                    <div>
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-10 h-10 bg-primary-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-leaf text-white text-lg"></i>
                            </div>
                            <span class="text-2xl font-bold">SeGizi</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6">
                            Aplikasi Healthy Lives & Well-Being untuk Indonesia yang lebih sehat.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Links -->
                    <div>
                        <h4 class="font-bold text-lg mb-4">Fitur</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><Link href="/recipes" class="hover:text-white transition">Resep Sehat</Link></li>
                            <li><Link href="/calculator/bmi" class="hover:text-white transition">Kalkulator BMI</Link></li>
                            <li><Link href="/calculator/calorie" class="hover:text-white transition">Kalori Harian</Link></li>
                            <li><Link href="/articles" class="hover:text-white transition">Artikel</Link></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg mb-4">Perusahaan</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-white transition">Tim CC26</a></li>
                            <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg mb-4">Newsletter</h4>
                        <p class="text-gray-400 text-sm mb-4">Dapatkan tips kesehatan terbaru.</p>
                        <div class="flex">
                            <input type="email" placeholder="Email Anda" class="flex-1 px-4 py-3 bg-gray-800 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-white text-sm">
                            <button class="bg-primary-600 px-4 py-3 rounded-r-lg hover:bg-primary-700 transition">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm">© 2026 SeGizi by CC26 Team. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0 text-sm text-gray-500">
                        <a href="#" class="hover:text-white transition">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            mobileMenuOpen: false
        }
    },
    methods: {
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen
        }
    },
    mounted() {
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar')
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/95', 'backdrop-blur-lg', 'shadow-lg')
            } else {
                navbar.classList.remove('bg-white/95', 'backdrop-blur-lg', 'shadow-lg')
            }
        })
    }
}
</script>
