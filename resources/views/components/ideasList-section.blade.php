
<section class="c-section p-ideaList">
<h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>

  <ul class="c-list p-ideaList__list">

  @if($ideas->isEmpty())
      <div class="p-simpleList--none">
        <p>{{$title}}は</br>まだありません</p>
      
      </div>
    @else

    @foreach($ideas as $idea)
      <li class="c-list__item p-ideaList__item u-clearfix">
        <div class="p-ideaList__top c-info">
            
          <div class="p-ideaList__topBox c-info__box">
            <time class="p-ideaList__date">{{ $idea->created_at->format('Y/m/d') }}</time>
          </div>
          <div class="c-dammy p-ideaList__topBox c-info__box"></div>
          <div class="p-ideaList__topBox c-info__box">
            <span class="p-ideaList__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
          </div>
          <div class="p-ideaList__topBox c-info__box--right c-info__box">
            <span class="c-price p-ideaList__price">¥{{ $idea->price }}</span>
          </div>
        </div>

        <div class="c-row p-ideaList__title--wrapper">
          <h3 class="c-list__title p-ideaList__title">{{ $idea->title }}</h3>
        </div>

        <div class="p-ideaList__body">
          <div class="p-ideaList__body--left">

            <span class="c-tag p-ideaList__body--tag">{{ $idea->category->name_ja }}</span>
              
            <div class="p-ideaList__userCard c-card">
              <div class="c-img--outer c-img--round c-card--top p-ideaList__userImg--outer">
                <img class="c-img p-ideaList__userImg" src="{{ 'storage/images/icons/' . $idea->user->icon_img }}"
                srcset="{{ asset( 'storage/images/icons/' . $idea->user->icon_img . ' 2x')}}"
                alt="">
              </div>
              <div class="c-card--bottom p-ideaList__userCard--bottom">
                <a href="{{ url('user/' . $idea->user->id) }}" class="c-card__name c-link__underline">{{ $idea->user->name }}</a>
              </div>
            </div>
          </div>
          
          <div class="p-ideaList__body--right">
            
            <div class="p-ideaList__summary">
              <p class="c-txt p-ideaList__summary ">{{$idea->summary}}</p>
            </div>
            
            <div class="p-ideaList__bottom">
              @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
            </div>
          </div>
        </div>

        <div class="p-ideaList__bottom--sp">
            @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
        </div>
          
      </li>

      <!-- スマホ版レイアウト -->
      <li class="c-list__item p-ideaList__item--sp  u-clearfix">
        <div class="p-ideaList__top c-flex--between">
            
          <div class="p-ideaList__topBox">
            <time class="p-ideaList__date">{{ $idea->created_at->format('Y/m/d') }}</time>
          </div>
          <div class="c-dammy p-ideaList__topBox"></div>
          <div class="p-ideaList__topBox">
            <span class="p-ideaList__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
          </div>
          <div class="p-ideaList__topBox">
            <span class="c-price p-ideaList__price">¥{{ $idea->price }}</span>
          </div>
        </div>

        <div class="p-ideaList__body--sp c-flex--start">
          <div class="p-ideaList__body--left">

            <span class="c-tag p-ideaList__body--tag">{{ $idea->category->name_ja }}</span>
              
            <div class="p-ideaList__userCard c-card">
              <div class="c-img--outer c-img--round c-card--top p-ideaList__userImg--outer">
                <img class="c-img p-ideaList__userImg" src="{{ 'storage/images/icons/' .$idea->user->icon_img }}" 
                srcset="{{ asset('storage/images/icons/' . $idea->user->icon_img . ' 2x')}}"
                alt="">
              </div>
              <div class="c-card--bottom p-ideaList__userCard--bottom">
                <p class="c-card__name">{{ $idea->user->name }}</p>
              </div>
            </div>
          </div>
          
          <div class="p-ideaList__body--right-sp">
            <div class="c-row p-ideaList__title--wrapper">
              <h3 class="c-list__title p-ideaList__title">{{ $idea->title }}</h3>
            </div>
          </div>
        </div>

          <div class="p-ideaList__summary">
              <p class="c-txt p-ideaList__summary ">{{$idea->summary}}</p>
            </div>
            
            <div class="p-ideaList__bottom">
              @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
            </div>

        <div class="p-ideaList__bottom--sp">
            @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
        </div>
          
      </li>
    @endforeach
    @endif
  </ul>

