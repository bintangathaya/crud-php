
@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')

<div class="mx-auto max-w-3xl">
    <a href="{{ route('todos.index') }}"
       class="text-xs font-semibold uppercase tracking-wider text-neutral-500 hover:text-black">
        ← Kembali ke daftar
    </a>

    <div class="mb-8 mt-8 border-b border-neutral-200 pb-8">
        <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.25em] text-neutral-500">
            Task Details
        </p>

        <span class="inline-block border border-neutral-300 px-3 py-1 text-[10px] font-semibold uppercase tracking-wider">
            {{ $todo->is_completed ? '✓ Selesai' : 'Belum Selesai' }}
        </span>

        <h1 class="mt-5 break-words text-3xl font-black uppercase tracking-tight sm:text-5xl">
            {{ $todo->title }}<span class="text-neutral-300">.</span>
        </h1>
    </div>

    <div class="grid gap-3 border-b border-neutral-200 pb-8 sm:grid-cols-[140px_1fr] sm:gap-8">
        <h2 class="text-xs font-bold uppercase tracking-wider text-neutral-500">
            Deskripsi
        </h2>

        <p class="whitespace-pre-line break-words text-sm leading-7 text-neutral-700">
            {{ $todo->description ?: 'Tidak ada deskripsi.' }}
        </p>
    </div>

    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="{{ route('todos.edit', $todo) }}"
           class="bg-black px-8 py-4 text-center text-xs font-semibold uppercase tracking-widest text-white hover:bg-neutral-700">
            Edit Tugas
        </a>

        <a href="{{ route('todos.index', $todo) }}"
           class="border border-neutral-300 px-8 py-4 text-center text-xs font-semibold uppercase tracking-widest hover:border-black">
            Kembali
        </a>
    </div>
</div>

@endsection
