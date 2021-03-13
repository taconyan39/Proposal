<section class="c-section p-ideaRanking">
<h2 class="c-title__section p-ideaRanking__title">{{ $title }}</h2>

  <ul class="c-list p-ideaRanking__list">

  @if($ideas->isEmpty())
      <div class="p-simpleList--none">
        <p>{{$title}}は</br>まだありません</p>
      
      </div>
    @else

    <div>
    @foreach($ideas as $idea)
      <li class="c-list__item c-ranking__item p-ideaRanking__item u-clearfix">
        <div class="p-ideaRanking__top c-info">
            
          <div class="p-ideaRanking__topBox c-info__box">
            <time class="p-ideaRanking__date">{{ $idea->created_at->format('Y/m/d') }}</time>
          </div>
          <div class="c-dammy p-ideaRanking__topBox c-info__box"></div>
          <div class="p-ideaRanking__topBox c-info__box">
            <span class="p-ideaRanking__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
          </div>
          <div class="p-ideaRanking__topBox c-info__box--right c-info__box">
            <span class="c-price p-ideaRanking__price">¥{{ $idea->price }}</span>
          </div>
        </div>

        <div class="c-row p-ideaRanking__title--wrapper">
          <h3 class="c-list__title p-ideaRanking__title">{{ $idea->title }}</h3>
        </div>

        <div class="p-ideaRanking__body">
          <div class="p-ideaRanking__body--left">

            <span class="c-tag p-ideaRanking__body--tag">{{ $idea->category->name_ja }}</span>
              
            <div class="p-ideaRanking__userCard c-card">
              <div class="c-img--outer c-img--round c-card--top p-ideaRanking__userImg--outer">
                <img class="c-img p-ideaRanking__userImg" src="{{ $idea->user->icon_img }}"
                srcset="{{ asset($idea->user->icon_img . ' 2x')}}"
                alt="">
              </div>
              <div class="c-card--bottom p-ideaRanking__userCard--bottom">
                <a href="{{ url('user/' . $idea->user->id) }}" class="c-card__name c-link__underline">{{ $idea->user->name }}</a>
              </div>
            </div>
          </div>
          
          <div class="p-ideaRanking__body--right">
            
            <div class="p-ideaRanking__summary">
              <p class="c-txt p-ideaRanking__summary ">{{$idea->summary}}</p>
            </div>
            
            <div class="p-ideaRanking__bottom">
              @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
            </div>
          </div>
        </div>

        <div class="p-ideaRanking__bottom--sp">
            @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
        </div>
          
      </li>
      @endforeach
    </div>

      <!-- スマホ版レイアウト -->
      <div>
      @foreach($ideas as $idea)
       <li class="c-list__item c-ranking__item p-ideaRanking__item--sp  u-clearfix">
        <div class="p-ideaRanking__top c-flex--between">
            
          <div class="p-ideaRanking__topBox">
            <time class="p-ideaRanking__date">{{ $idea->created_at->format('Y/m/d') }}</time>
          </div>
          <div class="c-dammy p-ideaRanking__topBox"></div>
          <div class="p-ideaRanking__topBox">
            <span class="p-ideaRanking__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
          </div>
          <div class="p-ideaRanking__topBox">
            <span class="c-price p-ideaRanking__price">¥{{ $idea->price }}</span>
          </div>
        </div>

        <div class="p-ideaRanking__body--sp c-flex--start">
          <div class="p-ideaRanking__body--left">

            <span class="c-tag p-ideaRanking__body--tag">{{ $idea->category->name_ja }}</span>
              
            <div class="p-ideaRanking__userCard c-card">
              <div class="c-img--outer c-img--round c-card--top p-ideaRanking__userImg--outer">
                <img class="c-img p-ideaRanking__userImg" src="{{ $idea->user->icon_img }}" 
                srcset="{{ asset($idea->user->icon_img . ' 2x')}}"
                alt="">
              </div>
              <div class="c-card--bottom p-ideaRanking__userCard--bottom">
                <p class="c-card__name">{{ $idea->user->name }}</p>
              </div>
            </div>
          </div>
          
          <div class="p-ideaRanking__body--right-sp">
            <div class="c-row p-ideaRanking__title--wrapper">
              <h3 class="c-list__title p-ideaRanking__title">{{ $idea->title }}</h3>
            </div>
          </div>
        </div>

          <div class="p-ideaRanking__summary">
              <p class="c-txt p-ideaRanking__summary ">{{$idea->summary}}</p>
            </div>
            
            <div class="p-ideaRanking__bottom">
              @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
            </div>

        <div class="p-ideaRanking__bottom--sp">
            @component('components.list-btn',['idea' => $idea, 'listType' => $listType])
              @endcomponent
        </div>
          
      </li>
      @endforeach
    </div>
    @endif
  </ul>