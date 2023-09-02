@php $editing = isset($book) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="title"
        label="Title"
        :value="old('title', ($editing ? $book->title : ''))"
        maxlength="255"
        placeholder="Title"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="author"
        label="Author"
        :value="old('author', ($editing ? $book->author : ''))"
        maxlength="255"
        placeholder="Author"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.date
        name="published_at"
        label="Published At"
        value="{{ old('published_at', ($editing ? optional($book->published_at)->format('Y-m-d') : '')) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="publisher"
        label="Publisher"
        :value="old('publisher', ($editing ? $book->publisher : ''))"
        maxlength="255"
        placeholder="Publisher"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.number
        name="downloads"
        label="Downloads"
        :value="old('downloads', ($editing ? $book->downloads : ''))"
        max="255"
        placeholder="Downloads"
        required
    ></x-inputs.number>
</x-inputs.group>

@livewire('selects.department-id-section-id-dependent-select', ['book' =>
$editing ? $book->id : null])
