@extends('layouts.master')

@section('content')
<!-- Hero news -->
 @include('frontend.home-components.hero-slider')
<!-- End Hero news -->
<!-- Popular news category -->
@include('frontend.home-components.main')
<!-- End Popular news category -->
@endsection