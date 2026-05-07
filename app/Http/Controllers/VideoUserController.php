<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoUserController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('video', compact('videos'));
    }
}