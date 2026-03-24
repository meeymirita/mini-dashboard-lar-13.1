<script setup>
const props = defineProps({
    reviews: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="flex items-center justify-between px-6 py-4 border-t bg-white/60">

        <p class="text-sm text-gray-500">
            Showing {{ reviews.from }} — {{ reviews.to }}
        </p>

        <div class="flex gap-2">
            <button
                v-for="link in reviews.links"
                :key="link.label"
                v-html="link.label"
                class="px-3 py-1 rounded-lg text-sm border transition"
                :class="[
                        link.active
                            ? 'bg-red-600 text-white border-red-600'
                            : 'bg-white hover:bg-red-50'
                    ]"
            />
        </div>

    </div>
</template>

<style scoped>

</style>
