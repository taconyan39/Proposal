@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<div class="l-wrapper__1colum">
    <div class="p-login">
        
        <form method="POST" action="{{ route('login') }}" class="c-form p-login__form u-clearfix">
            @csrf

            <div class="p-login__title c-form__title">
                <h2 class="">{{ __('Login') }}</h2>
            </div>

            <label for="email" class="p-login__label c-form__label">{{ __('E-Mail Address') }}

                <input id="email" type="email" class="p-login__email c-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                autocomplete="email" autofocus>
            </label>

            @error('email')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            

            <label for="password" class="p-login__label c-form__label">{{ __('Password') }}

                
                <input id="password" type="password" class="p-login__pass c-form__input @error('password') is-invalid @enderror" name="password" autocomplete="password">
            </label>

            @error('password')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="c-form__label--outer">
                <label class="c-form__label--checkBox" for="remember">
                    <input class="c-form__input--checkBox p-login__checkBox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="c-flex--between p-login__btnBox">
                @if (Route::has('password.request'))
                    <a class="c-link__underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            
                <button type="submit" class="c-btn c-btn--action2 p-login__btn">
                    {{ __('Login') }}
                </button>

            </div>
        </form>
    </div>
    
</div>
@endsection
