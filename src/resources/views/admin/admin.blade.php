@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-button')
<form action="{{ route('logout') }}" method="post">
  @csrf
  <button class="logout__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin__content">
  <h2 class="admin__heading">Admin</h2>
  <form class="search-form" action="/search" method="get">
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
      <select class="search-form__item-select" name="gender">
        <option value="" >全て</option>
        <option value="1" {{ request('gender') =='1' ? 'selected' : '' }}>男性</option>
        <option value="2" {{ request('gender') =='2' ? 'selected' : '' }}>女性</option>
        <option value="3" {{ request('gender') =='3' ? 'selected' : '' }}>その他</option>
      </select>
      <select class="search-form__item-select" name="category_id">
        <option value="" selected disabled>お問い合わせの種類</option>
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}" {{ request('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
        @endforeach
      </select>
      <input class="search-form__item-select" type="date" name="date" value="{{ request('date') }}" >
      <button type="submit" class="search-form__button-submit">検索</button>
      <button type="submit"  class="search-form__button-reset" name="reset">リセット</button>
    </div>
  </form>

  <div class="contact-table__utilities">
    <form action="/export" method="get">
      <input type="hidden" name="gender" value="{{ request('gender') }}">
      <input type="hidden" name="category_id" value="{{ request('category_id') }}">
      <input type="hidden" name="date" value="{{ request('date') }}">
      <input type="hidden" name="keyword" value="{{ request('keyword') }}">
      <button type="submit" class="contact-table__export">エクスポート</button>
    </form>
    <div class="contact-table__pagination">{{ $contacts->links() }}</div>
  </div>
  <table class="contact-table">
    <tr class="contact-table__row">
      <th class="contact-table__header">お名前</th>
      <th class="contact-table__header">性別</th>
      <th class="contact-table__header">メールアドレス</th>
      <th class="contact-table__header">お問い合わせの種類</th>
      <th class="contact-table__header contact-table__header--detail"></th>
    </tr>
    @foreach ($contacts as $contact)
    <tr class="contact-table__row">
      <td class="contact-table__item">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
      <td class="contact-table__item">{{ $contact->gender_text }}</td>
      <td class="contact-table__item">{{ $contact['email'] }}</td>
      <td class="contact-table__item">{{ $contact->category_text }}</td>
      <td class="contact-table__item contact-table__item--detail">
        <a href="#modal-{{ $contact->id }}" class="contact-table__button">詳細</a>
      </td>
    </tr>
    @endforeach
  </table>

  @foreach ($contacts as $contact)
  <div id="modal-{{ $contact->id }}" class="modal">
    <div class="modal__content">
      <a href="#" class="modal__close">x</a>
      <div class="modal__inner">
        <div class="modal__row">
          <span class="modal__label">お名前</span>
          <span class="modal__value">
            {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
          </span>
        </div>
        <div class="modal__row">
          <span class="modal__label">性別</span>
          <span class="modal__value">{{ $contact->gender_text }}</span>
        </div>
        <div class="modal__row">
          <span class="modal__label">メールアドレス</span>
          <span class="modal__value">{{ $contact['email'] }}</span>
        </div>
        <div class="modal__row">
          <span class="modal__label">電話番号</span>
          <span class="modal__value">{{ $contact['tel'] }}</span>
        </div>
        <div class="modal__row">
          <span class="modal__label">住所</span>
          <span class="modal__value">{{ $contact['address'] }}</span>
        </div>
        <div class="modal__row">
          <span class="modal__label">建物名</span>
          <span class="modal__value">{{ $contact['building'] }}</span>
        </div>
        <div class="modal__row">
          <span class="modal__label">お問い合わせの種類</span>
          <span class="modal__value">{{ $contact->category_text }}</span>
        </div>
        <div class="modal__row">
          <span class="modal__label">お問い合わせ内容</span>
          <span class="modal__value">{{ $contact['detail'] }}</span>
        </div>
        <div class="modal__button">
          <form action="/delete/{{ $contact->id }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="modal__button-delete">削除</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection