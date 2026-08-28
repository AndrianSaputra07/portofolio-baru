<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();

        return view(
            'admin.certificates.index',
            compact('certificates')
        );
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('certificates', 'public');
        }

        Certificate::create($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate berhasil ditambahkan.');
    }

    public function edit(Certificate $certificate)
    {
        return view(
            'admin.certificates.edit',
            compact('certificate')
        );
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }

            $data['image'] = $request
                ->file('image')
                ->store('certificates', 'public');
        }

        $certificate->update($data);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Certificate berhasil dihapus.');
    }
}