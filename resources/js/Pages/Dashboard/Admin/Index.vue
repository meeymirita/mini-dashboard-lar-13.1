<script setup>
import useAuth from "@/composables/useAuth.js";
const { user } = useAuth()
</script>

<template>
    <h1>Admin</h1>
    <pre>
        {{user}}
    </pre>
</template>

<style scoped>

</style>
