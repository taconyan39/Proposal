@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum">

  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum">

    @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 1])

      @slot('title')
        投稿したアイデア一覧
      @endslot
      
    @endcomponent


    <div class="p-ideasList__bottom">
      {{ $ideas->links('vendor/pagination/pagination') }}
    </div>

    <div class="c-link__previous--wrapper">
      <a class="c-link__previous" href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
    </div>
    
  </main>
</div>
@endsection