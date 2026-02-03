<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const weather = computed(() => page.props.weather);
const error = computed(() => page.props.error);

const form = useForm({
    city: '',
});

const submit = () => {
    form.post(route('weather.search.post'), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Weather Search" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                    <h1 class="text-3xl font-bold text-white">Weather App</h1>
                    <p class="text-blue-100 mt-2">Search for weather information in any city</p>
                </div>

                <!-- Search Form -->
                <div class="p-8">
                    <form @submit.prevent="submit" class="flex gap-4">
                        <input
                            type="text"
                            v-model="form.city"
                            placeholder="Enter city name (e.g., London, Tokyo, New York)"
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                            :disabled="form.processing"
                        />
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span v-if="form.processing">Searching...</span>
                            <span v-else>Search</span>
                        </button>
                    </form>

                    <!-- Error Message -->
                    <div v-if="error" class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-800">{{ error }}</p>
                    </div>

                    <!-- Weather Result -->
                    <div v-if="weather" class="mt-8">
                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl p-8 text-white">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-4xl font-bold">{{ weather.city }}, {{ weather.country }}</h2>
                                    <p class="text-blue-100 mt-2 capitalize text-xl">{{ weather.description }}</p>
                                </div>
                                <div v-if="weather.icon" class="text-center">
                                    <img
                                        :src="`https://openweathermap.org/img/wn/${weather.icon}@2x.png`"
                                        :alt="weather.description"
                                        class="w-20 h-20"
                                    />
                                </div>
                            </div>

                            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-blue-100 text-sm">Temperature</p>
                                    <p class="text-3xl font-bold mt-1">{{ Math.round(weather.temperature) }}°C</p>
                                </div>

                                <div v-if="weather.humidity" class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-blue-100 text-sm">Humidity</p>
                                    <p class="text-3xl font-bold mt-1">{{ weather.humidity }}%</p>
                                </div>

                                <div v-if="weather.wind_speed" class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-blue-100 text-sm">Wind Speed</p>
                                    <p class="text-3xl font-bold mt-1">{{ weather.wind_speed }} m/s</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Initial State -->
                    <div v-if="!weather && !error" class="mt-8 text-center py-12">
                        <svg
                            class="mx-auto h-24 w-24 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"
                            />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Search for weather</h3>
                        <p class="mt-2 text-gray-500">Enter a city name above to get current weather information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
