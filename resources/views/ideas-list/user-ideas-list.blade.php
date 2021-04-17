@extends('layouts.app')

@section('title', 'アイデア一覧')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  @include('components.sidebar-profile')
  
  <main class="l-main__2colum">

    <h2 class="c-title__section">{{ $user->name }}さんのプロフィール</h2>
    <ul class="c-list p-userIdeaList">

      <div class="c-card p-userIdeaList__card--sp">
          <div class="c-img--outer c-img--round c-card-top p-userIdeaList__img--outer">
              <img class="c-img p-userIdeaList__img" src="{{ asset('storage/images/icons/' . $user->icon_img)}}" 
              srcset="{{ asset('storage/images/icons/' . $user->icon_img) . ' 2x'}}"
              alt="プロフィール画像">
          </div>
          <li class="c-list__title p-userIdeaList__item">
              <p class="c-card__name p-userIdeaList__title">{{ $user->name}}</p>
          </li>

          <li class=" p-userIdeaList__introduction">
              <span>自己紹介文</span>
              <div class="c-card p-userIdeaList__introduction--card">
                  <p class="p-userIdeaList__introduction--text">
                  {{$user->introduction}}
                  </p>
              </div>
          </li>
      </div>
    </ul>

    @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 0])
      @slot('title')
        投稿したアイデア
      @endslot

    @endcomponent


    <div class="p-ideasList__bottom">
      {{ $ideas->links('vendor/pagination/pagination') }}
     </div>
    
     <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
  </main>
</div>
@endsection