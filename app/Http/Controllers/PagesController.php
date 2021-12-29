<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Homepage';
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'About us';
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Services',
            'services' => ['Modem Solutions', 'Multiservice Switches', 'Ethernet Access']
        );
        return view('pages.Services')->with($data);
    }

    public function tasks() {
        $title = 'Tasks';
        return view('tasks.index')->with('title', $title);
    }
}
