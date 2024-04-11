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
        <h2 class="body__top--txt">ユーザー 一覧</h2>
    </div>
    
    
    
    <div class="body__middle">
        <table>
            <tr>
                <th>名前</th>
                <th></th>
            </tr>
            
            @if(isset($users))
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>
                    <form action="/attendance_record" method="post">
                        @csrf
                        <input type="hidden" name="id" value={{ $user->id }}>
                        <button>詳細</button>
                    </form>
                </td>
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