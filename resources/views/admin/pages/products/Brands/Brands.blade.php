@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Brands</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Brands</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('Delete'))
                <div class="alert alert-danger">{{ session('Delete') }}</div>
            @endif

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2>Add New Brand</h2>
                            <form action="{{ route('admin.createbrand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="BrandName">Name</label>
                                    <input class="form-control" name="BrandName" type="text" id="BrandName"
                                        required="" value="{{ old('BrandName') }}"
                                        placeholder="Enter Brand Name Eg. Intel, AMD, Nvidia">
                                    @error('BrandName')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="BrandSlug">Slug</label>
                                    @error('BrandSlug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input class="form-control" name="BrandSlug" type="text" id="BrandSlug"
                                        required="" value="{{ old('BrandSlug') }}"
                                        placeholder="Enter Brand Slug Eg. T-Force, V-Color">
                                    <p>The "Slug" is the URL-friendly version of the name. it is usually all lowercase and
                                        contains only letters, numbers and hyphens.</p>
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


                                <div class="form-group">
                                    <label for="BrandDescription">Description</label>
                                    <textarea name="BrandDescription" id="BrandDescription" class="form-control" style="height: 200px;">{{ old('BrandDescription') }}</textarea>
                                    @error('BrandDescription')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Add Brand</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3>All Brands</h3>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover mb-0 display">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Slug</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td> <img
                                                        src='{{ $brand->image ? asset('brand') . '/' . $brand->image : asset('assets/images/media/default.webp') }}'
                                                        style='width: 50px; height: 50px; object-fit: contain;' />
                                                </td>
                                                <td style="vertical-align: middle;"><a href="{{route('admin.editBrandsPage', ['id' => $brand->id])}}">{{ $brand->name }}</a></td>
                                                <td style="vertical-align: middle;">{{ $brand->BrandDescription }}</td>
                                                <td style="vertical-align: middle;">{{ $brand->BrandSlug }}</td>
                                                <td>
                                                    <form action="{{ route('admin.deleteBrand', ['id' => $brand->id]) }}"
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
                            <div class="w-100">
                                {{ $brands->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->




        </div> <!-- container-fluid -->
    </div>
@endsection
