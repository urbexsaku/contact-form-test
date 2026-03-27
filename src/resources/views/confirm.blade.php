@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">Confirm</div>
  <table class="confirm-table">
    <tr class="confirm-table__row">
      <th class="confirm-table__header">お名前</th>
      <td class="confirm-table__input">
        {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">性別</th>
      <td class="confirm-table__input">
        {{ $contact->gender_text }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">メールアドレス</th>
      <td class="confirm-table__input">
        {{ $contact['email'] }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">電話番号</th>
      <td class="confirm-table__input">
        {{ $contact['tel'] }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">住所</th>
      <td class="confirm-table__input">
        {{ $contact['address'] }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">建物名</th>
      <td class="confirm-table__input">
        {{ $contact['building'] }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">お問い合わせの種類</th>
      <td class="confirm-table__input">
        {{ $contact->category_text }}
      </td>
    </tr>
    <tr class="confirm-table__row">
      <th class="confirm-table__header">お問い合わせ内容</th>
      <td class="confirm-table__input">
        {{ $contact['detail'] }}
      </td>
    </tr>
  </table>
  <div class="form__button">
    <form action="/thanks" method="post">
      @csrf
      <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
      <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
      <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
      <input type="hidden" name="email" value="{{ $contact['email'] }}">

      <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
      <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
      <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">

      <input type="hidden" name="address" value="{{ $contact['address'] }}">
      <input type="hidden" name="building" value="{{ $contact['building'] }}">
      <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
      <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
      <button class="form__button-submit">送信</button>
    </form>
    <form action="/" method="post">
      @csrf      
      <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
      <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
      <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
      <input type="hidden" name="email" value="{{ $contact['email'] }}">

      <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
      <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
      <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">

      <input type="hidden" name="address" value="{{ $contact['address'] }}">
      <input type="hidden" name="building" value="{{ $contact['building'] }}">
      <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
      <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
      <button class="form__button-edit">修正</button>
    </form>
  </div>
</div>
@endsection