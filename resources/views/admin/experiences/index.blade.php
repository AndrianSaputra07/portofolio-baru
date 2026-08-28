@extends('admin.layouts.app')

@section('content')

<div class="mx-auto max-w-5xl">

    <!-- HEADER -->
    <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">

        <div>
            <p class="text-sm text-zinc-500">
                ADMIN / EXPERIENCE
            </p>

            <h1 class="mt-3 text-3xl font-semibold tracking-tight text-white">
                Experience
            </h1>

            <p class="mt-3 text-sm text-zinc-500">
                Kelola pengalaman, organisasi, dan kegiatan kamu.
            </p>
        </div>

        <a
            href="{{ route('admin.experiences.create') }}"
            class="inline-flex w-fit items-center rounded-lg bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-zinc-200"
        >
            + Tambah Experience
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if (session('success'))

        <div class="mt-8 rounded-lg border border-green-900 bg-green-950/30 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>

    @endif


    <!-- EXPERIENCE LIST -->
    <div class="mt-12 divide-y divide-zinc-900 border-t border-zinc-900">

        @forelse ($experiences as $experience)

            <article class="grid gap-6 py-8 md:grid-cols-12 md:items-center">

                <!-- IMAGE -->
                <div class="md:col-span-3">

                    @if ($experience->image)

                        <div class="overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900">

                            <img
                                src="{{ asset('storage/' . $experience->image) }}"
                                alt="{{ $experience->position }}"
                                class="h-32 w-full object-cover"
                            >

                        </div>

                    @else

                        <div class="flex h-32 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 text-xs tracking-wider text-zinc-600">
                            NO IMAGE
                        </div>

                    @endif

                </div>


                <!-- INFORMATION -->
                <div class="md:col-span-6">

                    <h2 class="text-xl font-medium text-white">
                        {{ $experience->position }}
                    </h2>

                    <p class="mt-1 text-sm text-zinc-400">
                        {{ $experience->organization }}
                    </p>

                    @if ($experience->period)

                        <p class="mt-3 text-xs text-zinc-600">
                            {{ $experience->period }}
                        </p>

                    @endif

                    @if ($experience->description)

                        <p class="mt-3 text-sm leading-6 text-zinc-500">
                            {{ $experience->description }}
                        </p>

                    @endif

                </div>


                <!-- ACTION -->
                <div class="flex gap-4 md:col-span-3 md:justify-end">

                    <a
                        href="{{ route('admin.experiences.edit', $experience) }}"
                        class="text-sm text-zinc-300 transition hover:text-white"
                    >
                        Edit
                    </a>


                    <form
                        action="{{ route('admin.experiences.destroy', $experience) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus experience ini?')"
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
                    Belum ada experience.
                </p>

                <a
                    href="{{ route('admin.experiences.create') }}"
                    class="mt-5 inline-block text-sm text-white transition hover:text-zinc-400"
                >
                    + Tambahkan experience pertama
                </a>

            </div>

        @endforelse

    </div>

</div>

@endsection