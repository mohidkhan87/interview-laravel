<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function index() {
        return response()->json(Screen::all(), 200);
    }
    public function search(Request $request)
{
    $query = Screen::query();

    // Check if a search query is provided
    if ($request->has('search')) {
        $searchTerm = $request->input('search');

        $query->where(function ($q) use ($searchTerm) {
            $q->where('id', $searchTerm) // Search by exact ID
              ->orWhere('name', 'LIKE', "%{$searchTerm}%") // Partial match for name
              ->orWhere('notes', 'LIKE', "%{$searchTerm}%"); // Partial match for notes
        });
    }

    // Paginate results (default: 10 per page)
    $screens = $query->paginate($request->input('per_page', 10));

    return response()->json($screens);
}

}
