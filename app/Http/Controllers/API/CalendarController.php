<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use ICal\ICal;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index() {
        $calendar = new ICal();
        $calendar->initURL('http://mijnrooster.kdg.be/ical?5412cc20&eu=U1RVREVOVFwwMTA1MjUyLTA3&t=06e19128-26ff-499a-94b1-05c80d9414de');
        dd($calendar);
        return response($events);
    }
}
