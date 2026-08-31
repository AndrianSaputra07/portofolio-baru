<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Muhammad Andrian Saputra — Web Developer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0a0a0a] text-zinc-100 antialiased">

    <!-- ==================== NAVBAR ==================== -->
    <nav class="fixed left-0 top-0 z-50 w-full border-b border-zinc-900/50 bg-[#0a0a0a]/80 backdrop-blur-md">

        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-6">

            <!-- Logo -->
            <a href="#home" class="text-sm font-semibold tracking-tight text-white">
                MAS<span class="text-zinc-500">.</span>
            </a>

            <!-- Navigation Desktop -->
            <div class="hidden items-center gap-8 text-sm text-zinc-400 md:flex">

                <a href="#about" class="transition hover:text-white">
                    About
                </a>

                <a href="#skills" class="transition hover:text-white">
                    Skills
                </a>

                <a href="#projects" class="transition hover:text-white">
                    Projects
                </a>

            </div>

            <!-- Contact -->
            <a
                href="#contact"
                class="text-sm text-zinc-300 transition hover:text-white"
            >
                Let's talk →
            </a>

        </div>

    </nav>


    <main id="home">

        <!-- ==================== HERO ==================== -->
<section class="flex min-h-screen items-center pt-24">

    <div class="mx-auto grid w-full max-w-6xl items-center gap-16 px-6 lg:grid-cols-12">

        <!-- HERO CONTENT -->
        <div class="lg:col-span-8">

            <p class="mb-6 text-sm tracking-[0.2em] text-zinc-500">
                WEB DEVELOPER / STUDENT
            </p>

            <h1
                class="text-5xl font-semibold leading-[0.95] tracking-[-0.04em] text-white sm:text-7xl lg:text-8xl"
            >
                Muhammad
                <br>

                <span class="text-zinc-500">
                    Andrian Saputra.
                </span>
            </h1>

            <div class="mt-10 max-w-2xl">

                <p class="text-base leading-7 text-zinc-400">
                    Saya mengembangkan website dan aplikasi dengan mengutamakan fungsionalitas,
                    tampilan yang responsif, serta pengalaman pengguna yang nyaman.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <!-- Projects -->
                    <a
                        href="#projects"
                        class="rounded-full bg-white px-5 py-3 text-sm font-medium text-black transition hover:bg-zinc-300"
                    >
                        Lihat project
                    </a>

                    <!-- Download CV -->
                    <a
                        href="{{ asset('cv/Muhammad_Andrian_Saputra_CV.pdf') }}"
                        download="CV-Muhammad-Andrian-Saputra.pdf"
                        class="rounded-full border border-zinc-800 px-5 py-3 text-sm text-zinc-300 transition hover:border-zinc-600 hover:text-white"
                    >
                        Download CV
                    </a>

                    <!-- Contact -->
                    <a
                        href="#contact"
                        class="rounded-full border border-zinc-800 px-5 py-3 text-sm text-zinc-300 transition hover:border-zinc-600 hover:text-white"
                    >
                        Hubungi saya
                    </a>

                </div>

            </div>

        </div>


        <!-- PROFILE PHOTO -->
        <div class="flex justify-center lg:col-span-4 lg:justify-end">

            <img
                src="{{ asset('images/profile.jpeg') }}"
                alt="Muhammad Andrian Saputra"
                class="h-[420px] w-[320px] rounded-2xl border border-zinc-800 object-cover grayscale transition duration-500 hover:grayscale-0"
            >

        </div>

    </div>

