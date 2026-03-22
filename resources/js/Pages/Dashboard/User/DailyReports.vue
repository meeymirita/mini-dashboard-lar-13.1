<script setup>
import UserLayout from "@/Pages/Layout/UserLayout.vue";
import TablePagination from "@/Pages/components/TablePagination.vue";

const props = defineProps({
    reviews : { type: Object, required: true }
})

</script>

<template>
    <UserLayout :status="false">
        <TablePagination :reviews />
    </UserLayout>
</template>

<style scoped>

</style>
