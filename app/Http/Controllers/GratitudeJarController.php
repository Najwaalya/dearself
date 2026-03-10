<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GratitudeJar;
use Carbon\Carbon;

class GratitudeJarController extends Controller
{
    public function index()
    {
        $gratitudes = GratitudeJar::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('gratitude.index', compact('gratitudes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255'
        ]);

        GratitudeJar::create([
            'user_id' => auth()->id(),
            'content' => $request->content
        ]);

        return redirect()->route('gratitude.index')
        ->with('success', 'Gratitude entry added successfully.');
    }

    public function openJar()
    {
        $gratitudes = GratitudeJar::where('user_id', auth()->id())
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->get();

        return view('gratitude.jar', compact('gratitudes'));
    }
}
