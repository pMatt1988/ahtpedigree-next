<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    //

    function sire(Request $request) {
        $dog = null;
        if($request->has('q')) {
            $search = $request->q;
            $dog = Dog::select('id', 'name')
                ->where('name', 'LIKE', "%$search%")
                ->where('sex', 'm')
                ->first();
        }

        return response()->json($dog);
    }

    function dam(Request $request) {
        $dog = null;
        if($request->has('q')) {
            $search = $request->q;
            $dog = Dog::select('id', 'name')
                ->where('name', 'LIKE', "%$search%")
                ->where('sex', 'f')
                ->first();
        }

        return response()->json($dog);
    }
}
