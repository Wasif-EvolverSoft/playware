<?php

use Illuminate\Support\Facades\Route;

// ----------------------
// Import All Controllers
// ----------------------
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\Terms_ConditionController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\IndexPageController;

use App\Http\Controllers\Sellers\Shop\ShopController;
use App\Http\Controllers\Sellers\Package\PackageController;
use App\Http\Controllers\Sellers\Products\ProductsController;
use App\Http\Controllers\Sellers\Profile\ProfileDetailsController;
// Seller Dash
use App\Http\Controllers\Sellers\Dashboard\DashboardController as SellerDashboardController;

// Admin Controllers
use App\Http\Controllers\Admin\Pages\HomePageController;
use App\Http\Controllers\Admin\Products\BrandController;
use App\Http\Controllers\Admin\Products\CategoriesController;
use App\Http\Controllers\Admin\Products\RejectProductsController;
use App\Http\Controllers\Admin\Products\ApprovedProductsController;
use App\Http\Controllers\Admin\Products\ProductApprovalRequiredController;
use App\Http\Controllers\Admin\Reports\ReportsController;
use App\Http\Controllers\Admin\Sellers\SellersController;
use App\Http\Controllers\Admin\Support\SupportTicketController;
use App\Http\Controllers\Admin\Dashboard\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\Orders\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// --------------------------------------------------
// Public / Front-End Routes (Everyone can access)
// --------------------------------------------------
Route::get('/', [IndexPageController::class, 'getIndexPage'])->name('indexPage');

// Example public routes
Route::get('shop', [IndexPageController::class, 'getShopPage'])->name('shop');
Route::get('product/{id}', [IndexPageController::class, 'getShopSinglePage'])->name('shop-single');
Route::get('faqs', [IndexPageController::class, 'getFaqsPage'])->name('faqs');
Route::get('contact', [IndexPageController::class, 'getContactPage'])->name('contact');
Route::get('success', [IndexPageController::class, 'getSuccessPage'])->name('success');
Route::get('seller-portfolio', [IndexPageController::class, 'getSellerPortfolioPage'])->name('seller-porfolio');
Route::get('register-user', [IndexPageController::class, 'getRegisterPage'])->name('register-user');
Route::get('404', [IndexPageController::class, 'get404Page'])->name('404');
Route::get('terms-conditions', [IndexPageController::class, 'getTermsConditionsPage'])->name('terms-conditions');
Route::get('about', [IndexPageController::class, 'getAboutPage'])->name('about');

// --------------------------------------------------
// Support Ticket Routes
// --------------------------------------------------
Route::get('support', [SupportController::class, 'getSupportPage'])->name('user.support');
Route::post('support', [SupportController::class, 'postSupport'])->name('user.support.post');

// --------------------------------------------------
// Cart / Checkout / Orders / User Routes
// --------------------------------------------------
Route::get('cart', [CartController::class, 'getCartPage'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('update-quantity', [CartController::class, 'updateCartQuantity'])->name('Update.Cart.Quantity');

// Checkout
Route::get('checkout', [CartController::class, 'getCheckoutPage'])->name('checkout');
Route::post('checkout', [OrderController::class, 'createOrder'])->name('createOrder');

// User Account
Route::get('my-account', [UserAuthController::class, 'getAccountPage'])->name('myAccount');
Route::post('my-account', [UserAuthController::class, 'userUpdateData'])->name('userUpdateData');

// User Registration / Login (front-end user, not seller)
Route::get('sign-up', [UserAuthController::class, 'signUp'])->name('signUp');
Route::post('sign-up', [UserAuthController::class, 'signUpUser'])->name('user.signup');
Route::get('login-user', [UserAuthController::class, 'getLoginPage'])->name('login-user');
Route::post('login-user', [UserAuthController::class, 'loginUser'])->name('auth.login-user');
Route::get('logout', [UserAuthController::class, 'logoutUser'])->name('logoutUser');

// Payment details
Route::get('payment_details/create', [PaymentDetailsController::class, 'create'])->name('payment_details.create');
Route::post('payment_details/store', [PaymentDetailsController::class, 'store'])->name('payment_details.store');

// Product Review & Replies
Route::post('/product/{id}/review', [ReviewsController::class, 'storeReview'])->name('review.store');
Route::post('/review/{id}/reply', [ReviewsController::class, 'storeReply'])->name('review.reply');

// --------------------------------------------------
// Auth Pages for Seller & Admin (only visible if NOT already logged in)
// --------------------------------------------------
Route::middleware('isLogin')->group(function () {
    // Admin login
    Route::get('admin/login', [AdminDashboardController::class, 'getLoginPage'])->name('admin.Login');

    // Seller register & login
    Route::get('seller/register', [AuthController::class, 'getRegisterPage'])->name('register');
    Route::get('seller/login', [AuthController::class, 'getLoginPage'])->name('seller.login');
    Route::get('seller/forgot-password', [AuthController::class, 'getForgotPasswordPage'])->name('seller.forgotPassword');
    Route::get('seller/reset-password/{token}', [AuthController::class, 'getResetPasswordPage'])->name('seller.resetPassword');
});


// --------------------------------------------------
// API Routes (v1) - Typically for AJAX or external calls
// --------------------------------------------------
Route::prefix('api/v1')->group(function () {

    // Auth-related routes
    Route::post('/register', [AuthController::class, 'registerSeller'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logoutSeller'])->name('auth.logout');
    Route::post('/seller/login', [AuthController::class, 'sellerLogin'])->name('login.seller');
    Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('login.admin');

    // Seller password reset
    Route::post('/seller/forgotPassword', [AuthController::class, 'forgotPasswordPost'])->name('forgotPasswordPost.seller');
    Route::post('/seller/reset-password', [AuthController::class, 'resetPasswordPost'])->name('resetPasswordPost.seller');

    // Example order payment endpoint
    Route::prefix('account')->controller(OrderController::class)->group(function () {
        Route::post('paid', 'postPaid')->name('account.paidPost');
    });

    // -----------------------
    // Seller-only API
    // -----------------------
    Route::middleware('seller')->prefix('seller')->group(function () {
        Route::post('verfiication', [AuthController::class, 'verifySeller'])->name('auth.verifySeller');
        Route::post('upload-product', [ProductsController::class, 'uploadProduct'])->name('auth.uploadProduct');
        Route::post('upload-package', [PackageController::class, 'uploadPackage'])->name('auth.uploadPackage');

        // Upload routes
        Route::prefix('upload')->group(function () {
            Route::prefix('product')->controller(ProductsController::class)->group(function () {
                Route::post('new', 'UploadNewProducts')->name('auth.UploadNewProduct');
                Route::post('used', 'UploadUsedProducts')->name('auth.UploadUsedProduct');
                Route::post('complete-pc', 'uploadCompletePc')->name('auth.UploadCompletePc');
                Route::post('laptop', 'uploadLaptop')->name('auth.UploadLaptop');
            });
        });

        // Ajax route example
        Route::prefix('ajax')->group(function () {
            Route::post('/get-brands-by-category', [ProductsController::class, 'getBrandsByCategory'])
                 ->name('seller.getBrandsByCategory');
        });
    });

    // -----------------------
    // Admin-only API
    // -----------------------
    Route::middleware('admin')->prefix('admin')->group(function () {

        // Seller approval / rejection
        Route::prefix('user')->group(function () {
            Route::post('/approve-seller/{sellerId}', [SellersController::class, 'ApproveSeller'])->name('auth.approveSeller');
            Route::post('/reject-seller/{sellerId}', [SellersController::class, 'rejectSeller'])->name('auth.rejectSeller');
        });

        // Content updates
        Route::prefix('content')->group(function () {
            Route::post('/update-homepage-content', [HomePageController::class, 'UpdateContent'])->name('admin.updateContent');
            Route::post('/update-terms-and-conditions', [HomePageController::class, 'UpdateTermsAndConditions'])->name('admin.updateTermsAndConditions');
            Route::post('/update-privacy-policy', [HomePageController::class, 'UpdatePrivacyPolicy'])->name('admin.updatePrivacyPolicy');
            Route::post('/update-refund-policy', [HomePageController::class, 'UpdateRefundPolicy'])->name('admin.UpdateRefundPolicy');
        });

        // Admin product approval / rejection
        Route::prefix('product')->group(function () {
            Route::post('/approve-product/{productId}', [ApprovedProductsController::class, 'ApproveProduct'])->name('admin.approveProducts');
            Route::post('/reject-product/{productId}', [ApprovedProductsController::class, 'RejectProduct'])->name('admin.rejectProduct');

            // Packages
            Route::prefix('packages')->group(function () {
                Route::post('/approve-packages/{packageId}', [ApprovedProductsController::class, 'ApprovedPackage'])->name('admin.approvePackages');
                Route::post('/reject-packages/{packageId}', [ApprovedProductsController::class, 'RejectPackage'])->name('admin.rejectPackages');
            });

            // Category
            Route::prefix('category')->group(function () {
                Route::post('/create-category', [CategoriesController::class, 'createCategory'])->name('admin.createCategory');
                Route::delete('/delete-category/{id}', [CategoriesController::class, 'deleteCategory'])->name('admin.deleteCategory');
                Route::post('/add-brand', [CategoriesController::class, 'addBrand'])->name('admin.addBrand');
                Route::delete('/delete-brand/{categoryId}/{brandId}', [CategoriesController::class, 'deleteBrand'])->name('admin.deletBrand');
                Route::post('/update-brand', [CategoriesController::class, 'updateBrand'])->name('admin.updateBrand');
                Route::post('/update-category', [CategoriesController::class, 'updateCategory'])->name('admin.updateCategory');
            });

            // Brands
            Route::prefix('brands')->group(function () {
                Route::post('/create-brand', [BrandController::class, 'createBrand'])->name('admin.createbrand');
                Route::delete('/delete-brand/{id}', [BrandController::class, 'deleteBrands'])->name('admin.deleteBrand');
            });
        });
    });
});


// --------------------------------------------------
// Seller Web Routes (Only sellers can access)
// --------------------------------------------------
Route::middleware('seller')->prefix('seller')->group(function () {

    // If seller goes to /seller directly, show Seller Dashboard
    Route::get('/', [SellerDashboardController::class, 'getDashboardPage'])
         ->name('seller.dashboard');

    // Verification form
    Route::get('/verification-form', [AuthController::class, 'verificationForm'])
         ->name('auth.verificationForm');

    // Products
    Route::prefix('products')->group(function () {

        // /seller/products/type/...
        Route::controller(ProductsController::class)->prefix('type')->group(function () {
            Route::get('/', 'getTypes')->name('seller.ProductTypes');
            Route::get('new-product', 'getNewProduct')->name('seller.NewProduct');
            Route::get('used-product', 'getUsedProduct')->name('seller.UsedProduct');
            Route::get('complete-pc', 'getCompletePc')->name('seller.CompletedPC');
            Route::get('laptop', 'getLaptop')->name('seller.Laptop');
        });

        Route::get('/all-products', [ProductsController::class, 'getAllProducts'])->name('seller.allProducts');
        Route::get('/add-new-product', [ProductsController::class, 'addNewProduct'])->name('seller.addNewProduct');
        Route::get('/edit-product/{id}/{title}', [ProductsController::class, 'editUsedProduct'])->name('seller.editProducts');
    });

    // Packages
    Route::prefix('packages')->group(function () {
        Route::get('/all-packages', [PackageController::class, 'getAllPackages'])->name('seller.allPackages');
        Route::get('/add-new-package', [PackageController::class, 'getNewPackage'])->name('seller.getNewPackage');
    });

    // Accounts
    Route::prefix('accounts')->group(function () {
        Route::get('/details', [ProfileDetailsController::class, 'getProfileDetailsPage'])->name('seller.details');
    });
});


// --------------------------------------------------
// Admin Web Routes (Only admins can access)
// --------------------------------------------------
Route::middleware('admin')->prefix('admin')->group(function () {

    // If admin goes to /admin directly, show Admin Dashboard
    Route::get('/', [AdminDashboardController::class, 'getAdminDashboard'])
         ->name('admin.dashboard');

    // Example Admin Contact routes
    Route::get('/Admin-contact', [ContactsController::class, 'index'])->name('contacts.index');
    Route::get('/Admin-contact-create', [ContactsController::class, 'create'])->name('contacts.create');

    // Terms & Conditions (Admin side)
    Route::get('/terms-conditions', [Terms_ConditionController::class, 'index'])->name('terms_conditions.index');
    Route::get('/terms-conditions/create', [Terms_ConditionController::class, 'create'])->name('terms_conditions.create');
    Route::post('/terms-conditions', [Terms_ConditionController::class, 'store'])->name('terms_conditions.store');

    // About
    Route::get('/about', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/about-create', [AboutController::class, 'create'])->name('abouts.create');

    // Dashboard
    // (already above as the index route, but if you need an additional one)
    Route::get('/dashboard', [AdminDashboardController::class, 'getAdminDashboard'])->name('admin.dashboardPage');

    // Admin: Products
    Route::prefix('products')->group(function () {
        Route::get('/approved-products', [ApprovedProductsController::class, 'getApprovedProducts'])->name('admin.approvedProducts');
        Route::get('/rejected-products', [RejectProductsController::class, 'getRejectedProducts'])->name('admin.RejectProducts');
        Route::get('/approval-required', [ProductApprovalRequiredController::class, 'getApprovalRequiredProducts'])->name('admin.ApprovalRequiredProducts');

        // Packages
        Route::prefix('packages')->group(function () {
            Route::get('/approval-required', [ApprovedProductsController::class, 'getApprovedPackaged'])->name('admin.ApprovedPackages');
            Route::get('/rejected-packages', [ApprovedProductsController::class, 'getRejectedPackaged'])->name('admin.RejectedPackages');
            Route::get('/approved-packages', [ApprovedProductsController::class, 'getApprovedPackagesPage'])->name('admin.ApprovedPackage');
        });

        // Categories & Brands
        Route::get('/categoires', [CategoriesController::class, 'getCategoriesPage'])->name('admin.getCategoriesPage');
        Route::get('/categoires/{id}', [CategoriesController::class, 'editCategoriesPage'])->name('admin.editCategoriesPage');
        Route::get('/brands', [BrandController::class, 'getBrandsPage'])->name('admin.getBrandsPage');
        Route::get('/brands/{id}', [BrandController::class, 'editBrandsPage'])->name('admin.editBrandsPage');
    });

    // Admin: Sellers
    Route::prefix('sellers')->group(function () {
        Route::get('/all-sellers', [SellersController::class, 'getAllSellers'])->name('admin.allSellers');
        Route::get('/get-order-details', [OrderController::class, 'getOrderDetails']);
        Route::get('/get-vendor-orders', [AdminOrderController::class, 'getVendorOrders']);
        Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');
        Route::get('/seller/orders', [OrderController::class, 'sellerOrders'])->name('seller.orders');
        Route::get('/seller/orders/{order}', [OrderController::class, 'viewOrder'])->name('seller.orders.details');
        Route::post('/order/{order}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

        Route::get('/verified-sellers', [SellersController::class, 'getVerifiedSellers'])->name('admin.verifiedSellers');
        Route::get('/un-verified-sellers', [SellersController::class, 'getUnVerifiedSellers'])->name('admin.UnVerfiedSellers');
        Route::get('/shop-sellers-sellers', [SellersController::class, 'getShopSellers'])->name('admin.shopSellers');
        Route::get('/corporate-sellers', [SellersController::class, 'getCorporateSellers'])->name('admin.corporateSellers');

        // Reviews
        Route::get('/pending-reviews', [ReviewsController::class, 'showPendingReviews'])->name('admin.pendingReviews');
        Route::post('/review/{reviewId}/approve', [ReviewsController::class, 'approveReview'])->name('admin.review.approve');
        Route::post('/review/{reviewId}/decline', [ReviewsController::class, 'declineReview'])->name('admin.review.decline');
        Route::post('/reply/{replyId}/approve', [ReviewsController::class, 'approveReply'])->name('admin.reply.approve');
        Route::post('/reply/{replyId}/decline', [ReviewsController::class, 'declineReply'])->name('admin.reply.decline');

        Route::get('/details/{sellerId}', [SellersController::class, 'getSellersDetails'])->name('admin.sellers.details');
    });

    // Admin: Pages
    Route::prefix('pages')->group(function () {
        Route::get('/home', [HomePageController::class, 'getHomePageEditor'])->name('admin.HomePageEdit');
        Route::get('/terms-and-coniditions', [HomePageController::class, 'getTermsAndConditionsEditor'])->name('admin.TermsAndConditionsEditor');
        Route::get('/privacy-policy', [HomePageController::class, 'getPrivacyPolicy'])->name('admin.privacyPolicy');
        Route::get('/refund-policy', [HomePageController::class, 'getRefundPolicy'])->name('admin.RefundPolicy');

        Route::get('/support-ticket', [SupportTicketController::class, 'getSupportTicketPage'])->name('admin.supportTicket');
        Route::get('/reports', [ReportsController::class, 'getReportsPage'])->name('admin.reports');
    });

    // Admin: Orders
    Route::prefix('order')->controller(AdminOrderController::class)->group(function() {
        Route::get('all', 'getAllOrders')->name('Admin.Orders');
    });
});


// --------------------------------------------------
// Example Additional Admin Route for Support Ticket
// --------------------------------------------------
Route::get('ticket-detail', function () {
    return view('admin.pages.Support-Report.report');
})->name('admin.ticket.detail');
