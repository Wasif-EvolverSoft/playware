@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    <h1>Contact List</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add New Contact</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Heading</th>
            <th>Number</th>
            <th>Email</th>
            <th>Paragraph</th>
            <th>Actions</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->contact_heading }}</td>
            <td>{{ $contact->contact_number }}</td>
            <td>{{ $contact->contact_email }}</td>
            <td>{{ $contact->contact_paragraph }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection