<?php

namespace App\Http\Controllers;

use App\User;
use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ListingController extends Controller
{
	public function index()
    {
        $listings = Listing::with(['users'])->get();
        return view('listings.index', compact('listings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'list_name' => 'required|string|max:45',
            'distance' => 'required',
        ]);

        $listings = new Listing;
        $listings->list_name = $request->list_name;
        $listings->distance = $request->distance;
        $listings->user_id = Auth::user()->id;
        $listings->save();

        return redirect()->action('ListingController@index')->withMessage('Listing has been successfully added!');
    }

    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        return view('listings.edit', compact('listing') );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'list_name' => 'required|string|max:45',
            'distance' => 'required',
        ]);

        $listing = Listing::findOrFail($id);
        $listing->list_name = $request->list_name;
        $listing->distance = $request->distance;
        $listing->user_id = Auth::user()->id;
        $listing->save();

        return redirect()->action('ListingController@index')->withMessage('Listing has been successfully updated!');
    }

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();
        return back()->withErrors('Listing has been successfully deleted!');
    }

}