</section>


        <!-- ==================== ABOUT ==================== -->
        <section id="about" class="border-t border-zinc-900 py-28">

            <div class="mx-auto grid max-w-6xl gap-12 px-6 md:grid-cols-12">

                <div class="md:col-span-3">

                    <p class="text-sm text-zinc-500">
                        01 / ABOUT
                    </p>

                </div>

                <div class="md:col-span-9">

                    <h2
                        class="max-w-3xl text-3xl font-medium leading-tight tracking-tight text-white md:text-5xl"
                    >
                        Pelajar yang berfokus pada teknologi dan pengembangan web,
                        dengan ketertarikan dalam membangun produk digital yang relevan dan mudah digunakan.
                    </h2>

                    <p class="mt-8 max-w-2xl leading-7 text-zinc-400">
                        Saya terus mengembangkan kemampuan melalui pembelajaran, eksplorasi teknologi,
                        dan pengalaman mengerjakan berbagai project. Saya memiliki minat pada frontend,
                        backend, dan sistem berbasis web, serta terbuka untuk terus belajar dan berkembang
                        melalui pengalaman baru di dunia profesional.
                    </p>

                </div>

            </div>

        </section>

        <!-- ==================== EXPERIENCE ==================== -->
<section id="experience" class="border-t border-zinc-900 py-28">

    <div class="mx-auto max-w-6xl px-6">

        <div class="mb-16">

            <p class="text-sm text-zinc-500">
                02 / EXPERIENCE
            </p>

        </div>


        <div class="divide-y divide-zinc-900 border-t border-zinc-900">

            @forelse ($experiences as $experience)

                <article class="grid gap-8 py-10 md:grid-cols-12">

                    <!-- IMAGE -->
                    <div class="md:col-span-3">

                        @if ($experience->image)

                            <img
                                src="{{ asset('storage/' . $experience->image) }}"
                                alt="{{ $experience->position }}"
                                class="h-48 w-full rounded-lg border border-zinc-800 object-cover"
                            >

                        @else

                            <div class="flex h-48 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 text-xs text-zinc-600">
                                NO IMAGE
                            </div>

                        @endif

                    </div>


                    <!-- INFORMATION -->
                    <div class="md:col-span-7">

                        <p class="text-sm text-zinc-500">
                            {{ $experience->period }}
                        </p>

                        <h3 class="mt-3 text-2xl font-medium text-white">
                            {{ $experience->position }}
                        </h3>

                        <p class="mt-2 text-sm text-zinc-400">
                            {{ $experience->organization }}
                        </p>

                        @if ($experience->description)

                            <p class="mt-5 max-w-2xl text-sm leading-7 text-zinc-500">
                                {{ $experience->description }}
                            </p>

                        @endif

                    </div>


                    <!-- NUMBER -->
                    <div class="md:col-span-2 md:text-right">

                        <span class="text-sm text-zinc-700">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                    </div>

                </article>

            @empty

                <div class="py-20">

                    <p class="text-sm text-zinc-500">
                        Belum ada pengalaman yang ditampilkan.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

        <!-- ==================== SKILLS ==================== -->
        <section id="skills" class="border-t border-zinc-900 py-28">

            <div class="mx-auto max-w-6xl px-6">

                <div class="mb-16">

                    <p class="text-sm text-zinc-500">
                        03 / SKILLS
                    </p>

                </div>

                <div class="grid gap-12 md:grid-cols-3">

                    <!-- Frontend -->
                    <div>

                        <p class="mb-6 text-sm text-zinc-500">
                            Frontend
                        </p>

                        <ul class="space-y-3 text-xl text-zinc-200">

                            <li>HTML</li>
                            <li>CSS</li>
                            <li>JavaScript</li>
                            <li>Tailwind CSS</li>
                            <li>Vue.js</li>
                            <li>React</li>

                        </ul>

                    </div>


                    <!-- Backend -->
                    <div>

                        <p class="mb-6 text-sm text-zinc-500">
                            Backend
                        </p>

                        <ul class="space-y-3 text-xl text-zinc-200">

                            <li>PHP</li>
                            <li>Laravel</li>
                            <li>CodeIgniter</li>
                            <li>REST API</li>

                        </ul>

                    </div>


                    <!-- Tools -->
                    <div>

                        <p class="mb-6 text-sm text-zinc-500">
                            Tools & Database
                        </p>

                        <ul class="space-y-3 text-xl text-zinc-200">

                            <li>MySQL</li>
                            <li>Git</li>
                            <li>GitHub</li>
                            <li>VS Code</li>
                            <li>Figma</li>

                        </ul>

                    </div>

                </div>

            </div>

        </section>


        <!-- ==================== PROJECTS ==================== -->
        <section id="projects" class="border-t border-zinc-900 py-28">

            <div class="mx-auto max-w-6xl px-6">

                <!-- Header -->
                <div class="mb-16 flex items-end justify-between">

                    <p class="text-sm text-zinc-500">
                        04 / SELECTED PROJECTS
                    </p>

                    <span class="hidden text-sm text-zinc-600 md:block">
                        {{ $projects->count() }} Projects
                    </span>

                </div>


                <!-- Project List -->
                <div class="divide-y divide-zinc-900 border-t border-zinc-900">

                    @forelse ($projects as $project)

                        <article
                            class="group grid gap-6 py-8 transition md:grid-cols-12 md:items-center"
                        >

                            <!-- Nomor Project -->
                            <div class="md:col-span-1">

                                <span class="text-sm text-zinc-600">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </div>


                            <!-- Gambar Project -->
                            <div class="md:col-span-3">

                                @if ($project->image)

                                    <div class="overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900">

                                        <img
                                            src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->title }}"
                                            class="h-32 w-full object-cover transition duration-500 group-hover:scale-105"
                                        >

                                    </div>

                                @else

                                    <div
                                        class="flex h-32 items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 text-xs tracking-wider text-zinc-600"
                                    >
                                        NO IMAGE
                                    </div>

                                @endif

                            </div>


                            <!-- Informasi Project -->
                            <div class="md:col-span-5">

                                <h3
                                    class="text-2xl font-medium text-white transition group-hover:text-zinc-400"
                                >
                                    {{ $project->title }}
                                </h3>

                                <p class="mt-3 max-w-lg text-sm leading-6 text-zinc-500">
                                    {{ $project->description }}
                                </p>

                            </div>


                            <!-- Technology -->
                            <div class="text-sm text-zinc-500 md:col-span-2">

                                {{ $project->technologies ?? '-' }}

                            </div>


                            <!-- Link -->
                            <div class="md:col-span-1 md:text-right">

                                @if ($project->demo_url)

                                    <a
                                        href="{{ $project->demo_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="Lihat project {{ $project->title }}"
                                        class="inline-flex text-xl text-zinc-600 transition hover:text-white"
                                    >
                                        ↗
                                    </a>

                                @elseif ($project->github_url)

                                    <a
                                        href="{{ $project->github_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="Lihat GitHub {{ $project->title }}"
                                        class="inline-flex text-xl text-zinc-600 transition hover:text-white"
                                    >
                                        ↗
                                    </a>

                                @else

                                    <span class="text-xl text-zinc-800">
                                        —
                                    </span>

                                @endif

                            </div>

                        </article>

                    @empty

                        <div class="py-20 text-center">

                            <p class="text-sm text-zinc-500">
                                Belum ada project yang ditampilkan.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </section>

        <!-- ==================== CERTIFICATES ==================== -->
