@extends('cartli::layouts.app')
@section('page_title')Cartli - Your online Store @endsection
@section('content')
        <form method="post" action="{{ route('admin.login.attempt') }}" autocomplete="off">
            @csrf
            <input type="text" name="email">
            <input type="text" name="password">
            <input type="submit" name="submit" value="Login">
        </form>
@endsection
