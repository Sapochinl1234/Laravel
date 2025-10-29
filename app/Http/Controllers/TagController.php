<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Job;

class TagController extends Controller
{
    public function showJobs($id)
    {
        $tag = Tag::findOrFail($id);
        $jobs = $tag->jobs;

        return view('tags.jobs', compact('tag', 'jobs'));
    }
}