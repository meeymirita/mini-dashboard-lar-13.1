<script setup>
import Sidebar from "@/Pages/components/Sidebar.vue";
</script>

<template>
    <main class="min-h-screen bg-gray-100 flex">
        <!-- SIDEBAR -->
        <Sidebar/>
        <!-- CONTENT -->
        <section class="flex-1 p-8">
            <slot />
        </section>

    </main>
</template>
