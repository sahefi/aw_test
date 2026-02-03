<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard - Laravel</title>

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
                align-items: center;
                gap: 1rem;
            }

            .nav-link {
                padding: 0.5rem 1rem;
                text-decoration: none;
                color: var(--color-gray-700);
                border-radius: 0.25rem;
                transition: all 0.2s;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .nav-link:hover {
                background-color: var(--color-gray-200);
                color: var(--color-gray-900);
            }

            .btn-logout {
                padding: 0.5rem 1rem;
                text-decoration: none;
                color: var(--color-gray-700);
                border: 1px solid var(--color-gray-300);
                border-radius: 0.25rem;
                transition: all 0.2s;
            }

            .btn-logout:hover {
                background-color: var(--color-gray-900);
                color: white;
                border-color: var(--color-gray-900);
            }

            /* MAIN CONTENT */
            .card {
                background: white;
                border: 1px solid var(--color-gray-200);
                border-radius: 0.5rem;
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .card h1 {
                font-size: 1.875rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
                color: var(--color-gray-900);
            }

            .card p {
                color: var(--color-gray-600);
                margin-bottom: 1.5rem;
            }

            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
                margin-top: 2rem;
            }

            .stat-card {
                background: white;
                border: 1px solid var(--color-gray-200);
                border-radius: 0.5rem;
                padding: 1.5rem;
                text-align: center;
            }

            .stat-card h3 {
                font-size: 0.875rem;
                font-weight: 500;
                color: var(--color-gray-600);
                margin-bottom: 0.5rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            .stat-card .value {
                font-size: 2rem;
                font-weight: 600;
                color: var(--color-gray-900);
            }

            .info-box {
                background-color: var(--color-gray-100);
                border-left: 4px solid var(--color-gray-400);
                padding: 1rem;
                border-radius: 0.25rem;
                margin-top: 1.5rem;
            }

            .info-box p {
                margin: 0;
                color: var(--color-gray-700);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <a href="/" class="logo">Laravel</a>
                <nav class="nav">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Log out</button>
                    </form>
                </nav>
            </header>

            <main>
                <div class="card">
                    <h1>Dashboard</h1>
                    <p>You are logged in!</p>

                    <div class="stats">
                        <div class="stat-card">
                            <h3>Total Users</h3>
                            <div class="value">1</div>
                        </div>
                        <div class="stat-card">
                            <h3>Active Sessions</h3>
                            <div class="value">1</div>
                        </div>
                        <div class="stat-card">
                            <h3>Server Status</h3>
                            <div class="value">Online</div>
                        </div>
                    </div>

                    <div class="info-box">
                        <p><strong>Tip:</strong> This is the default Laravel dashboard. You can customize this page to fit your needs.</p>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
