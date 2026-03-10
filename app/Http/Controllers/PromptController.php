<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prompt;

class PromptController extends Controller
{
    public function index()
    {
        $prompts = Prompt::latest()->get();
        return view('prompts.index', compact('prompts'));
    }

    public function create()
    {
        return view('prompts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'category' => 'required|string|max:100'
        ]);

        Prompt::create([
            'question' => $request->question,
            'category' => $request->category
        ]);

        return redirect()->route('prompts.index')
        ->with('success', 'Prompt created successfully.');
    }

    public function destroy($id)
    {
        Prompt::destroy($id);
        return redirect()->route('prompts.index');
    }
}
