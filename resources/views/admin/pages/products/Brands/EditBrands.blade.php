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
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h1>Edit Brands</h1>
                                <h3>{{ $brand->name }}</h3>
                                <form action="{{ route('admin.updateBrand') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="brandId" value="{{ $brand->id }}">
                                    <div class="mb-3">
                                        <label for="Name">Name</label>
                                        <input type="text" name="name" value="{{ $brand->name }}"
                                            class="form-control">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <p>This name is how it appears on your site.</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Slug">Slug</label>
                                        <input type="text" name="slug" value="{{ $brand->BrandSlug }}"
                                            class="form-control">
                                        @error('Slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <p>The 'slug' is the URL-friendly version of the name. It is usually all lowercase
                                            and
                                            contains only letters, numbers, and hypens</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Description">Description</label>
                                        <textarea type="text" name="Description" class="form-control" style="min-height: 200px;">{{ $brand->BrandDescription }}</textarea>
                                        @error('Description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Brand Image</label>
                                        </div>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary">Update Brand</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3>All Categories</h3>
                                    <p>These Categories have this brand.
                                    </p>
                                </div>
                                <div>
                                    <button class="btn btn-success waves-effect waves-light" data-toggle="modal"
                                        data-target=".addBrand">Add Category</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover mb-0 display">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($brand->categories as $item)
                                            <tr>
                                                <td> <img
                                                        src='{{ $item->image ? asset('category') . '/' . $item->image : asset('assets/images/media/default.webp') }}'
                                                        style='width: 50px; height: 50px; object-fit: cover;' />
                                                </td>
                                                <td style='vertical-align: middle;'>{{ $item->name }} </td>
                                                <td style='vertical-align: middle;'>{{ $item->slug }} </td>
                                                <td style='vertical-align: middle;'>{{ $item->description }} </td>
                                                <td style="vertical-align: middle;">

                                                    <form
                                                        action="{{ route('admin.deletBrand', ['categoryId' => $item->id, 'brandId' => $brand->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->


            <div class="modal fade addBrand" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h4" id="myExtraLargeModalLabel">Add Brand: {{ $brand->name }}</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.addBrand') }}" method="POST">
                                @csrf
                                <input type="hidden" name="brand" value="{{ $brand->id }}">
                                <div class="mb-3">
                                    <label for="CategoryName">Brand Name</label>
                                    <input type="text" readonly id="CategoryName" class="form-control"
                                        value="{{ $brand->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="SelectBrand">Select Brand</label>
                                    <select name="categoryId" id="categoryId" class="form-control">
                                        <option value="" selected>Select Category</option>

                                        @foreach ($categories as $category)
                                            @php
                                                $categoryInBrand = false;
                                            @endphp
                                            @foreach ($brand->categories as $item)
                                                @if ($category->id == $item->id)
                                                    @php
                                                        $categoryInBrand = true;
                                                        break; // No need to continue checking once found
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if (!$categoryInBrand)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
