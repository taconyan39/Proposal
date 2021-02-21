@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
    <div class="l-wrapper__2colum u-site__width">
        @include('components.sidebar-profile')
        
        <main class="l-main__2colum">

        @include('components.myidea-article',['idea' => $idea])
            

        <idea-reviews img="{{ asset('storage/images/icons') }}" :id="{{$idea->id}}"></idea-reviews>
        
        <div class="c-link__container">
            <a href="{{url()->previous()}}" class="c-link__underline">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
    </div>
@endsection
