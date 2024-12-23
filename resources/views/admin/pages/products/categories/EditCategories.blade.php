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
                                <h1>Edit Category</h1>
                                <h3>{{ $category->name }}</h3>
                                <form action="{{ route('admin.updateCategory') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="categoryID" value="{{ $category->id }}">
                                    <div class="mb-3">
                                        <label for="Name">Name</label>
                                        <input type="text" name="name" value="{{ $category->name }}"
                                            class="form-control">
                                        <p>This name is how it appears on your site.</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Slug">Slug</label>
                                        <input type="text" name="slug" value="{{ $category->slug }}"
                                            class="form-control">
                                        <p>The 'slug' is the URL-friendly version of the name. It is usually all lowercase
                                            and
                                            contains only letters, numbers, and hypens</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ParentCategory">Parent Category</label>
                                        <select name="ParentCategory" id="ParentCategory" class="form-control">
                                            @foreach ($categories as $cat)
                                                <option value=""
                                                    {{ $cat->id == $category->parent_id ? null : 'selected' }}>None</option>
                                                <option value="{{ $cat->id }}"
                                                    {{ $cat->id == $category->parent_id ? 'selected' : null }}>
                                                    {{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        <p>Categories, unlike tags, can have a hierarchy. You might have a Jazz
                                            category, and under that have children categories for Bebop and Big Band.
                                            Totally optional.</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Description">Description</label>
                                        <textarea type="text" name="Description" class="form-control" style="min-height: 200px;">{{ $category->description }}</textarea>
                                    </div>
                                    <button class="btn btn-primary">Update Category</button>
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
                                    <h3>All Brands</h3>
                                    <p>These are the brand that will be shown on product upload where this category is
                                        selected
                                    </p>
                                </div>
                                <div>
                                    <button class="btn btn-success waves-effect waves-light" data-toggle="modal"
                                        data-target=".addBrand">Add Brand</button>
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

                                        @foreach ($category->brands as $item)
                                            <tr>
                                                <td> <img
                                                        src='{{ $item->image ? asset('category') . '/' . $item->image : asset('assets/images/media/default.webp') }}'
                                                        style='width: 50px; height: 50px; object-fit: cover;' />
                                                </td>
                                                <td style='vertical-align: middle;'>{{ $item->name }} </td>
                                                <td style='vertical-align: middle;'>{{ $item->BrandSlug }} </td>
                                                <td style='vertical-align: middle;'>{{ $item->BrandDescription }} </td>
                                                <td style="vertical-align: middle;">
                                                    <form
                                                        action="{{ route('admin.deletBrand', ['categoryId' => $category->id, 'brandId' => $item->id]) }}"
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
                            <h5 class="modal-title h4" id="myExtraLargeModalLabel">Add Brand: {{ $category->name }}</h5>
                            <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.addBrand') }}" method="POST">
                                @csrf
                                <input type="hidden" name="categoryId" value="{{ $category->id }}">
                                <div class="mb-3">
                                    <label for="CategoryName">Category Name</label>
                                    <input type="text" readonly id="CategoryName" class="form-control"
                                        value="{{ $category->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="SelectBrand">Select Brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="" selected>Select Brand</option>

                                        @foreach ($brands as $brand)
                                            @php
                                                $brandInCategory = false;
                                            @endphp
                                            @foreach ($category->brands as $item)
                                                @if ($brand->id == $item->id)
                                                    @php
                                                        $brandInCategory = true;
                                                        break; // No need to continue checking once found
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if (!$brandInCategory)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
