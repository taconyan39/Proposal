@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="l-wrapper__2colum u-site__width">

  <div class="p-index__mainImg u-site__width">
    <div class="c-img--outer"><img class="c-img" src="{{ asset('images/default/introduction.jpeg') }}"
    srcset="{{ asset('images/retina_2x/introduction.jpeg 2x') }}"
    alt="inspirationの紹介画像"></div>
  </div>

  @include('components.sidebar-category',[ 'categories' => $categories ])

    <main class="l-main__2colum">
      
      @component('components.pickupCategory-section', [ 'pickupCategories' => $pickupCategories])
        @slot('title')
          人気カテゴリー
        @endslot
      @endcomponent
      
      <section class="c-section p-ideaList">
      @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 0])
        @slot('title')
          新着のアイデア
        @endslot

      @endcomponent

      @include('components.show-all', ['url' => 'all-ideas-list', 'link' => '全件表示'])
      </section>
      
      <section class="c-section p-ideaList">
      @component('components.ideasList-section', ['ideas' => $attentionIdeas, 'listType' => 0])
        @slot('title')
          注目のアイデア
        @endslot

      @endcomponent

      @include('components.show-all', ['url' => 'attention-ranking', 'link' => '注目のアイデア一覧'])
      </section>

      <section class="c-section p-ideaList">
      @component('components.ideasList-section', ['ideas' => $hotIdeas, 'listType' => 0])
        @slot('title')
          売れてるアイデア
        @endslot

      @endcomponent

      @include('components.show-all', ['url' => 'selling-ranking', 'link' => '売れているアイデア一覧'])
      </section>

      <section class="p-simpleList c-section">
        @component('components.simpleList-reviewSection', ['reviews' => $reviews])
          @slot('title')
            新着の口コミ
          @endslot

        @endcomponent

        @include('components.show-all', ['url' => 'reviews-list', 'link' => 'レビュー一覧'])

      </section>

    </main>
  </div>
@endsection