<section id="certificates" class="border-t border-zinc-900 py-28">

    <div class="mx-auto max-w-6xl px-6">

        <div class="mb-16 flex items-end justify-between">

            <p class="text-sm text-zinc-500">
                06 / CERTIFICATES & ACHIEVEMENTS
            </p>

            <span class="hidden text-sm text-zinc-600 md:block">
                {{ $certificates->count() }} Certificates
            </span>

        </div>


        <div class="grid gap-6 md:grid-cols-2">

            @forelse ($certificates as $certificate)

                <article class="group border border-zinc-900 bg-zinc-950 transition hover:border-zinc-700">

                    @if ($certificate->image)

                        <div class="overflow-hidden border-b border-zinc-900">

                            <img
                                src="{{ asset('storage/' . $certificate->image) }}"
                                alt="{{ $certificate->title }}"
                                class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-[1.02]"
                            >

                        </div>

                    @endif


                    <div class="p-7">

                        <div class="flex items-start justify-between gap-6">

                            <div>

                                @if ($certificate->year)

                                    <p class="text-xs text-zinc-600">
                                        {{ $certificate->year }}
                                    </p>

                                @endif


                                <h3 class="mt-2 text-xl font-medium text-white">
                                    {{ $certificate->title }}
                                </h3>


                                @if ($certificate->issuer)

                                    <p class="mt-2 text-sm text-zinc-400">
                                        {{ $certificate->issuer }}
                                    </p>

                                @endif

                            </div>

                            <span class="text-zinc-700">
                                ↗
                            </span>

                        </div>


                        @if ($certificate->description)

                            <p class="mt-6 text-sm leading-7 text-zinc-500">
                                {{ $certificate->description }}
                            </p>

                        @endif

                    </div>

                </article>

            @empty

                <div class="py-12 text-sm text-zinc-600">
                    Belum ada sertifikat yang ditampilkan.
                </div>

            @endforelse

        </div>

    </div>

