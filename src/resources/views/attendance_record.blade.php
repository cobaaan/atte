@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}" />
@endsection

@section('content')
<header class="header">
    <div class="header__left">
        <a class="header__ttl" href="http://atte.blog">Atte</a>
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
    <div class="body__top">
        <h2 class="body__top--txt">{{ $user_name[0]->name }} さんの勤怠記録</h2>
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
                <td>{{ $date->getDate()->format('Y-m-d') }}</td>
                <td>{{ $date->getWorkStart() }}</td>
                <td>{{ $date->getWorkEnd() }}</td>
                <td>{{ $date->getBreakTime() }}</td>
                <td>{{ $date->getWorkHour() . ":" . $date->getWorkMinute() . ":" . $date->getWorkSecond() }}</td>
            </tr>
            @endforeach
            @endif
            
            
        </table>
    </div>
    
    <div class="body__bottom">
        @if(isset($dates))
        <div class="body__bottom--paginate">{{$dates->appends(request()->query())->links('vendor.pagination.semantic-ui')}}</div>
        @endif
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection