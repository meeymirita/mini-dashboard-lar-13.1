<script setup>
const props = defineProps({
    task: Object,
    show: Boolean
})

const emit = defineEmits(['close'])
</script>

<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center">
        <!-- BACKDROP -->
        <div
            class="absolute inset-0 bg-black/40 backdrop-blur-sm"
            @click="emit('close')"
        ></div>
        <!-- MODAL -->
        <div
            class="relative w-full max-w-3xl
                   bg-white rounded-2xl shadow-2xl
                   p-8 z-10 animate-fade"
        >
            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-red-600">
                    Task #{{ task?.id }}
                </h2>
                <button
                    @click="emit('close')"
                    class="text-gray-400 hover:text-red-500 text-xl"
                >
                    ✕
                </button>
            </div>
            <!-- CONTENT -->
            <div class="space-y-5">
                <div>
                    <p class="text-xs text-gray-400">Title</p>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ task?.title }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400">Time</p>
                    <p class="text-gray-700">
                        {{ task?.time }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 mb-2">Description</p>
                    <div
                        class="prose max-w-none border rounded-xl p-4 bg-gray-50"
                        v-html="task?.description"
                    ></div>
                </div>
            </div>
            <!-- FOOTER -->
            <div class="flex justify-end mt-8">
                <button
                    @click="emit('close')"
                    class="px-5 py-2 rounded-xl bg-red-600 text-white hover:bg-red-700 transition"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.animate-fade {
    animation: fade .2s ease;
}

@keyframes fade {
    from {
        opacity: 0;
        transform: translateY(10px) scale(.98);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>
