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
        <form action="?" method="get">
            @csrf
            <div class="header__right--content">
                <div>
                    <button class="header__tag" formaction="/">ホーム</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/attendance">日付一覧</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/user_list">ユーザー 一覧</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/logout" formmethod="post">ログアウト</button>
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
                        @if($checkAttendance === 1)
                        <button class="body__btn--content-btn" formaction="/work_start">勤務開始</button>
                        @elseif($checkAttendance === 2 || $checkAttendance === 3)
                        <button class="body__btn--content-btn" formaction="/work_start" disabled>勤務開始</button>
                        @endif
                    </div>
                    <div class="body__btn--content-item">
                        @if($checkAttendance === 2)
                        <button class="body__btn--content-btn" formaction="/work_end">勤務終了</button>
                        @elseif($checkAttendance === 1 || $checkAttendance === 3)
                        <button class="body__btn--content-btn" formaction="/work_end" disabled>勤務終了</button>
                        @endif
                    </div>
                    <div class="body__btn--content-item">
                        @if($checkAttendance === 2)
                        <button class="body__btn--content-btn" formaction="/break_start">休憩開始</button>
                        @elseif($checkAttendance === 1 || $checkAttendance === 3)
                        <button class="body__btn--content-btn" formaction="/break_start" disabled>休憩開始</button>
                        @endif
                    </div>
                    <div class="body__btn--content-item">
                        @if($checkAttendance === 3)
                        <button class="body__btn--content-btn" formaction="/break_end">休憩終了</button>
                        @elseif($checkAttendance === 1 || $checkAttendance === 2)
                        <button class="body__btn--content-btn" formaction="/break_end" disabled>休憩終了</button>
                        @endif
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