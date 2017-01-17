<?php

namespace App\Http\Controllers;

use App\Household;
use Illuminate\Http\Request;
use Auth;

/**
 * Class HouseholdController
 * @package App\Http\Controllers
 */
class HouseholdController extends Controller
{
    public function settings(Request $request) {
        $user = Auth::user();
        return view('household.settings', compact('user'));
    }
}
