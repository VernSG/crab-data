@extends('layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">📝 Catat Tangkapan</h1>
        <p class="text-slate-500 text-base mt-1">Isi data hasil tangkapan hari ini.</p>
    </div>

    {{-- Flash Message Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg mb-6 text-base font-medium">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-base">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('input.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Tanggal Masehi --}}
        <div>
            <label for="tanggal_masehi" class="block text-lg font-semibold text-slate-700 mb-2">Tanggal Masehi</label>
            <input
                type="date"
                name="tanggal_masehi"
                id="tanggal_masehi"
                value="{{ old('tanggal_masehi', now()->toDateString()) }}"
                required
                class="w-full text-xl p-4 border-2 border-slate-300 rounded-xl focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
            >
        </div>

        {{-- Tanggal Jawa --}}
        <div>
            <label for="tanggal_jawa" class="block text-lg font-semibold text-slate-700 mb-2">Tanggal Jawa (1-30)</label>
            <input
                type="number"
                name="tanggal_jawa"
                id="tanggal_jawa"
                min="1"
                max="30"
                value="{{ old('tanggal_jawa') }}"
                placeholder="Contoh: 15"
                required
                class="w-full text-xl p-4 border-2 border-slate-300 rounded-xl focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
            >
        </div>

        {{-- Lokasi Blok --}}
        <div>
            <label for="lokasi_blok" class="block text-lg font-semibold text-slate-700 mb-2">Lokasi Blok</label>
            <select
                name="lokasi_blok"
                id="lokasi_blok"
                required
                class="w-full text-xl p-4 border-2 border-slate-300 rounded-xl bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition appearance-none"
            >
                <option value="" disabled {{ old('lokasi_blok') ? '' : 'selected' }}>-- Pilih Lokasi --</option>
                @foreach (['Perumahan', 'Pasar', 'Belakang SD', 'Kapal Kecil', 'Samping Batavia'] as $lokasi)
                    <option value="{{ $lokasi }}" {{ old('lokasi_blok') === $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                @endforeach
            </select>
        </div>

        {{-- Hasil KG --}}
        <div>
            <label for="hasil_kg" class="block text-lg font-semibold text-slate-700 mb-2">Hasil Tangkapan (kg)</label>
            <input
                type="number"
                name="hasil_kg"
                id="hasil_kg"
                step="0.01"
                min="0"
                value="{{ old('hasil_kg') }}"
                placeholder="Contoh: 2.50"
                required
                class="w-full text-xl p-4 border-2 border-slate-300 rounded-xl focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
            >
        </div>

        {{-- Tombol Simpan --}}
        <button
            type="submit"
            class="w-full bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white text-xl font-bold py-5 rounded-xl shadow-lg transition"
        >
            💾 Simpan Data
        </button>
    </form>
@endsection
