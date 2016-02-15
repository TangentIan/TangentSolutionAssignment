<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IdController extends Controller
{
    /**
     * Responds on the GET request url /api/id
     *
     * Generates a valid South African ID Number
     */
    public function index()
    {
        //TODO Generate ID Number
        return response()->json();
    }

    /**
     * Responds on the GET request url /api/id/{id}
     *
     * Validate a South African ID Number
     *
     * @param string $id South African ID Number
     * @response json
     */
    public function show($id)
    {
        //TODO Validate ID Number
        return response()->json();
    }
}
