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
        <form action="?" method="post">
            @csrf
            <div class="header__right--content">
                <div>
                    <button class="header__tag" formaction="/stamp">ホーム</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/date">日付一覧</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/logout">ログアウト</button>
                </div>
            </div>
        </form>
    </div>
</header>

<div class="body">
    <div class="body__content">
        <div class="body__ttl">
            <h2>{{ $auths->name }}さんお疲れ様です</h2>
        </div>
        <div class="body__btn">
            <form action="?" method="post">
                @csrf
                <div class="body__btn--content">
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn" formaction="/work_start">勤務開始</button>
                    </div>
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn" formaction="/work_end">勤務終了</button>
                    </div>
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn" formaction="/break_start">休憩開始</button>
                    </div>
                    <div class="body__btn--content-item">
                        <button class="body__btn--content-btn" formaction="/break_end">休憩終了</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div>
    @if(isset($request))
    <h2>ppppasdfasdfa</h2>
    @endif
    @if(isset($workend))
    <h2>{{ $workend }}</h2>
    @endif
    
    @if(isset($thi))
    <h2>{{ $thi }}</h2>
    @endif
    
    
    
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection