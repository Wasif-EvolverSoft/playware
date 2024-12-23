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

    <!-- Table for Pending Reviews -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Review</th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Actions</th>
                        <th>Replies</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingReplies as $review)
                    <tr>
                        <td>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                {{ $review->reply }}
                             
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
