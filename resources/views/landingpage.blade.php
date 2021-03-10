@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__1colum">
  
  <main class="l-main__1colum u-site__width">
    <section class="p-landingSection">
      <h2 class="p-landingSection__title">あなたのアイデアが誰かのビジネスになる</h2>
      <div class="p-landingSection__text">
        <p>こんなサービスがあればいいのにな？そう思ったことはありませんか？</p>
        <p>ビジネスのアイデアとは日常のちょっとした気付きから生まれます。</p>
        <p>しかし、気づいたとしてもサービスを一から作ることは難しいですよね。</p>
        <p>逆にエンジニアはサービスを作ることができますが、一日中PCと向かい合うことも多いため、日常の気づきを得る機会が少ないです。</p>
        <p>日常の気づきを商品にして、そのアイデアを使ってエンジニアがウェブサービスを作る</p>
        <p>それがInspirationです。</p>
      </div>

      <div class="img-outer">
        <img src="{{ asset('images/default/diagram-1.png') }}" srcset=""alt="">
      </div>
    </section>

    <section class="p-landingSection">
      <h2 class="p-landingSection__title">少しのアイデアで大きな事業に成長した例</h2>

      <h3>クラウドソーシング</h3>
      <h4>個人に仕事を依頼することで手間とコストを削減した</h4>
      <p>会社では、人を雇おうとしてもすぐに雇うことができません。</p>
      <p>他の企業に仕事を依頼すると関わる人が多くなるためコストが掛かってしまいます。</p>
      <p>個人と企業を直接結びつけることで、仕事の手間とコストを大きく削減することに成功しました。</p>

      <h3>フードデリバリー</h3>
      <h4>出前を外注することで大きなビジネスに</h4>
      <p>出前というシステムは昔からありましたが、店舗が出前をするためにはそのための従業員を一人雇う必要がありました</p>
      <p>しかし、スマホが普及したことで、街中で出前専用の従業員を待機させることができるようになり、飲食店は出前のために従業員を雇う必要がなくなりました。
      </p>

      <h3>オンラインサロン</h3>
      <h4>情報発信をSNS化することで収益化</h4>
      <p>昔からメルマガのようなインフルエンサーが一方的に情報発信するサービスはありました。</p>
      <p>SNSが一般化したことでオンライン上での活発化になり、情報発信だけでなく会員同士が交流する場を与えることで新たなビジネスになりました。</p>
      
    </section>
  </main>
</div>
@endsection