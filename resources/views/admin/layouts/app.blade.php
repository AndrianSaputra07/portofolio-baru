<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin — Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#0a0a0a] text-zinc-100">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="hidden w-64 flex-col border-r border-zinc-900 bg-[#0a0a0a] p-6 md:flex">

            <!-- Logo -->
            <a
                href="{{ route('admin.dashboard') }}"
                class="text-lg font-semibold text-white"
            >
                MAS<span class="text-zinc-500">.</span>
            </a>


            <!-- MENU -->
            <nav class="mt-12 space-y-2">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="block rounded-lg px-4 py-3 text-sm transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-zinc-900 text-white'
                        : 'text-zinc-500 hover:bg-zinc-900 hover:text-white' }}"
                >
                    Dashboard
                </a>


                <a
                    href="{{ route('admin.projects.index') }}"
                    class="block rounded-lg px-4 py-3 text-sm transition
                    {{ request()->routeIs('admin.projects.*')
                        ? 'bg-zinc-900 text-white'
                        : 'text-zinc-500 hover:bg-zinc-900 hover:text-white' }}"
                >
                    Projects
                </a>

            </nav>


            <!-- Bottom -->
            <div class="mt-auto space-y-4">

                <a
                    href="{{ route('portfolio') }}"
                    target="_blank"
                    class="block text-sm text-zinc-500 transition hover:text-white"
                >
                    ↗ Lihat Portfolio
                </a>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="text-sm text-zinc-500 transition hover:text-red-400"
                    >
                        Logout
                    </button>

                </form>

            </div>

        </aside>


        <!-- CONTENT -->
        <main class="min-h-screen flex-1">

            <!-- MOBILE HEADER -->
            <header class="flex items-center justify-between border-b border-zinc-900 px-6 py-5 md:hidden">

                <span class="font-semibold">
                    MAS<span class="text-zinc-500">.</span>
                </span>

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="text-sm text-zinc-400"
                >
                    Projects
                </a>

            </header>


            <div class="p-6 md:p-12">

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>