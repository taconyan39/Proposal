@extends('layouts.app')

@section('title', 'アイデア一覧')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  @include('components.sidebar-profile')
  
  <main class="l-main__2colum">

    
    @include('components.sort',['sort'=> $sorts, 'categories' => $categories])

    @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 0])
      @slot('title')
        アイデア一覧
      @endslot

    @endcomponent


    <div class="p-ideasList__bottom">
      {{ $ideas->appends(['sort_id' => $data['sort_id'], 'category_id' => $data['category_id']])->links('vendor/pagination/pagination') }}
     </div>
    
     <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
  </main>
</div>
@endsection