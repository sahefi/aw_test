# AW - Weather Application

A modern full-stack weather application built with Laravel 12, featuring separate frontend and backend implementations with weather search capabilities, user authentication, and weather history tracking.

## Project Overview

This project consists of two main applications:

- **aw-fe** (Frontend): Laravel 12 + Vue 3 + Inertia.js + Tailwind CSS
- **aw-be** (Backend): Laravel 12 + Alpine.js + Tailwind CSS

Both applications share the same tech stack foundation with different frontend approaches and feature sets.

## Features

### Common Features
- **User Authentication**: Registration, login, and password management (Laravel Breeze)
- **Profile Management**: Update user profile and password
- **Action-Based Architecture**: Business logic organized using Laravel Actions
- **Modern UI**: Responsive interface built with Tailwind CSS

### AW-FE (Frontend) Features
- **Weather Search**: Search for current weather information in any city worldwide
- **Weather History**: Store and view weather search history
- **Vue 3 Components**: Modern reactive UI with Inertia.js
- **OpenWeatherMap API Integration**: Real-time weather data

### AW-BE (Backend) Features
- **Real-time Capabilities**: Laravel Echo and broadcasting support
- **Alpine.js Integration**: Lightweight JavaScript for interactive UI
- **API Routes**: RESTful API endpoints
- **Queue System**: Background job processing

## Tech Stack

### Backend
- **Framework**: Laravel 12
- **PHP**: 8.2+
- **Architecture**: Laravel Actions (lorisleiva/laravel-actions)
- **Authentication**: Laravel Breeze
- **Database**: MySQL/PostgreSQL/SQLite

### Frontend

#### AW-FE
- **Framework**: Vue 3
- **Routing**: Inertia.js
- **Styling**: Tailwind CSS
- **Build Tool**: Vite

#### AW-BE
- **Framework**: Alpine.js
- **Styling**: Tailwind CSS 4
- **Build Tool**: Vite

### External APIs
- **OpenWeatherMap**: Weather data (aw-fe)

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- Database (MySQL/PostgreSQL/SQLite)
- OpenWeatherMap API Key (for aw-fe)

## Installation

### AW-FE Installation

1. **Navigate to aw-fe directory**
   ```bash
   cd aw-fe
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure OpenWeatherMap API**

   Add your OpenWeatherMap API key to `.env`:
   ```env
   OPENWEATHERMAP_API_KEY=your_api_key_here
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   ```

6. **Build frontend assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   composer run dev
   ```

   Access the application at `http://localhost:8000`

### AW-BE Installation

1. **Navigate to aw-be directory**
   ```bash
   cd aw-be
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate --force
   ```

6. **Build frontend assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   composer run dev
   ```

   Access the application at `http://localhost:8000`

## Quick Start (One-Command Setup)

Both applications include a setup script:

```bash
# For aw-fe
cd aw-fe
composer run setup

# For aw-be
cd aw-be
composer run setup
```

## Development

### Running Development Servers

Both applications use the same command to start all development services (Laravel server, queue worker, logs, and Vite):

```bash
composer run dev
```

This starts:
- Laravel server (port 8000)
- Queue worker
- Logs (Laravel Pail)
- Vite dev server

### Running Tests

```bash
composer run test
# or
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

## Project Structure

### AW-FE Structure

```
aw-fe/
├── app/
│   ├── Actions/              # Laravel Actions
│   │   ├── Auth/             # Authentication actions
│   │   ├── Profile/          # Profile management actions
│   │   └── Weather/          # Weather-related actions
│   ├── Models/               # Eloquent models
│   └── Http/Middleware/      # Middleware
├── resources/
│   ├── js/
│   │   ├── Components/       # Vue components
│   │   ├── Layouts/          # Inertia layouts
│   │   └── Pages/            # Vue pages
│   └── views/                # Blade templates
├── routes/
│   ├── web.php               # Web routes
│   └── auth.php              # Auth routes
└── database/                 # Migrations and seeders
```

### AW-BE Structure

```
aw-be/
├── app/
│   ├── Actions/              # Laravel Actions
│   ├── Models/               # Eloquent models
│   └── Http/Controllers/     # Controllers
├── resources/
│   └── js/                   # Alpine.js components
├── routes/
│   ├── api.php               # API routes
│   ├── channels.php          # Broadcasting channels
│   ├── console.php           # Console routes
│   └── web.php               # Web routes
└── database/                 # Migrations and seeders
```

## Actions-Based Architecture

Both applications use Laravel Actions instead of traditional controllers. This provides:

1. **Single Responsibility**: Each action handles one specific task
2. **Reusability**: Actions can be called from anywhere in the application
3. **Testability**: Easy to test individual actions in isolation
4. **Organization**: Clear separation of concerns
5. **Flexibility**: Actions can be used as controllers, jobs, or simple classes

### Example Actions (AW-FE)

- **Authentication**: `AuthenticateUser`, `LogoutUser`, `StoreNewUser`
- **Profile**: `UpdateProfile`, `DeleteUserProfile`
- **Weather**: `SearchWeather`, `FetchWeatherData`, `StoreWeatherData`, `GetWeatherHistory`

## API Configuration

### OpenWeatherMap API (AW-FE)

1. Sign up at [OpenWeatherMap](https://openweathermap.org/api)
2. Get your free API key
3. Add it to your `.env` file:
   ```env
   OPENWEATHERMAP_API_KEY=your_actual_api_key
   ```

## Usage

### AW-FE Usage

1. **Register/Login**: Create a new account or log in
2. **Navigate to Weather**: Click on "Weather App" card on dashboard
3. **Search Weather**: Enter a city name and click Search
4. **View Results**: See current temperature, humidity, wind speed, and weather description
5. **View History**: Access your weather search history

### AW-BE Usage

1. **Register/Login**: Create a new account or log in
2. **Manage Profile**: Update profile information
3. **Access API**: Use RESTful API endpoints for integration
4. **Real-time Features**: Leverage broadcasting channels for live updates

## Environment Variables

### AW-FE .env

```env
APP_NAME="AW Weather"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
OPENWEATHERMAP_API_KEY=your_api_key_here
```

### AW-BE .env

```env
APP_NAME="AW Backend"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Security

If you discover any security vulnerabilities, please email the maintainers instead of using the issue tracker.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Credits

### Core Technologies
- [Laravel](https://laravel.com) - PHP Framework
- [Laravel Breeze](https://github.com/laravel/breeze) - Authentication scaffolding
- [Laravel Actions](https://github.com/lorisleiva/laravel-actions) - Action-based architecture
- [Tailwind CSS](https://tailwindcss.com) - CSS Framework
- [Vite](https://vitejs.dev) - Frontend build tool

### AW-FE Specific
- [Vue.js](https://vuejs.org) - JavaScript Framework
- [Inertia.js](https://inertiajs.com) - Adapter for Vue
- [OpenWeatherMap](https://openweathermap.org) - Weather API

### AW-BE Specific
- [Alpine.js](https://alpinejs.dev) - Lightweight JavaScript Framework

## Support

For support, email support@example.com or open an issue in the repository.

---

**Note**: Make sure to configure your `.env` files properly before running the applications. Each application (aw-fe and aw-be) should run on different ports if you want to run them simultaneously.
# aw_test
# aw_test
