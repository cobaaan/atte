@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<header>
    <div>
        <a class="header__ttl" href="">Atte</a>
    </div>
    <div></div>
</header>

<div class="body">
    <div class="login">
        <h2 class="login__ttl">ログイン</h2>
        <form action="/login" method="post">
            @csrf
            <div>
                <input class="login__input" type="email" name="email" placeholder="メールアドレス">
            </div>
            <div>
                <input class="login__input" type="password" name="password" placeholder="パスワード">
            </div>
            <div>
                <button class="login__btn">ログイン</button>
            </div>
        </form>
        <div>
            <p class="login__txt">アカウントをお持ちでない方はこちらから</p>
            <a class="login__register" href="/register">会員登録</a>
        </div>
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection