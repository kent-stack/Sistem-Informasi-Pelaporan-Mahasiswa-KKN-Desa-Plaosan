<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $totalReports = Report::count();
        $totalParticipants = \App\Models\User::where('is_admin', false)->count();
        $latestReports = Report::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalReports', 'totalParticipants', 'latestReports'));
    }

    /**
     * Display a listing of the reports.
     */
    public function index()
    {
        $reports = Report::latest()->get();
        return view('admin.index', compact('reports'));
    }

    /**
     * Show the form for editing the specified report.
     */
    public function edit(string $id)
    {
        $report = Report::findOrFail($id);
        return view('admin.edit', compact('report'));
    }

    /**
     * Update the specified report in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'report_type' => 'required|string|in:Daily Report,Weekly Report',
            'nama_project' => 'required|string|max:255',
            'penjelasan_project' => 'required|string',
            'photos' => 'nullable|array|max:10',
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $report = Report::findOrFail($id);
        
        $data = [
            'report_type' => $request->report_type,
            'nama_project' => $request->nama_project,
            'penjelasan_project' => $request->penjelasan_project,
        ];

        if ($request->hasFile('photos')) {
            // Delete old photos
            if (is_array($report->photos)) {
                foreach ($report->photos as $oldPhoto) {
                    if (Storage::disk('public')->exists($oldPhoto)) {
                        Storage::disk('public')->delete($oldPhoto);
                    }
                }
            }
            
            // Upload new photos
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('project_photos', 'public');
                $photoPaths[] = $path;
            }
            $data['photos'] = $photoPaths;
        }

        $report->update($data);

        return redirect()->route('admin.reports.index')->with('success', 'Report updated successfully!');
    }

    /**
     * Remove the specified report from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);

        // Delete all associated photos
        if (is_array($report->photos)) {
            foreach ($report->photos as $photo) {
                if (Storage::disk('public')->exists($photo)) {
                    Storage::disk('public')->delete($photo);
                }
            }
        }

        $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'Report and documentation deleted successfully.');
    }
}
