<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* BASE STYLES */
            :root {
                --color-gray-50: #f9fafb;
                --color-gray-100: #f3f4f6;
                --color-gray-200: #e5e7eb;
                --color-gray-300: #d1d5db;
                --color-gray-400: #9ca3af;
                --color-gray-500: #6b7280;
                --color-gray-600: #4b5563;
                --color-gray-700: #374151;
                --color-gray-800: #1f2937;
                --color-gray-900: #111827;
            }

            body {
                font-family: 'Instrument Sans', sans-serif;
                background-color: var(--color-gray-50);
                color: var(--color-gray-900);
                margin: 0;
                padding: 0;
                line-height: 1.6;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem;
            }

            /* HEADER */
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 3rem;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--color-gray-900);
                text-decoration: none;
            }

            .nav {
                display: flex;
                gap: 1rem;
            }

            .nav a {
                padding: 0.5rem 1rem;
                text-decoration: none;
                color: var(--color-gray-700);
                border: 1px solid var(--color-gray-300);
                border-radius: 0.25rem;
                transition: all 0.2s;
            }

            .nav a:hover {
                background-color: var(--color-gray-900);
                color: white;
                border-color: var(--color-gray-900);
            }

            .nav a.primary {
                background-color: var(--color-gray-900);
                color: white;
                border-color: var(--color-gray-900);
            }

            .nav a.primary:hover {
                background-color: var(--color-gray-800);
            }

            /* MAIN CONTENT */
            .main-content {
                display: grid;
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            @media (min-width: 768px) {
                .main-content {
                    grid-template-columns: 1fr 1fr;
                }
            }

            .card {
                background: white;
                border: 1px solid var(--color-gray-200);
                border-radius: 0.5rem;
                padding: 2rem;
            }

            .card h1 {
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
                color: var(--color-gray-900);
            }

            .card p {
                color: var(--color-gray-600);
                margin-bottom: 1.5rem;
            }

            .list {
                list-style: none;
                padding: 0;
                margin: 0 0 2rem 0;
            }

            .list li {
                padding: 0.75rem 0;
                border-bottom: 1px solid var(--color-gray-200);
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .list li:last-child {
                border-bottom: none;
            }

            .list li::before {
                content: "→";
                color: var(--color-gray-400);
                font-weight: bold;
            }

            .list a {
                color: var(--color-gray-700);
                text-decoration: none;
                font-weight: 500;
            }

            .list a:hover {
                color: var(--color-gray-900);
            }

            .btn {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                background-color: var(--color-gray-900);
                color: white;
                text-decoration: none;
                border-radius: 0.25rem;
                font-weight: 500;
                transition: background-color 0.2s;
            }

            .btn:hover {
                background-color: var(--color-gray-800);
            }

            /* ILLUSTRATION */
            .illustration {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 0.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 400px;
                color: white;
                font-size: 1.25rem;
                font-weight: 600;
            }

            @media (max-width: 767px) {
                .illustration {
                    min-height: 300px;
                    order: -1;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <a href="/" class="logo">Laravel</a>
                @if (Route::has('login'))
                    <nav class="nav">
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="primary">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <main class="main-content">
                <div class="card">
                    <h1>Welcome to Laravel</h1>
                    <p>Laravel has wonderful, thorough documentation covering every aspect of the framework.</p>

                    <ul class="list">
                        <li><a href="https://laravel.com/docs">Documentation</a></li>
                        <li><a href="https://laracasts.com">Laracasts</a></li>
                        <li><a href="https://laravel-news.com">Laravel News</a></li>
                        <li><a href="https://github.com/laravel/laravel">GitHub Repository</a></li>
                    </ul>

                    <a href="https://laravel.com/docs" class="btn">Get Started</a>
                </div>

                <div class="illustration">
                    Laravel Framework
                </div>
            </main>
        </div>
    </body>
</html>
