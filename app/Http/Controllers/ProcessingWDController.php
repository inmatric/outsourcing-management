<?php

namespace App\Http\Controllers;

use App\Models\ProcessingWD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcessingWDController extends Controller
{
    public function index()
    {
        $tasks = ProcessingWD::orderBy('created_at', 'desc')->get();
        return view('processing_wd.index', compact('tasks'));
    }

    public function create()
    {
        return view('processing_wd.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'employee_name' => 'required|string|max:255',
            'status' => 'required|in:pending,inprogress,completed',
            'photo_before' => 'nullable|image|max:2048',
            'photo_after' => 'nullable|image|max:2048',
            'photo_data' => 'nullable|string',
            'notes' => 'nullable|string',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date',
            'duration_sec' => 'nullable|integer'
        ]);

        // Handle photo uploads
        $photoBeforePath = $this->handlePhotoUpload($request->photo_before_data, $request->file('photo_before'));
        $photoAfterPath = $this->handlePhotoUpload($request->photo_after_data, $request->file('photo_after'));
        

        $task = ProcessingWD::create([
            'task_name' => $validated['task_name'],
            'employee_name' => $validated['employee_name'],
            'status' => $validated['status'],
            'start_time' => $validated['start_time'] ?? null,
            'end_time' => $validated['end_time'] ?? null,
            'duration_sec' => $validated['duration_sec'] ?? null,
            'photo_before_path' => $photoBeforePath,
            'photo_after_path' => $photoAfterPath,
            'notes' => $validated['notes'] ?? null
        ]);

        return redirect()->route('processing_wd.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(ProcessingWD $processing_wd)
    {
        return view('processing_wd.show', compact('processing_wd'));
    }

    public function edit(ProcessingWD $processing_wd)
    {
        return view('processing_wd.edit', compact('processing_wd'));
    }

    public function update(Request $request, ProcessingWD $processing_wd)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'employee_name' => 'required|string|max:255',
            'status' => 'required|in:pending,inprogress,completed',
            'photo_before' => 'nullable|image|max:2048',
            'photo_after' => 'nullable|image|max:2048',
            'notes' => 'nullable|string'
        ]);

        // Handle photo updates
        if ($request->hasFile('photo_before')) {
            if ($processing_wd->photo_before_path) {
                Storage::disk('public')->delete($processing_wd->photo_before_path);
            }
            $validated['photo_before_path'] = $request->file('photo_before')->store('processing_wd', 'public');
        }

        if ($request->hasFile('photo_after')) {
            if ($processing_wd->photo_after_path) {
                Storage::disk('public')->delete($processing_wd->photo_after_path);
            }
            $validated['photo_after_path'] = $request->file('photo_after')->store('processing_wd', 'public');
        }

        $processing_wd->update($validated);

        return redirect()->route('processing_wd.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(ProcessingWD $processing_wd)
    {
        // Delete associated photos
        if ($processing_wd->photo_before_path) {
            Storage::disk('public')->delete($processing_wd->photo_before_path);
        }
        if ($processing_wd->photo_after_path) {
            Storage::disk('public')->delete($processing_wd->photo_after_path);
        }

        $processing_wd->delete();

        return redirect()->route('processing_wd.index')
            ->with('success', 'Task deleted successfully.');
    }

    private function handlePhotoUpload($photoData, $photoFile)
    {
        if ($photoFile) {
            return $photoFile->store('processing_wd', 'public');
        }

        if ($photoData) {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoData));
            $fileName = 'photo_' . time() . '.jpg';
            $path = 'processing_wd/' . $fileName;
            
            Storage::disk('public')->put($path, $imageData);
            
            return $path;
        }

        return null;
    }



    
}