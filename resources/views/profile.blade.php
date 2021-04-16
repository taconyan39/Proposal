@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
<div class="l-wrapper__2colum u-site__width">
  
    @include('components.sidebar-profile',['user' => $user])

    <main class="l-main__2colum">

        <div class="p-profileEdit">

            <div class="p-profileEdit__title c-title__content">
                <h2 class="c-content__title">プロフィール編集</h2>
            </div>
            
            <form method="POST" action="{{ route('profile.update') }}" class="c-form p-profileEdit__form u-clearfix" enctype="multipart/form-data">
                @csrf
                
                <label for="category_id" class="p-profileEdit__label c-form__label">
                    <div class="c-row">
                        {{ __('Name') }}
                        <span class="c-form__annotation p-profileEdit__label--annotation">(最大10文字)</span>
            
                    </div>

                    <input id="name" type="name" class="p-profileEdit__name c-form__input--half
                        @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ old('name', $user->name) }}" autocomplete="name"
                        autofocus
                        maxlength="10">
                </label>
                
                @error('name')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="email" class="p-profileEdit__label c-form__label">
                    {{ __('E-Mail Address')}}
                    
                    <input id="email"
                    type="email" 
                    class="p-profileEdit__email c-form__input
                    @error('email') is-invalid @enderror" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    autocomplete="email"
                    maxlength="255"
                    >
                    
                    @error('email')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>

                <textarea-label
                    title="自己紹介文"
                    oldvalue="{{old('introduction')}}"
                    max="100"
                    txt="{{$user->introduction}}"
                    name="introduction"
                    placeholder="自己紹介は入力されていません"
                    >
                </textarea-label>
                
                @error('introduction')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="c-row p-profileEdit__row">
                    <a href="{{ route('passwordEdit.edit') }}" class="c-link__underline p-profileEdit__password">パスワードを変更する</a>
                </div>

                <div for="icon_img" class="c-row c-form__label">
                    <p>プロフィール画像を変更する</p>
                    <span class="c-form__annotation">(jpg/png/2MB以下) </span>
                </div>

                <div class="p-profileEdit__row c-flex--start">

                    <div class="c-container--half">

                        <icon-edit
                            icon="{{ asset('storage/images/icons/' . $user->icon_img)}}"
                        ></icon-edit>
                        
                        @error('icon_img')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="p-profileEdit__row c-flex--end">
                    <div class="p-profileEdit__btn--container c-container--half">

                        <button type="submit" class="
                       c-btn c-btn--action2 p-profileEdit__btn">
                            {{ __('Edit') }}
                        </button>
                    </div>
                </div>

            </form>
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
</div>



@endsection
