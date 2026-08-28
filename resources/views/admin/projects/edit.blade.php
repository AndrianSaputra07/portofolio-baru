@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-3xl">

    <!-- HEADER -->
    <div>

        <a
            href="{{ route('admin.projects.index') }}"
            class="text-sm text-zinc-500 transition hover:text-white"
        >
            ← Kembali ke Projects
        </a>

        <p class="mt-10 text-sm text-zinc-500">
            ADMIN / PROJECTS
        </p>

        <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
            Edit Project
        </h1>

        <p class="mt-3 text-sm text-zinc-500">
            Perbarui informasi project kamu.
        </p>

    </div>


    <!-- FORM -->
    <form
        action="{{ route('admin.projects.update', $project) }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-12 space-y-7"
    >

        @csrf
        @method('PUT')


        <!-- TITLE -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Nama Project
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $project->title) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
                required
            >

            @error('title')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- DESCRIPTION -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Deskripsi
            </label>

            <textarea
                name="description"
                rows="5"
                class="w-full resize-none rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
                required
            >{{ old('description', $project->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- TECHNOLOGIES -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Technologies
            </label>

            <input
                type="text"
                name="technologies"
                value="{{ old('technologies', $project->technologies) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
            >

        </div>


        <!-- GITHUB -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                GitHub URL
            </label>

            <input
                type="url"
                name="github_url"
                value="{{ old('github_url', $project->github_url) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
            >

        </div>


        <!-- DEMO -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Demo URL
            </label>

            <input
                type="url"
                name="demo_url"
                value="{{ old('demo_url', $project->demo_url) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
            >

        </div>


        <!-- IMAGE -->
        <div>

            <label class="mb-3 block text-sm text-zinc-400">
                Gambar Project
            </label>

            @if ($project->image)

                <img
                    src="{{ asset('storage/' . $project->image) }}"
                    alt="{{ $project->title }}"
                    class="mb-4 h-48 w-full rounded-lg border border-zinc-800 object-cover"
                >

            @endif

            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="block w-full cursor-pointer rounded-lg border border-zinc-800 bg-zinc-950 text-sm text-zinc-400
                file:mr-4 file:border-0 file:bg-zinc-900 file:px-4 file:py-3
                file:text-sm file:text-white hover:file:bg-zinc-800"
            >

            <p class="mt-2 text-xs text-zinc-600">
                Kosongkan jika tidak ingin mengganti gambar.
            </p>

            @error('image')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- BUTTON -->
        <div class="flex items-center gap-5 pt-4">

            <button
                type="submit"
                class="rounded-lg bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-zinc-200"
            >
                Update Project
            </button>

            <a
                href="{{ route('admin.projects.index') }}"
                class="text-sm text-zinc-500 transition hover:text-white"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection