<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        return Message::all();
    }

    public function show($id)
    {
        return Message::find($id);
    }

    public function store(Request $request)
    {
        return Message::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return $message;
    }

    public function delete(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return 204;
    }
}
