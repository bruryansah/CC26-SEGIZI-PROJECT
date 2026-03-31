<script setup lang="ts">
import { Head, useForm, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Spinner } from '@/components/ui/spinner';

defineProps<{
    status?: string;
}>();

const form = useForm({});

const submit = () => {
    form.post('/email/verification-notification');
};
</script>

<template>
    <Head title="Email Verification" />

    <div class="min-h-screen flex items-center justify-center bg-white font-sans">
        <div class="w-full max-w-[400px] p-8 text-center space-y-6">
            <h1 class="text-3xl font-extrabold text-black">Verifikasi Email</h1>
            <p class="text-gray-600">
                Silakan verifikasi email kamu dengan mengklik link yang sudah kami kirimkan.
            </p>

            <div v-if="status === 'verification-link-sent'" class="text-sm font-medium text-green-600">
                Link verifikasi baru sudah dikirimkan ke email kamu.
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <Button type="submit" :disabled="form.processing" class="w-full bg-[#36d362] hover:bg-green-500 text-white font-bold py-3 rounded-xl">
                    <Spinner v-if="form.processing" />
                    Kirim Ulang Email Verifikasi
                </Button>
            </form>

            <Link href="/logout" method="post" as="button"
                class="text-sm text-gray-500 hover:text-green-500 transition">
                Log out
            </Link>
        </div>
    </div>
</template>

