<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();

        return view('admin.experiences.index', compact('experiences'));
    }


    public function create()
    {
        return view('admin.experiences.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('experiences', 'public');
        }

        Experience::create($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Experience berhasil ditambahkan.');
    }


    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }


    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($experience->image) {
                Storage::disk('public')->delete($experience->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('experiences', 'public');
        }

        $experience->update($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Experience berhasil diperbarui.');
    }


    public function destroy(Experience $experience)
    {
        if ($experience->image) {
            Storage::disk('public')->delete($experience->image);
        }

        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Experience berhasil dihapus.');
    }
}