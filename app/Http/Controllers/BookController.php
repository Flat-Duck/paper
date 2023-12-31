<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Section;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Book::class);

        $search = $request->get('search', '');

        $books = Book::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.books.index', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Book::class);

        $departments = Department::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');

        return view('app.books.create', compact('departments', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request): RedirectResponse
    {

        $this->authorize('create', Book::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $path = $request->file->storeAs('public/books/'.now()->format('Y-m-d-h-s-i'),
                $request->file('file')->getClientOriginalName());
            
            $validated['file'] = $path;
        }

        $book = Book::create($validated);

        return redirect()
            ->route('books.edit', $book)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Book $book): View
    {
        $this->authorize('view', $book);

        return view('app.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Book $book): View
    {
        $this->authorize('update', $book);

        $departments = Department::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');

        return view(
            'app.books.edit',
            compact('book', 'departments', 'sections')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BookUpdateRequest $request,
        Book $book
    ): RedirectResponse {
        $this->authorize('update', $book);
        
        $validated = $request->validated();
        
        if ($request->hasFile('file')) {
                      if (!is_null($book->file)){
                    Storage::delete($book->file);
            } 
            $path = $request->file->storeAs('public/books/'.now()->format('Y-m-d-h-s-i'),
                $request->file('file')->getClientOriginalName());
            
            $validated['file'] = $path;
        }

        $book->update($validated);

        return redirect()
            ->route('books.edit', $book)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Book $book): RedirectResponse
    {
        $this->authorize('delete', $book);

        if ($book->file) {
            if (!is_null($book->file)){
                Storage::delete($book->file);
            } 
        }
        $book->delete();

        return redirect()
            ->route('books.index')
            ->withSuccess(__('crud.common.removed'));
    }
        /**
     * Remove the specified resource from storage.
     */
    public function download(Request $request, Book $book)
    {
        if (!is_null($book->file)) {
        if ($book->file) {
            $book->downloads += 1;
            $book->save(); 
            return redirect(Storage::url($book->file));
        }
        }else{
            return redirect()
            ->route('books.index')
            ->withSuccess(__('لايوجد ملف للكتاب!'));
        }
    }
}
