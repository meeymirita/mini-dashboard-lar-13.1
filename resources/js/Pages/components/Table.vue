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
    <div class="bg-white/80 backdrop-blur-xl rounded-xl shadow-md border border-gray-200 overflow-hidden max-w-[1600px]" >
        <!-- HEADER -->
        <TableHeader/>
        <!-- TABLE -->
        <TableTemplate :reviews="reviews"/>
        <!-- PAGINATION -->
        <Pagination :reviews="reviews" />
    </div>
</template>
<style scoped>

</style>
