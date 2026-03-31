<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { dashboard, login, register, logout } from '@/routes';

import { 
    DropdownMenu, 
    DropdownMenuTrigger, 
    DropdownMenuContent, 
    DropdownMenuItem, 
    DropdownMenuSeparator,
    DropdownMenuLabel,
    DropdownMenuGroup
} from '@/components/ui/dropdown-menu';
import { User, LayoutDashboard, Settings, LogOut, ChevronDown } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';

defineProps<{
    canRegister?: boolean;
}>();

const page = usePage();

const logoutHandle = () => {
    router.post(logout.url());
};
</script>

<template>
    <div class="min-h-screen bg-white font-sans text-gray-900">
        <!-- Navbar -->
        <nav class="flex items-center justify-between px-8 md:px-20 py-5 bg-white fixed w-full top-0 z-[9999] shadow-sm">
            <div class="flex items-center">
                <!-- Logo -->
                <Link href="/" class="text-[28px] font-bold tracking-tight">
                    <span class="text-[#36d362]">Se</span><span class="text-[#ff9d29]">Gizi</span>
                </Link>
            </div>

            <!-- Center Links -->
            <div class="hidden md:flex items-center gap-10 text-[15px] font-semibold text-black">
                <Link href="/" :class="page.url === '/' ? 'text-[#36d362]' : 'hover:text-[#36d362] transition'">Beranda</Link>
                <Link href="/recipes" :class="page.url.startsWith('/recipes') ? 'text-[#36d362]' : 'hover:text-[#36d362] transition'">Menu Makanan</Link>
                <Link href="/bmi-calculator" :class="page.url.startsWith('/bmi-calculator') ? 'text-[#36d362]' : 'hover:text-[#36d362] transition'">Kalkulator</Link>
                <Link href="/articles" :class="page.url.startsWith('/articles') ? 'text-[#36d362]' : 'hover:text-[#36d362] transition'">Artikel</Link>
            </div>

            <!-- Auth Links -->
            <div class="flex items-center gap-6 text-[15px] font-semibold">
                <template v-if="page.props.auth?.user">
                    <DropdownMenu>
                        <DropdownMenuTrigger class="outline-none">
                            <div class="flex items-center gap-3 group px-3 py-1.5 rounded-2xl hover:bg-zinc-50 transition-all border border-transparent hover:border-zinc-100">
                                <div class="text-right hidden sm:block">
                                    <p class="text-[10px] text-zinc-400 font-bold uppercase tracking-widest leading-none mb-1">Akun Saya</p>
                                    <p class="text-sm text-black font-black leading-none group-hover:text-[#36d362] transition-colors">
                                        {{ page.props.auth.user.name }}
                                    </p>
                                </div>
                                <div class="relative">
                                    <div class="w-10 h-10 rounded-full bg-zinc-100 flex items-center justify-center border-2 border-white group-hover:border-[#36d362] transition-all overflow-hidden shadow-sm">
                                        <template v-if="page.props.auth.user.profile_photo_url">
                                            <img :src="page.props.auth.user.profile_photo_url" :alt="page.props.auth.user.name" class="w-full h-full object-cover" />
                                        </template>
                                        <template v-else>
                                            <span class="text-[#36d362] font-black text-sm">
                                                {{ page.props.auth.user.name.charAt(0).toUpperCase() }}
                                            </span>
                                        </template>
                                    </div>
                                    <div class="absolute -bottom-1 -right-1 bg-white rounded-full p-0.5 border border-zinc-100 shadow-sm text-zinc-400 group-hover:text-[#36d362] transition-colors">
                                        <ChevronDown class="w-3 h-3" />
                                    </div>
                                </div>
                            </div>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent class="w-64 mt-2 rounded-[24px] shadow-2xl border-none p-3 bg-white animate-in fade-in zoom-in duration-200" align="end">
                            <DropdownMenuLabel class="px-3 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-[#36d362] font-bold">
                                        {{ page.props.auth.user.name.charAt(0).toUpperCase() }}
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-sm font-black text-zinc-900 leading-none mb-1">{{ page.props.auth.user.name }}</p>
                                        <p class="text-[10px] text-zinc-400 font-bold uppercase tracking-tight">{{ page.props.auth.user.email }}</p>
                                    </div>
                                </div>
                            </DropdownMenuLabel>
                            
                            <DropdownMenuSeparator class="bg-zinc-50 my-2 h-px" />
                            
                            <DropdownMenuGroup class="space-y-1">
                                <DropdownMenuItem @click="router.visit('/')" class="rounded-xl px-4 py-3 gap-3 cursor-pointer group focus:bg-zinc-100 transition-all">
                                    <LayoutDashboard class="w-4 h-4 text-black" />
                                    <span class="font-bold text-sm text-black">Dashboard</span>
                                </DropdownMenuItem>
                                
                                <DropdownMenuItem class="rounded-xl px-4 py-3 gap-3 cursor-pointer group focus:bg-zinc-100 transition-all">
                                    <User class="w-4 h-4 text-black" />
                                    <span class="font-bold text-sm text-black">Profil Saya</span>
                                </DropdownMenuItem>
                                
                                <DropdownMenuItem class="rounded-xl px-4 py-3 gap-3 cursor-pointer group focus:bg-zinc-100 transition-all">
                                    <Settings class="w-4 h-4 text-black" />
                                    <span class="font-bold text-sm text-black">Pengaturan</span>
                                </DropdownMenuItem>
                            </DropdownMenuGroup>
                            
                            <DropdownMenuSeparator class="bg-zinc-50 my-2 h-px" />
                            
                            <DropdownMenuItem @click="logoutHandle" class="rounded-xl px-4 py-3 gap-3 cursor-pointer group focus:bg-red-500 focus:text-white text-red-500 transition-all font-bold">
                                <LogOut class="w-4 h-4" />
                                <span class="text-sm">Keluar</span>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </template>
                <template v-else>
                    <Link :href="login.url()" class="text-black hover:text-[#36d362] transition font-bold">Masuk</Link>
                    <Link :href="register.url()" class="px-7 py-3 text-white bg-[#36d362] rounded-full hover:bg-green-600 hover:shadow-lg hover:shadow-green-100 transition-all font-bold">
                        Daftar
                    </Link>
                </template>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="mt-[80px]">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-[#f0fff4] pt-20 pb-10 px-8 md:px-20 mt-16 font-sans">
            <div class="max-w-[1400px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-green-100 pb-20">
                <div class="space-y-6">
                    <h2 class="text-3xl font-black text-[#36d362]">SeGizi</h2>
                    <p class="text-gray-600 text-sm leading-relaxed font-medium">
                        Makanan untuk hidup, <br> bukan hidup untuk makanan
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-lg text-[#36d362] hover:bg-green-50 transition shadow-sm font-bold text-xs uppercase">IG</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-lg text-[#36d362] hover:bg-green-50 transition shadow-sm font-bold text-xs uppercase">FB</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-lg text-[#36d362] hover:bg-green-50 transition shadow-sm font-bold text-xs uppercase">X</a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="font-bold text-zinc-900 mb-6 text-sm uppercase tracking-widest">Navigasi</h4>
                    <ul class="space-y-4 text-[15px] text-zinc-500 font-medium">
                        <li><Link href="/" class="hover:text-[#36d362] transition-colors">Beranda</Link></li>
                        <li><Link href="/recipes" class="hover:text-[#36d362] transition-colors">Menu Makanan</Link></li>
                        <li><Link href="/bmi-calculator" class="hover:text-[#36d362] transition-colors">Kalkulator</Link></li>
                        <li><Link href="/articles" class="hover:text-[#36d362] transition-colors">Artikel</Link></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-zinc-900 mb-6 text-sm uppercase tracking-widest">Kategori</h4>
                    <ul class="space-y-4 text-[15px] text-zinc-500 font-medium">
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Diet</a></li>
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Protein Tinggi</a></li>
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Kalori Rendah</a></li>
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Gizi Edu</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-zinc-900 mb-6 text-sm uppercase tracking-widest">Support</h4>
                    <ul class="space-y-4 text-[15px] text-zinc-500 font-medium">
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Kontak</a></li>
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Legal</a></li>
                        <li><a href="#" class="hover:text-[#36d362] transition-colors">Tentang</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="max-w-[1400px] mx-auto pt-8 flex flex-col md:flex-row justify-between items-center text-sm font-medium text-zinc-400 gap-4">
                <p>&copy; 2024 SeGizi. Semua Hak Dilindungi.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-zinc-600">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-zinc-600">Syarat & Ketentuan</a>
                </div>
            </div>
        </footer>
    </div>
</template>
