<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="p-4 border-t border-red-800">
        <Link
            method="post"
            href="/user/logout"
            as="button"
            class="w-full bg-red-600 hover:bg-red-700
                    py-2 rounded-lg font-semibold transition"
        >
            Logout
        </Link>
    </div>
</template>

<style scoped>

</style>
