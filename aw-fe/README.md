# AW-FE Weather Application

A simple weather application built with Laravel 12, Laravel Breeze (Vue stack), Tailwind CSS, and Laravel Actions.

## Features

- **Weather Search**: Search for current weather information in any city worldwide
- **Clean UI**: Modern, responsive interface built with Tailwind CSS
- **Action-Based Architecture**: All controllers replaced with Laravel Actions for better code organization
- **Authentication**: User authentication powered by Laravel Breeze
- **Weather History**: Store and view weather search history

## Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Vue 3 with Inertia.js
- **Styling**: Tailwind CSS
- **Architecture**: Laravel Actions (lorisleiva/laravel-actions)
- **API**: OpenWeatherMap API
- **Database**: SQLite (default)

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- OpenWeatherMap API Key ([Get one here](https://openweathermap.org/api))

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd aw-fe
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install --legacy-peer-deps
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure OpenWeatherMap API**

   Add your OpenWeatherMap API key to your `.env` file:
   ```env
   OPENWEATHERMAP_API_KEY=your_api_key_here
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   ```

6. **Build frontend assets**
   ```bash
   npm run dev
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

8. **Access the application**

   Open your browser and navigate to `http://localhost:8000`

## Usage

1. **Register/Login**: Create a new account or log in with existing credentials
2. **Navigate to Weather**: Click on the "Weather App" card on the dashboard
3. **Search Weather**: Enter a city name (e.g., "London", "Tokyo", "New York") and click Search
4. **View Results**: See current temperature, humidity, wind speed, and weather description

## Project Structure

### Actions-Based Architecture

This project uses Laravel Actions instead of traditional controllers. All business logic is organized in the `app/Actions/` directory:

- **Authentication Actions**:
  - `ShowLoginForm` - Display login form
  - `AuthenticateUser` - Handle user authentication
  - `LogoutUser` - Handle user logout
  - `ShowRegistrationForm` - Display registration form
  - `StoreNewUser` - Handle user registration

- **Profile Actions**:
  - `ShowProfileForm` - Display profile edit form
  - `UpdateProfile` - Update user profile
  - `DeleteUserProfile` - Delete user account

- **Weather Actions**:
  - `ShowWeatherSearch` - Display weather search page
  - `SearchWeather` - Handle weather search requests
  - `FetchWeatherData` - Fetch weather data from OpenWeatherMap API
  - `StoreWeatherData` - Store weather data in database
  - `GetWeatherHistory` - Retrieve weather search history

### Key Files

- `routes/web.php` - Main web routes using Actions
- `routes/auth.php` - Authentication routes using Actions
- `app/Actions/` - All Action classes
- `resources/js/Pages/Weather/Search.vue` - Weather search Vue component
- `app/Models/Weather.php` - Weather model

## API Configuration

The application uses the OpenWeatherMap Current Weather API. To configure:

1. Sign up at [OpenWeatherMap](https://openweathermap.org/api)
2. Get your free API key
3. Add it to your `.env` file:
   ```env
   OPENWEATHERMAP_API_KEY=your_actual_api_key
   ```

## Development

### Running Tests

```bash
php artisan test
```

### Code Formatting

```bash
./vendor/bin/pint
```

### Building for Production

```bash
npm run build
```

## Architecture Benefits

Using Laravel Actions provides several advantages:

1. **Single Responsibility**: Each action handles one specific task
2. **Reusability**: Actions can be called from anywhere in the application
3. **Testability**: Easy to test individual actions in isolation
4. **Organization**: Clear separation of concerns
5. **Flexibility**: Actions can be used as controllers, jobs, or simple classes

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Credits

- [Laravel](https://laravel.com)
- [Laravel Breeze](https://github.com/laravel/breeze)
- [Laravel Actions](https://github.com/lorisleiva/laravel-actions)
- [Tailwind CSS](https://tailwindcss.com)
- [Vue.js](https://vuejs.org)
- [Inertia.js](https://inertiajs.com)
- [OpenWeatherMap](https://openweathermap.org)

