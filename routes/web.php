<?php

use Illuminate\Support\Facades\Route;

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

Route::get('hello', function () {
    return view('welcome');
});

//Web cuối kỳ + Đồ Án 2

    // Đăng nhập ADMIN
    Route::get('admin/login', 'App\Http\Controllers\AdminController@getLoginAdmin');
    Route::post('admin/login', 'App\Http\Controllers\AdminController@postLoginAdmin');
    // Đăng xuất Admin
    Route::get('logout', 'App\Http\Controllers\AdminController@logout');
    // Đăng nhập + Đăng ký USER
    Route::post('eluvspa/dang-nhap', 'App\Http\Controllers\GiaodienController@postLogin');
    Route::get('eluvspa/dang-nhap', 'App\Http\Controllers\GiaodienController@getLogin');

    Route::post('eluvspa/dang-ky', 'App\Http\Controllers\GiaodienController@postRegist');
    Route::get('eluvspa/dang-ky', 'App\Http\Controllers\GiaodienController@getRegist');
    // Đăng xuất User
    Route::get('dang-xuat', 'App\Http\Controllers\GiaodienController@Logout');
    // Đăng xuất Admin
    Route::get('logout', 'App\Http\Controllers\AdminController@logout');

    Route::group(['prefix'=>'admin'], function(){
        //route view
        Route::get('dashboards', 'App\Http\Controllers\AdminController@dashboards');

        Route::get('profile-admin', 'App\Http\Controllers\AdminController@getprofileAdmin');

        Route::get('staffs', 'App\Http\Controllers\AdminController@staffsAdmin');
        Route::get('products', 'App\Http\Controllers\AdminController@productsAdmin');
        Route::get('services', 'App\Http\Controllers\AdminController@servicesAdmin');
        Route::get('prodCate', 'App\Http\Controllers\AdminController@prodCateAdmin');
        Route::get('users', 'App\Http\Controllers\AdminController@usersAdmin');
        Route::get('order-prod', 'App\Http\Controllers\AdminController@orderProd');
        Route::get('booking-ser', 'App\Http\Controllers\AdminController@bookingService');
        Route::get('tips', 'App\Http\Controllers\AdminController@tipsAdmin');
        Route::get('tipCate', 'App\Http\Controllers\AdminController@tipsCateAdmin');
        Route::get('contacts', 'App\Http\Controllers\AdminController@contactAdmin');
        Route::get('calendar', 'App\Http\Controllers\AdminController@calendarAdmin');
        Route::get('charts', 'App\Http\Controllers\AdminController@chartAdmin');
        //route function
        //Thêm + Xóa + Sửa Sản phẩm
        Route::get('add-prod', 'App\Http\Controllers\AdminController@getAddProd');
        Route::post('add-prod', 'App\Http\Controllers\AdminController@postAddProd');
        Route::get('edit-prod/{Prod_ID}', 'App\Http\Controllers\AdminController@getEditProd');
        Route::post('edit-prod/{Prod_ID}', 'App\Http\Controllers\AdminController@postEditProd');
        Route::get('del-prod/{Prod_ID}', 'App\Http\Controllers\AdminController@getDelProd');
        //Thêm + Xóa + Sửa loại Sản phẩm
        Route::get('add-prodCate', 'App\Http\Controllers\AdminController@getAddProdCate');
        Route::post('add-prodCate', 'App\Http\Controllers\AdminController@postAddProdCate');
        Route::get('edit-prodCate/{Category_ID}', 'App\Http\Controllers\AdminController@getEditProdCate');
        Route::post('edit-prodCate/{Category_ID}', 'App\Http\Controllers\AdminController@postEditProdCate');
        Route::get('del-prodCate/{prod_id}', 'App\Http\Controllers\AdminController@getDelProdCate');
        //Thêm + Xóa + Sửa loại Dịch vụ
        Route::get('add-sers', 'App\Http\Controllers\AdminController@getAddService');
        Route::post('add-sers', 'App\Http\Controllers\AdminController@postAddService');
        Route::get('edit-sers/{Service_ID}', 'App\Http\Controllers\AdminController@getEditService');
        Route::post('edit-sers/{Service_ID}', 'App\Http\Controllers\AdminController@postEditService');
        Route::get('del-sers/{Service_ID}', 'App\Http\Controllers\AdminController@getDelService');
        //Thêm + xóa + sửa Nhân viên
        Route::get('add-staff', 'App\Http\Controllers\AdminController@getAddStaff');
        Route::post('add-staff', 'App\Http\Controllers\AdminController@postAddStaff');
        Route::get('edit-staff/{Staff_ID}', 'App\Http\Controllers\AdminController@getEditStaff');
        Route::post('edit-staff/{Staff_ID}', 'App\Http\Controllers\AdminController@postEditStaff');
        Route::get('del-staff/{Staff_ID}', 'App\Http\Controllers\AdminController@getDelStaff');
        // Xóa + sửa Khách hàng
        Route::get('edit-user/{User_ID}', 'App\Http\Controllers\AdminController@getEditUser');
        Route::post('edit-user/{User_ID}', 'App\Http\Controllers\AdminController@postEditUser');
        Route::get('del-user/{User_ID}', 'App\Http\Controllers\AdminController@getDelUser');
        // Thêm xóa sửa tin tức 
        Route::get('add-tip', 'App\Http\Controllers\AdminController@getAddTip');
        Route::post('add-tip', 'App\Http\Controllers\AdminController@postAddTip');
        Route::get('edit-tip/{Tip_ID}', 'App\Http\Controllers\AdminController@getEditTip');
        Route::post('edit-tip/{Tip_ID}', 'App\Http\Controllers\AdminController@postEditTip');
        Route::get('del-tip/{Tip_ID}', 'App\Http\Controllers\AdminController@getDelTip');
        // Thêm xóa sửa loại tin tức
        Route::get('add-tipCate', 'App\Http\Controllers\AdminController@getAddTipCate');
        Route::post('add-tipCate', 'App\Http\Controllers\AdminController@postAddTipCate');
        Route::get('edit-tipCate/{TipCate_ID}', 'App\Http\Controllers\AdminController@getEditTipCate');
        Route::post('edit-tipCate/{TipCate_ID}', 'App\Http\Controllers\AdminController@postEditTipCate');
        Route::get('del-tipCate/{TipCate_ID}', 'App\Http\Controllers\AdminController@getDelTipCate');
        // Xóa Phản hồi
        Route::get('del-contact/{Contact_ID}', 'App\Http\Controllers\AdminController@DelContact');
        // Xóa danh sách order Prod
        Route::get('del-orderProd/{Order_ID}', 'App\Http\Controllers\AdminController@DelOrderProd');
    });

    Route::group(['prefix'=>'eluvspa'], function(){
        Route::get('/', 'App\Http\Controllers\GiaodienController@index');
        Route::get('dich-vu', 'App\Http\Controllers\GiaodienController@service');
        // Chi tiết dịch vụ
        Route::get('dich-vu/{Slug_service}', 'App\Http\Controllers\GiaodienController@serviceDetail');
        Route::get('tips', 'App\Http\Controllers\GiaodienController@tips');
        // Chi tiết dịch vụ
        Route::get('tips/{Slug_tips}', 'App\Http\Controllers\GiaodienController@tipDetail');
        Route::get('lien-he', 'App\Http\Controllers\GiaodienController@contact');
        Route::post('lien-he', 'App\Http\Controllers\GiaodienController@postcontact');
        //Cart
        Route::post('save-cart', 'App\Http\Controllers\GiaodienController@saveCart');
        Route::get('gio-hang', 'App\Http\Controllers\GiaodienController@cart');
        Route::get('delete-to-cart/{rowId}', 'App\Http\Controllers\GiaodienController@delCart');
        Route::post('update-cart', 'App\Http\Controllers\GiaodienController@updateCart');
        // Hồ sơ người dùng
        Route::get('ho-so', 'App\Http\Controllers\GiaodienController@profileUser');
        Route::get('ho-so/chinh-sua/{User_ID}', 'App\Http\Controllers\GiaodienController@getEditUser');
        Route::post('ho-so/chinh-sua/{User_ID}', 'App\Http\Controllers\GiaodienController@postEditUser');
        Route::get('lich-su', 'App\Http\Controllers\GiaodienController@history');
    });
    //route sản phẩm
    Route::group(['prefix'=>'san-pham'], function(){
        Route::get('/', 'App\Http\Controllers\GiaodienController@product');
        Route::get('kem-duong-da', 'App\Http\Controllers\GiaodienController@kemduongda');
        Route::get('kem-chong-nang', 'App\Http\Controllers\GiaodienController@kemchongnang');
        Route::get('serum-tri-mun', 'App\Http\Controllers\GiaodienController@serumtrimun');
        Route::get('sua-rua-mat', 'App\Http\Controllers\GiaodienController@suaruamat');
        Route::get('nuoc-hoa', 'App\Http\Controllers\GiaodienController@nuochoa');
        // Slug Sản phẩm
        Route::get('/{Slug_prod}', 'App\Http\Controllers\GiaodienController@prodDetail');
        //Route Tìm kiếm
        Route::post('tim-kiem', 'App\Http\Controllers\GiaodienController@search');
    });
    //Route booking
    Route::post('booking', 'App\Http\Controllers\GiaodienController@booking');
    // Check Out
    Route::get('thanh-toan', 'App\Http\Controllers\GiaodienController@CheckOut');
    Route::post('save-checkout', 'App\Http\Controllers\GiaodienController@saveCheckOut');

    