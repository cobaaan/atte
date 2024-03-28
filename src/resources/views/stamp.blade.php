@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}" />
@endsection

@section('content')
<header class="header">
    <div class="header__left">
        <a class="header__ttl" href="">Atte</a>
    </div>
    <div class="header__right">
        <form action="" method="post">
            @csrf
            <div class="header__right--content">
                <div>
                    <button class="header__tag" formaction="">ホーム</button>
                </div>
                <div>
                    <button class="header__tag" formaction="">日付一覧</button>
                </div>
                <div>
                    <button class="header__tag" formaction="">ログアウト</button>
                </div>
            </div>
        </form>
    </div>
</header>

<div class="body">
    <div class="body__content">
        <div class="body__ttl">
            <h2>さんお疲れ様です</h2>
        </div>
        <div class="body__btn">
            <form action="" method="">
                <div class="body__btn--content">
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn">勤務開始</button>
                    </div>
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn">勤務終了</button>
                    </div>
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn">休憩開始</button>
                    </div>
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn">休憩終了</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection