<script setup>
import Sidebar from "@/Pages/components/Sidebar.vue";
import BackgroundImage from "@/Pages/components/BackgroundImage.vue";

const props = defineProps({
    status: Boolean
})
</script>

<template>
    <main class="min-h-screen bg-gray-100 flex">
        <!-- SIDEBAR -->
        <Sidebar/>
        <!-- CONTENT -->
        <section class="flex-1">
            <BackgroundImage :status="props.status">
                <slot/>
            </BackgroundImage>
        </section>

    </main>
</template>
