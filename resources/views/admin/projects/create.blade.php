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
            Tambah Project
        </h1>

        <p class="mt-3 text-sm text-zinc-500">
            Tambahkan project baru ke portfolio kamu.
        </p>

    </div>


    <!-- FORM -->
    <form
        action="{{ route('admin.projects.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-12 space-y-7"
    >

        @csrf


        <!-- TITLE -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Nama Project
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Contoh: Website Desa Pakijangan"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
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
                placeholder="Jelaskan project kamu..."
                class="w-full resize-none rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
                required
            >{{ old('description') }}</textarea>

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
                value="{{ old('technologies') }}"
                placeholder="Laravel • MySQL • Tailwind CSS"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
            >

        </div>


        <!-- GITHUB -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                GitHub URL
                <span class="text-zinc-600">(Opsional)</span>
            </label>

            <input
                type="url"
                name="github_url"
                value="{{ old('github_url') }}"
                placeholder="https://github.com/username/project"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
            >

        </div>


        <!-- DEMO -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Demo URL
                <span class="text-zinc-600">(Opsional)</span>
            </label>

            <input
                type="url"
                name="demo_url"
                value="{{ old('demo_url') }}"
                placeholder="https://website-project.com"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
            >

        </div>


        <!-- IMAGE -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Gambar Project
            </label>

            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="block w-full cursor-pointer rounded-lg border border-zinc-800 bg-zinc-950 text-sm text-zinc-400
                file:mr-4 file:border-0 file:bg-zinc-900 file:px-4 file:py-3
                file:text-sm file:text-white hover:file:bg-zinc-800"
            >

            <p class="mt-2 text-xs text-zinc-600">
                JPG, PNG, atau WEBP. Maksimal 2MB.
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
                Simpan Project
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