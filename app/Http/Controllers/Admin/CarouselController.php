<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselSlide;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $slides = CarouselSlide::orderBy('ordre')->get();
        return inertia('Admin/Carousel/Index', compact('slides'));
    }

    public function create()
    {
        return inertia('Admin/Carousel/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|url',
            'ordre' => 'nullable|integer'
        ]);

        CarouselSlide::create($validated);

        return redirect()->route('admin.carousel.index')
            ->with('success', 'Slide ajouté avec succès');
    }

  public function edit(CarouselSlide $carousel)
{
    return inertia('Admin/Carousel/Edit', [
        'slide' => $carousel
    ]);
}

    public function update(Request $request, CarouselSlide $carousel)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|url',
            'ordre' => 'nullable|integer',
            'est_actif' => 'boolean'
        ]);

        $carousel->update($validated);

        return redirect()->route('admin.carousel.index')
            ->with('success', 'Slide modifié avec succès');
    }

    public function destroy(CarouselSlide $carousel)
    {
        $carousel->delete();
        return redirect()->route('admin.carousel.index')
            ->with('success', 'Slide supprimé avec succès');
    }
}
