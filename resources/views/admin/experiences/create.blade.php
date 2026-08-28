@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-3xl">

    <div>
        <a
            href="{{ route('admin.experiences.index') }}"
            class="text-sm text-zinc-500 transition hover:text-white"
        >
            ← Kembali ke Experience
        </a>

        <p class="mt-10 text-sm text-zinc-500">
            ADMIN / EXPERIENCE
        </p>

        <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
            Tambah Experience
        </h1>

        <p class="mt-3 text-sm text-zinc-500">
            Tambahkan pengalaman, organisasi, atau kegiatan kamu.
        </p>
    </div>


    <form
        action="{{ route('admin.experiences.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-12 space-y-7"
    >

        @csrf

        <!-- POSITION -->
        <div>
            <label class="mb-2 block text-sm text-zinc-400">
                Position / Jabatan
            </label>

            <input
                type="text"
                name="position"
                value="{{ old('position') }}"
                placeholder="Contoh: Paskibraka"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none focus:border-zinc-600"
                required
            >

            @error('position')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <!-- ORGANIZATION -->
        <div>
            <label class="mb-2 block text-sm text-zinc-400">
                Organization
            </label>

            <input
                type="text"
                name="organization"
                value="{{ old('organization') }}"
                placeholder="Contoh: Purna Paskibraka Indonesia"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none focus:border-zinc-600"
                required
            >

            @error('organization')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <!-- PERIOD -->
        <div>
            <label class="mb-2 block text-sm text-zinc-400">
                Period
            </label>

            <input
                type="text"
                name="period"
                value="{{ old('period') }}"
                placeholder="Contoh: 2025 – Sekarang"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none focus:border-zinc-600"
            >
        </div>


        <!-- DESCRIPTION -->
        <div>
            <label class="mb-2 block text-sm text-zinc-400">
                Description
            </label>

            <textarea
                name="description"
                rows="5"
                placeholder="Jelaskan pengalaman kamu..."
                class="w-full resize-none rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none focus:border-zinc-600"
            >{{ old('description') }}</textarea>
        </div>


        <!-- IMAGE -->
        <div>
            <label class="mb-2 block text-sm text-zinc-400">
                Gambar
                <span class="text-zinc-600">(Opsional)</span>
            </label>

            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="block w-full rounded-lg border border-zinc-800 bg-zinc-950 text-sm text-zinc-400
                file:mr-4 file:border-0 file:bg-zinc-900 file:px-4 file:py-3
                file:text-sm file:text-white hover:file:bg-zinc-800"
            >

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
                Simpan Experience
            </button>

            <a
                href="{{ route('admin.experiences.index') }}"
                class="text-sm text-zinc-500 hover:text-white"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection