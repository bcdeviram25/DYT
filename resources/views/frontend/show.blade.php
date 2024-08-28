@extends('layouts.auth')

@section('content')
<div class="page-content">
    <h1>{{ $page->page_title }}</h1>
    {!! $page->description !!}
</div>
@endsection