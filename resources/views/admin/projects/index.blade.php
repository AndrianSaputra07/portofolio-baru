@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-5xl">

    <!-- HEADER -->
    <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">

        <div>
            <p class="text-sm text-zinc-500">
                ADMIN / PROJECTS
            </p>

            <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
                Projects
            </h1>

            <p class="mt-3 text-sm text-zinc-500">
                Kelola project yang ditampilkan di portfolio kamu.
            </p>
        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="inline-flex w-fit items-center rounded-lg bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-zinc-200"
        >
            + Tambah Project
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if (session('success'))

        <div class="mt-8 rounded-lg border border-green-900 bg-green-950/30 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>

    @endif


    <!-- PROJECT LIST -->
    <div class="mt-12 divide-y divide-zinc-900 border-t border-zinc-900">

        @forelse ($projects as $project)

            <article class="grid gap-6 py-8 md:grid-cols-12 md:items-center">

                <!-- IMAGE -->
                <div class="md:col-span-3">

                    @if ($project->image)

                        <div class="overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900">

                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="h-32 w-full object-cover"
                            >

                        </div>

                    @else

                        <div class="flex h-32 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 text-xs tracking-wider text-zinc-600">
                            NO IMAGE
                        </div>

                    @endif

                </div>


                <!-- PROJECT INFO -->
                <div class="md:col-span-5">

                    <h2 class="text-xl font-medium text-white">
                        {{ $project->title }}
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-zinc-500">
                        {{ $project->description }}
                    </p>

                    @if ($project->technologies)

                        <p class="mt-4 text-xs text-zinc-600">
                            {{ $project->technologies }}
                        </p>

                    @endif

                </div>


                <!-- ACTIONS -->
                <div class="flex gap-4 md:col-span-4 md:justify-end">

                    @if ($project->demo_url)

                        <a
                            href="{{ $project->demo_url }}"
                            target="_blank"
                            class="text-sm text-zinc-500 transition hover:text-white"
                        >
                            Demo ↗
                        </a>

                    @endif

                    @if ($project->github_url)

                        <a
                            href="{{ $project->github_url }}"
                            target="_blank"
                            class="text-sm text-zinc-500 transition hover:text-white"
                        >
                            GitHub ↗
                        </a>

                    @endif

                    <a
                        href="{{ route('admin.projects.edit', $project) }}"
                        class="text-sm text-zinc-300 transition hover:text-white"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.projects.destroy', $project) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus project ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="text-sm text-zinc-500 transition hover:text-red-400"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

            </article>

        @empty

            <div class="py-24 text-center">

                <p class="text-sm text-zinc-500">
                    Belum ada project.
                </p>

                <a
                    href="{{ route('admin.projects.create') }}"
                    class="mt-5 inline-block text-sm text-white hover:text-zinc-400"
                >
                    + Tambahkan project pertama
                </a>

            </div>

        @endforelse

    </div>

</div>

@endsection