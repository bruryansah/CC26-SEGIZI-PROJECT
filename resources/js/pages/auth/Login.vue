<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Spinner } from '@/components/ui/spinner';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import { ref } from 'vue';

defineProps<{
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
}>();

const showPassword = ref(false);
const togglePassword = () => {
    showPassword.value = !showPassword.value;
};
</script>

<template>
    <Head title="Masuk" />

    <div class="auth-container">
        <!-- Left Side - Login Form -->
        <div class="auth-form-section">
            <div class="auth-form-wrapper">
                <h1 class="auth-title">Masuk</h1>

                <div v-if="status" class="status-message">
                    {{ status }}
                </div>

                <Form
                    v-bind="store.form()"
                    :reset-on-success="['password']"
                    v-slot="{ errors, processing }"
                    class="auth-form"
                >
                    <!-- Username Input -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <Input
                                id="username"
                                type="text"
                                name="username"
                                required
                                autofocus
                                :tabindex="1"
                                autocomplete="username"
                                placeholder="Username"
                                class="auth-input"
                                :class="{ 'is-invalid': errors.username }"
                            />
                            <span class="input-icon">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <InputError :message="errors.username" />
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <Input
                                id="password"
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                required
                                :tabindex="2"
                                autocomplete="current-password"
                                placeholder="Password"
                                class="auth-input"
                                :class="{ 'is-invalid': errors.password }"
                            />
                            <button type="button" @click="togglePassword" class="password-toggle" tabindex="-1">
                                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-lock'"></i>
                            </button>
                        </div>
                        <InputError :message="errors.password" />
                    </div>

                    <!-- Forgot Password -->
                    <div class="forgot-password">
                        <TextLink
                            v-if="canResetPassword"
                            :href="request()"
                            class="forgot-link"
                            :tabindex="3"
                        >
                            Lupa Password?
                        </TextLink>
                    </div>

                    <!-- Submit Button -->
                    <Button type="submit" class="auth-submit-btn" :tabindex="4" :disabled="processing">
                        <Spinner v-if="processing" />
                        <span v-else>Masuk</span>
                    </Button>

                    <!-- Social Login -->
                    <div class="social-section">
                        <p class="social-text">atau login dengan sosial media</p>
                        <div class="social-buttons">
                            <button type="button" class="social-btn" aria-label="Google">
                                <i class="fab fa-google"></i>
                            </button>
                            <button type="button" class="social-btn" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="social-btn" aria-label="GitHub">
                                <i class="fab fa-github"></i>
                            </button>
                            <button type="button" class="social-btn" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>
                    </div>
                </Form>
            </div>
        </div>

        <!-- Right Side - Welcome Panel -->
        <div class="welcome-panel">
            <div class="deco-circle circle-1"></div>
            <div class="deco-circle circle-2"></div>
            
            <div class="welcome-content">
                <h2 class="welcome-title">Halo, Selamat Datang!</h2>
                <p class="welcome-text">Belum punya akun?</p>
                
                <TextLink
                    v-if="canRegister"
                    :href="register()"
                    class="welcome-btn"
                >
                    Daftar
                </TextLink>
            </div>
        </div>
    </div>
</template>