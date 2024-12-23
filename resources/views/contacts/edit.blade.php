
@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <h1>Edit Contact</h1>
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="contact_heading" class="form-label">Heading</label>
            <input type="text" class="form-control" id="contact_heading" name="contact_heading" value="{{ $contact->contact_heading }}">
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $contact->contact_number }}">
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $contact->contact_email }}">
        </div>
        <div class="mb-3">
            <label for="contact_paragraph" class="form-label">Paragraph</label>
            <textarea class="form-control" id="contact_paragraph" name="contact_paragraph">{{ $contact->contact_paragraph }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
