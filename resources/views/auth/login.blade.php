
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<form class="card card-md" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('سجل دخولك') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('البريد الالكتروني') }}</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('البريد الالكتروني') }}" required autofocus tabindex="1">
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


            <div>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" tabindex="3" name="remember" />
                    <span class="form-check-label">{{ __('تذكرني') }}</span>
                </label>
            </div>

            @if (Route::has('admin.forgot_password'))
            <span class="form-label-description">
                <a  href="{{ route('forgot_password') }}" tabindex="5">{{ __('نسيت كلمة المرور؟؟') }}</a>
            </span>
            @endif

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('تسجيل الدخول') }}</button>
            </div>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="text-center text-muted mt-3">
        {{ __("ليس لديك حساب ?") }} <a href="{{ route('register') }}" tabindex="-1">{{ __('سجل الان') }}</a>
    </div>
    @endif
    @if (Route::has('password.request'))
        <div class="text-center text-muted mt-3">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('نسيت كلمة المرور?') }}
            </a>
        </div>
        </div>
    </div>
</div>
    @endif

@endsection