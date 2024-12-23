@extends('admin.layout.layout')

@section('main-content')
<br><br><br><br><br><br>
<div class="container">
    <h3 class="section-title mb-4">Pending Reviews</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Review</th>
                        <th>User</th>
                        <th>Product</th> <!-- Display Product -->
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingReviews as $review)
                    <tr>
                        <td>{{ $review->review }}</td>
                        <td>{{ $review->user->fullName }}</td>
                        <td>{{ $review->product->name }} <!-- Display Product Name --></td>
                        <td>{{ $review->rating }} ★</td>
                        <td>
                            <form action="{{ route('admin.review.approve', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm mr-2">Accept</button>
                            </form>
                            <form action="{{ route('admin.review.decline', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
