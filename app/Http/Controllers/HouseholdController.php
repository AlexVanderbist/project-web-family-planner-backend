<?php

namespace App\Http\Controllers;

use App\Household;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

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

    public function update(Requests\SettingsStoreRequest $request, Household $household) {
        // TODO: Write validations for the update function
        $household->fill($request->only('address', 'busstop'));
        $household->save();
        return redirect(route('household.settings'))->with('status', 'Configuration updated successfully!');
    }
}
