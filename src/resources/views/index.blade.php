@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__header">Contact</div>
  <form class="form">
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--text">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__group-content--name">
        <div class="form__input">
          <input type="text" name="last_name" placeholder="例: 山田">
          <input type="text" name="first_name" placeholder="例: 太郎">
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
            <input type="radio" name="gender" value="male">
            男性
          </label>
          <label>
            <input type="radio" name="gender" value="female">
            女性
          </label>
          <label>
            <input type="radio" name="gender" value="other">
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
          <input type="email" name="email" placeholder="例: test@example.com">
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
          <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
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
          <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
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
          <select name="contact_type" placeholder="選択してください”>
            
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
          <textarea name="content" placeholder="お問い合わせ内容をご記載ください"></textarea>
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