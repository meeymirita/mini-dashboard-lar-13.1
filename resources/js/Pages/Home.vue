<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: '',
    password: ''
});
const submit = () => {
    console.log('form submitted');
    form.post('/login', {
        onSuccess: () => {
            console.log('Logged!');
        },
        onError: (errors) => {
            console.log(errors);
        }
    });
};
</script>

<template>
    <!-- BACKGROUND -->
    <div
        class="min-h-screen flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://img.freepik.com/premium-photo/abstract-background-design-hd-light-turkish-red-color_851755-114482.jpg?semt=ais_hybrid&w=740');"
    >
<!--        style="background-image: url('https://avatars.mds.yandex.net/i?id=5718ae59c3611e8e823519eee210c1b0_l-5372116-images-thumbs&ref=rim&n=13&w=1920&h=1080');"-->
        <!--        style="background-image: url('https://img.freepik.com/premium-photo/abstract-background-design-hd-light-turkish-red-color_851755-114482.jpg?semt=ais_hybrid&w=740');"-->
        <!-- overlay -->
        <div class="absolute inset-0 bg-red-900/60"></div>

        <!-- FORM CARD -->
        <div class="relative w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8">

            <h2 class="text-3xl font-bold text-center text-red-600 mb-8">
                Login
            </h2>

            <form @submit.prevent="submit" class="space-y-6">

                <!-- EMAIL -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="example@email.com"
                        class="w-full px-4 py-3 rounded-lg border
                        focus:outline-none focus:ring-2 focus:ring-red-500
                        transition"
                        :class="form.errors.email ? 'border-red-500' : 'border-gray-300'"
                    />

                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">
                        {{ form.errors.email }}
                    </p>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        v-model="form.password"
                        type="password"
                        placeholder="********"
                        class="w-full px-4 py-3 rounded-lg border
                        focus:outline-none focus:ring-2 focus:ring-red-500
                        transition"
                        :class="form.errors.password ? 'border-red-500' : 'border-gray-300'"
                    />

                    <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                        {{ form.errors.password }}
                    </p>
                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-red-600 hover:bg-red-700
                    text-white font-semibold py-3 rounded-lg
                    transition duration-200
                    disabled:opacity-50"
                >
                    {{ form.processing ? 'Loading...' : 'Sign In' }}
                </button>

            </form>
        </div>
    </div>
</template>
