
@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')

<div class="mb-10 border-b border-neutral-200 pb-7">
    <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.25em] text-neutral-500">
        Your Personal Workspace
    </p>

    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
        <div>
            <h1 class="text-4xl font-black uppercase tracking-tight sm:text-5xl">
                My Tasks<span class="text-neutral-300">.</span>
            </h1>
            <p class="mt-3 text-sm text-neutral-500">
                Catat rencana, selesaikan satu per satu.
            </p>
        </div>

        <p class="text-xs uppercase tracking-widest text-neutral-400">
            {{ $todos->count() }} Tugas
        </p>
    </div>
</div>

<div class="mb-6 flex items-center justify-between">
    <h2 class="text-xs font-bold uppercase tracking-[0.18em]">
        Semua Tugas
    </h2>

    <a href="{{ route('todos.create') }}"
       class="border-b border-black pb-1 text-xs font-semibold uppercase tracking-wider hover:text-neutral-500">
        + Tambah Tugas
    </a>
</div>

<div class="border-t border-neutral-200">
    @forelse ($todos as $todo)
        <article class="border-b border-neutral-200 py-6">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                <div class="min-w-0 flex-1">
                    <div class="mb-2 flex items-center gap-2">
                        <span class="h-2 w-2 {{ $todo->is_completed ? 'bg-neutral-900' : 'bg-neutral-300' }}"></span>
                        <span class="text-[10px] font-semibold uppercase tracking-[0.15em] text-neutral-500">
                            {{ $todo->is_completed ? 'Selesai' : 'Belum selesai' }}
                        </span>
                    </div>

                    <h3 class="break-words text-lg font-bold uppercase tracking-tight sm:text-xl">
                        <a href="{{ route('todos.show', $todo) }}"
                           class="hover:text-neutral-500">
                            {{ $todo->title }}
                        </a>
                    </h3>

                    <p class="mt-2 line-clamp-2 whitespace-pre-line break-words text-sm leading-6 text-neutral-500">
                        {{ $todo->description ?: 'Tidak ada deskripsi.' }}
                    </p>
                </div>

                <div class="flex shrink-0 items-center gap-4 text-[10px] font-semibold uppercase tracking-wider">
                    <a href="{{ route('todos.show', $todo) }}"
                       class="hover:text-neutral-400">
                        Detail
                    </a>

                    <a href="{{ route('todos.edit', $todo) }}"
                       class="hover:text-neutral-400">
                        Edit
                    </a>

                    <form action="{{ route('todos.destroy', $todo) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus tugas ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                aria-label="Hapus tugas {{ $todo->title }}"
                                class="text-red-600 hover:text-red-400">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>
        </article>
    @empty
        <div class="border-b border-neutral-200 py-20 text-center">
            <p class="text-lg font-bold uppercase tracking-tight">
                Belum Ada Tugas.
            </p>
            <p class="mt-2 text-sm text-neutral-500">
                Mulai susun aktivitasmu hari ini.
            </p>
            <a href="{{ route('todos.create') }}"
               class="mt-6 inline-block bg-black px-6 py-3 text-xs font-semibold uppercase tracking-widest text-white hover:bg-neutral-700">
                Buat Tugas Pertama
            </a>
        </div>
    @endforelse
</div>

@endsection
