@extends('layout')

@section('contets')
        <h1>ユーザ登録</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/user/input" method="post">
            @csrf
            名前: <input name="name" value="{{ old('name') }}"><br>
            email：<input name="email" value="{{ old('email') }}"><br>
            パスワード：<input  name="password" type="password"><br>
            パスワード(再度):<input type="password" name="password_confirmation"><br>
            <button>登録する</button><br>
        </form>
@endsection