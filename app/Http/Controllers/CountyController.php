<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountyController extends Controller
{
    public function countryAvailability()
    {
        if (!Auth::check()) {
            return redirect(route('home.head'));
        }

        $data = array(
            'title' => 'Create Country'
        );

        return view('country.create')->with($data);
    }

    public function createCountry(Request $request)
    {
        $fields = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'population' => 'required'
        ]);

        $create = Country::create($fields + ['user_id' => Auth::id()]);

        if ($create) {
            return redirect(route('home.head'));
        }

        return view('country.create');
    }

    public function indexCountry()
    {
        $data = array(
            'title' => 'Countries'
        );

        $countries = Country::orderBy('population', 'DESC')->simplePaginate(10);

        return view('home', compact('countries'))->with($data);
    }

    public function getCountry(Request $request, $id)
    {
        $country = Country::where('id', $id)->first();

        $data = array(
            'title' => $id
        );

        return view('country.indexView', compact('country'))->with($data);
    }

    public function postComment(Request $request, $id)
    {
        $fields = $request->validate([
            'description' => 'required'
        ]);

        Comment::create($fields + ['country_id' => $id]);

        return redirect(route('country.getCountry', $id));
    }

    public function deleteCountry(Request $request, $id)
    {
        Country::where('id', $id)->first()->delete();

        return redirect(route('home.head'));
    }
}
