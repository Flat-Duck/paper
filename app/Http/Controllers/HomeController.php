<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome(Request $request)
    {
         $search = $request->get('search', '');

        $departments = Department::search($search)
            ->latest()
            ->paginate();

        return view('welcome', compact('departments'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Book $book): View
    {
        return view('app.books.show', compact('book'));
    }

}
