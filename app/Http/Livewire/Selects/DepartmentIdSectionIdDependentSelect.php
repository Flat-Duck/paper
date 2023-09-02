<?php

namespace App\Http\Livewire\Selects;

use App\Models\Book;
use Livewire\Component;
use App\Models\Section;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartmentIdSectionIdDependentSelect extends Component
{
    use AuthorizesRequests;

    public $allDepartments;
    public $allSections;

    public $selectedDepartmentId;
    public $selectedSectionId;

    protected $rules = [
        'selectedDepartmentId' => ['required', 'exists:departments,id'],
        'selectedSectionId' => ['required', 'exists:sections,id'],
    ];

    public function mount($book): void
    {
        $this->clearData();
        $this->fillAllDepartments();

        if (is_null($book)) {
            return;
        }

        $book = Book::findOrFail($book);

        $this->selectedDepartmentId = $book->department_id;

        $this->fillAllSections();
        $this->selectedSectionId = $book->section_id;
    }

    public function updatedSelectedDepartmentId(): void
    {
        $this->selectedSectionId = null;
        $this->fillAllSections();
    }

    public function fillAllDepartments(): void
    {
        $this->allDepartments = Department::all()->pluck('name', 'id');
    }

    public function fillAllSections(): void
    {
        if (!$this->selectedDepartmentId) {
            return;
        }

        $this->allSections = Section::where(
            'department_id',
            $this->selectedDepartmentId
        )
            ->get()
            ->pluck('name', 'id');
    }

    public function clearData(): void
    {
        $this->allDepartments = null;
        $this->allSections = null;

        $this->selectedDepartmentId = null;
        $this->selectedSectionId = null;
    }

    public function render(): View
    {
        return view(
            'livewire.selects.department-id-section-id-dependent-select'
        );
    }
}
