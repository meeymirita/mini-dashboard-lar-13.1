<script setup>
import Pagination from "@/Pages/components/Pagination.vue";
import TableHeader from "@/Pages/components/TableHeader.vue";
import TableTemplate from "@/Pages/components/TableTemplate.vue";

const props = defineProps({
    reviews: {
        type: Object,
        required: true
    }
})
</script>
<template>
    <div class="overflow-x-auto overflow-y-visible">
        <TableHeader/>
        <!-- TABLE -->
        <TableTemplate :reviews="reviews"/>
        <!-- PAGINATION -->
        <Pagination :reviews="reviews" />
    </div>
</template>
<style scoped>

</style>
