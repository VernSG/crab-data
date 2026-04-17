@extends('layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">📋 Riwayat Tangkapan</h1>
        <p class="text-slate-500 text-base mt-1">Data diurutkan dari yang terbaru.</p>
    </div>

    @if ($records->isEmpty())
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8 text-center">
            <p class="text-slate-400 text-lg">Belum ada data tangkapan.</p>
            <a href="{{ route('input') }}" class="inline-block mt-4 text-teal-600 font-semibold underline underline-offset-4">Mulai catat sekarang →</a>
        </div>
    @else
        <div class="overflow-x-auto rounded-xl shadow-sm border border-slate-200">
            <table class="w-full text-left bg-white">
                <thead class="bg-teal-700 text-white text-sm">
                    <tr>
                        <th class="px-3 py-3">Tanggal</th>
                        <th class="px-3 py-3">Jawa</th>
                        <th class="px-3 py-3">Lokasi</th>
                        <th class="px-3 py-3 text-right">Kg</th>
                    </tr>
                </thead>
                <tbody class="text-base divide-y divide-slate-100">
                    @foreach ($records as $record)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-3 py-3 whitespace-nowrap">{{ $record->tanggal_masehi->format('d/m/Y') }}</td>
                            <td class="px-3 py-3">{{ $record->tanggal_jawa }}</td>
                            <td class="px-3 py-3">{{ $record->lokasi_blok }}</td>
                            <td class="px-3 py-3 text-right font-semibold">{{ number_format($record->hasil_kg, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-center text-sm text-slate-400">
            Total: {{ $records->count() }} catatan
        </div>
    @endif
@endsection
