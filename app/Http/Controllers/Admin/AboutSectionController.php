<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    // Display a listing of about sections
    public function index()
    {
        $sections = AboutSection::orderBy('order')->get();
        return view('admin.about_sections.index', compact('sections'));
    }

    public function aboutPage()
    {
        $sections = AboutSection::orderBy('order')->get();
        return view('frontend.about', compact('sections'));
    }

    // Show the form for creating a new section
    public function create()
    {
        return view('admin.about_sections.create');
    }

    // Store a newly created section in storage
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('about_images', 'public');
            $data['image_path'] = $path;
        }

        AboutSection::create($data);

        return redirect()->route('admin.about_sections.index')->with('success', 'Section created successfully.');
    }

    // Display the specified section
    public function show(AboutSection $aboutSection)
    {
        return view('admin.about_sections.show', compact('aboutSection'));
    }

    // Show the form for editing the specified section
    public function edit(AboutSection $aboutSection)
    {
        return view('admin.about_sections.edit', compact('aboutSection'));
    }

    // Update the specified section in storage
    public function update(Request $request, AboutSection $aboutSection)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutSection->image_path && Storage::disk('public')->exists($aboutSection->image_path)) {
                Storage::disk('public')->delete($aboutSection->image_path);
            }

            $path = $request->file('image')->store('about_images', 'public');
            $data['image_path'] = $path;
        }

        $aboutSection->update($data);

        return redirect()->route('admin.about_sections.index')->with('success', 'Section updated successfully.');
    }

    // Remove the specified section from storage
    public function destroy(AboutSection $aboutSection)
    {
        // Delete image file if exists
        if ($aboutSection->image_path && Storage::disk('public')->exists($aboutSection->image_path)) {
            Storage::disk('public')->delete($aboutSection->image_path);
        }

        $aboutSection->delete();

        return redirect()->route('admin.about_sections.index')->with('success', 'Section deleted successfully.');
    }
}
