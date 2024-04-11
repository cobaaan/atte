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
                    <button class="header__tag" formaction="/">ホーム</button>
                </div>
                <div>
                    <button class="header__tag" formaction="/attendance">日付一覧</button>
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
        <h2 class="body__top--txt">{{ $user_name[0]->name }}</h2>
    </div>
    
    
    
    <div class="body__middle">
        <table>
            <tr>
                <th>日付</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            
            @if(isset($dates))
            @foreach($dates as $date)
            <tr>
                <td>{{ $date->created_at }}</td>
                <td>{{ $date->work_start }}</td>
                <td>{{ $date->work_end }}</td>
                <td>{{ $date->getDate($user_id) }}</td>
            </tr>
            @endforeach
            @endif
            
            
        </table>
    </div>
    
    <div class="body__bottom">
        @if(isset($dates))
        
        @endif
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection