@extends('admin.layout.layout')
@section('main-content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Categories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2>Add New Category</h2>
                            <form action="{{ route('admin.createCategory') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="categoryName">Name</label>
                                    <input class="form-control" name="categoryName" type="text" id="categoryName"
                                        required="" value="{{old('categoryName')}}"
                                        placeholder="Enter Category Name Eg. Hard Disk, Mobile Cover, Mobile">
                                </div>
                                <div class="form-group">
                                    <label for="CategorySlug">Slug</label>
                                    @error('CategorySlug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input class="form-control" name="CategorySlug" type="text" id="CategorySlug"
                                        required=""  value="{{old('CategorySlug')}}"
                                        placeholder="Enter Category Slug Eg. Hard-Disk, Mobile-SCover, Mobile">
                                    <p>The "Slug" is the URL-friendly version of the name. it is usually all lowercase and
                                        contains only letters, numbers and hyphens.</p>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Category Image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ParentCategory">Parent Category</label>
                                    <select class="form-control" name="ParentCategory" id="ParentCategory">
                                        <option value="">None</option>
                                        {{-- @foreach ($parent as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach --}}


                                        @foreach ($categories as $category)
                                            <x-categories-select :category="$category" />
                                        @endforeach
                                    </select>
                                    <p>Assign a parent term to create a hirarchy. The term jaxx, for example, would be the
                                        parent of Bebop and Big Band.</p>
                                </div>

                                <div class="form-group">
                                    <label for="CategoryDescription">Description</label>
                                    <textarea name="CategoryDescription" id="CategoryDescription" class="form-control" style="height: 200px;">{{old('CategoryDescription')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3>All Categories</h3>
                            <div  class="table-responsive">
                                <table id="myTable" class="table table-hover mb-0 display" >
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Slug</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $category)
                                            <x-admincategoryitem :category="$category" />
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->




        </div> <!-- container-fluid -->
    </div>
@endsection

