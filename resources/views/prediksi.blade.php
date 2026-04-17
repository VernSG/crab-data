@extends('layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">🔮 Prediksi Tangkapan</h1>
        <p class="text-slate-500 text-base mt-1">Masukkan tanggal Jawa untuk melihat prediksi di semua lokasi.</p>
    </div>

    {{-- Flash Message Success --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg mb-6 text-base font-medium">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Flash Message Error --}}
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-base font-medium">
            ❌ {{ session('error') }}
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

    <form action="{{ route('predict') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Tanggal Jawa --}}
        <div>
            <label for="tanggal_jawa" class="block text-lg font-semibold text-slate-700 mb-2">Tanggal Jawa (1-30)</label>
            <input
                type="number"
                name="tanggal_jawa"
                id="tanggal_jawa"
                min="1"
                max="30"
                value="{{ old('tanggal_jawa', session('tanggal_input')) }}"
                placeholder="Contoh: 15"
                required
                class="w-full text-xl p-4 border-2 border-slate-300 rounded-xl focus:border-teal-500 focus:ring-2 focus:ring-teal-200 focus:outline-none transition"
            >
        </div>

        {{-- Tombol Prediksi --}}
        <button
            type="submit"
            class="w-full bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white text-xl font-bold py-5 rounded-xl shadow-lg transition"
        >
            🔮 Prediksi Sekarang
        </button>
    </form>

    {{-- Tabel Hasil Prediksi Semua Lokasi --}}
    @if (session('hasil_prediksi'))
        <div class="mt-8">
            <h2 class="text-lg font-bold text-slate-800 mb-3">📊 Hasil Prediksi — Tanggal Jawa {{ session('tanggal_input') }}</h2>
            <div class="overflow-hidden rounded-xl border border-slate-200">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-teal-700 text-white">
                            <th class="px-4 py-3 font-semibold">Lokasi</th>
                            <th class="px-4 py-3 font-semibold text-right">Prediksi (Kg)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach (session('hasil_prediksi') as $item)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-700">{{ $item['lokasi'] }}</td>
                                <td class="px-4 py-3 text-right font-semibold text-teal-700">{{ $item['kg'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- Retrain Model --}}
    <div class="mt-8 pt-6 border-t border-slate-200">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-800">🧠 Training Model</h2>
                <p class="text-slate-500 text-sm">Latih ulang model AI dengan data terbaru dari database.</p>
            </div>
            <form action="{{ route('retrain') }}" method="POST">
                @csrf
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white font-bold px-5 py-3 rounded-xl shadow transition text-sm whitespace-nowrap">
                    🔄 Retrain
                </button>
            </form>
        </div>
    </div>
@endsection
