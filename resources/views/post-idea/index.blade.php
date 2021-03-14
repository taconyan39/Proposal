@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum">

  <transition name="menu">
      <category-menu v-if="menu" :categories="{{ $categories }}"></category-menu>
  </transition>
  
  @include('components.sidebar-category', ['categories' => $categories])
  
  <main class="l-main__2colum">

    <ideas-list :data="items" :items="items.data" :categories="{{ $categories }}" @move-page="movePage(page)" :page_type="1"></ideas-list>

    <div class="p-ideasList__bottom">
    </div>
    
  </main>
</div>
@endsection