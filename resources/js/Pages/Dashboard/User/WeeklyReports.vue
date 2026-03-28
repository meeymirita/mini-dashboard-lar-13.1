<script setup>
import UserLayout from "@/Pages/Layout/UserLayout.vue";
import TableTemplate from "../../components/TableTemplate.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    weeklyReport: Object,
    weeks: Array
})

const changeWeek = (week) => {
    router.get('/user/weekly-reports', {
        date: week.start
    }, {
        preserveState: true
    })
}

</script>

<template>
    <UserLayout :status="false">
        <div class="container">
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap gap-2 text-sm font-medium">
                    <li v-for="week in weeks" :key="week.start">
                        <button
                            @click="changeWeek(week)"
                            class="px-4 py-2 rounded-t-lg border transition-all duration-200"
                            :class="[
                            week.start === weeklyReport.startOfWeek
                                ? 'bg-purple-50 text-purple-700 border-purple-500 shadow-sm'
                                : 'bg-white text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'
                            ]"
                        >
                            <span class="font-semibold">
                                {{ new Date(week.start).getDate() }}
                            </span>
                            <span class="mx-1 text-gray-400">—</span>
                            <span>
                            {{ new Date(week.end).getDate() }}
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
            <TableTemplate :reviews="weeklyReport.items"/>
        </div>
    </UserLayout>
</template>

<style scoped>

</style>
