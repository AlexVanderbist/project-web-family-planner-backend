<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScreenController extends Controller
{
    public function index (Request $request) {
        $request->screen->load('household')->get();
        return response($request->screen);
    }
}
