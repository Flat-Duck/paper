@php $editing = isset($permission) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="{{trans('crud.permissions.name')}}"
        :value="old('name', ($editing ? $permission->name : ''))"
    ></x-inputs.text>
</x-inputs.group>

<div class="form-group col-sm-12 mt-4">
    <h4>تعيين @lang('crud.roles.name')</h4>

    @foreach ($roles as $role)
    <div>
        <x-inputs.checkbox
            id="role{{ $role->id }}"
            name="roles[]"
            label="{{ ucfirst($role->name) }}"
            value="{{ $role->id }}"
            :checked="isset($permission) ? $role->hasPermissionTo($permission) : false"
            :add-hidden-value="false"
        ></x-inputs.checkbox>
    </div>
    @endforeach
</div>
