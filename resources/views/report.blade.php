@extends('layout.layout')

<!-- head -->
@section('title', 'Report')
@section('style')
<link rel="stylesheet" href="{{asset('css/report.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h1 id="title">通報フォーム</h1>
<form action="/report/store" method="POST" id="report-form">
    {{ csrf_field() }}

    @if($errors)
    <p id="error">{{$errors->first('id')}}</p>
    @endif
    <label>通報ユーザーID</label>
    <p><input type="tel" name="id" value="{{ old('id') }}" class="form-control" placeholder="通報するユーザーのID"></p>

    @if($errors)
    <p id="error">{{$errors->first('category')}}</p>
    @endif
    <label>通報の分類</label>
    <p>
        <select name="category">
            <option value="">-</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(old('category')==$category->id) selected  @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </p>

    <label>詳細</label>
    <p><textarea name="detail" rows="6" placeholder="詳細な説明（任意）例）位置情報を不正取得している。">{{ old('detail') }}</textarea></p>

    <a href=""><button type="submit" class="btn btn-danger">通報する</button></a>
</form>
@endsection

<!-- footer -->
@include('common.footer')
