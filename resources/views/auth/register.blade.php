@extends('layouts.app')

@section('title', '会員登録')

@section('content')
<div class="l-wrapper__1colum">
    <div class="p-register">
        
        <form method="POST" action="{{ route('register') }}" class="c-form p-register__form u-clearfix">

            @csrf
            <div class="p-register__title c-form__title">
                <h2 class="c-form__title">{{ __('Register') }}</h2>
            </div>

            <label for="name" class="p-register__label c-form__label">{{ __('Name') }}

                <input id="name" type="text" class="p-register__name c-form__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </label>

            @error('name')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="email" class="p-register__label c-form__label">{{ __('E-Mail Address') }}

                <input id="email" type="email" class="p-register__email c-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            </label>

            @error('email')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" class="p-register__label c-form__label">{{ __('Password') }}

                
                <input id="password" type="password" class="p-register__pass c-form__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </label>

            @error('password')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm" class="p-register__label c-form__label">{{ __('Confirm Password') }}

                
                <input id="password-confirm" type="password" class="p-register__passConfirm c-form__input" name="password_confirmation" autocomplete="new-password">
            </label>

            <div class="c-btn__wrapper p-register__btnBox c-flex--end">
                <button type="submit" class="c-btn c-btn--action2 c-form__btn p-register__btn">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
