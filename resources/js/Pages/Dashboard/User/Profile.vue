<script setup>
import useAuth from "@/composables/useAuth.js";
import UserLayout from "@/Pages/Layout/UserLayout.vue";

const { user } = useAuth()
</script>

<template>
    <UserLayout :status="true">
        <div class="flex justify-start items-start min-h-screen p-6">
            <div
                class="w-full max-w-5xl
                bg-white/80 backdrop-blur-xl
                rounded-3xl shadow-2xl
                p-8 space-y-6"
            >
                <!-- AVATAR -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-20 h-20 rounded-full
                        bg-red-600 text-white
                        flex items-center justify-center
                        text-3xl font-bold shadow-lg"
                    >
                        {{ user.name.charAt(0).toUpperCase() }}
                    </div>
                    <h1 class="mt-4 text-2xl font-bold text-gray-800">
                        {{ user.name }}
                    </h1>
                    <span
                        class="mt-1 px-3 py-1 text-xs font-semibold
                        bg-red-100 text-red-600 rounded-full"
                    >
                        {{ user.role }}
                    </span>
                </div>
                <!-- INFO -->
                <div class="space-y-4">

                    <div>
                        <label class="text-sm text-gray-500">Email</label>

                        <div class="mt-1 px-4 py-3 rounded-lg bg-gray-100">
                            {{ user.email }}
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">Registered</label>

                        <div class="mt-1 px-4 py-3 rounded-lg bg-gray-100">
                            {{ new Date(user.created_at).toLocaleDateString() }}
                        </div>
                    </div>

                </div>
                <!-- ACTIONS -->
<!--                <div class="pt-4 flex gap-3">-->

<!--                    <button-->
<!--                        class="flex-1 bg-red-600 hover:bg-red-700-->
<!--                    text-white font-semibold py-3-->
<!--                    rounded-xl transition"-->
<!--                    >-->
<!--                        Edit profile-->
<!--                    </button>-->
<!--                </div>-->
            </div>

        </div>
    </UserLayout>
</template>
