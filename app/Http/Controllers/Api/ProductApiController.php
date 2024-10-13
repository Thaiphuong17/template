<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Product List']);
        // return response()->json(News::all());
    }
}
