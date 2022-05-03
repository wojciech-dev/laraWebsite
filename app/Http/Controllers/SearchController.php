<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Service::select('name')->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function searchservices(Request $request)
    {
    }
}
