@extends('layouts.app')

@section('title', 'パスワード再発行')

@section('content')
<div class="l-wrapper__1colum">
    <div class="p-login">

            <div class="c-card-body">
                @if (session('status'))
                    <div class="p-login__email--txt" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="c-form p-login__form">
                    @csrf

                    <div class="p-login__title c-form__title">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <label for="email" class="p-login__label c-form__label">{{ __('E-Mail Address') }}

                            <input id="email" type="email" class="p-login__email
                            c-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="c-error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>

                        <div class="c-flex--end p-login__btnBox c-btn__box">
                            <button type="submit" class="c-btn c-btn--action2 p-login__btn">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
