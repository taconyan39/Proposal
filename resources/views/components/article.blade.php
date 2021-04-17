<article class="p-ideaDetail c-article">

    <div class="p-ideaDetail__title c-form__header">
        <h2 class="c-form__title">{{ $idea->title}}</h2>
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
                    <img class="c-img p-ideaList__userImg" src="{{ asset('storage/images/icons/' .  $idea->user->icon_img) }}"
                    srcset="{{ asset('storage/images/icons/' . $idea->user->icon_img . ' 2x')}}"
                    alt="アイコン画像">
                        
                    </div>
                    
                    <a href="{{ url('user/' . $idea->user->id) }}" class="p-ideaDetail__user--name c-link__underline">{{ $idea->user->name }}</a>
                </div>
            </div>

            <div class="p-ideaDetail__info c-row">
                <span class="c-tag--large p-ideaDetail__infoItem--tag">{{ $idea->category->name_ja }}</span>
            </div>
        
        <div class="p-ideaDetail__summary">
            <h3>{!! nl2br(e($idea->summary)) !!}</h3>
        </div>

        <div class="p-ideaDetail__text--wrapper">
            @auth
                @if($buy_flg)
                    <div class="p-ideaDetail__purchased">
                        <p class="p-ideaDetail__text">{!! nl2br(e($idea->content)) !!}</p>
                    </div>
                </div>
            </div>

        </article>
        <section class="p-ideaDetail__review">

            @if( $myreview )
                <p class="p-ideaDetail__reviewText">口コミは投稿済みです</p>
            @else
                <div class="c-form__row p-postReview__formRow--btn c-flex--center">
                    <a href="{{ url('post-review/' . $idea->id) }}" class="c-btn p-postReview__form--btn c-btn--action2">口コミを投稿する</a>
                </div>
            @endif
        </section>
        @else
            <div class="p-ideaDetail__purchased--not">

                <div class="p-ideaDetail__price--wrapper">
                    <p>こちらのアイデアは</p>
                    <p class="p-ideaDetail__price--large">¥{{ $idea->price }}</p>
                    <p>で購入できます</p>
                    <form action="{{ url('post-idea/buy/' . $idea->id) }}" method="POST" name="buy">
                    @csrf
                        <buy-component></buy-component>
                    </form>
                </div>

                <p class="p-ideaDetail__text--not">購入後に表示されます</p>
            </div>

            <div class="c-article__bottom p-ideaDetail__bottom">
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                <interest-component :id="{{ $idea->id }}" :interest="@json($interest_flg)"></interest-component>
            </div>
        @endif

        </article>
        @endauth

            @guest

                <div class="p-ideaDetail__nologin">
                    <p>購入すると続きを読むことができます</p>
                    <div class="p-ideaDetail__nologinBtn--wrapper c-btn__wrapper">
                        <a
                        href="{{ route('login') }}"
                        class="p-ideaDetail__nologinBtn  c-btn--action3 c-btn">ログインする</a>
                    </div>
                    <div class="c-article__bottom p-ideaDetail__bottom c-flex--start">
                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>

                    </div>
                </div>

            </div>


    </article>

    @endguest
