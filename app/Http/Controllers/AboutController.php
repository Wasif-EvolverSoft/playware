<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
  
    public function index()
    {
        $abouts = About::all();
        return view('abouts.index', compact('abouts'));
    }

      public function create()
    {
        return view('abouts.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'about_heading' => 'nullable|string|max:255',
            'about_heading2' => 'nullable|string|max:255',
            'about_paragraph' => 'nullable|string',
        ]);

        About::create($request->all());

        return redirect()->route('abouts.index')->with('success', 'About Us section created successfully.');
    }

   
    public function show(About $about)
    {
        return view('abouts.show', compact('about'));
    }

        public function edit(About $about)
    {
        return view('abouts.edit', compact('about'));
    }

        public function update(Request $request, About $about)
    {
        $request->validate([
            'about_heading' => 'nullable|string|max:255',
            'about_heading2' => 'nullable|string|max:255',
            'about_paragraph' => 'nullable|string',
        ]);

        $about->update($request->all());

        return redirect()->route('abouts.index')->with('success', 'About Us section updated successfully.');
    }

    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('abouts.index')->with('success', 'About Us section deleted successfully.');
    }
}
