<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Mood;
use App\Models\Prompt;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::latest()->get();
        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        $moods = Mood::all();
        $prompts = Prompt::all();
        return view('journals.create', compact('moods','prompts'));
    }

    public function store(Request $request)
    {
        $journal = Journal::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
            'mood_id' => $request->mood_id
        ]);

        if($request->prompts) {
            $journal->prompts()->attach($request->prompts);
        }

        return redirect()->route('journals.index')
        ->with('success', 'Journal entry created successfully.');
    }

    public function show($id)
    {
        $journal = Journal::with('mood', 'prompts')->findOrFail($id);
        return view('journals.show', compact('journal'));
    }

    public function destroy($id)
    {
        Journal::destroy($id);
        return redirect()->route('journals.index');
    }
}
