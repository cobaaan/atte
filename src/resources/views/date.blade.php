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
        <form action="?" method="post">
            @csrf
            <input type="hidden" name="dt" value="{{ $dt }}" readonly>
            <table class="body__top--table">
                <tr>
                    <td>
                        <button class="body__top--form-btn" formaction="/sub_date"><</button>
                    </td>
                    <td>
                        <p class="body__top--form-txt">{{ $dt->format('Y-m-d') }}</p>
                    </td>
                    <td>
                        <button class="body__top--form-btn" formaction="/add_date">></button>
                    </td>
                </tr>
            </table>
        </form>
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
            
            @if(isset($dates))
            @foreach($dates as $date)
            <tr>
                <td>{{ $date->getUserName() }}</td>
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
        <div class="body__bottom--paginate">{{$dates->appends(request()->input())->links('vendor.pagination.semantic-ui')}}</div>
        @endif
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection