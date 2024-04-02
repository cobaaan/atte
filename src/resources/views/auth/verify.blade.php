@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
<link rel="stylesheet" href="{{ asset('css/verify.css') }}" />
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
        <h2 class="login__ttl">メール認証</h2>
        <p class="verify__txt send">確認のメールを送りました。<br>メッセージ内の確認ボタンを押してください。</p>
        <p class="verify__txt resend">メールが届かない場合は下のボタンを押してください。</p>
        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button class="verify__btn">再送信</button>
        </form>
        <div>
            <p class="verify__txt reregister">アカウントの登録し直しはこちらから</p>
            <form action="/logout" method="post">
                @csrf
                <div>
                    <button class="verify__btn">ログアウト</button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection