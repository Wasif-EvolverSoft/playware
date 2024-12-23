@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <h1>Terms And Conditions</h1>
            <form action="{{ route('admin.updateTermsAndConditions') }}" method="POST">
                @csrf
                <textarea name="content" id="textEditor">{!! optional($content)->content ?? '' !!}</textarea>

                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('additionsStyles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('additionScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('#textEditor').trumbowyg();
    </script>
@endsection
