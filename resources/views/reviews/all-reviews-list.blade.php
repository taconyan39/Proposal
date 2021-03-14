@extends('layouts.app')

@section('title', '口コミ一覧')
@section('content')

<div class="l-wrapper__2colum">

  @include('components.sidebar-profile')
  
  <main class="l-main__2colum">

    
    
    @component('components.simpleList-reviewSection', ['reviews' => $reviews])
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