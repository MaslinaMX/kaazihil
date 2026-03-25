@extends('layouts.app')

@section('title', 'Kaa Zihil Hotel')

@section('content')

@include('layouts.sections.hero')
@include('layouts.sections.about')
@include('layouts.sections.services')
@include('layouts.sections.rooms')
@include('layouts.sections.testimonials')
@include('layouts.sections.blog')

@endsection
