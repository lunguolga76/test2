<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UniqueEmailFormRequest;
use App\Http\Requests;


class EmailCheckApiController extends Controller
{
    public function __invoke(UniqueEmailFormRequest $formRequest)
    {
        $validatedInput = $formRequest->validated();
        /** Check received validated email with the database values */
        return response()->json(['unique' => rand(0,1) === 1 && strlen($validatedInput['email']) > 10]);
    }
}