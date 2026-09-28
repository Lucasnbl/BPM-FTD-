<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreSuggestionController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'category' => [
                'required',
                'string',
                'in:Program kerja HMP,Kegiatan BPM FTD,Fasilitas dan lingkungan kampus,Aspirasi lainnya',
            ],
            'message' => ['required', 'string', 'min:5', 'max:3000'],
        ]);

        Suggestion::create($validated);

        return response()->json([
            'message' => 'Terima kasih. Saran Anda sudah tersimpan secara anonim.',
        ], 201);
    }
}
