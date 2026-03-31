<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { Spinner } from '@/components/ui/spinner';
import { login } from '@/routes';
import { store } from '@/routes/register';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(store.url(), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <div class="min-h-screen bg-white flex text-gray-900 font-sans">
        <!-- Left Side (Form) -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 lg:p-24 relative">
            <div class="w-full max-w-[400px]">
                <h1 class="text-5xl font-black text-center text-black mb-12">Daftar</h1>

                <form @submit.prevent="submit" class="flex flex-col gap-6">
                    <!-- Username Field -->
                    <div>
                        <div class="relative flex items-center">
                            <input 
                                id="name" 
                                type="text" 
                                v-model="form.name"
                                name="name" 
                                required 
                                autofocus 
                                tabindex="1" 
                                autocomplete="name" 
                                placeholder="Username"
                                class="w-full bg-[#f3f4f6] border border-transparent rounded-[12px] px-5 py-4 text-sm focus:bg-white focus:border-[#36d362] focus:ring-2 focus:ring-green-100 transition-all placeholder:text-gray-400"
                            />
                            <div class="absolute right-4 text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <!-- Email Field -->
                    <div>
                        <div class="relative flex items-center">
                            <input 
                                id="email" 
                                type="email" 
                                v-model="form.email"
                                name="email" 
                                required 
                                tabindex="2" 
                                autocomplete="email" 
                                placeholder="Email"
                                class="w-full bg-[#f3f4f6] border border-transparent rounded-[12px] px-5 py-4 text-sm focus:bg-white focus:border-[#36d362] focus:ring-2 focus:ring-green-100 transition-all placeholder:text-gray-400"
                            />
                            <div class="absolute right-4 text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="relative flex items-center">
                            <input 
                                id="password" 
                                type="password" 
                                v-model="form.password"
                                name="password" 
                                required 
                                tabindex="3" 
                                autocomplete="new-password" 
                                placeholder="Password"
                                class="w-full bg-[#f3f4f6] border border-transparent rounded-[12px] px-5 py-4 text-sm focus:bg-white focus:border-[#36d362] focus:ring-2 focus:ring-green-100 transition-all placeholder:text-gray-400"
                            />
                            <div class="absolute right-4 text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <div class="relative flex items-center">
                            <input 
                                id="password_confirmation" 
                                type="password" 
                                v-model="form.password_confirmation"
                                name="password_confirmation" 
                                required 
                                tabindex="4" 
                                autocomplete="new-password" 
                                placeholder="Konfirmasi Password"
                                class="w-full bg-[#f3f4f6] border border-transparent rounded-[12px] px-5 py-4 text-sm focus:bg-white focus:border-[#36d362] focus:ring-2 focus:ring-green-100 transition-all placeholder:text-gray-400"
                            />
                            <div class="absolute right-4 text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                            </div>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-[#36d362] text-white font-bold text-lg rounded-[12px] py-3.5 hover:bg-green-600 transition shadow-sm flex items-center justify-center gap-2 mt-2"
                        :disabled="form.processing"
                    >
                        <Spinner v-if="form.processing" />
                        Daftar
                    </button>

                    <!-- Social Logins -->
                    <div class="text-center mt-2">
                        <p class="text-[13px] text-black mb-4 font-medium">atau login dengan sosial media</p>
                        <div class="flex justify-center gap-4">
                            <button type="button" class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50 transition text-black font-bold shadow-sm">G</button>
                            <button type="button" class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50 transition text-black font-bold shadow-sm">f</button>
                            <button type="button" class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50 transition text-black font-bold shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0012 2z"/></svg>
                            </button>
                            <button type="button" class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50 transition text-black font-bold shadow-sm">in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side (Green Banner) -->
        <div class="hidden lg:flex w-1/2 bg-[#36d362] rounded-l-[100px] flex-col items-center justify-center text-white p-12 text-center my-[-20px]">
            <h2 class="text-5xl font-black mb-6">Selamat Datang!</h2>
            <p class="text-lg mb-8 font-medium">Sudah punya akun?</p>
            <Link :href="login.url()" class="border-2 border-white px-14 py-3 rounded-xl font-bold text-lg hover:bg-white hover:text-[#36d362] transition shadow-md">
                Masuk
            </Link>
        </div>
    </div>
</template>
