@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">Confirm</div>
    <form class="confirm-form" action="/thanks" method="post">
      @csrf
      <table class="confirm-table">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__input">
            {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
          </td>
          <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
          <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__input">
            {{ $contact->gender_text }}
          </td>
          <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__input">
            {{ $contact['email'] }}
          </td>
          <input type="hidden" name="email" value="{{ $contact['email'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__input">
            {{ $contact['tel'] }}
          </td>
          <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
          <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
          <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__input">
            {{ $contact['address'] }}
          </td>
          <input type="hidden" name="address" value="{{ $contact['address'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__input">
            {{ $contact['building'] }}
          </td>
          <input type="hidden" name="building" value="{{ $contact['building'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__input">
            {{ $contact->category_text }}
          </td>
          <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__input">
            {{ $contact['detail'] }}
          </td>
          <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        </tr>
      </table>
      <div class="form__button">
        <button type="submit" class="form__button-submit">送信</button>
        <button type="submit" class="form__button-edit" name="back">修正</button>
      </div>
    </form>
  </div>
</div>
@endsection