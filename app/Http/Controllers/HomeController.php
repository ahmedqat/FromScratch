<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class HomeController extends Controller
{
    public function page()
    {

        return view('listings'
        ,[

            'listings' => Listing::all()
        ]);

    }
}
