<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroImageController extends Controller
{
    // Display the home page with hero images
    public function index()
    {
        $heroImages = HeroImage::all();
        return view('welcome', compact('heroImages'));
    }

    // Admin: Show single hero image
    public function show(HeroImage $heroImage)
    {
        return view('admin.hero_images.show', compact('heroImage'));
    }

    // Admin: List all hero images
    public function adminIndex()
    {
        $heroImages = HeroImage::all();
        return view('admin.hero_images.index', compact('heroImages'));
    }

    // Admin: Show create form
    public function create()
    {
        return view('admin.hero_images.create');
    }

    // Admin: Store new hero image
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $heroImage = new HeroImage();
        $heroImage->title = $request->title;
        $heroImage->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hero_images', 'public');
            $heroImage->image_path = $path;
        }

        $heroImage->save();

        return redirect()->route('admin.hero_images.index')->with('success', 'Hero image added successfully.');
    }

    // Admin: Show edit form
    public function edit(HeroImage $heroImage)
    {
        return view('admin.hero_images.edit', compact('heroImage'));
    }

    // Admin: Update hero image
    public function update(Request $request, HeroImage $heroImage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $heroImage->title = $request->title;
        $heroImage->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($heroImage->image_path) {
                Storage::disk('public')->delete($heroImage->image_path);
            }
            $path = $request->file('image')->store('hero_images', 'public');
            $heroImage->image_path = $path;
        }

        $heroImage->save();

        return redirect()->route('admin.hero_images.index')->with('success', 'Hero image updated successfully.');
    }

    // Admin: Delete hero image
    public function destroy(HeroImage $heroImage)
    {
        if ($heroImage->image_path) {
            Storage::disk('public')->delete($heroImage->image_path);
        }
        $heroImage->delete();

        return redirect()->route('admin.hero_images.index')->with('success', 'Hero image deleted successfully.');
    }
}