@extends('layouts.app')

@section('pagetitle')
	<title>ACTIVITY show</title>
@stop

@section('content')
	<h2>Your request is "{{ $search->string }}"</h2>

@stop