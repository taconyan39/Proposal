<aside class="l-sidebar">
  <div class="p-categoryList">
    <ul class="c-list p-categoryList__items">
      <li class="c-list__title p-categoryList__item">
        <p class="p-categoryList__title">カテゴリ名</p>
      </li>

      <li class="c-list__item--simple p-categoryList__item">
        <a href="{{ url('all-ideas-list?category_id=0') }}" class="c-list__link p-categoryList__link">すべて</a>
      </li>
      
      @foreach($categories as $category)
      <li class="c-list__item--simple p-categoryList__item">
        <a href="{{ url('all-ideas-list?category_id=' . $category->id) }}" class="c-list__link p-categoryList__link">{{ __($category->name_ja) }}</a>
      </li>
      @endforeach 

      <li class="p-categoryList__btn--wrapper c-flex--center">
        <a href="{{ url('/') }}" class="c-btn c-btn--action3 p-categoryList__btn">利用方法を見る</a>
      </li>
    </ul> 
  </div>
</aside>