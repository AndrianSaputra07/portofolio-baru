<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>Admin — Muhammad Andrian Saputra</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-[#0a0a0a] text-zinc-100 antialiased">

    <div class="flex min-h-screen">

        <!-- ================= SIDEBAR ================= -->
        <aside
            class="hidden min-h-screen w-64 flex-col border-r border-zinc-900 bg-[#0a0a0a] p-6 md:flex"
        >

            <!-- LOGO -->
            <a
                href="{{ route('admin.dashboard') }}"
                class="text-lg font-semibold tracking-tight text-white"
            >
                MAS<span class="text-zinc-500">.</span>
            </a>


            <!-- NAVIGATION -->
            <nav class="mt-12 space-y-2">

                <!-- DASHBOARD -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="block rounded-lg px-4 py-3 text-sm transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-zinc-900 text-white'
                        : 'text-zinc-500 hover:bg-zinc-900 hover:text-white' }}"
                >
                    Dashboard
                </a>


                <!-- PROJECTS -->
                <a
                    href="{{ route('admin.projects.index') }}"
                    class="block rounded-lg px-4 py-3 text-sm transition
                    {{ request()->routeIs('admin.projects.*')
                        ? 'bg-zinc-900 text-white'
                        : 'text-zinc-500 hover:bg-zinc-900 hover:text-white' }}"
                >
                    Projects
                </a>


                <!-- EXPERIENCE -->
                <a
                    href="{{ route('admin.experiences.index') }}"
                    class="block rounded-lg px-4 py-3 text-sm transition
                    {{ request()->routeIs('admin.experiences.*')
                        ? 'bg-zinc-900 text-white'
                        : 'text-zinc-500 hover:bg-zinc-900 hover:text-white' }}"
                >
                    Experience
                </a>

            </nav>


            <!-- BOTTOM MENU -->
            <div class="mt-auto space-y-5">

                <!-- VIEW PORTFOLIO -->
                <a
                    href="{{ route('portfolio') }}"
                    target="_blank"
                    class="flex items-center gap-2 text-sm text-zinc-500 transition hover:text-white"
                >
                    <span>↗</span>
                    <span>Lihat Portfolio</span>
                </a>


                <!-- LOGOUT -->
                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="flex items-center gap-2 text-sm text-zinc-500 transition hover:text-red-400"
                    >
                        <span>←</span>
                        <span>Logout</span>
                    </button>

                </form>

            </div>

        </aside>


        <!-- ================= MAIN CONTENT ================= -->
        <main class="min-h-screen flex-1">

            <!-- ================= MOBILE HEADER ================= -->
            <header
                class="flex items-center justify-between border-b border-zinc-900 px-6 py-5 md:hidden"
            >

                <!-- LOGO -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="text-lg font-semibold text-white"
                >
                    MAS<span class="text-zinc-500">.</span>
                </a>


                <!-- MOBILE NAVIGATION -->
                <nav class="flex items-center gap-4 text-sm">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="text-zinc-500 transition hover:text-white"
                    >
                        Dashboard
                    </a>

                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="text-zinc-500 transition hover:text-white"
                    >
                        Projects
                    </a>

                    <a
                        href="{{ route('admin.experiences.index') }}"
                        class="text-zinc-500 transition hover:text-white"
                    >
                        Experience
                    </a>

                </nav>

            </header>


            <!-- ================= PAGE CONTENT ================= -->
            <div class="p-6 md:p-12">

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>