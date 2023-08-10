<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingContr extends Controller
{
    // Show all Listing
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    // create form
    public function create()
    {
        return view('listings.create');
    }

    // STORE
    public function store(Request $request)
    {

        $formField = $request->validate(
            [
                'title' => 'required',
                'company' => ['required', Rule::unique('listings', 'company')],
                'location' => 'required',
                'email' => ['required', 'email'],
                'website' => 'required',
                'tags' => 'required',
                'description' => 'required',

            ]
        );
        if ($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formField['user_id'] = auth()->id();
        Listing::create($formField);
        return redirect('/')->with('message', 'Listing created successfully!');
    }
    // show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // Change edit form
    public function update(Request $request, Listing $listing)
    {
        
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $formField = $request->validate(
            [
                'title' => 'required',
                'company' => ['required'],
                'location' => 'required',
                'email' => ['required', 'email'],
                'website' => 'required',
                'tags' => 'required',
                'description' => 'required',

            ]
        );
        if ($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formField);
        return back()->with('message', 'Listing updated successfully!');
    }

    // delete 

    public function destroy(Listing $listing)
    {
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
   public function manage(){
    return view('listings.manage',['listings' => auth()->user()->listings()->get()]);
   }
    
}
