@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-3xl">

    <!-- HEADER -->
    <div>

        <a
            href="{{ route('admin.certificates.index') }}"
            class="text-sm text-zinc-500 transition hover:text-white"
        >
            ← Kembali ke Certificates
        </a>

        <p class="mt-10 text-sm text-zinc-500">
            ADMIN / CERTIFICATES
        </p>

        <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
            Edit Certificate
        </h1>

        <p class="mt-3 text-sm text-zinc-500">
            Perbarui informasi sertifikat atau pencapaian.
        </p>

    </div>


    <!-- FORM -->
    <form
        action="{{ route('admin.certificates.update', $certificate) }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-12 space-y-7"
    >

        @csrf
        @method('PUT')


        <!-- TITLE -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Nama Sertifikat
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $certificate->title) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
                required
            >

            @error('title')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- ISSUER -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Penerbit / Issuer
            </label>

            <input
                type="text"
                name="issuer"
                value="{{ old('issuer', $certificate->issuer) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
            >

            @error('issuer')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- YEAR -->
        <div>

            <label class="mb-2 block text-sm text-zinc-400">
                Tahun
            </label>

            <input
                type="text"
                name="year"
                value="{{ old('year', $certificate->year) }}"
                class="w-full rounded-lg border border-zinc-800 bg-zinc-950 px-4 py-3 text-white outline-none transition focus:border-zinc-600"
            >

            @error('year')
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
            >{{ old('description', $certificate->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- CURRENT IMAGE -->
        @if ($certificate->image)

            <div>

                <p class="mb-3 text-sm text-zinc-400">
                    Gambar Saat Ini
                </p>

                <img
                    src="{{ asset('storage/' . $certificate->image) }}"
                    alt="{{ $certificate->title }}"
                    class="max-h-80 rounded-lg border border-zinc-800 object-cover"
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
                Simpan Perubahan
            </button>

            <a
                href="{{ route('admin.certificates.index') }}"
                class="text-sm text-zinc-500 transition hover:text-white"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection