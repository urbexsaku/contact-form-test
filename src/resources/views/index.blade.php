@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">Contact</div>
  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__group-content--name">
        <div class="form__input">
          <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name', $contact['last_name'] ?? '')}}">
          <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name', $contact['first_name'] ?? '')}}">
        </div>
        <div class="form__error">

        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__group-content--gender">
        <div class="form__input">
          <label>
            <input type="radio" name="gender" value="1">
            男性
          </label>
          <label>
            <input type="radio" name="gender" value="2">
            女性
          </label>
          <label>
            <input type="radio" name="gender" value="3">
            その他
          </label>
        </div>
        <div class="form__error">
          
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email', $contact['email'] ?? '')}}">
        </div>
        <div class="form__error">

        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__group-content--tel">
        <div class="form__input">
          <input type="text" name="tel1" placeholder="080"> -
          <input type="text" name="tel2" placeholder="1234"> -
          <input type="text" name="tel3" placeholder="5678">
        </div>
        <div class="form__error">

        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address'] ?? '')}}">
        </div>
        <div class="form__error">

        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $contact['building'] ?? '')}}">
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <select name="category_id" required>
            <option value="" selected disabled>選択してください</option>
            @foreach ($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['content']}}</option>
            @endforeach
          </select>
        </div>
        <div class="form__error">

        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', $contact['detail'] ?? '')}}</textarea>
        </div>
        <div class="form__error">

        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit">確認画面</button>
    </div>
  </form>

</div>
@endsection