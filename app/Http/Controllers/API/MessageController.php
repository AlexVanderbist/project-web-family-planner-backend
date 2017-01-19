<?php

namespace App\Http\Controllers\API;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = $request->screen->household->messages;
        return response($messages);
    }
}
