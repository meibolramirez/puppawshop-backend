<?php

use App\Livewire\AdminDashboard;
use App\Livewire\ManageProduct;
use App\Livewire\ManageOrders;
use App\Livewire\ManageCategories;
use App\Livewire\AddProductForm;
use App\Livewire\AddCategory;
use App\Livewire\EditProduct;
use App\Livewire\EditCategory;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProductDetails;
use App\Livewire\AllProducts;
use App\Livewire\ShoppingCartComponent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/{product_id}/details',ProductDetails::class);

Route::get('/all/products',AllProducts::class);

Route::get('/shopping-cart',ShoppingCartComponent::class)->name('shopping-cart');

Route::group(['middleware' => 'admin'], function(){
    
    Route::get('/admin/dashboard', AdminDashboard::class);

    Route::get('/products', ManageProduct::class)->name('products');

    Route::get('/orders', ManageOrders::class)->name('orders');

    Route::get('/add/product', AddProductForm::class);

    Route::get('/manage/categories', ManageCategories::class)->name('categories');

    Route::get('/add/category', AddCategory::class);

    Route::get('/edit/{id}/product', EditProduct::class);

    Route::get('/edit/{id}/category', EditCategory::class);

});