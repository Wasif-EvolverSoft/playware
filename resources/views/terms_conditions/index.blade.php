@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    @foreach ($terms as $heading => $questions)
        <h3>{{ $heading }}</h3>
        @foreach ($questions->chunk(3) as $chunk)
            <div class="accordion">
                @foreach ($chunk as $item)
                    <div class="accordion-item">
                        <h2>{{ $item->question }}</h2>
                        <div>{{ $item->answer }}</div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endforeach
</div>
@endsection