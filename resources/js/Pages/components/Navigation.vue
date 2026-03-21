<script setup>
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
function linkClass(path, exact = false) {
    const isActive = exact
        ? page.url === path
        : page.url.startsWith(path);
    return [
        "flex items-center gap-3 px-4 py-3 rounded-lg transition",
        isActive
            ? "bg-red-700 text-white"
            : "hover:bg-red-800 text-red-100"
    ];
}
</script>

<template>
    <nav class="flex-1 p-4 space-y-2">
        <Link href="/user" :class="linkClass('/user', true)">
            <span>🏠</span>
            <span>Главная</span>
        </Link>
        <Link href="/user/daily-reports" :class="linkClass('/user/daily-reports')">
            <span>📝</span>
            <span>Ежедневные отчёты</span>
        </Link>
        <Link href="/user/weekly-reports" :class="linkClass('/user/weekly-reports')">
            <span>📊</span>
            <span>Недельные отчёты</span>
        </Link>
        <Link href="/user/profile" :class="linkClass('/profile')">
            <span>👤</span>
            <span>Профиль</span>
        </Link>
    </nav>
</template>

