<script setup>
import UserLayout from "@/Pages/Layout/UserLayout.vue";
import Table from "@/Pages/components/Table.vue";

const props = defineProps({
    reviews : { type: Object, required: true }
})

</script>

<template>
    <UserLayout :status="false">
        <Table :reviews />
    </UserLayout>
</template>

<style scoped>

</style>
