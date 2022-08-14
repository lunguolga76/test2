<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CvController extends Controller
{
    public function cv(){

        $cvs = DB::table('cvs')->selectRaw("*, MATCH(experience, work, education) AGAINST('voluptas') AS score")
            ->whereRaw("MATCH(experience, work, education) AGAINST('voluptas' IN BOOLEAN MODE)")
            ->orderByDesc('score')
            ->paginate(6);

        return view('cv', compact('cvs'));
    }
}
