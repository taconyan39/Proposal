@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__1colum">
  
  <main class="l-main__1colum u-site__width">

    <div class="c-img-outer">
      <img src="{{ asset('images/default/key_visual.png') }}" srcset="{{ asset('images/retina_2x/key_visual.png 2x') }}"alt="" class="c-img">

      <div class="p-aboutSection__btn--wrapper c-flex--around">
        <a href="{{ route('register') }}" class="c-btn--large c-btn--action p-aboutSection__btn">会員登録する</a>
        <a href="{{ url('index') }}" class="c-btn--large c-btn--action3 p-aboutSection__btn">アイデアを探す</a>
      </div>

    </div>

    <section class="p-aboutSection">

      <div class="p-aboutSection__wrapper u-site__width">
        <div class="p-aboutSection__text--wrapper">
          <h2 class="p-aboutSection__title">こんなサービスがあればいいのにな？</h2>
          <p class="p-aboutSection__text">ビジネスのアイデアとは日常のちょっとした気付きから生まれます。</p>
          しかし、気づいたとしてもサービスを一から作ることは難しいですよね。</br>
          逆にエンジニアはサービスを作ることができますが、日常や他業種の気づきを得る機会が少ないです。</br>
          気づきを商品にして、そのアイデアを使ってエンジニアがウェブサービスを作る</br>
          それがInspirationです。</p>
        </div>
      </div>

    </section>

    <section class="p-aboutSection__sub">
      <div class="p-aboutSection__wrapper u-site__width">
        <div class="p-aboutSection__title--wrapper c-flex--center">
          <h2 class="p-aboutSection__title c-title--brackets">Inspiration利用の流れ</h2>
        </div>

        <div class="c-img-outer">
          <img src="{{ asset('images/default/diagram.png') }}" srcset="{{ asset('images/retina_2x/diagram.png 2x') }}"alt="Inspirationの利用の流れ" class="c-img">
        </div>

        <div class="p-aboutSection__btn--wrapper c-flex--around">
          <a href="{{ route('register') }}" class="c-btn--large c-btn--action p-about__btn">会員登録する</a>
        </div>
      </section>
      
      <section class="p-aboutSection">
        <div class="p-aboutSection__wrapper u-site__width">

        <div class="p-aboutSection__title--wrapper c-flex--center">
          <h2 class="p-aboutSection__title c-title--brackets">少しのアイデアで大きな事業に成長した例</h2>
        </div>

          <ul class="p-aboutSection__example ">
            <li class="p-aboutSection__exampleItem">
              <div class="c-img--outer p-aboutSection__exampleImg--outer">
                <img src=" {{ asset('/images/default/pc_book.jpg') }}" 
                srcset=" {{ asset('/images/retina_2x/pc_book.jpg 2x') }}"
                alt="本とPCの画像" class="c-img">
              </div>
              <div class="p-aboutSection__exampleText">
                <h3 class="p-aboutSection__title--h3">クラウドソーシング</h3>
                <p>会社では、人を雇おうとしてもすぐに雇うことができません。</p>
                <p>クラウドソーシングサービスでは個人と企業を直接結びつけることで、仕事の手間とコストを大きく削減することに成功しました。</p>
              </div>
            </li>
            <li class="p-aboutSection__exampleItem">
                <div class="c-img--outer p-aboutSection__exampleImg--outer">
                  <img src=" {{ asset('images/default/food_delivery.jpg') }}"
                  srcset=" {{ asset('images/retina_2x/food_delivery.jpg 2x') }}"
                  alt="フードデリバリーの画像" class="c-img">
                </div>
                <div class="p-aboutSection__exampleText">
                  <h3 class="p-aboutSection__title--h3">フードデリバリー</h3>
                  <p>出前というシステムは昔からありましたが、店舗が出前をするためには出前のための従業員を一人雇う必要がありました</p>
                  <p>しかし、スマホが普及したことで、街中で出前専用の従業員を待機させることができるようになり、飲食店は出前のために従業員を雇う必要がなくなりました。
                  </p>
                </div>
            </li>
            <li class="p-aboutSection__exampleItem">
              <div class="c-img--outer p-aboutSection__exampleImg--outer">
                <img src=" {{ asset('/images/default/fashion.jpg') }}"
                srcset=" {{ asset('/images/retina_2x/fashion.jpg 2x') }}"
                alt="並んだ服の画像" class="c-img">
              </div>
              <div class="p-aboutSection__exampleText">
                <h3 class="p-aboutSection__title--h3">ファッションレンタル</h3>
                <p>ファストファッションの流行により、服の寿命が年々短くなっています。</p>
                <p>買うとコストがかかりますが、シェアすることでコストを抑え服のバリエーションを増やすことができました。</p>
              </div>
            </li>
        </ul>

      </div>

      <div class="p-aboutSection__btn--wrapper c-flex--around">
        <a href="{{ url('index') }}" class="c-btn--large c-btn--action3 p-aboutSection__btn">アイデアを探す</a>
      </div>

    </section>

  </main>
</div>
@endsection