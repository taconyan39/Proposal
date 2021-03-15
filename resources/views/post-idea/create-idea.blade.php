@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">

    @include('components.sidebar-profile',['user' => $user])


    <main class="l-main__2colum">

        <div class="p-ideaPost">

            <div class="p-ideaPost__title c-title__content">
                <h2 class="c-content__title">アイデア投稿画面</h2>
            </div>
                
            <idea-post-form :categories="{{ $categories }}" url="{{ url('mypage') }}"></idea-post-form>

            <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
</div>
@endsection
