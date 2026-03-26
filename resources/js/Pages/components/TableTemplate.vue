<script setup>
import {ref} from "vue";
import Table from "@/Pages/components/Table.vue";
import TaskView from "@/Pages/components/TaskView.vue";
const props = defineProps({
    reviews: {
        type: Object,
        required: true
    }
})
const selectedTask = ref(null)
const showTask = ref(false)
const openTask = (task) => {
    selectedTask.value = task
    showTask.value = true
}
const formatDate = (date) => {
    return new Date(date).toLocaleString('ru-RU');
}
const formatDescription = (description) => {
    return description.substring(0, 40)
}

</script>

<template>
    <div class="overflow-x-auto  overflow-y-auto p-6">
        <table class="w-full text-xs text-left">
            <!-- HEADER -->
            <thead class="bg-red-50 text-gray-700 uppercase tracking-wider">
            <tr>
                <th class="px-3 py-2">Id</th>
                <th class="px-3 py-2">Title</th>
                <th class="px-3 py-2">Description</th>
                <th class="px-3 py-2">Time</th>
                <th class="px-3 py-2">Date</th>
                <th class="px-3 py-2 text-right">Action</th>
            </tr>
            </thead>
            <!-- BODY -->
            <tbody class="divide-y divide-gray-200">
            <tr
                v-for="review in reviews.data"
                :key="review.id"
                class="hover:bg-red-50/40 transition"
            >
                <td class="px-3 py-2 font-semibold text-gray-800">
                    {{ review.id }}
                </td>
                <td @click="openTask(review)" class="px-3 py-2 font-semibold text-gray-800 hover:bg-red-100">
                    {{ review.title }}
                </td>
                <td v-html="formatDescription(review.description)" class="px-3 py-2 text-gray-600"></td>
                <td class="px-3 py-2 text-gray-500">
                    {{ review.time }}
                </td>
                <td class="px-3 py-2 text-gray-500 whitespace-nowrap">
                    {{ formatDate(review.created_at) }}
                </td>
                <td class="px-3 py-2 text-right space-x-2">
                    <button
                        class="px-2 py-1 text-xs font-medium
                               bg-red-100 text-red-600
                               rounded-md hover:bg-red-200 transition"
                    >
                        Edit
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <TaskView
            :task="selectedTask"
            :show="showTask"
            @close="showTask = false"
        />
    </div>
</template>

<style scoped>
</style>
