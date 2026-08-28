@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-3xl">

    <!-- HEADER -->
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
            Edit Experience
        </h1>

        <p class="mt-3 text-sm text-zinc-500">
            Perbarui informasi pengalaman kamu.
        </p>

    </div>


    <!-- FORM -->
    <form
        action="{{ route('admin.experiences.update', $experience) }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-12 space-y-7"
    >

        @csrf
        @method('PUT')


        <!-- POSITION -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Position / Jabatan
            </label>

            <input
                type="text"
                name="position"
                value="{{ old('position', $experience->position) }}"
                placeholder="Contoh: Paskibraka Jawa Timur"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
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
                value="{{ old('organization', $experience->organization) }}"
                placeholder="Contoh: Purna Paskibraka Indonesia"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
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
                value="{{ old('period', $experience->period) }}"
                placeholder="Contoh: 2025 - Sekarang"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
            >

            @error('period')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

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
                class="w-full resize-none rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition placeholder:text-zinc-700 focus:border-zinc-600"
            >{{ old('description', $experience->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- CURRENT IMAGE -->
        @if ($experience->image)

            <div>

                <label class="mb-3 block text-sm text-zinc-400">
                    Gambar Saat Ini
                </label>

                <img
                    src="{{ asset('storage/' . $experience->image) }}"
                    alt="{{ $experience->position }}"
                    class="h-56 w-full rounded-lg border border-zinc-800 object-cover"
                >

            </div>

        @endif


        <!-- NEW IMAGE -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Ganti Gambar
                <span class="text-zinc-600">(Opsional)</span>
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
                Update Experience
            </button>

            <a
                href="{{ route('admin.experiences.index') }}"
                class="text-sm text-zinc-500 transition hover:text-white"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection