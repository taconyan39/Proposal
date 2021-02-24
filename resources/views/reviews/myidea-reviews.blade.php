@extends('layouts.app')

@section('title', '口コミ一覧')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  @include('components.sidebar-profile')
  
  <main class="l-main__2colum u-site__width">

    @component('components.simpleList-reviewSection', ['reviews' => $reviews, 'listName' => 'post-idea'])
      @slot('title')
        口コミ一覧
      @endslot

    @endcomponent


    <div class="p-ideasList__bottom">
      {{ $reviews->links('vendor/pagination/pagination') }}
     </div>
    
     <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
  </main>
</div>
@endsection