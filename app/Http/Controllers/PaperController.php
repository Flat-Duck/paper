<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Section;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PaperStoreRequest;
use App\Http\Requests\PaperUpdateRequest;
use Illuminate\Support\Facades\Storage;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Paper::class);

        $search = $request->get('search', '');

        $papers = Paper::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.papers.index', compact('papers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Paper::class);

        $sections = Section::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');

        return view('app.papers.create', compact('sections', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaperStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Paper::class);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $path = $request->file->storeAs('public/papers/'.now()->format('Y-m-d-h-s-i'),
                $request->file('file')->getClientOriginalName());
            
            $validated['file'] = $path;
        }

        $paper = Paper::create($validated);

        return redirect()
            ->route('papers.edit', $paper)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Paper $paper): View
    {
        $this->authorize('view', $paper);

        return view('app.papers.show', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Paper $paper): View
    {
        $this->authorize('update', $paper);

        $sections = Section::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');

        return view(
            'app.papers.edit',
            compact('paper', 'sections', 'departments')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( PaperUpdateRequest $request, Paper $paper ): RedirectResponse {
        $this->authorize('update', $paper);

        $validated = $request->validated();
        if ($request->hasFile('file')) {
                      if (Storage::exists($paper->file)){
                    Storage::delete($paper->file);            } 
            $path = $request->file->storeAs('public/papers/'.now()->format('Y-m-d-h-s-i'),
                $request->file('file')->getClientOriginalName());
            
            $validated['file'] = $path;
        }
        $paper->update($validated);

        return redirect()
            ->route('papers.edit', $paper)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Paper $paper): RedirectResponse
    {
        $this->authorize('delete', $paper);

        if ($paper->file) {
                      if (Storage::exists($paper->file)){
                    Storage::delete($paper->file);            } 
        }
        $paper->delete();

        return redirect()
            ->route('papers.index')
            ->withSuccess(__('crud.common.removed'));
    }

        /**
     * Remove the specified resource from storage.
     */
    public function download(Request $request, Paper $paper): RedirectResponse
    {
        if ($paper->file) {
            $paper->downloads += 1;
            $paper->save(); 
            return redirect(Storage::url($paper->file));
        }
    }
}
