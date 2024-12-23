@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <h1>Edit About Us Section</h1>
    <form action="{{ route('abouts.update', $about->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="about_heading" class="form-label">Heading</label>
            <input type="text" class="form-control" id="about_heading" name="about_heading" value="{{ $about->about_heading }}">
        </div>
        <div class="mb-3">
            <label for="about_heading2" class="form-label">Sub-heading</label>
            <input type="text" class="form-control" id="about_heading2" name="about_heading2" value="{{ $about->about_heading2 }}">
        </div>
        <div class="mb-3">
            <label for="about_paragraph" class="form-label">Paragraph</label>
            <textarea class="form-control" id="about_paragraph" name="about_paragraph">{{ $about->about_paragraph }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection