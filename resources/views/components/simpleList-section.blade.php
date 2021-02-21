<section class="p-simpleList c-section">

  <h2 class="c-title__section p-simpleList__title">{{ $title }}</h2>

  <ul class="c-list p-simpleList__list">

    @foreach($items as $item)
      <li class="c-list__item--simple p-simpleList__item u-clearfix">
        <a href="{{ url('./post-idea/' . $item->id )}}" class="c-list__link p-simpleList__listLink u-clearfix">

        <div class="p-simpleList__top c-flex--between">
          <div>
            <span class="p-simpleList__date">{{ $item->created_at->format('Y/m/d') }}</span>
          </div>
          <div class="c-dammy"></div>
          <div>
            <span class="c-rating">{{ $item->rating  }}({{$item->countReview}})</span>
            <span class="p-simpleList__rating--num"></span>
          </div>
          <div>
            <span class="p-simpleList__price">¥{{ $item->price}}</span>
          </div>
        </div>

        <div class="p-simpleList__body c-flex--between">
          <div class="p-simpleList__body--left">

            <div class="c-img--outer c-img--round c-card--top p-simpleList__userImg--outer">
              <img class="c-img p-simpleList__userImg" src="{{asset('storage/images/icons/' . $item->user->icon_img )}}" alt="">
            </div>
            
          </div>

          <div class="p-simpleList__body--right">

            <div class="p-simpleList__body--upper c-flex--start">
              <span class="c-tag p-simpleList__tag">{{ $item->category->name_ja}}</span>
              <span class="">{{ $item->user->name }}</span>
            </div>
            <div class="p-simpleList__body--title c-list__title">
              <h3>{{ $item->title }}</h3>
            </div>
          </div>
        </div>
        
        <!-- レビュー内容 -->
        <div class="p-simpleList__bottom">
          <p class="c-txt p-simpleList__summary ">
            {{$item->summary}}</p>
        </div>
        </a>
      </li>
    @endforeach

  </ul>
  <!-- 全件表示 -->

  <div class="p-simpleList__bottom">
    <a href="{{ $url }}" class="c-btn p-simpleList__linkBtn">全件表示</a>
  </div>

</section>