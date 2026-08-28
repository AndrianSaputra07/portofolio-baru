@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-5xl">

    <!-- HEADER -->
    <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">

        <div>
            <p class="text-sm text-zinc-500">
                ADMIN / DASHBOARD
            </p>

            <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
                Dashboard
            </h1>

            <p class="mt-3 text-sm text-zinc-500">
                Kelola portfolio dan project kamu dari satu tempat.
            </p>
        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="inline-flex w-fit items-center rounded-lg bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-zinc-200"
        >
            + Tambah Project
        </a>

    </div>


    <!-- STATISTICS -->
    <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">

        <!-- Total Projects -->
        <div class="rounded-xl border border-zinc-900 bg-zinc-950 p-6">

            <p class="text-sm text-zinc-500">
                Total Projects
            </p>

            <p class="mt-4 text-4xl font-semibold text-white">
                {{ $totalProjects }}
            </p>

        </div>


        <!-- Total Experience -->
        <div class="rounded-xl border border-zinc-900 bg-zinc-950 p-6">

            <p class="text-sm text-zinc-500">
                Total Experience
            </p>

            <p class="mt-4 text-4xl font-semibold text-white">
                {{ $totalExperiences }}
            </p>

        </div>


        <!-- Portfolio -->
        <div class="rounded-xl border border-zinc-900 bg-zinc-950 p-6">

            <p class="text-sm text-zinc-500">
                Portfolio
            </p>

            <a
                href="{{ route('portfolio') }}"
                target="_blank"
                class="mt-4 inline-block text-sm text-white transition hover:text-zinc-400"
            >
                Lihat Website ↗
            </a>

        </div>


        <!-- Status -->
        <div class="rounded-xl border border-zinc-900 bg-zinc-950 p-6">

            <p class="text-sm text-zinc-500">
                Status
            </p>

            <p class="mt-4 text-sm text-green-400">
                ● Online
            </p>

        </div>

    </div>


    <!-- QUICK ACTIONS -->
    <div class="mt-12">

        <p class="mb-6 text-sm text-zinc-500">
            QUICK ACTIONS
        </p>

        <div class="flex flex-wrap gap-4">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-lg border border-zinc-800 px-5 py-3 text-sm text-zinc-300 transition hover:border-zinc-600 hover:text-white"
            >
                Kelola Projects
            </a>

            <a
                href="{{ route('admin.projects.create') }}"
                class="rounded-lg border border-zinc-800 px-5 py-3 text-sm text-zinc-300 transition hover:border-zinc-600 hover:text-white"
            >
                Tambah Project
            </a>

        </div>

    </div>

</div>

@endsection