<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const showCreateModal = ref(false);

const form = useForm({
    tasks: [
        { title: "", description: "", time: "" }
    ]
});

function showCreate() {
    showCreateModal.value = true;
}

function closeModal() {
    showCreateModal.value = false;
}

function addRow() {
    form.tasks.push({
        title: "",
        description: "",
        time: ""
    });
}

function removeRow(index) {
    form.tasks.splice(index, 1);
}

function submitForm() {
    form.post('/user/store', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            form.tasks = [{ title: "", description: "", time: "" }];
            closeModal();
        }
    });
}
</script>

<template>
    <div class="flex items-center justify-between px-6 py-4 border-b bg-white/60">
        <h2 class="text-xl font-semibold text-gray-800">
            Daily Reports
        </h2>

        <button
            @click="showCreate"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition"
        >
            + Add report
        </button>
    </div>

    <!-- MODAL -->
    <div v-if="showCreateModal" class="fixed inset-0 z-50 flex items-center justify-center">

        <!-- backdrop -->
        <div
            class="absolute inset-0 bg-black/40 backdrop-blur-sm"
            @click="closeModal"
        ></div>

        <!-- CONTENT -->
        <div
            class="relative w-full max-w-6xl max-h-[85vh]
             bg-white rounded-2xl shadow-2xl
             p-8 z-10 overflow-y-auto"
        >

            <h2 class="text-2xl font-bold text-red-600 mb-6">
                Daily Report
            </h2>

            <form @submit.prevent="submitForm" class="space-y-4">

                <!-- HEADER -->
                <div class="grid grid-cols-12 gap-3 text-xs font-semibold text-gray-500 px-2">
                    <div class="col-span-3">Title</div>
                    <div class="col-span-6">Description</div>
                    <div class="col-span-2">Time</div>
                    <div class="col-span-1"></div>
                </div>

                <!-- ROWS -->
                <div
                    v-for="(task,index) in form.tasks"
                    :key="index"
                    class="grid grid-cols-12 gap-4 items-start"
                >

                    <!-- TITLE -->
                    <div class="col-span-3 flex flex-col">
                        <input
                            v-model="task.title"
                            type="text"
                            placeholder="Task"
                            class="px-3 py-2 border rounded-lg focus:ring-2 focus:ring-red-500"
                        />
                        <p
                            v-if="form.errors[`tasks.${index}.title`]"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors[`tasks.${index}.title`] }}
                        </p>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="col-span-6 flex flex-col">
                        <input
                            v-model="task.description"
                            type="text"
                            placeholder="Description"
                            class="px-3 py-2 border rounded-lg focus:ring-2 focus:ring-red-500"
                        />
                        <p
                            v-if="form.errors[`tasks.${index}.description`]"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors[`tasks.${index}.description`] }}
                        </p>
                    </div>

                    <!-- TIME -->
                    <div class="col-span-2 flex flex-col">
                        <input
                            v-model="task.time"
                            type="time"
                            class="px-3 py-2 border rounded-lg focus:ring-2 focus:ring-red-500"
                        />
                        <p
                            v-if="form.errors[`tasks.${index}.time`]"
                            class="text-red-500 text-xs mt-1"
                        >
                            {{ form.errors[`tasks.${index}.time`] }}
                        </p>
                    </div>

                    <!-- DELETE -->
                    <div class="col-span-1 flex justify-center pt-2">
                        <button
                            type="button"
                            @click="removeRow(index)"
                            class="text-red-500 hover:text-red-700 text-lg"
                        >
                            ✕
                        </button>
                    </div>

                </div>

                <!-- ADD ROW -->
                <button
                    type="button"
                    @click="addRow"
                    class="text-sm text-red-600 font-medium hover:underline"
                >
                    + Add task
                </button>

                <!-- ACTIONS -->
                <div class="flex gap-3 pt-4">
                    <button
                        type="button"
                        @click="closeModal"
                        class="w-full border rounded-lg py-2 hover:bg-gray-100"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg disabled:opacity-50"
                    >
                        {{ form.processing ? 'Saving...' : 'Save report' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>
