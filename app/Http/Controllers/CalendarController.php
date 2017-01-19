<?php

namespace App\Http\Controllers;

use App\Calendar;
use Illuminate\Http\Request;
use ICal\ICal;
use Auth;

class CalendarController extends Controller
{
    public function index() {
        $calendars = Auth::user()->calendars;

        $ical = new ICal();

        $calendars->each(function($calendar, $key) use ($ical) {
            $ical->initURL($calendar->url);
            $calendar['name'] = stripslashes($ical->calendarName());
            $calendar['description'] = stripslashes($ical->calendarDescription());
        });

        return view('calendars.index', compact('calendars'));
    }

    public function store (Request $request, Calendar $calendar) {
        $calendar->url = trim($request->url); // Small effort to ensure no errors
        $calendar->household_id = Auth::user()->id;
        $calendar->save();
        return redirect(route('calendars.index'));
    }

    public function destroy(Request $request, Calendar $calendar) {
        $calendar->delete();
        return redirect(route('calendars.index'))->with('status', 'Calendar feed removed successfully.');
    }
}
