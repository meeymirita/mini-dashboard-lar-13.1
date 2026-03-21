<script setup>

import Dashboard from "@/Pages/components/Dashboard.vue";
import Navigation from "@/Pages/components/Navigation.vue";
import Logout from "@/Pages/components/Logout.vue";
</script>

<template>
    <aside class="w-64 bg-red-900 text-white flex flex-col shadow-xl">
        <!-- LOGO -->
        <Dashboard/>
        <!-- NAV -->
        <Navigation/>
        <!-- LOGOUT -->
        <Logout/>
    </aside>
</template>

<style scoped>

</style>
