<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'panel', 'namespace' => 'admin'], function() {	
	Route::get('login','LoginController@getLogin')->name('getLogin');
	Route::post('login','LoginController@postLogin')->name('postLogin');
	Route::get('logout','LoginController@getLogout')->name('getLogout');
});

Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'panel'], function() {
	Route::get('/', function() {return view('admin.home');})->name('welcome');
});

Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'panel/user', 'namespace' => 'admin'], function() {
	Route::get('/', 'adminUserController@index')->name('user.index');
	Route::get('index','UserController@index')->name('user.index');
	Route::get('add','UserController@get_add')->name('user.get_add');
	Route::post('add','UserController@post_add')->name('user.post_add');
	Route::get('edit/{id}','UserController@get_edit')->name('user.get_edit');
	Route::post('edit/{id}','UserController@post_edit')->name('user.post_edit');
	Route::get('delete/{id}','UserController@delete')->name('user.delete');
	Route::get('lockUser/{id}','UserController@lockUser')->name('user.lockUser');
	Route::get('unlockUser/{id}','UserController@unlockUser')->name('user.unlockUser');
	Route::get('hidden_user','UserController@hidden_user')->name('user.hidden_user');	
});

Route::group(['middleware' => 'CheckAdminLogin','prefix' => 'panel','namespace' => 'admin'], function() {
	//Route::resource('product',ProductController::class);
	Route::resource('category',CategoryController::class);
	Route::resource('laptop',LaptopController::class);
	Route::resource('pc',PCController::class);
	Route::resource('monitor',MonitorController::class);
	Route::get('destroy/{id}','LaptopController@destroy')->name('laptop.destroy');
	// Route::get('destroy/{id}','PCController@destroy')->name('pc.destroy');	
	// Route::get('destroy/{id}','MonitorController@destroy')->name('monitor.destroy');
	Route::get('theother','PaymentController@theother');
	Route::get('detailscarts/{id}','PaymentController@detailscarts');
	Route::get('theotherisshipping','PaymentController@theotherisshipping');
	Route::get('confirm/{id}','PaymentController@confirm');
	Route::get('confirms/{id}','PaymentController@confirms');
	Route::get('successfulother','PaymentController@successfulother');
	Route::get('theotherwascanceled','PaymentController@theotherwascanceled');	


	Route::get('hidden_laptop','LaptopController@hidden_laptop')->name('laptop.hidden_laptop');	
	Route::get('hidden_pc','PCController@hidden_pc')->name('pc.hidden_pc');	
	Route::get('hidden_monitor','MonitorController@hidden_monitor')->name('monitor.hidden_monitor');	

	Route::get('lockLaptop/{id}','LaptopController@lockLaptop')->name('laptop.lockLaptop');
	Route::get('lockPC/{id}','PCController@lockPC')->name('pc.lockLaptop');
	Route::get('lockMonitor/{id}','MonitorController@lockMonitor')->name('monitor.lockLaptop');

	Route::get('unlockLaptop/{id}','LaptopController@unlockLaptop')->name('laptop.unlockLaptop');
	Route::get('unlockPC/{id}','PCController@unlockPC')->name('pc.unlockPC');
	Route::get('unlockMonitor/{id}','MonitorController@unlockMonitor')->name('monitor.unlockMonitor');

	Route::post('add','UserController@postadd')->name('user.postadd');	
	Route::get('category/productlist/{id}', 'CategoryController@productlist')->name('category.productlist');
	Route::resource('categoryNews',CategoryNews::class);
});
	Route::group(['prefix' => '/', 'namespace' => 'FrontEnd'], function() {
	Route::get('/', 'LoadViewController@index');	
	Route::get('shop', 'LoadViewController@shop');
	Route::get('laptop', 'LoadViewController@laptop');
	Route::get('monitor', 'LoadViewController@monitor');
	Route::get('pc', 'LoadViewController@pc');
	Route::get('cart', 'LoadViewController@cart');
	Route::get('user/{id}','AccountController@get_user')->name('user.get_user');
	Route::get('user/edituser/{id}','AccountController@get_edit')->name('user.get_edit');
	Route::post('user/edituser/{id}','AccountController@post_edit')->name('user.post_edit');

	Route::get('other', 'LoadViewController@other');
	Route::get('detailscart/{id}', 'LoadViewController@cart_details');
	Route::get('otherdestroy/{id}', 'PaymentController@destroy');
	Route::get('userlogin', 'AccountController@login');
	Route::post('userlogin','AccountController@UserLogin')->name('UserLogin');
	Route::get('register', 'AccountController@register');
	Route::post('register','AccountController@Add_User')->name('Add_User');
	Route::get('userlogout','AccountController@getUserLogout')->name('getUserLogout');
	Route::get('laptopgaming', 'LoadViewController@LaptopGaming');
	Route::get('laptopdoanhnhan', 'LoadViewController@LaptopDoanhNhan');
	Route::get('laptopvanphong', 'LoadViewController@LaptopVanPhong');
	Route::get('pctamtrung', 'LoadViewController@PCTamTrung');
	Route::get('pccaocap', 'LoadViewController@PCCaoCap');
	Route::get('pcgaming', 'LoadViewController@PCGaming');
	Route::get('manhinhasus', 'LoadViewController@MonitorAsus');
	Route::get('manhinhdell', 'LoadViewController@MonitorDell');
	Route::get('manhinhsamsung', 'LoadViewController@MonitorSamsung');
	Route::get('manhinhmsi', 'LoadViewController@MonitorMSI');
	Route::get('/{id}','LoadViewController@product_details');

	Route::post('addPayment', 'PaymentController@store');
	Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
	Route::patch('update-cart', 'ProductsController@update');
	Route::delete('remove-from-cart', 'ProductsController@remove');
	});

	

/*
GET	    /product	        		index	product.index
GET	    /product/create	    		create	product.create
POST	/product					store	product.store
GET		/product/{product}			show	product.show
GET		/product/{product}/edit		edit	product.edit
PUT/PATCH	/product/{product}		update	product.update
DELETE	/ product/{product}			destroy	product.destroy
*/