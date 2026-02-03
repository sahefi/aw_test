<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold mb-4">Welcome to Your Dashboard</h1>
                        <p class="mb-6">You're logged in! Explore the features below.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <Link
                                :href="route('weather.search')"
                                class="block p-6 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg text-white hover:from-blue-600 hover:to-indigo-700 transition"
                            >
                                <div class="flex items-center">
                                    <svg class="w-12 h-12 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                    </svg>
                                    <div>
                                        <h3 class="text-xl font-bold">Weather App</h3>
                                        <p class="text-blue-100">Search for weather in any city</p>
                                    </div>
                                </div>
                            </Link>

                            <Link
                                :href="route('profile.edit')"
                                class="block p-6 bg-gray-100 rounded-lg text-gray-900 hover:bg-gray-200 transition"
                            >
                                <div class="flex items-center">
                                    <svg class="w-12 h-12 mr-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <div>
                                        <h3 class="text-xl font-bold">Profile</h3>
                                        <p class="text-gray-600">Manage your account settings</p>
                                    </div>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
