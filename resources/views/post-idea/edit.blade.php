@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum">

    @include('components.sidebar-profile',
        ['user' => $user])

    <main class="l-main__2colum ">
        <div class="p-ideaPost__title">
            <h2 class="c-title__content">アイデア編集画面</h2>
        </div>

        <form action="{{url('post-idea/'.$idea->id) }}" method="POST" class="p-ideaPost__row c-flex--end" name="delete">
        @csrf
            <input type="hidden" name="_method" value="DELETE">

            <on-remove-btn v-if="!editIdea"></on-remove-btn>
        </form>

        <idea-edit-form :idea="{{ $idea }}"     :categories="{{$categories}}"     delete="{{ url('delete')}}"
            mypage="{{ url('mypage')}}"
            edit="{{ url('post-idea/'. $idea->id.'/edit')}}"
            @edit-idea="editIdea = $event"
        ></idea-edit-form>

            
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
    </main>
        
</div>

</div>
@endsection
