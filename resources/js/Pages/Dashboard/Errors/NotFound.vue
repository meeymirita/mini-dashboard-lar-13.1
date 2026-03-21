<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="min-h-screen flex flex-col items-center justify-center text-white relative overflow-hidden"
        style="background-image: url('https://avatars.mds.yandex.net/i?id=5718ae59c3611e8e823519eee210c1b0_l-5372116-images-thumbs&ref=rim&n=13&w=1920&h=1080'); background-size: cover; background-position: center;"
    >
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
        <div
            class="relative z-10 text-center animate-fade-in"
        >
            <h1
                class="text-7xl font-extrabold text-red-600 drop-shadow-[0_0_25px_rgba(220,38,38,0.8)] animate-pulse"
            >
                404
            </h1>
            <p class="mt-6 text-2xl font-semibold text-red-400">
                Ой... ты попал не в тот аниме-эпизод 👀
            </p>
            <p class="mt-2 text-gray-300">
                Эта страница исчезла как главный герой после опенинга...
            </p>
            <Link
                href="/home"
                class="inline-block mt-8 px-8 py-3 bg-red-600 rounded-xl
                       hover:bg-red-700 transition-all duration-300
                       shadow-lg shadow-red-600/40 hover:scale-105"
            >
                ⛩ Вернуться на главную
            </Link>
        </div>
        <div
            class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-red-900/40 to-transparent"
        ></div>
    </div>
</template>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out;
}
</style>
