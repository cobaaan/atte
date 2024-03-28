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
        <h2 class="login__ttl">メール認証</h2>
        <p>確認のメールを送りました。<br>メッセージ内の確認ボタンを押してください。</p>
        <p>メールが届かない場合は下のボタンを押してください。</p>
        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button>再送信</button>
        </form>
        <div>
            <a class="login__register" href="/register">会員登録</a>
        </div>
    </div>
</div>

<footer>
    <small>Atte,inc.</small>
</footer>

@endsection