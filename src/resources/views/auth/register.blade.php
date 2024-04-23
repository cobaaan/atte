@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<header>
    <div>
        <a class="header__ttl" href="http://atte.blog">Atte</a>
    </div>
    <div></div>
</header>

<div class="body">
    <div class="login">
        <h2 class="login__ttl">会員登録</h2>
        <form action="/register" method="post">
            @csrf
            <div>
                <input class="login__input" type="text" name="name" value="{{ old('name') }}" placeholder="名前">
                @if($errors->has('name'))
                <div class="message__error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div>
                <input class="login__input" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
                @if($errors->has('email'))
                <div class="message__error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div>
                <input class="login__input" type="password" name="password" placeholder="パスワード">
                @if($errors->has('password'))
                <div class="message__error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div>
                <input class="login__input" type="password" name="password_confirmation" placeholder="確認用パスワード">
                @if($errors->has('password_confirmation'))
                <div class="message__error">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>
            <div>
                <button class="login__btn">会員登録</button>
            </div>
        </form>
        <div>
            <p class="login__txt">アカウントをお持ちの方はこちらから</p>
            <a class="login__register" href="/login">ログイン</a>
        </div>
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection