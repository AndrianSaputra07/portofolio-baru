@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-5xl">

    <!-- HEADER -->
    <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">

        <div>
            <p class="text-sm text-zinc-500">
                ADMIN / CERTIFICATES
            </p>

            <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
                Certificates
            </h1>

            <p class="mt-3 text-sm text-zinc-500">
                Kelola sertifikat dan pencapaian kamu.
            </p>
        </div>

        <a
            href="{{ route('admin.certificates.create') }}"
            class="inline-flex w-fit items-center rounded-lg bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-zinc-200"
        >
            + Tambah Certificate
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if (session('success'))

        <div class="mt-8 rounded-lg border border-green-900 bg-green-950/30 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>

    @endif


    <!-- CERTIFICATE LIST -->
    <div class="mt-12 grid gap-6 md:grid-cols-2">

        @forelse ($certificates as $certificate)

            <article class="overflow-hidden rounded-xl border border-zinc-800 bg-zinc-950">

                <!-- IMAGE -->
                @if ($certificate->image)

                    <img
                        src="{{ asset('storage/' . $certificate->image) }}"
                        alt="{{ $certificate->title }}"
                        class="h-52 w-full object-cover"
                    >

                @else

                    <div class="flex h-52 items-center justify-center bg-zinc-900 text-xs tracking-wider text-zinc-600">
                        NO IMAGE
                    </div>

                @endif


                <!-- CONTENT -->
                <div class="p-6">

                    <div class="flex items-start justify-between gap-4">

                        <div>

                            @if ($certificate->year)

                                <p class="text-xs text-zinc-600">
                                    {{ $certificate->year }}
                                </p>

                            @endif

                            <h2 class="mt-2 text-xl font-medium text-white">
                                {{ $certificate->title }}
                            </h2>

                            @if ($certificate->issuer)

                                <p class="mt-2 text-sm text-zinc-400">
                                    {{ $certificate->issuer }}
                                </p>

                            @endif

                        </div>

                    </div>


                    @if ($certificate->description)

                        <p class="mt-5 text-sm leading-6 text-zinc-500">
                            {{ $certificate->description }}
                        </p>

                    @endif


                    <!-- ACTION -->
                    <div class="mt-6 flex items-center gap-5 border-t border-zinc-900 pt-5">

                        <a
                            href="{{ route('admin.certificates.edit', $certificate) }}"
                            class="text-sm text-zinc-300 transition hover:text-white"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('admin.certificates.destroy', $certificate) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus certificate ini?')"
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

                </div>

            </article>

        @empty

            <div class="col-span-full py-24 text-center">

                <p class="text-sm text-zinc-500">
                    Belum ada certificate.
                </p>

                <a
                    href="{{ route('admin.certificates.create') }}"
                    class="mt-5 inline-block text-sm text-white transition hover:text-zinc-400"
                >
                    + Tambahkan certificate pertama
                </a>

            </div>

        @endforelse

    </div>

</div>

@endsection