@php $editing = isset($department) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="{{trans('crud.departments.inputs.name')}}"
        :value="old('name', ($editing ? $department->name : ''))"
        maxlength="255"
        placeholder="{{trans('crud.departments.inputs.name')}}"
        required
    ></x-inputs.text>
</x-inputs.group>
