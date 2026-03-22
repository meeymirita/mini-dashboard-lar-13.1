<script setup>
const props = defineProps({
    reviews: {
        type: Object,
        required: true
    }
})
</script>
<template>
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl border border-gray-200 overflow-hidden">
        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b bg-white/60">
            <h2 class="text-xl font-semibold text-gray-800">
                Daily Reports
            </h2>
            <button
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition"
            >
                + Add report
            </button>
        </div>
        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <thead class="bg-red-50 text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Description</th>
                    <th class="px-6 py-4">Time</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
                </thead>

                <tbody class="divide-y">

                <tr
                    v-for="review in reviews.data"
                    :key="review.id"
                    class="hover:bg-red-50/40 transition"
                >
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        {{ review.title }}
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        {{ review.description }}
                    </td>

                    <td class="px-6 py-4 text-gray-500">
                        {{ review.time }}
                    </td>

                    <td class="px-6 py-4 text-right space-x-2">

                        <button
                            class="px-3 py-1.5 text-xs font-medium
                            bg-red-100 text-red-600
                            rounded-lg hover:bg-red-200 transition"
                        >
                            Edit
                        </button>

                        <button
                            class="px-3 py-1.5 text-xs font-medium
                            bg-gray-100 text-gray-600
                            rounded-lg hover:bg-gray-200 transition"
                        >
                            Delete
                        </button>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- PAGINATION -->
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
    </div>
</template>
<style scoped>

</style>
