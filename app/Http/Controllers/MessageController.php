<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use \Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Auth::user()->messages;
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message();
        $message_colors = ['pink' => 'Pink post-it', 'yellow' => 'Yellow post-it', 'blue' => 'Blue post-it', 'green' => 'Green post-it'];
        $message_durations = $this->getMessageDurations();
        return view('messages.form', compact('message', 'message_colors', 'message_durations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\MessageStoreRequest $request)
    {
        // TODO: Request validation
        $message = new Message();
        $message->fill($request->all());
        $message->household_id = Auth::user()->id;
        $message->end = ($request->duration != 0 ? Carbon::now()->addHours($request->duration) : null);
        $message->save();
        return redirect()->route('messages.index')->with('status', 'Message added!');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Message  $message
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Message $message)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        // TODO: Move colors to config
        $message_colors = ['pink' => 'Pink post-it', 'yellow' => 'Yellow post-it', 'blue' => 'Blue post-it', 'green' => 'BluGreene post-it'];
        $message_durations = $this->getMessageDurations($message->end);
        return view('messages.form', compact('message', 'message_colors', 'message_durations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\MessageStoreRequest $request, Message $message)
    {
        // TODO: Request validation
        $message->fill($request->all());
        $message->end = ($request->duration != 0 ? Carbon::now()->addHours($request->duration) : null);
        $message->save();
        return redirect()->route('messages.index')->with('status', 'Message updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route('messages.index'))->with('status', 'Message removed!');
    }


    public function getMessageDurations ($currentEndDate = false) {
        $message_durations = [];
        $message_durations[0] = 'Never hide';
        if ($currentEndDate) $message_durations[-1] = $currentEndDate->diffForHumans();
        $message_durations[1] = '1 hour from now';
        $i = 2;
        while($i <= 5) {
            $message_durations[$i*2] = $i * 2 . ' hours from now';
            $i++;
        }
        $message_durations[24] = '1 day from now';
        $message_durations[48] = '2 days from now';
        $message_durations[24*7] = '1 week from now';
        return $message_durations;
    }
}
