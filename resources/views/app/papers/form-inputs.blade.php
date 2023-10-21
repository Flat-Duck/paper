@php $editing = isset($paper) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="title"
        label="{{trans('crud.papers.inputs.title')}}"
        :value="old('title', ($editing ? $paper->title : ''))"
        maxlength="255"
        placeholder="{{trans('crud.papers.inputs.title')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="author"
        label="{{trans('crud.papers.inputs.author')}}"
        :value="old('author', ($editing ? $paper->author : ''))"
        maxlength="255"
        placeholder="{{trans('crud.papers.inputs.author')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.date
        name="published_at"
        label="{{trans('crud.papers.inputs.published_at')}}"
        value="{{ old('published_at', ($editing ? optional($paper->published_at)->format('Y-m-d') : '')) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="downloads"
        label="{{trans('crud.papers.inputs.downloads')}}"
        :value="old('downloads', ($editing ? $paper->downloads : ''))"
        max="255"
        placeholder="{{trans('crud.papers.inputs.downloads')}}"
        required
    ></x-inputs.number>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="section_id" label="{{trans('crud.papers.inputs.section_id')}}" required>
        @php $selected = old('section_id', ($editing ? $paper->section_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Section</option>
        @foreach($sections as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="department_id" label="{{trans('crud.papers.inputs.department_id')}}" required>
        @php $selected = old('department_id', ($editing ? $paper->department_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Department</option>
        @foreach($departments as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group>
