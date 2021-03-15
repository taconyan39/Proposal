@extends('layouts.app')

@section('title', 'アイデア一覧')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  @include('components.sidebar-profile')
  
  <main class="l-main__2colum">

    @component('components.ideasRanking-section', ['ideas' => $ideas, 'listType' => 0])
      @slot('title')
        注目アイデアランキング
      @endslot

      @slot('text')
        気になるが多いアイデア
      @endslot

    @endcomponent
    
     <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
  </main>
</div>
@endsection