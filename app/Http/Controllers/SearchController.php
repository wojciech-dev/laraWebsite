<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Service::select('name')->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function searchServices(Request $request)
    {
        $service_slug = Str::slug($request->q, '-');

        if ($service_slug) {
            return redirect('/service/' . $service_slug);
        } else {
            return back();
        }
    }
}
