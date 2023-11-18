@extends('admin.layouts.guest')

@section('title', 'Reset Password')

@section('content')
<x-flash-message />
<form method="post" action="{{ route('admin.reset_password') }}" class="card card-md">
    @csrf
    <div class="card-body">
        <h2 class="card-title text-center mb-4">نسيت كلمة المرور</h2>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3">
            <label class="form-label">{{ __('البريد الالكتروني') }}</label>
            <input type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('البريد الالكتروني') }}" required autofocus tabindex="1">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">
                {{ __('كلمة المرور') }}
            </label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('كلمة المرور') }}" required tabindex="2">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">
                {{ __('تأكيد كلمة المرور ') }}
            </label>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('تأكيد كلمة المرور ') }}" required tabindex="2">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block btn-flat w-100">
                تغيير كلمة المرور
            </button>
        </div>
    </form>
@endsection