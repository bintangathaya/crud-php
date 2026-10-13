
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Daftar Tugas') — TODO.</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex flex-col bg-white text-neutral-900 antialiased">

    <div class="bg-black px-4 py-2 text-center text-[10px] font-medium uppercase tracking-[0.2em] text-white">Organize Your Day · Elevate Your Life
    </div>

    <header class="border-b border-neutral-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-5 sm:px-8">
            <a href="{{ route('todos.index') }}"
               class="text-3xl font-black uppercase tracking-[-0.09em] text-black">
                TODO<span class="text-neutral-400">.</span>
            </a>

            <nav class="hidden items-center gap-8 text-[11px] font-semibold uppercase tracking-[0.15em] sm:flex">
                <a href="{{ route('todos.index') }}" class="hover:text-neutral-400">
                    Beranda
                </a>
                <a href="{{ route('todos.create') }}" class="hover:text-neutral-400">
                    Tambah Tugas
                </a>
            </nav>

            <a href="{{ route('todos.create') }}"
               class="border border-black bg-black px-4 py-3 text-[10px] font-semibold uppercase tracking-wider text-white hover:bg-white hover:text-black sm:px-5">
                + Tugas Baru
            </a>
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-5 py-8 sm:px-8 sm:py-12">
        @if (session('success'))
            <div role="status"
                 class="mb-6 border border-neutral-200 bg-neutral-50 px-5 py-4 text-sm">
                <span class="font-bold">Berhasil.</span>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div role="alert"
                 class="mb-6 border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                <p class="font-semibold">Periksa kembali isianmu:</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-neutral-200 bg-neutral-50">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-3 px-5 py-6 sm:flex-row sm:px-8">
            <a href="{{ route('todos.index') }}"
               class="text-xl font-black uppercase tracking-[-0.08em]">
                TODO<span class="text-neutral-400">.</span>
            </a>

            <p class="text-center text-[10px] uppercase tracking-[0.15em] text-neutral-500">
                Laravel 13 · Blade · SQLite
            </p>

            <p class="text-xs text-neutral-400">
                © {{ date('Y') }} Todo Studio
            </p>
        </div>
    </footer>

</body>
</html>
