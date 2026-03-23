@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
<a class="header__link" href="/logout">logout</a>
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">Admin</div>
  <form class="search-form">
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
      <select class="search-form__item-select" name="gender">
        <option value="" selected disabled>性別</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">男性</option>
      </select>
      <select class="search-form__item-select" name="category_id">
        <option value="" selected disabled>お問い合わせの種類</option>
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category->category_text }}</option>
        @endforeach
      </select>
      <div class="search-form__item-input">
        <label for="date">年/月/日<label>
        <input type="date" name="date">
      </div>
      <button class="search-form__button-submit">検索</button>
      <button class="search-form__button-reset">リセット</button>
    </div>
  </form>
  <div class="contact-table__utilities">
    <button class="contact-table__export">エクスポート</button>
    {{ $contacts->links() }}
  </div>
  <table class="contact-table">
    <tr class="contact-table__row">
      <th class="contact-table__header">お名前</th>
      <th class="contact-table__header">性別</th>
      <th class="contact-table__header">メールアドレス</th>
      <th class="contact-table__header">お問い合わせの種類</th>
      <th class="contact-table__header"></th>
    </tr>
    @foreach($contacts as $contact)
    <tr class="contact-table__row">
      <td class="contact-table__item">{{ $contact['last_name']}}　{{ $contact['first_name']}}</td>
      <td class="contact-table__item">{{ $contact->gender_text}}</td>
      <td class="contact-table__item">{{ $contact['email']}}</td>
      <td class="contact-table__item">{{ $contact->category_text}}</td>
      <td class="contact-table__item">
        <button class="contact-table__button">詳細</button>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection