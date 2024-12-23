@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit Home Page</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                                <li class="breadcrumb-item active">Home Page</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4>Slider 1</h4>
                            <div class="position-relative">
                                <button class="btn btn-primary" style="position: absolute; right: 15px; top: 15px;"
                                    data-toggle="modal" data-target=".UpdateSlider1Content">Change
                                    Content</button>
                                <img class="w-100" src="{{ asset('Content') . '/' . $slide1->image }}" alt="">
                                <div
                                    style="width: 25%; position: absolute; left: 2%; top: 50%; transform: translateY(-50%)">
                                    <h5 class="text-primary">{{ $slide1->featureText }}</h5>
                                    <h2 class="text-uppercase">{{ $slide1->mainHeading }}<span
                                            style="color: #EA580C">{{ ' ' . $slide1->Highlight_Text }}</span></h2>
                                    <a href="{{ $slide1->ButtonLink }}"
                                        class="btn btn-primary rounded-4">{{ $slide1->ButtonText }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade UpdateSlider1Content" tabindex="-1" role="dialog"
                        aria-labelledby="UpdateSlider1Content" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="UpdateSlider1Content">Edit Slider 1 Content</h5>
                                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.updateContent') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $slide1->id }}">
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name='image'
                                                    id="customFile" value="{{ $slide1->image }}">
                                                <label class="custom-file-label" for="customFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialText">Featued Text</label>
                                            <input type="text" id="specialText" name="featuredText" class="form-control"
                                                placeholder="Enter Your Featured Text Eg. Special Offer"
                                                value="{{ $slide1->featureText }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="MainHeader">Main Heading</label>
                                                    <input type="text" id="MainHeader" name="MainHeading"
                                                        class="form-control"
                                                        placeholder="Enter Main Heading Eg. MINI HELICOPTER DRONE 4 CHANNELS "
                                                        value="{{ $slide1->mainHeading }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="HighlightText">Highlight Text</label>
                                                    <input type="text" id="HighlightText" name="HighlightText"
                                                        class="form-control"
                                                        placeholder="Enter Your Highlighted Text Eg. SALES 40% OFF"
                                                        value={{ $slide1->Highlight_Text }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ButtonText">Button Text</label>
                                            <input type="text" id="ButtonText" name="ButtonText" class="form-control"
                                                placeholder="Enter Button Text Eg. Shop Now"
                                                value="{{ $slide1->ButtonText }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="ButtonLink">Enter Button Link</label>
                                            <input type="text" id="ButtonLink" name="ButtonLink" class="form-control"
                                                placeholder="Enter Button Text Eg. https://Playware.com/category/iPhones"
                                                value="{{ $slide1->ButtonLink }}">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="card">
                        <div class="card-body">
                            <h4>Slider 2</h4>
                            <div class="position-relative">
                                <button class="btn btn-primary" style="position: absolute; right: 15px; top: 15px;"
                                    data-toggle="modal" data-target=".UpdateSlider2Content">Change
                                    Content</button>
                                <img class="w-100" src="{{ asset('Content') . '/' . $slide2->image }}" alt="">
                                <div
                                    style="width: 25%; position: absolute; left: 2%; top: 50%; transform: translateY(-50%)">
                                    <h5 class="text-primary">{{ $slide2->featureText }}</h5>
                                    <h2 class="text-uppercase">{{ $slide2->mainHeading }}<span
                                            style="color: #EA580C">{{ ' ' . $slide2->Highlight_Text }}</span></h2>
                                    <a href="{{ $slide2->ButtonLink }}"
                                        class="btn btn-primary rounded-4">{{ $slide2->ButtonText }}</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade UpdateSlider2Content" tabindex="-1" role="dialog"
                        aria-labelledby="FeaturedSlider1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="FeaturedSlider1">Edit Slider 2 Content</h5>
                                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.updateContent') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $slide2->id }}">
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <div class="custom-file">
                                                <input type="file" name='image' class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialText">Featued Text</label>
                                            <input type="text" id="specialText" name="featuredText"
                                                class="form-control" value="{{ $slide2->featureText }}"
                                                placeholder="Enter Your Featured Text Eg. Special Offer">
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="MainHeader">Main Heading</label>
                                                    <input type="text" id="MainHeader" name="MainHeading"
                                                        class="form-control" value="{{ $slide2->mainHeading }}"
                                                        placeholder="Enter Main Heading Eg. MINI HELICOPTER DRONE 4 CHANNELS ">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="HighlightText">Highlight Text</label>
                                                    <input type="text" id="HighlightText" name="HighlightText"
                                                        class="form-control" value="{{ $slide2->Highlight_Text }}"
                                                        placeholder="Enter Your Highlighted Text Eg. SALES 40% OFF">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ButtonText">Button Text</label>
                                            <input type="text" id="ButtonText" name="ButtonText" class="form-control"
                                                placeholder="Enter Button Text Eg. Shop Now"
                                                value="{{ $slide2->ButtonText }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="ButtonLink">Enter Button Link</label>
                                            <input type="text" id="ButtonLink" name="ButtonLink"
                                                value="{{ $slide2->ButtonLink }}" class="form-control"
                                                placeholder="Enter Button Text Eg. https://Playware.com/category/iPhones">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Feature 1</h4>
                                    <div class="position-relative">
                                        <button class="btn btn-primary"
                                            style="position: absolute; right: 15px; top: 15px;" data-toggle="modal"
                                            data-target=".FeaturedSlider1">Change
                                            Content</button>
                                        <img class="w-100" src="{{ asset('Content') . '/' . $feature1->image }}"
                                            alt="">
                                        <div
                                            style="width: 30%; position: absolute; left: 2%; top: 50%; transform: translateY(-50%)">
                                            <p class="text-uppercase" style="font-size: 30px; color: black;">
                                                <b>{{ $feature1->Highlight_Text }}</b> {{ $feature1->mainHeading }}
                                            </p>
                                            <p style="font-size: 20px;">{{ $feature1->Price_Text }} <span
                                                    class="text-success"
                                                    style="font-weight: 800;">{{ $feature1->Amount_Percentage }}</span>
                                            </p>
                                            <a href="{{ $feature1->ButtonLink }}"
                                                class="btn btn-primary rounded-4">{{ $feature1->ButtonText }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade FeaturedSlider1" tabindex="-1" role="dialog"
                            aria-labelledby="FeaturedSlider1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="FeaturedSlider1">Edit Featured Section 1 Content
                                        </h5>
                                        <button type="button" class="close waves-effect waves-light"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.updateContent') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $feature1->id }}">
                                            <div class="form-group">
                                                <label>Select Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name='image' class="custom-file-input"
                                                        id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="MainHeader">Main Heading</label>
                                                        <input type="text" id="MainHeader" name="MainHeading"
                                                            class="form-control" value="{{ $feature1->mainHeading }}"
                                                            placeholder="Enter Main Heading Eg. MINI HELICOPTER DRONE 4 CHANNELS ">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="HighlightText">Highlight Text</label>
                                                        <input type="text" id="HighlightText" name="HighlightText"
                                                            class="form-control" value="{{ $feature1->Highlight_Text }}"
                                                            placeholder="Enter Your Highlighted Text Eg. SALES 40% OFF">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="PriceText">Price Text</label>
                                                        <input type="text" id="PriceText" name="PriceText"
                                                            value="{{ $feature1->Price_Text }}" class="form-control"
                                                            placeholder="Eg, Just, Off ">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="Amount">Amount / Percentage</label>
                                                        <input type="text" id="Amount" name="Amount"
                                                            class="form-control"
                                                            value="{{ $feature1->Amount_Percentage }}"
                                                            placeholder="Enter Your Highlighted Text Eg. SALES 40% OFF">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ButtonText">Button Text</label>
                                                <input type="text" id="ButtonText" name="ButtonText"
                                                    class="form-control" placeholder="Enter Button Text Eg. Shop Now"
                                                    value="{{ $feature1->ButtonText }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ButtonLink">Enter Button Link</label>
                                                <input type="text" id="ButtonLink" name="ButtonLink"
                                                    class="form-control" value="{{ $feature1->ButtonLink }}"
                                                    placeholder="Enter Button Text Eg. https://Playware.com/category/iPhones">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Feature 2 </h4>
                                    <div class="position-relative">
                                        <button class="btn btn-primary"
                                            style="position: absolute; right: 15px; top: 15px;" data-toggle="modal"
                                            data-target=".FeaturedSlider2">Change
                                            Content</button>
                                        <img class="w-100" src="{{ asset('Content') . '/' . $feature2->image }}"
                                            alt="">
                                        <div
                                            style="width: 30%; position: absolute; left: 2%; top: 50%; transform: translateY(-50%)">
                                            <p class="text-uppercase" style="font-size: 30px; color: black;">
                                                {{ $feature2->mainHeading }} <b>{{ $feature2->Highlight_Text }}</b></p>
                                            <p style="font-size: 20px;">{{ $feature2->Price_Text }} <span
                                                    class="text-success"
                                                    style="font-weight: 800;">{{ $feature2->Amount_Percentage }}</span>
                                            </p>
                                            <a href="{{ $feature2->ButtonLink }}"
                                                class="btn btn-primary rounded-4">{{ $feature2->ButtonText }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade FeaturedSlider2" tabindex="-1" role="dialog"
                            aria-labelledby="FeaturedSlider1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="FeaturedSlider1">Edit Featured Section 2 Content
                                        </h5>
                                        <button type="button" class="close waves-effect waves-light"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.updateContent') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $feature2->id }}">
                                            <div class="form-group">
                                                <label>Select Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name='image' class="custom-file-input"
                                                        id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="MainHeader">Main Heading</label>
                                                        <input type="text" id="MainHeader" name="MainHeading"
                                                            class="form-control" value="{{ $feature2->mainHeading }}"
                                                            placeholder="Enter Main Heading Eg. MINI HELICOPTER DRONE 4 CHANNELS ">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="HighlightText">Highlight Text</label>
                                                        <input type="text" id="HighlightText" name="HighlightText"
                                                            class="form-control" value="{{ $feature2->Highlight_Text }}"
                                                            placeholder="Enter Your Highlighted Text Eg. SALES 40% OFF">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="PriceText">Price Text</label>
                                                        <input type="text" id="PriceText" name="PriceText"
                                                        value="{{ $feature2->Price_Text }}"
                                                            class="form-control" placeholder="Eg, Just, Off ">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="Amount">Amount / Percentage</label>
                                                        <input type="text" id="Amount" name="Amount"
                                                            class="form-control"
                                                            value="{{ $feature2->Amount_Percentage }}"
                                                            placeholder="Enter Your Highlighted Text Eg. SALES 40% OFF">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ButtonText">Button Text</label>
                                                <input type="text" id="ButtonText" name="ButtonText"
                                                    class="form-control" placeholder="Enter Button Text Eg. Shop Now"
                                                    value="{{ $feature2->ButtonText }}"
                                                    >
                                            </div>
                                            <div class="form-group">
                                                <label for="ButtonLink">Enter Button Link</label>
                                                <input type="text" id="ButtonLink" name="ButtonLink"
                                                    class="form-control"
                                                    value="{{ $feature2->ButtonLink }}"
                                                    placeholder="Enter Button Text Eg. https://Playware.com/category/iPhones">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
