<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    /**
     * Base URL Flask API — default localhost, override via .env
     */
    private function flaskUrl(string $path = ''): string
    {
        return rtrim(env('FLASK_API_URL', 'http://127.0.0.1:5000'), '/') . '/' . ltrim($path, '/');
    }

    /**
     * Tampilkan halaman form prediksi.
     */
    public function showForm()
    {
        return view('prediksi');
    }

    /**
     * Kirim tanggal Jawa ke Flask API, terima prediksi semua lokasi.
     */
    public function hitungPrediksi(Request $request)
    {
        $request->validate([
            'tanggal_jawa' => 'required|integer|min:1|max:30',
        ]);

        try {
            $response = Http::post($this->flaskUrl('/predict'), [
                'tanggal_jawa' => $request->input('tanggal_jawa'),
            ]);

            if ($response->successful() && $response->json('status') === 'success') {
                $prediksi = $response->json('prediksi');

                return back()->with([
                    'hasil_prediksi' => $prediksi,
                    'tanggal_input'  => $request->input('tanggal_jawa'),
                ]);
            }

            $pesan = $response->json('message') ?? 'Response tidak valid dari AI service.';

            return back()->with('error', "Gagal memprediksi: {$pesan}");
        } catch (\Exception $e) {
            return back()->with('error', 'Tidak dapat terhubung ke AI service: ' . $e->getMessage());
        }
    }

    /**
     * Trigger retrain model dari data terbaru di database.
     */
    public function retrainModel()
    {
        try {
            $response = Http::timeout(60)->post($this->flaskUrl('/retrain'));

            if ($response->successful() && $response->json('status') === 'success') {
                return back()->with('success', 'Model berhasil di-retrain dengan data terbaru!');
            }

            $pesan = $response->json('message') ?? 'Gagal retrain model.';

            return back()->with('error', "Retrain gagal: {$pesan}");
        } catch (\Exception $e) {
            return back()->with('error', 'Tidak dapat terhubung ke AI service: ' . $e->getMessage());
        }
    }
}
