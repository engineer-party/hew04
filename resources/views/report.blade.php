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
<h1 id="title">通報する</h1>
<form action="/post" method="POST" id="report-form">
    {{ csrf_field() }}

    @if($errors)
    <p id="error">{{$errors->first('name')}}</p>
    @endif
    <label>ユーザーID</label>
    <p><input type="text" name="name" value="{{ old('id') }}" class="form-control" placeholder="通報するユーザーのID"></p>

    @if($errors)
    <p id="error">{{$errors->first('category')}}</p>
    @endif
    <label>通報の分類</label>
    <p>
        <select name="category">
            <option value="">-</option>
            @foreach ()
        </select>
    </p>

    @if($errors)
    <p id="error">{{$errors->first('detail')}}</p>
    @endif
    <label>詳細</label>
    <p><textarea name="detail" rows="6" placeholder="詳細な説明（任意）例）位置情報を不正取得している。"></textarea></p>

    <div id="warn">
        <p>禁止されている出品、行為を必ずご確認ください。</p>
        <p>また、ブランド品でシリアルナンバー等がある場合はご記載ください。偽ブランドの販売は犯罪であり処罰される可能性があります。</p>
        <p>出品をもちまして加盟店規約に同意したことになります。</p>
    </div>

    <a href=""><button type="submit" class="btn btn-danger">出品する</button></a>
</form>
@endsection

<!-- footer -->
@include('common.footer')
