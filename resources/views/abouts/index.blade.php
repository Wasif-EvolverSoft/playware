@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <h1>About Us Sections</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('abouts.create') }}" class="btn btn-primary mb-3">Add New About Section</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Heading</th>
            <th>Sub-heading</th>
            <th>Paragraph</th>
            <th>Actions</th>
        </tr>
        @foreach($abouts as $about)
        <tr>
            <td>{{ $about->id }}</td>
            <td>{{ $about->about_heading }}</td>
            <td>{{ $about->about_heading2 }}</td>
            <td>{{ $about->about_paragraph }}</td>
            <td>
                <a href="{{ route('abouts.show', $about->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('abouts.destroy', $about->id) }}" method="POST" style="display:inline-block;">
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