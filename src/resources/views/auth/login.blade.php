@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
<a class="header__link" href="{{ route('register') }}">register</a>
@endsection

@section('content')
<div class="login-form__content">
  <div class="login-form__heading">Login</div>
  <div class="login-form__box">
    <form class="form" action="{{ route('login') }}" method="post" novalidate>
      @csrf
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
          </div>
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">パスワード</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="password" name="password" placeholder="例: coachtech1106">
          </div>
          <div class="form__error">
            @error('password')
             {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__button">
        <button type="submit" class="form__button-submit">ログイン</button>
      </div>
    </form>
  </div>
</div>

@endsection