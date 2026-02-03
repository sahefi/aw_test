<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Weather App</h1>

            <!-- Search Box -->
            <div class="mb-6">
                <div class="flex gap-2">
                    <input
                        v-model="searchCity"
                        @keyup.enter="getWeather"
                        type="text"
                        placeholder="Enter city name"
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button
                        @click="getWeather"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors"
                    >
                        Search
                    </button>
                </div>
            </div>

            <!-- Loading State -->
            <div v-if="loading" class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-blue-500 border-t-transparent"></div>
                <p class="mt-4 text-gray-600">Loading weather data...</p>
            </div>

            <!-- Error State -->
            <div v-else-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                {{ error }}
            </div>

            <!-- Weather Display -->
            <div v-else-if="weather" class="space-y-4">
                <!-- City Name -->
                <div class="text-center">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ weather.name }}, {{ weather.sys.country }}</h2>
                    <p class="text-gray-500">{{ new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</p>
                </div>

                <!-- Temperature -->
                <div class="text-center py-6">
                    <div class="text-6xl font-bold text-gray-800">
                        {{ Math.round(weather.main.temp) }}°C
                    </div>
                    <div class="text-xl text-gray-600 capitalize mt-2">
                        {{ weather.weather[0].description }}
                    </div>
                </div>

                <!-- Weather Icon -->
                <div class="flex justify-center">
                    <img
                        :src="`https://openweathermap.org/img/wn/${weather.weather[0].icon}@4x.png`"
                        :alt="weather.weather[0].description"
                        class="w-32 h-32"
                    >
                </div>

                <!-- Weather Details -->
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="text-gray-500 text-sm">Feels Like</div>
                        <div class="text-xl font-semibold text-gray-800">{{ Math.round(weather.main.feels_like) }}°C</div>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="text-gray-500 text-sm">Humidity</div>
                        <div class="text-xl font-semibold text-gray-800">{{ weather.main.humidity }}%</div>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="text-gray-500 text-sm">Wind Speed</div>
                        <div class="text-xl font-semibold text-gray-800">{{ weather.wind.speed }} m/s</div>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="text-gray-500 text-sm">Pressure</div>
                        <div class="text-xl font-semibold text-gray-800">{{ weather.main.pressure }} hPa</div>
                    </div>
                </div>
            </div>

            <!-- Initial State -->
            <div v-else class="text-center py-8 text-gray-500">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                </svg>
                <p>Enter a city name to get weather information</p>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'WeatherApp',
    setup() {
        const searchCity = ref('Jakarta');
        const weather = ref(null);
        const loading = ref(false);
        const error = ref(null);

        const API_KEY = import.meta.env.VITE_WEATHER_API_KEY || 'demo';

        const getWeather = async () => {
            if (!searchCity.value.trim()) {
                error.value = 'Please enter a city name';
                return;
            }

            loading.value = true;
            error.value = null;

            try {
                // Simulate API delay
                await new Promise(resolve => setTimeout(resolve, 800));

                // Mockup data
                const mockData = {
                    Jakarta: {
                        name: 'Jakarta',
                        sys: { country: 'ID' },
                        main: {
                            temp: 32,
                            feels_like: 36,
                            humidity: 75,
                            pressure: 1008
                        },
                        weather: [{
                            description: 'scattered clouds',
                            icon: '03d'
                        }],
                        wind: { speed: 3.5 }
                    },
                    Bandung: {
                        name: 'Bandung',
                        sys: { country: 'ID' },
                        main: {
                            temp: 24,
                            feels_like: 25,
                            humidity: 80,
                            pressure: 1012
                        },
                        weather: [{
                            description: 'light rain',
                            icon: '10d'
                        }],
                        wind: { speed: 2.8 }
                    },
                    Surabaya: {
                        name: 'Surabaya',
                        sys: { country: 'ID' },
                        main: {
                            temp: 34,
                            feels_like: 38,
                            humidity: 65,
                            pressure: 1005
                        },
                        weather: [{
                            description: 'clear sky',
                            icon: '01d'
                        }],
                        wind: { speed: 4.2 }
                    },
                    Singapore: {
                        name: 'Singapore',
                        sys: { country: 'SG' },
                        main: {
                            temp: 31,
                            feels_like: 35,
                            humidity: 70,
                            pressure: 1010
                        },
                        weather: [{
                            description: 'few clouds',
                            icon: '02d'
                        }],
                        wind: { speed: 3.1 }
                    },
                    Tokyo: {
                        name: 'Tokyo',
                        sys: { country: 'JP' },
                        main: {
                            temp: 18,
                            feels_like: 17,
                            humidity: 55,
                            pressure: 1015
                        },
                        weather: [{
                            description: 'overcast clouds',
                            icon: '04d'
                        }],
                        wind: { speed: 5.5 }
                    }
                };

                // Get the city name (case-insensitive)
                const cityName = searchCity.value.toLowerCase();
                const cityKey = Object.keys(mockData).find(
                    key => key.toLowerCase() === cityName
                );

                if (!cityKey) {
                    throw new Error('City not found. Please try Jakarta, Bandung, Surabaya, Singapore, or Tokyo.');
                }

                weather.value = mockData[cityKey];
            } catch (err) {
                error.value = err.message || 'Failed to fetch weather data. Please try again.';
                weather.value = null;
            } finally {
                loading.value = false;
            }
        };

        // Load default city on mount
        getWeather();

        return {
            searchCity,
            weather,
            loading,
            error,
            getWeather
        };
    }
};
</script>
