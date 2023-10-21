@php $editing = isset($user) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="{{trans('crud.users.inputs.name')}}"
        :value="old('name', ($editing ? $user->name : ''))"
        maxlength="255"
        placeholder="{{trans('crud.users.inputs.name')}}"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.email
        name="email"
        label="{{trans('crud.users.inputs.email')}}"
        :value="old('email', ($editing ? $user->email : ''))"
        maxlength="255"
        placeholder="{{trans('crud.users.inputs.email')}}"
        required
    ></x-inputs.email>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.password
        name="password"
        label="{{trans('crud.users.inputs.password')}}"
        maxlength="255"
        placeholder="{{trans('crud.users.inputs.password')}}"
        :required="!$editing"
    ></x-inputs.password>
</x-inputs.group>

<x-inputs.checkbox
    id="is_teacher"
    name="is_teacher"
    label="{{trans('crud.users.inputs.is_teacher')}}"
    value="false"
    :checked="isset($user) ? $user->is_teacher : false"
    :add-hidden-value="false"
></x-inputs.checkbox>

<div class="form-group col-sm-12 mt-4">
    <h4>تعيين @lang('crud.roles.name')</h4>

    @foreach ($roles as $role)
    <div>
        <x-inputs.checkbox
            id="role{{ $role->id }}"
            name="roles[]"
            label="{{ ucfirst($role->name) }}"
            value="{{ $role->id }}"
            :checked="isset($user) ? $user->hasRole($role) : false"
            :add-hidden-value="false"
        ></x-inputs.checkbox>
    </div>
    @endforeach
</div>
