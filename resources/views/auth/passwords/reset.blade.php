@extends('layouts.app')

@section('title','パスワード変更')

@section('content')

<div class="l-wrapper__1colum">
    <div class="p-register">

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="c-form p-login__form">
                @csrf

                <div class="p-register__title c-form__title">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                </div>

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email" class="p-register__label c-form__label">{{ __('E-Mail Address') }}

                    <input id="email" type="email" class="p-register__email c-form__input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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

                    <input id="password-confirm" type="password" class="p-register__confirm c-form__input" name="password_confirmation" required autocomplete="new-password">

                </label>

                <div class="c-flex--end p-register__btnBox c-btn__wrapper">
                    <button type="submit" class="c-btn c-btn--action2
                    p-register__btn">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
