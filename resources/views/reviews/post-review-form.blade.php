@extends('layouts.app')

@section('title', 'レビュー投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">

@include('components.sidebar-profile',
    ['user' => $user])

<main class="l-main__2colum ">
    <div class="p-ideaPost__title">
        <h2 class="c-title__content">口コミ投稿画面</h2>
    </div>

    <div class="p-ideaDetail__content">

        <div class="p-ideaDetail__info c-info">

        <div class="c-info__box p-ideaDetail__infoItem--left">
                <time class="p-ideaDetail__info--date">{{ $idea->created_at->format('Y/m/d') }}</time>
            </div>

            <div class="c-dammy">
            </div>
            <div class="c-info__box p-ideaDetail__infoItem">
                <span class="p-ideaDetail__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
            </div>
            <div class="c-info__box p-ideaDetail__infoItem">
                <span class="c-price p-ideaDetail__price">¥{{ $idea->price }}</span>
            </div>
        </div>
        
        <div class="p-ideaDetail__info c-row c-flex--between">
            <div class="c-flex--end p-ideaDetail__user">
                <div class="c-img--outer c-img--round p-ideaDetail__userImg--outer">
                    <img class="c-img p-ideaList__userImg" src="{{ asset( 'storage/images/icons/' . $idea->user->icon_img) }}"
                    srcset="{{ asset( 'storage/images/icons/' . $idea->user->icon_img . ' 2x')}}"
                    alt="アイコン画像">
                        
                    </div>
                    
                    <a href="{{ url('user/' . $idea->user->id) }}" class="p-ideaDetail__user--name c-link__underline">{{ $idea->user->name }}<a>
                </div>
            </div>

            <div class="p-ideaDetail__info c-row">
                <span class="c-tag--large p-ideaDetail__infoItem--tag">{{ $idea->category->name_ja }}</span>
            </div>
        
        <div class="p-ideaDetail__summary">
            <h3>{!! nl2br(e($idea->summary)) !!}</h3>
        </div>

        <div class="p-ideaPost__title">
        <h3 class="c-title__content">口コミを投稿する</h3>
    </div>
    <form action="{{ url('reviews/' . $idea->id)}}" method="POST" name="review">
        @csrf
        <div class="p-ideaDetail__reviewForm ">
            <label class="c-flex--start p-ideaDetail__reviewForm--row">
                <select name="rating" id="" class="p-postReview__form--select c-selectBox"
                >
                    <option value="">評価</option>

                    @for($i = 5; $i > 0; $i-- )
                        <option value="{{$i}}">
                            @for($x = 1; $x <= $i; $x++)
                            <span class="c-star">★</span>
                            @endfor
                        </option>
                    @endfor
                </select>
            </div>
            <div class="c-flex--start">
                @error('rating')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <textarea-label
                title="口コミの内容"
                oldreview="{{ old('review')}}"
                max="200"
                name="review"
                placeholder="200文字以内で入力してください"
              
              ></textarea-label>

            <div class="c-flex--end">
                @error('review')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <post-review></post-review v-cloak>

        </form>
    <div>

    <section class="p-ideaReviews">

            <p class="p-ideaDetail__reviewTitle">みんなの口コミ</p>
            <!-- 口コミがない場合 -->
            @if($idea->reviews->isEmpty())
            <div class="c-list p-ideaReviews__list">

                <div class="p-ideaReviews--none">口コミはまだ投稿されていません</div>
                </div>

            @else
                <idea-reviews :id="{{$idea->id}}"></idea-reviews>
            @endif
        </section>
        
        <div class="c-link__container">
            <a href="{{url()->previous()}}" class="c-link__underline">&lt;&lt; 前のページに戻る</a>
        </div>
        
    </main>
        
    </div>

</div>
@endsection
