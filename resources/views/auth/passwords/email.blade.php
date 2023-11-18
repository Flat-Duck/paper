@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<form class="card card-md" method="post">
    @csrf
    <div class="card-body">
        <h2 class="card-title text-center mb-4">نسيت كلمة المرور</h2>

        <div class="mb-3">
            <label class="form-label">{{ __('البريد الالكتروني') }}</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('البريد الالكتروني') }}" required autofocus tabindex="1">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block btn-flat w-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path><path d="M3 7l9 6l9 -6"></path></svg>
               ارسل رابط تغيير كلمة المرور</button>
        </div>
    </div>
</form>
<div class="text-center text-muted mt-3">
    لقد تذكرت ,  <a href="{{ route('login') }}">
        رجعني
    </a> لصفحة تسجيل الدخول
  </div>
</div>
</div>
</div>
@endsection