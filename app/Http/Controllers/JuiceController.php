<?php

namespace App\Http\Controllers;

use App\Models\Juice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JuiceController extends Controller
{
    public function index()
    {
        $juices = Juice::all();
        return view('juices.index', compact('juices'));
    }

    public function create()
    {
        return view('juices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('juices', 'public');
        }

        Juice::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('juices.index')->with('success', 'Juice created successfully!');
    }

    public function edit(Juice $juice)
    {
        return view('juices.edit', compact('juice'));
    }

    public function update(Request $request, Juice $juice)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $juice->image;

        if ($request->hasFile('image')) {
            if ($juice->image && Storage::disk('public')->exists($juice->image)) {
                Storage::disk('public')->delete($juice->image);
            }

            $imagePath = $request->file('image')->store('juices', 'public');
        }

        $juice->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('juices.index')->with('success', 'Juice updated successfully!');
    }

    public function destroy(Juice $juice)
    {
        if ($juice->image && Storage::disk('public')->exists($juice->image)) {
            Storage::disk('public')->delete($juice->image);
        }

        $juice->delete();

        return redirect()->route('juices.index')->with('success', 'Juice deleted successfully!');
    }
}
