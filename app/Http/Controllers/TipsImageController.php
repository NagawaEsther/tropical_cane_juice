<?php

namespace App\Http\Controllers;

use App\Models\TipsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipsImageController extends Controller
{
    // Display admin list of tips images
    public function adminIndex()
    {
        $tipsImages = TipsImage::all();
        return view('admin.tips_images.index', compact('tipsImages'));
    }

    // Show single tips image details (admin)
    public function show(TipsImage $tipsImage)
    {
        return view('admin.tips_images.show', compact('tipsImage'));
    }

    // Show form to create a new tips image
    public function create()
    {
        return view('admin.tips_images.create');
    }

    // Store a new tips image
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        $tipsImage = new TipsImage();
        $tipsImage->title = $request->title;
       

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tips_images', 'public');
            $tipsImage->image_path = $path;
        }

        $tipsImage->save();

        return redirect()->route('admin.tips_images.index')->with('success', 'Tips image added successfully.');
    }

    // Show form to edit an existing tips image
    public function edit(TipsImage $tipsImage)
    {
        return view('admin.tips_images.edit', compact('tipsImage'));
    }

    // Update an existing tips image
    public function update(Request $request, TipsImage $tipsImage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
          
        ]);

        $tipsImage->title = $request->title;
      

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($tipsImage->image_path) {
                Storage::disk('public')->delete($tipsImage->image_path);
            }
            $path = $request->file('image')->store('tips_images', 'public');
            $tipsImage->image_path = $path;
        }

        $tipsImage->save();

        return redirect()->route('admin.tips_images.index')->with('success', 'Tips image updated successfully.');
    }

    // Delete a tips image
    public function destroy(TipsImage $tipsImage)
    {
        if ($tipsImage->image_path) {
            Storage::disk('public')->delete($tipsImage->image_path);
        }
        $tipsImage->delete();

        return redirect()->route('admin.tips_images.index')->with('success', 'Tips image deleted successfully.');
    }
}
