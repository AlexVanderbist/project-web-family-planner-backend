<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use ICal\ICal;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index(Request $request) {
        $calendars = $request->screen->household->calendars;

        $ical = new ICal();
        $calendars->each(function($calendar, $key) use ($ical) {
            $ical->initURL($calendar->url);

            $calendar['name'] = stripslashes($ical->calendarName());
            $calendar['description'] = stripslashes($ical->calendarDescription());
            $calendar['events'] = $ical->eventsFromRange(Carbon::now());
        });
        return response($calendars);
    }
}
