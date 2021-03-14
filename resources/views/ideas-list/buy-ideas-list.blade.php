@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum">
  <transition name="menu">
      <category-menu v-if="menu" :categories="{{ $categories }}"></category-menu>
  </transition>

  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum">

    @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 0])

      @slot('title')
        購入したアイデア一覧
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