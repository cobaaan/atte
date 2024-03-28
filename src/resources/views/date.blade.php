@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}" />
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
                    <button class="header__tag" formaction="">ホーム</button>
                </div>
                <div>
                    <button class="header__tag" formaction="">日付一覧</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/logout">ログアウト</button>
                </div>
            </div>
        </form>
    </div>
</header>

<div class="body">
    <div class="body__top">
        <p>< date ></p>
    </div>
    
    <div class="body__middle">
        <table>
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            
            <tr>
                <td>テスト太郎</td>
                <td>10:00:00</td>
                <td>20:00:00</td>
                <td>00:30:00</td>
                <td>09:30:00</td>
            </tr>
        </table>
    </div>
    
    <div class="body__bottom">
        <p>pagenate</p>
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection