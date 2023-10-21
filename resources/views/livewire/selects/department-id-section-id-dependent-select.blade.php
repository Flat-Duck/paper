<div class="w-100 p-0">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="department_id"
            label="{{trans('crud.books.inputs.department_id')}}"
            wire:model="selectedDepartmentId"
        >
            <option selected>Please select the Department</option>
            @foreach($allDepartments as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    @if(!empty($selectedDepartmentId))
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="section_id"
            label="{{trans('crud.books.inputs.section_id')}}"
            wire:model="selectedSectionId"
        >
            <option selected>Please select the Section</option>
            @foreach($allSections as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select> </x-inputs.group
    >@endif
</div>
