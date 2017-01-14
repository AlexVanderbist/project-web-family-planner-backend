<?php

namespace App\Http\Controllers;

use App\Screen;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    private $_screens;

    public function __construct (Screen $screens) {
        $this->_screens = $screens;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $screen->fill($request->all())->save();
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
        $screen->fill($request->all())->save();
        return redirect()->route('screens.edit', $screen->id)->with('status', 'Screen updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screen $screen)
    {
        //
    }
}
