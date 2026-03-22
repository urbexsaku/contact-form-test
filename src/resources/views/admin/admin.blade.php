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

</div>
@endsection