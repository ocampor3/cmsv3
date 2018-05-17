@extends('layouts.master')

@section('title')
    Roche | Home
@endsection

{{--META TAGS--}}
@section('meta-url')
	{{Request::url()}}
@endsection

@section('meta-title')
	Home
@endsection
