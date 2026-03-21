@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">Confirm</div>
  <form class="form" action="/thanks" method="post">
    @csrf
    <table class="confirm-table">
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__input">
          <input type="text" name="last_name" value="{{ $contact['last_name']}}" readonly>
          <input type="text" name="first_name" value="{{ $contact['first_name']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">性別</th>
        <td class="confirm-table__input">
          <input type="text" name="gender"  value="{{ $contact['gender']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__input">
          <input type="email" name="email" value="{{ $contact['email']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">電話番号</th>
        <td class="confirm-table__input">
          <input type="tel" name="tel" value="{{ $contact['tel']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">住所</th>
        <td class="confirm-table__input">
          <input type="text" name="address" value="{{ $contact['address']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">建物名</th>
        <td class="confirm-table__input">
          <input type="text" name="building" value="{{ $contact['building']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせの種類</th>
        <td class="confirm-table__input">
          <input type="text" name="category_id" value="{{ $contact['category_id']}}" readonly>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせ内容</th>
        <td class="confirm-table__input">
          <input type="text" name="detail" value="{{ $contact['detail']}}" readonly>
        </td>
      </tr>
    </table>
    <div class="form__button">
      <button class="form__button-submit">送信</button>
  </form>
  <form action="/" method="get">
    @csrf
    @foreach ($contact as $key => $value)
    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
      <button class="form__button-edit">修正</button>
    </div>
  </form>
</div>
@endsection