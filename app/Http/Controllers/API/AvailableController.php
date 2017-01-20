<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvailableController extends Controller
{
    public function index(Request $request) {
        $availableSlides = [];
        
        if($request->screen->household->calendars->count()) $availableSlides[] = 'calendars';
        
        if($request->screen->household->messages->count()) $availableSlides[] = 'messages';
        
        if($request->screen->household->busstop) $availableSlides[] = 'transport';
        
        if($request->screen->household->address) $availableSlides[] = 'weather';
    
        return response($availableSlides);
    }
}
