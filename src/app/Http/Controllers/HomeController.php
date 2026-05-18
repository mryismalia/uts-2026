<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::active()->first();
        $featuredProjects = Project::where('is_featured', true)->take(3)->get();
        $projects = Project::latest()->take(6)->get();

        return view('home', compact('profile', 'featuredProjects', 'projects'));
    }

    public function about()
    {
        $profile = Profile::active()->first();
        return view('about', compact('profile'));
    }

    public function projects()
    {
        $projects = Project::latest()->paginate(9);
        return view('project', compact('projects'));
    }

    public function contact()
    {
        return view('contact');
    }
}
