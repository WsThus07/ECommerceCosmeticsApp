@extends('admin.layouts.template')
@section('page_title')
Dashboard -Admin - e- Commerce
@endsection
@section('content')
<div class="container">
    <h1>Hi {{ Auth::user()->name }}</h1>
</div>
@endsection
