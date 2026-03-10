<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Reminder::where('user_id', auth()->id())
                    ->latest()
                    ->get();
        return view('reminders.index', compact('reminders'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'time' => 'required|date_format:H:i'
        ]);

        Reminder::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'time' => $request->time
        ]);

        return redirect()->route('reminders.index')
        ->with('success', 'Reminder created successfully.');
    }
}
