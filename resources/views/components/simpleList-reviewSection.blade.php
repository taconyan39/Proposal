

  <h2 class="c-title__section p-simpleList__title">{{ $title }}</h2>

  <ul class="c-list p-simpleList__list">

    @if($reviews->isEmpty())
      <div class="p-simpleList--none">
        <p>{{$title}}は</br>まだありません</p>
      
      </div>
    @else

    @foreach($reviews as $review)

      <li class="c-list__item--simple p-simpleList__item u-clearfix">
        <a href="{{ url('./idea/' . $review->idea_id )}}" class="c-list__link p-simpleList__listLink u-clearfix">

        <div class="p-simpleList__top c-flex--between">
          <div>
            <span class="p-simpleList__date">{{ $review->created_at->format('Y/m/d') }}</span>
          </div>
          <div class="c-dammy"></div>
          <div class="p-simpleList__star c-flex--start">
            @for($i = 1; $i < $review->rating; $i++)
            <span class="c-star"></span>
            @endfor
            <span class="p-simpleList__rating--num"></span>
          </div>
          <div>
            <span class="p-simpleList__price">¥{{ $review->idea->price}}</span>
          </div>
        </div>

        <div class="p-simpleList__body c-flex--between">
          <div class="p-simpleList__body--left">

            <div class="c-img--outer c-img--round c-card--top p-simpleList__userImg--outer">
              <img class="c-img p-ideaList__userImg" src="{{  asset( 'storage/images/icons/' .$review->user->icon_img)}}"
              alt="">
            </div>
          </div>

          <div class="p-simpleList__body--right">

            <div class="p-simpleList__body--upper c-flex--start">
              <span class="c-tag p-simpleList__tag">{{ $review->idea->category->name_ja}}</span>
              <span class="">{{ $review->user->name }}</span>
            </div>
            <div class="p-simpleList__body--title c-list__title">
              <h3>{{ $review->idea->title }}</h3>
            </div>
          </div>
        </div>
        
        <!-- 口コミ内容 -->
        <div class="p-simpleList__bottom">
          <p class="c-txt p-simpleList__summary ">
            {{$review->review}}</p>
        </div>
        </a>
      </li>
    @endforeach
    @endif

  </ul>

