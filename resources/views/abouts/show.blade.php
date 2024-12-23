@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <h1>About Us Details</h1>
    <p><strong>Heading:</strong> {{ $about->about_heading }}</p>
    <p><strong>Sub-heading:</strong> {{ $about->about_heading2 }}</p>
    <p><strong>Paragraph:</strong> {{ $about->about_paragraph }}</p>
    <a href="{{ route('abouts.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection