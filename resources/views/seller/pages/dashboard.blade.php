@extends('seller.Layout.layout')
@section('main-content')

<div class="page-content">
    <div class="container-fluid">

        @if ($isVerified)
        <!-- Page Title Section -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Select Product Type</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active">Type</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner with Logo and Welcome Text -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="banner-container position-relative">
                    <!-- Banner Image -->
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/029/208/514/small_2x/red-text-box-abstract-islamic-shape-banner-free-png.png"
                        alt="Banner" class="img-fluid rounded shadow-lg" 
                        style="width: 100%; max-height: 300px; object-fit: cover;">
                    <!-- Overlay with Logo and Welcome Message -->
                    <div class="banner-overlay d-flex flex-column align-items-center justify-content-center">
                        <img src="https://thumbs.dreamstime.com/z/verified-stamp-sign-logo-isolated-white-background-vector-design-86012075.jpg"
                            alt="Verified Logo" class="img-fluid rounded-circle mb-3"
                            style="max-height: 100px; border: 4px solid #4caf50;">
                        <h2 class="text-white font-weight-bold">Welcome, Verified Seller!</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Type Cards -->
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <a href="{{ route('seller.NewProduct') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/order.png') }}" class="w-25 mb-3" alt="">
                        <h4>New Product</h4>
                    </a>
                    <a href="{{ route('seller.UsedProduct') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/box.png') }}" class="w-25 mb-3" alt="">
                        <h4>Used Product</h4>
                    </a>
                    <a href="{{ route('seller.CompletedPC') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/computer.png') }}" class="w-25 mb-3" alt="">
                        <h4>Complete PC</h4>
                    </a>
                    <a href="{{ route('seller.Laptop') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/laptop.png') }}" class="w-25 mb-3" alt="">
                        <h4>Laptop</h4>
                    </a>
                </div>
            </div>
        </div>
        @else
        <style>
            .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.3s ease;
}

.popup-overlay.active {
    visibility: visible;
    opacity: 1;
}

.popup-content {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 400px;
    width: 100%;
    animation: popup-show 0.1s ease;
}

@keyframes popup-show {
    from { transform: translateY(-50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

h2 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333;
}

p {
    font-size: 16px;
    margin-bottom: 25px;
    color: #666;
}

.buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.verify-btn {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.verify-btn:hover {
    background-color: #45a049;
}

.cancel-btn {
    background-color: #f44336;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.verify-btn:hover{
    color: white
}
.cancel-btn:hover {
    background-color: #e53935;
}
        </style>
  <div id="popup-modal" class="popup-overlay">
    <div class="popup-content">
        <h2>You are Unverified</h2>
        <p>Please verify your account to enjoy additional facilities.</p>
        <div class="buttons">
            <a style="color: text-decoration:none !important" href="{{ route('auth.verificationForm') }}" class="verify-btn">Go to Verification Page</a>
            <button class="cancel-btn" onclick="closePopup()">Cancel</button>
        </div>
    </div>
</div>  
<script>
    window.onload = function() {
// Show the popup after 1 second
setTimeout(() => {
document.getElementById('popup-modal').classList.add('active');
}, 1000);
};


function closePopup() {
document.getElementById('popup-modal').classList.remove('active');
}

</script>
        <div class="alert alert-warning text-center">
            Your account is not verified. Please complete your profile to get verified.
        </div>
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <a href="{{ route('seller.NewProduct') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/order.png') }}" class="w-25 mb-3" alt="">
                        <h4>New Product</h4>
                    </a>
                    <a href="{{ route('seller.UsedProduct') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/box.png') }}" class="w-25 mb-3" alt="">
                        <h4>Used Product</h4>
                    </a>
                    <a href="{{ route('seller.CompletedPC') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/computer.png') }}" class="w-25 mb-3" alt="">
                        <h4>Complete PC</h4>
                    </a>
                    <a href="{{ route('seller.Laptop') }}" class="col-3 d-flex flex-column align-items-center justify-content-center product-type-card">
                        <img src="{{ asset('assets/images/laptop.png') }}" class="w-25 mb-3" alt="">
                        <h4>Laptop</h4>
                    </a>
                </div>
            </div>
        </div>
        @endif
     
        
        
        <!-- Product Cards -->
        <div id="shopProducts" class="row">
            @foreach ($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="product-card border rounded-lg shadow-lg p-4">
                    <a href="{{ route('shop-single', $product->id) }}" class="block text-center">
                        <img src="{{ asset('user_folders/Product_Images/' . $product->mainImage) }}"
                            alt="Product Image" class="img-fluid rounded mb-3" style="height: 200px; object-fit: cover;">
                    </a>
                    <h5 class="font-bold text-gray-800">{{ $product->productTitle }}</h5>
                    <p class="text-gray-600">Price: <span class="text-green-600 font-bold">Rs.{{ $product->SellPrice }}</span></p>
                    <p class="{{ $isVerified ? 'text-green-500' : 'text-red-500' }} font-medium">
                        {{ $isVerified ? 'Verified Seller' : 'Unverified Seller' }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

<!-- Additional Styling -->
<style>
    /* Styling for the banner and logo */
    .banner-container {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
    }

    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    .product-type-card {
        border: 2px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .product-type-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Grid for Products */
    @media (max-width: 1200px) {
        .col-xl-3 {
            flex: 0 0 33.333%;
        }
    }

    @media (max-width: 992px) {
        .col-lg-4 {
            flex: 0 0 50%;
        }
    }

    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
        }
    }
</style>
