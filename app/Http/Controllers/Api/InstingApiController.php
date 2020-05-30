<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instings;

class InstingApiController extends Controller
{
    public function getList(){
        $data = Instings::all();

        return response()->json([
            'data' => $data
        ], 201);
    }
}
