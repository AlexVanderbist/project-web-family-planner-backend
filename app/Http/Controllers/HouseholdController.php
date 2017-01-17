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
        $household = Auth::user();
        return view('household.settings', compact('household'));
    }

    public function update(Request $request, Household $household) {
        // TODO: Write validations for the update function
        $household->fill($request->only('name', 'address'));
        $household->save();
        return redirect(route('household.settings'))->with('status', 'Configuration updated successfully!');
    }
}
