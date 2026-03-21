<script setup>
import useAuth from "@/composables/useAuth.js";
import UserLayout from "@/Pages/Layout/UserLayout.vue";
const { user }  = useAuth()
</script>

<template>
    <UserLayout>
        <h1>User</h1>
        <pre>
        {{user}}
        </pre>
    </UserLayout>
</template>

<style scoped>

</style>
