@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
<div class="col-12">
    @if (session('success'))
    <div class="alert alert-success  mx-auto">
        {{ session('success') }}
    </div>
    @endif

    @if (session('failed'))
    <div class="alert alert-danger  mx-auto">
        {{ session('failed') }}
    </div>
    @endif
</div>

            
@endsection
