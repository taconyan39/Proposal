<article class="p-ideaDetail c-article">

    <div class="p-ideaDetail__title c-form__header">
        <h2 class="c-form__title">{{ $idea->title}}</h2>
    </div>

    <div class="p-ideaDetail__content">

      <div class="p-ideaDetail__info c-info">
          
          <div class="c-info__box p-ideaDetail__infoItem--left">
              <time class="p-ideaDetail__info--date">{{ $idea->created_at->format('Y/m/d') }}</time>
          </div>

          <div class="c-dammy c-info__box">
          </div>
          <div class="c-info__box p-ideaDetail__infoItem">
              <span class="p-ideaDetail__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
          </div>
          <div class="c-info__box p-ideaDetail__infoItem--right">
              <span class="c-price p-ideaDetail__price">¥{{ $idea->price }}</span>
          </div>
      </div>
      
      <div class="p-ideaDetail__info c-row c-flex--between">
          <div>
              <span class="c-tag--large p-ideaDetail__infoItem--tag">{{ $idea->category->name }}</span>
          </div>
          <div class="c-flex--end p-ideaDetail__user">
              <div class="c-img--outer c-img--round p-ideaDetail__userImg--outer">
                  <img class="c-img p-ideaList__userImg" src="{{ $idea->user->icon_img }}" 
                  srcset="{{ asset($idea->user->icon_img . ' 2x')}}"
                  alt="アイコン画像">
                      
                  </div>
                  
                  <span class="p-ideaDetail__user--name">{{ $idea->user->name }}<span>
              </div>
          </div>
      
          <div class="p-ideaDetail__summary">
              <h3>{{ $idea->summary }}</h3>
          </div>
      
          <div class="p-ideaDetail__text--wrapper">
              <div class="p-ideaDetail__purchased">
                      <p class="p-ideaDetail__text">{!! nl2br(e($idea->content)) !!}</p>
                  </div>
          </div>

          @if(!$idea->sold_flg)
              <div class="p-ideaDetail__row c-flex--end">
                  <a href="{{ url('post-idea/'. $idea->id . '/edit')}}" class="c-btn c-btn--action2">編集する</a>
              </div>
          @else
              <div class="p-ideaDetail__row c-flex--end">
                  <a href="#" disabled class="c-btn--disable c-btn">編集不可</a>
              </div>
          @endif
</article>