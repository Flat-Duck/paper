@php $editing = isset($book) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="title"
        label="{{trans('crud.books.inputs.title')}}"
        :value="old('title', ($editing ? $book->title : ''))"
        maxlength="255"
        placeholder="{{trans('crud.books.inputs.title')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="author"
        label="{{trans('crud.books.inputs.author')}}"
        :value="old('author', ($editing ? $book->author : ''))"
        maxlength="255"
        placeholder="{{trans('crud.books.inputs.author')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.date
        name="published_at"
        label="{{trans('crud.books.inputs.published_at')}}"
        value="{{ old('published_at', ($editing ? optional($book->published_at)->format('Y-m-d') : '')) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="publisher"
        label="{{trans('crud.books.inputs.publisher')}}"
        :value="old('publisher', ($editing ? $book->publisher : ''))"
        maxlength="255"
        placeholder="{{trans('crud.books.inputs.publisher')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="downloads"
        label="{{trans('crud.books.inputs.downloads')}}"
        :value="old('downloads', ($editing ? $book->downloads : ''))"
        max="255"
        placeholder="{{trans('crud.books.inputs.downloads')}}"
        required
    ></x-inputs.number>
</x-inputs.group>

@livewire('selects.department-id-section-id-dependent-select', ['book' =>
$editing ? $book->id : null])
