<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show()
    {
        $jobs = Job::paginate(12);

        return view('search', compact('jobs'));

    }

    public function search(Request $request)
    {
        $jobs = Job::where('title', 'LIKE', '%' . $request->get('search') . '%')
            ->orWhere('location', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return json_encode($jobs);
    }
}