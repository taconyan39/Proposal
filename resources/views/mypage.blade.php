@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">
  
  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum">

  @include('components.sidebar-profile-sp', ['user' => $user])

    @component('components.simpleList-section', ['items' => $postIdeas, 'listName' => 'post-idea'])

        @slot('title')
            投稿したアイデア
        @endslot

        @slot('url')
            {{ url('myideas-list') }}
        @endslot

    @endcomponent

    @component('components.simpleList-section', ['items' => $buyIdeas, 'listName' => 'idea'])

        @slot('title')
            購入したアイデア
        @endslot

        @slot('url')
            {{ route('buy-ideas-list') }}
        @endslot

    @endcomponent
    
    @component('components.simpleList-section', ['items' => $interestIdeas, 'listName' => 'idea'])
        @slot('title')
            気になるリスト
        @endslot


        @slot('url')
            {{ url('interests-list') }}
        @endslot
    @endcomponent

    <section>

        @component('components.simpleList-reviewSection', ['reviews' => $ideaReviews, 'listName' => 'post-idea'])
            @slot('title')
                口コミ一覧
            @endslot

        @endcomponent

        <div class="p-simpleList__bottom">
            <a href="{{ url('myidea-reviews') }}" class="c-btn p-simpleList__linkBtn">全件表示</a>
        </div>
    
    </section>

  </main>
</div>
@endsection