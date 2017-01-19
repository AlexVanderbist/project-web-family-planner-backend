<?php

namespace App\Http\Controllers;

use App\Screen;
use Illuminate\Http\Request;
use Auth;

/**
 * Class ScreenController
 * @package App\Http\Controllers
 */
class ScreenController extends Controller
{
    /**
     * @param Screen $screens
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $screens = Auth::user()->screens;
        return view('screens.index', compact('screens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Screen $screen)
    {
        $screen_types = config('general.screen_types');
        return view('screens.form', compact('screen_types', 'screen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: RequestValidations
        $screen = new Screen();
        $screen->fill($request->all());
        $screen->code = strtoupper($screen->code);
        $screen->household_id = Auth::user()->id;
        $screen->save();
        return redirect()->route('screens.index')->with('status', 'Screen added!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Screen  $screen
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Screen $screen)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function edit(Screen $screen)
    {
        $screen_types = config('general.screen_types');
        return view('screens.form', compact('screen_types', 'screen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screen $screen)
    {
        // TODO: RequestValidations
        $screen->fill($request->all());
        $screen->code = strtoupper($screen->code);
        $screen->save();
        return redirect()->route('screens.index')->with('status', 'Screen updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screen $screen)
    {
        $screenName = $screen->name;
        $screen->delete();
        return redirect(route('screens.index'))->with('status', $screenName . ' screen was removed!');
    }
}