</section>

        <!-- ==================== CONTACT ==================== -->
<section id="contact" class="border-t border-zinc-900 py-32">

    <div class="mx-auto max-w-6xl px-6">

        <p class="mb-8 text-sm text-zinc-500">
            06 / CONTACT
        </p>

        <h2
            class="max-w-4xl text-4xl font-medium leading-tight tracking-tight text-white md:text-6xl"
        >
            Punya ide atau ingin

            <span class="text-zinc-500">
                bekerja sama?
            </span>
        </h2>


        <!-- EMAIL BUTTON -->
        <div class="mt-12">

            <a
                href="mailto:putraandrian734@gmail.com"
                class="inline-flex items-center gap-3 text-lg text-white transition hover:text-zinc-400"
            >
                Kirim pesan

                <span>
                    ↗
                </span>
            </a>

        </div>


        <!-- ==================== SOCIAL LINKS ==================== -->
        <div class="mt-20 border-t border-zinc-900 pt-4">

            <div class="grid gap-x-12 md:grid-cols-2">

                <!-- GitHub -->
                <a
                    href="https://github.com/AndrianSaputra07"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group flex items-center justify-between border-b border-zinc-900 py-5 text-zinc-400 transition hover:text-white"
                >
                    <span class="text-sm">
                        GitHub
                    </span>

                    <span class="transition duration-200 group-hover:translate-x-1 group-hover:-translate-y-1">
                        ↗
                    </span>
                </a>


                <!-- LinkedIn -->
                <a
                    href="https://www.linkedin.com/in/muhammad-andrian-saputra-89367b431/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group flex items-center justify-between border-b border-zinc-900 py-5 text-zinc-400 transition hover:text-white"
                >
                    <span class="text-sm">
                        LinkedIn
                    </span>

                    <span class="transition duration-200 group-hover:translate-x-1 group-hover:-translate-y-1">
                        ↗
                    </span>
                </a>


                <!-- Instagram -->
                <a
                    href="https://www.instagram.com/putt_xzz/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group flex items-center justify-between border-b border-zinc-900 py-5 text-zinc-400 transition hover:text-white"
                >
                    <span class="text-sm">
                        Instagram
                    </span>

                    <span class="transition duration-200 group-hover:translate-x-1 group-hover:-translate-y-1">
                        ↗
                    </span>
                </a>

            </div>

        </div>

    </div>

</section>


        <!-- ==================== FOOTER ==================== -->
        <footer class="border-t border-zinc-900">

            <div
                class="mx-auto flex max-w-6xl flex-col justify-between gap-4 px-6 py-8 text-sm text-zinc-600 md:flex-row"
            >

                <p>
                    © {{ date('Y') }} Muhammad Andrian Saputra
                </p>

                <p>
                    Built with Laravel
                </p>

            </div>

        </footer>

    </main>

</body>

</html>