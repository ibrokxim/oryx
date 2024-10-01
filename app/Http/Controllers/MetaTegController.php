<?php

namespace App\Http\Controllers;

use App\Models\MetaTeg;

class MetaTegController extends Controller
{
    public function showWithoutCategory($slug)
    {
        $metaTeg = MetaTeg::where('slug', $slug)->first();

        if (!$metaTeg) {
            return response()->json(['message' => 'MetaTeg Not Found'], 404);
        }

        return response()->json($metaTeg, 200);
    }

    public function showWithCategory($slug)
    {
        $metaTeg = MetaTeg::where('slug', $slug)->first();

        if (!$metaTeg) {
            return response()->json(['message' => 'MetaTeg Not Found'], 404);
        }

        return response()->json($metaTeg, 200);
    }
}
