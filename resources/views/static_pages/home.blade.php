@extends('layouts.default')

@section('content')
  <div class="jumbotron">
    <h1>Hello</h1>
    <p class="lead">
      歡迎來到智能體溫管理系統
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">現在註冊</a>
    </p>
  </div>
@stop
