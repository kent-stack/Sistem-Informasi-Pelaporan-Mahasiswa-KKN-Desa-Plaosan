<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'report_type' => 'required|string|in:Daily Report,Weekly Report',
            'nama_project' => 'required|string|max:255',
            'penjelasan_project' => 'required|string',
            'photos' => 'required|array|max:10',
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB per photo
        ]);

        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('project_photos', 'public');
                $photoPaths[] = $path;
            }
        }

        Report::create([
            'report_type' => $request->report_type,
            'nama_project' => $request->nama_project,
            'penjelasan_project' => $request->penjelasan_project,
            'photos' => $photoPaths,
            // Keep other fields empty as per user's simplified request
        ]);

        return redirect()->back()->with('success', 'Project Report Submitted Successfully!');
    }
}