<?php

namespace App\Http\Controllers;

use App\Models\Screen;

class ScreenController extends Controller
{
    public function index() {
        return response()->json(Screen::all(), 200);
    }
}
