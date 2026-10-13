
@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')

<div class="mx-auto max-w-2xl">
    <a href="{{ route('todos.index') }}"
       class="text-xs font-semibold uppercase tracking-wider text-neutral-500 hover:text-black">
        ← Kembali ke daftar
    </a>

    <div class="mb-8 mt-8 border-b border-neutral-200 pb-6">
        <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.25em] text-neutral-500">
            Update Task
        </p>
        <h1 class="text-4xl font-black uppercase tracking-tight">
            Edit Tugas<span class="text-neutral-300">.</span>
        </h1>
        <p class="mt-3 text-sm text-neutral-500">
            Perbarui informasi tugasmu.
        </p>
    </div>

    <form action="{{ route('todos.update', $todo) }}" method="POST" class="space-y-7">
        @csrf
        @method('PUT')

        <div>
            <label for="title"
                   class="mb-3 block text-xs font-bold uppercase tracking-wider">
                Judul Tugas <span class="text-red-600">*</span>
            </label>

            <input id="title" name="title" type="text" maxlength="255"
                   value="{{ old('title', $todo->title) }}" required
                   class="w-full border border-neutral-300 px-4 py-3.5 text-sm outline-none focus:border-black">
        </div>

        <div>
            <label for="description"
                   class="mb-3 block text-xs font-bold uppercase tracking-wider">
                Deskripsi <span class="font-normal text-neutral-400">(Opsional)</span>
            </label>

            <textarea id="description" name="description" rows="5" maxlength="5000"
                      class="w-full resize-y border border-neutral-300 px-4 py-3.5 text-sm outline-none focus:border-black">{{ old('description', $todo->description) }}</textarea>
        </div>

        <input type="hidden" name="is_completed" value="0">

        <label class="flex cursor-pointer items-center gap-3 border border-neutral-200 p-4">
            <input type="checkbox" name="is_completed" value="1"
                   @checked(old('is_completed', $todo->is_completed))
                   class="h-4 w-4 accent-black">
            <span class="text-xs font-semibold uppercase tracking-wider">
                Tugas sudah selesai
            </span>
        </label>

        <div class="flex flex-col-reverse gap-3 border-t border-neutral-200 pt-6 sm:flex-row">
            <a href="{{ route('todos.index') }}"
               class="flex-1 border border-neutral-300 px-5 py-3.5 text-center text-xs font-semibold uppercase tracking-wider hover:border-black">
                Batal
            </a>

            <button type="submit"
                    class="flex-1 bg-black px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-white hover:bg-neutral-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection
