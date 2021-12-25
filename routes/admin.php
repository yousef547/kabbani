<?php

use App\Http\Controllers\admin\discountController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

define('PAGINATION_COUNT',10);
Route::group(['namespace'=>'admin', 'middleware' => 'auth:admin'] ,(function () {
    Route::get('/dashboard', 'DashBoardController@index')->name('admin.dashboard');
    Route::get('/dashboard/changeStatus/{id}','DashBoardController@changeStatus')->name('admin.dashboard.changeStatus');

    
    //////////////////////// Begin Main Categories Routes ////////////////////////
    Route::group(['prefix'=>'mainCategories' , 'middleware'=>'can:mainCategories'], (function(){
        Route::get('/','MainCategoryController@index')->name('admin.mainCategories');

        Route::get('/create','MainCategoryController@create')->name('admin.mainCategories.create');
        Route::post('/store','MainCategoryController@store')->name('admin.mainCategories.store');
        
        Route::get('/edit/{id}','MainCategoryController@edit')->name('admin.mainCategory.edit');
        Route::post('/update/{id}','MainCategoryController@update')->name('admin.mainCategory.update');

        Route::get('/delete/{id}','MainCategoryController@destroy')->name('admin.mainCategory.delete');

    }));
    //////////////////////// End Main Categories Routes /////////////////////////
    
    //////////////////////// Begin Splash Screen Routes ////////////////////////
     Route::group(['prefix'=>'splashScreen' , 'middleware'=>'can:mainCategories'], (function(){
        Route::get('/','SplashScreenController@index')->name('admin.splashScreen');

        Route::get('/create','SplashScreenController@create')->name('admin.splashScreen.create');
        Route::post('/store','SplashScreenController@store')->name('admin.splashScreen.store');
        
        Route::get('/edit/{id}','SplashScreenController@edit')->name('admin.splashScreen.edit');
        Route::post('/update/{id}','SplashScreenController@update')->name('admin.splashScreen.update');

        Route::get('/delete/{id}','SplashScreenController@destroy')->name('admin.splashScreen.delete');

    }));
    //////////////////////// End Splash Screen Routes /////////////////////////
    
    //////////////////////// Begin Pop Up Routes ////////////////////////
     Route::group(['prefix'=>'popUp' , 'middleware'=>'can:mainCategories'], (function(){
        Route::get('/','PopUpController@index')->name('admin.PopUp');

        Route::get('/create','PopUpController@create')->name('admin.PopUp.create');
        Route::post('/store','PopUpController@store')->name('admin.PopUp.store');
        
        Route::get('/edit/{id}','PopUpController@edit')->name('admin.PopUp.edit');
        Route::post('/update/{id}','PopUpController@update')->name('admin.PopUp.update');

        Route::get('/delete/{id}','PopUpController@destroy')->name('admin.PopUp.delete');

    }));
    //////////////////////// End Pop Up Routes /////////////////////////

    
    //////////////////////// Begin Count Down Routes ////////////////////////
    Route::group(['prefix'=>'countDown'], (function(){
        Route::get('/','CountDownController@index')->name('admin.countDowns');
        Route::get('/countDown/changeStatus/{id}','CountDownController@changeStatus')->name('admin.countDowns.changeStatus');

        Route::get('/create','CountDownController@create')->name('admin.countDowns.create');
        Route::post('/store','CountDownController@store')->name('admin.countDowns.store');
        
        Route::get('/edit/{id}','CountDownController@edit')->name('admin.countDowns.edit');
        Route::post('/update/{id}','CountDownController@update')->name('admin.countDowns.update');

        Route::get('/delete/{id}','CountDownController@destroy')->name('admin.countDowns.delete');
    })); 
    //////////////////////// End Count Down Routes /////////////////////////

    
    //////////////////////// Begin Categories Routes ////////////////////////
    Route::group(['prefix'=>'categories' , 'middleware'=>'can:categories'], (function(){
        Route::get('/','CategoryController@index')->name('admin.categories');

        Route::get('/create','CategoryController@create')->name('admin.categories.create');
        Route::post('/store','CategoryController@store')->name('admin.categories.store');
        
        Route::get('/edit/{id}','CategoryController@edit')->name('admin.category.edit');
        Route::post('/update/{id}','CategoryController@update')->name('admin.category.update');

        Route::get('/delete/{id}','CategoryController@destroy')->name('admin.category.delete');

    }));
    //////////////////////// End Categories Routes /////////////////////////
    
     //////////////////////// Begin Category Slider Routes ////////////////////////
    Route::group(['prefix'=>'categorySlider' , 'middleware'=>'can:categories'], (function(){
        Route::get('/','CategoryImagesController@index')->name('admin.categorySlider');

        Route::get('/create','CategoryImagesController@create')->name('admin.categorySlider.create');
        Route::post('/store','CategoryImagesController@store')->name('admin.categorySlider.store');
        
        Route::get('/edit/{id}','CategoryImagesController@edit')->name('admin.categorySlider.edit');
        Route::post('/update/{id}','CategoryImagesController@update')->name('admin.categorySlider.update');

        Route::get('/delete/{id}','CategoryImagesController@destroy')->name('admin.categorySlider.delete');

    }));
    //////////////////////// End Categories Slider Routes /////////////////////////

    //////////////////////// Begin Sub Categories Routes ////////////////////////
    Route::group(['prefix'=>'subCategories' , 'middleware'=>'can:subCategories'], (function(){
        Route::get('/','SubCategoryController@index')->name('admin.subCategories');

        Route::get('/create','SubCategoryController@create')->name('admin.subCategories.create');
        Route::post('/store','SubCategoryController@store')->name('admin.subCategories.store');
        
        Route::get('/edit/{id}','SubCategoryController@edit')->name('admin.subCategory.edit');
        Route::post('/update/{id}','SubCategoryController@update')->name('admin.subCategory.update');

        Route::get('/delete/{id}','SubCategoryController@destroy')->name('admin.subCategory.delete');
        
        Route::get('/changeStatus/{id}','SubCategoryController@changeStatus')->name('admin.subCategory.changeStatus');

    }));
    //////////////////////// End Sub Categories Routes /////////////////////////

    //////////////////////// Begin Sub Sub Categories Routes ////////////////////////
    Route::group(['prefix'=>'subSubCategories' , 'middleware'=>'can:subSubCategories'], (function(){
        Route::get('/','Sub_Sub_CategoryController@index')->name('admin.subSubCategories');

        Route::get('/create','Sub_Sub_CategoryController@create')->name('admin.subSubCategory.create');
        Route::post('/store','Sub_Sub_CategoryController@store')->name('admin.subSubCategory.store');
        
        Route::get('/edit/{id}','Sub_Sub_CategoryController@edit')->name('admin.subSubCategory.edit');
        Route::post('/update/{id}','Sub_Sub_CategoryController@update')->name('admin.subSubCategory.update');

        Route::get('/delete/{id}','Sub_Sub_CategoryController@destroy')->name('admin.subSubCategory.delete');

    }));
    //////////////////////// End Sub Sub Categories Routes /////////////////////////
    
    //////////////////////// Begin Tags Routes ////////////////////////
    Route::group(['prefix'=>'tags' , 'middleware'=>'can:tags'], (function(){
        Route::get('/','TagController@index')->name('admin.tags');

        Route::get('/create','TagController@create')->name('admin.tags.create');
        Route::post('/store','TagController@store')->name('admin.tags.store');
        
        Route::get('/edit/{id}','TagController@edit')->name('admin.tag.edit');
        Route::post('/update/{id}','TagController@update')->name('admin.tag.update');

        Route::get('/delete/{id}','TagController@destroy')->name('admin.tag.delete');

    }));
    //////////////////////// End Tags Routes /////////////////////////

    //////////////////////// Begin Deals Banners Routes ////////////////////////
    Route::group(['prefix'=>'dealsBanners' , 'middleware'=>'can:dealsBanners'], (function(){
        Route::get('/','DealsController@index')->name('admin.dealsBanners');

        Route::get('/create','DealsController@create')->name('admin.dealsBanners.create');
        Route::post('/store','DealsController@store')->name('admin.dealsBanners.store');
        
        Route::get('/edit/{id}','DealsController@edit')->name('admin.dealsBanners.edit');
        Route::post('/update/{id}','DealsController@update')->name('admin.dealsBanners.update');

        Route::get('/delete/{id}','DealsController@destroy')->name('admin.dealsBanners.delete');

    }));
    //////////////////////// End Deals Banners Routes /////////////////////////


    //////////////////////// Begin Wheel Routes ////////////////////////
     Route::group(['prefix'=>'wheel' , 'middleware'=>'can:wheel'], (function(){
        Route::get('/','WheelController@index')->name('admin.wheel');

        Route::get('/create','WheelController@create')->name('admin.wheel.create');
        Route::post('/store','WheelController@store')->name('admin.wheel.store');
        
        Route::get('/edit/{id}','WheelController@edit')->name('admin.wheel.edit');
        Route::post('/update/{id}','WheelController@update')->name('admin.wheel.update');

        Route::get('/delete/{id}','WheelController@destroy')->name('admin.wheel.delete');    
        
        Route::get('/changeStatus/{id}','WheelController@changeStatus')->name('admin.wheel.changeStatus');

    }));
    //////////////////////// End Wheel Routes /////////////////////////

    //////////////////////// Begin Gifts Routes ////////////////////////
     Route::group(['prefix'=>'gifts' , 'middleware'=>'can:gifts_users'], (function(){
        Route::get('/','GiftsUsersController@index')->name('admin.gifts_users');

        Route::get('/create','GiftsUsersController@create')->name('admin.gifts_users.create');
        Route::post('/store','GiftsUsersController@store')->name('admin.gifts_users.store');
        
        Route::get('/edit/{id}','GiftsUsersController@edit')->name('admin.gifts_users.edit');
        Route::post('/update/{id}','GiftsUsersController@update')->name('admin.gifts_users.update');

        Route::get('/delete/{id}','GiftsUsersController@destroy')->name('admin.gifts_users.delete');

    }));
    //////////////////////// End Gifts Routes /////////////////////////

    //////////////////////// Begin Related Products Routes ////////////////////////
    Route::group(['prefix'=>'related_products' , 'middleware'=>'can:related_products'], (function(){
        Route::get('/','RelatedProductsController@index')->name('admin.related_products');

        Route::get('/create','RelatedProductsController@create')->name('admin.related_products.create');
        Route::post('/store','RelatedProductsController@store')->name('admin.related_products.store');
        
        Route::get('/edit/{id}','RelatedProductsController@edit')->name('admin.related_products.edit');
        Route::post('/update/{id}','RelatedProductsController@update')->name('admin.related_products.update');

        Route::get('/delete/{id}','RelatedProductsController@destroy')->name('admin.related_products.delete');

    }));
    //////////////////////// End Related Products Routes /////////////////////////

    //////////////////////// Begin Review Products Routes ////////////////////////
    Route::group(['prefix'=>'review_products' , 'middleware'=>'can:review_products'], (function(){
        Route::get('/','ReviewProductsController@index')->name('admin.review_products');

        Route::get('/create','ReviewProductsController@create')->name('admin.review_products.create');
        Route::post('/store','ReviewProductsController@store')->name('admin.review_products.store');
        
        Route::get('/edit/{id}','ReviewProductsController@edit')->name('admin.review_products.edit');
        Route::post('/update/{id}','ReviewProductsController@update')->name('admin.review_products.update');

        Route::get('/delete/{id}','ReviewProductsController@destroy')->name('admin.review_products.delete');

    }));
    //////////////////////// End Review Products Routes /////////////////////////
    
     //////////////////////// Begin Top Selling Routes ////////////////////////
    Route::group(['prefix'=>'topSellings' , 'middleware'=>'can:products'], (function(){
        Route::get('/','TopSellingController@index')->name('admin.topSellings');

        Route::get('/create','TopSellingController@create')->name('admin.topSellings.create');
        Route::post('/store','TopSellingController@store')->name('admin.topSellings.store');
        
        Route::get('/edit/{id}','TopSellingController@edit')->name('admin.topSellings.edit');
        Route::post('/update/{id}','TopSellingController@update')->name('admin.topSellings.update');

        Route::get('/delete/{id}','TopSellingController@destroy')->name('admin.topSellings.delete');
    })); 
    //////////////////////// End Top Selling Routes /////////////////////////

     //////////////////////// Begin New Arrival Routes ////////////////////////
     Route::group(['prefix'=>'newArrivals' , 'middleware'=>'can:products'], (function(){
        Route::get('/','NewArrivalController@index')->name('admin.newArrivals');

        Route::get('/create','NewArrivalController@create')->name('admin.newArrivals.create');
        Route::post('/store','NewArrivalController@store')->name('admin.newArrivals.store');
        
        Route::get('/edit/{id}','NewArrivalController@edit')->name('admin.newArrivals.edit');
        Route::post('/update/{id}','NewArrivalController@update')->name('admin.newArrivals.update');

        Route::get('/delete/{id}','NewArrivalController@destroy')->name('admin.newArrivals.delete');
    })); 
    //////////////////////// End New Arrival Routes /////////////////////////

     //////////////////////// Begin Recommended Products Routes ////////////////////////
     Route::group(['prefix'=>'recommended_products' , 'middleware'=>'can:recommended_products'], (function(){
        Route::get('/','RecomendedProductsController@index')->name('admin.recommended_products');

        Route::get('/create','RecomendedProductsController@create')->name('admin.recommended_products.create');
        Route::post('/store','RecomendedProductsController@store')->name('admin.recommended_products.store');
        
        Route::get('/edit/{id}','RecomendedProductsController@edit')->name('admin.recommended_products.edit');
        Route::post('/update/{id}','RecomendedProductsController@update')->name('admin.recommended_products.update');

        Route::get('/delete/{id}','RecomendedProductsController@destroy')->name('admin.recommended_products.delete');

    }));
    //////////////////////// End Recommended Products Routes /////////////////////////

    //////////////////////// Begin Products Routes ////////////////////////
    Route::group(['prefix'=>'products' , 'middleware'=>'can:products'], (function(){
        Route::get('/','ProductController@index')->name('admin.products');

        Route::get('/deals/{count}','ProductController@deals')->name('admin.deals');

        Route::get('/create','ProductController@create')->name('admin.products.create');
        Route::post('/store','ProductController@store')->name('admin.products.store');
        
        Route::get('/edit/{id}','ProductController@edit')->name('admin.product.edit');
        Route::post('/update/{id}','ProductController@update')->name('admin.product.update');

        Route::get('/delete/{id}','ProductController@destroy')->name('admin.product.delete');
        
        Route::get('/changeStatus/{id}','ProductController@changeStatus')->name('admin.product.changeStatus');
        
            // Import CSV Files
        Route::get('/csv', 'PageController@index')->name('admin.products.show');
        Route::post('/csv/uploadFile', 'PageController@uploadFile')->name('admin.products.upload_Files');
    

    })); 
    //////////////////////// End Products Routes /////////////////////////

     //////////////////////// Begin Variants Routes ////////////////////////
     Route::group(['prefix'=>'variants' , 'middleware'=>'can:products'], (function(){
        Route::get('/','VariantController@index')->name('admin.variants');

        Route::get('/create','VariantController@create')->name('admin.variants.create');
        Route::post('/store','VariantController@store')->name('admin.variants.store');
        
        Route::get('/edit/{id}','VariantController@edit')->name('admin.variants.edit');
        Route::post('/update/{id}','VariantController@update')->name('admin.variants.update');

        Route::get('/delete/{id}','VariantController@destroy')->name('admin.variants.delete');
        
    })); 
    //////////////////////// End Variants Routes /////////////////////////

    //////////////////////// Begin Products Images Routes ////////////////////////
    Route::group(['prefix'=>'images' , 'middleware'=>'can:products'], (function(){
        Route::get('/','ImageController@index')->name('admin.productImages');
 
        Route::get('/create','ImageController@create')->name('admin.productImages.create');
        Route::post('/store','ImageController@store')->name('admin.productImages.store');

    })); 
    //////////////////////// End Products Images Routes /////////////////////////

     //////////////////////// Begin Orders Routes ////////////////////////
     Route::group(['prefix'=>'orders'], (function(){
        Route::get('/view/{id}','OrderController@view')->name('admin.orders');
        Route::get('/save','OrderController@save')->name('admin.orders.create');
    })); 
    //////////////////////// End Orders Routes /////////////////////////

    //////////////////////// Begin Chat Routes ////////////////////////
    Route::group(['prefix'=>'chat' , 'middleware'=>'can:chat'], (function(){
        Route::get('/','ChatController@index')->name('admin.chat');

        Route::get('/create','ChatController@create')->name('admin.chat.create');
        Route::post('/store','ChatController@store')->name('admin.chat.store');
        
        Route::get('/edit/{id}','ChatController@edit')->name('admin.chat.edit');
        Route::post('/update/{id}','ChatController@update')->name('admin.chat.update');

        Route::get('/delete/{id}','ChatController@destroy')->name('admin.chat.delete');

    }));
    //////////////////////// End Chat Routes /////////////////////////
    
     //////////////////////// Begin Chat Bot Routes ////////////////////////
     Route::group(['prefix'=>'chatBot' , 'middleware'=>'can:chatBot'], (function(){
        Route::get('/','ChatBotController@index')->name('admin.chatBot');

        Route::get('/create','ChatBotController@create')->name('admin.chatBot.create');
        Route::post('/store','ChatBotController@store')->name('admin.chatBot.store');
        
        Route::get('/edit/{id}','ChatBotController@edit')->name('admin.chatBot.edit');
        Route::post('/update/{id}','ChatBotController@update')->name('admin.chatBot.update');

        Route::get('/delete/{id}','ChatBotController@destroy')->name('admin.chatBot.delete');

    }));
    //////////////////////// End Chat Bot Routes /////////////////////////
    
    //////////////////////// Begin Videos Routes ////////////////////////
    Route::group(['prefix'=>'video' , 'middleware'=>'can:video'], (function(){
        Route::get('/','VideoController@index')->name('admin.videos');

        Route::get('/create','VideoController@create')->name('admin.videos.create');
        Route::post('/store','VideoController@store')->name('admin.videos.store');
        
        Route::get('/edit/{id}','VideoController@edit')->name('admin.videos.edit');
        Route::post('/update/{id}','VideoController@update')->name('admin.videos.update');

        Route::get('/delete/{id}','VideoController@destroy')->name('admin.videos.delete');

    }));
    //////////////////////// End Videos Routes /////////////////////////


    //////////////////////// Begin Notification Routes ////////////////////////
    Route::group(['prefix'=>'notifications' , 'middleware'=>'can:notifications'], (function(){
        Route::get('/','NotificationController@index')->name('admin.notifications');

        Route::get('/create','NotificationController@create')->name('admin.notifications.create');
        Route::post('/store','NotificationController@store')->name('admin.notifications.store');
        
        Route::get('/edit/{id}','NotificationController@edit')->name('admin.notifications.edit');
        Route::post('/update/{id}','NotificationController@update')->name('admin.notifications.update');

        Route::get('/delete/{id}','NotificationController@destroy')->name('admin.notifications.delete');
        
        Route::get('/push_notification', 'PushNotificationController@index')->name('push.notification');
        Route::post('/sendNotification', 'PushNotificationController@sendNotification')->name('send.notification');

    }));
    //////////////////////// End Notification Routes /////////////////////////
    
    //////////////////////// Begin Slider Routes ////////////////////////
    Route::group(['prefix'=>'slider'], (function(){
        Route::get('/','SliderController@index')->name('admin.productSlider');

        Route::get('/create','SliderController@create')->name('admin.productSlider.create');
        Route::post('/store','SliderController@store')->name('admin.productSlider.store');

        Route::get('/edit/{id}','SliderController@edit')->name('admin.productSlider.edit');
        Route::post('/update/{id}','SliderController@update')->name('admin.productSlider.update');

        Route::get('/delete/{id}','SliderController@destroy')->name('admin.productSlider.delete');

    })); 
    //////////////////////// End Slider Routes /////////////////////////

    //////////////////////// Begin Products Quantities Routes ////////////////////////
    Route::group(['prefix'=>'quantities'], (function(){
        Route::get('/','Product_QuantityController@index')->name('admin.quantities');

        Route::get('/create','Product_QuantityController@create')->name('admin.quantities.create');
        Route::post('/store','Product_QuantityController@store')->name('admin.quantities.store');
        
        Route::get('/edit/{id}','Product_QuantityController@edit')->name('admin.quantity.edit');
        Route::post('/update/{id}','Product_QuantityController@update')->name('admin.quantity.update');

        Route::get('/delete/{id}','Product_QuantityController@destroy')->name('admin.quantity.delete');

    }));
    //////////////////////// End Products Quantities Routes /////////////////////////

    //////////////////////// Begin Sellers Routes ////////////////////////
    Route::group(['prefix'=>'sellers' , 'middleware'=>'can:sellers'], (function(){
        Route::get('/','SellerController@index')->name('admin.sellers');

        Route::get('/create','SellerController@create')->name('admin.sellers.create');
        Route::post('/store','SellerController@store')->name('admin.sellers.store');
        
        Route::get('/edit/{id}','SellerController@edit')->name('admin.seller.edit');
        Route::post('/update/{id}','SellerController@update')->name('admin.seller.update');

        Route::get('/delete/{id}','SellerController@destroy')->name('admin.seller.delete');

        Route::get('/changeStatus/{id}','SellerController@changeStatus')->name('admin.seller.changeStatus');

    }));
    //////////////////////// End Sellers Routes /////////////////////////

    //////////////////////// Begin Locations Routes ////////////////////////
    Route::group(['prefix'=>'locations' , 'middleware'=>'can:locations'], (function(){
        Route::get('/','LocationController@index')->name('admin.locations');

        Route::get('/create','LocationController@create')->name('admin.locations.create');
        Route::post('/store','LocationController@store')->name('admin.locations.store');
        
        Route::get('/edit/{id}','LocationController@edit')->name('admin.location.edit');
        Route::post('/update/{id}','LocationController@update')->name('admin.location.update');

        Route::get('/delete/{id}','LocationController@destroy')->name('admin.location.delete');

    }));
    //////////////////////// End Locations Routes /////////////////////////
    
      //////////////////////// Begin Installment Routes ////////////////////////
     Route::group(['prefix'=>'installment' , 'middleware'=>'can:installment'], (function(){
        Route::get('/','InstallmentsController@index')->name('admin.installments');

        Route::get('/create','InstallmentsController@create')->name('admin.installments.create');
        Route::post('/store','InstallmentsController@store')->name('admin.installments.store');
        
        Route::get('/edit/{id}','InstallmentsController@edit')->name('admin.installments.edit');
        Route::post('/update/{id}','InstallmentsController@update')->name('admin.installments.update');

        Route::get('/delete/{id}','InstallmentsController@destroy')->name('admin.installments.delete');

    }));
    //////////////////////// End Installment Routes /////////////////////////
    
     //////////////////////// Begin Product Tgas Routes ////////////////////////
     Route::group(['prefix'=>'productTags' , 'middleware'=>'can:tags'], (function(){
        Route::get('/','ProductTagsController@index')->name('admin.productTags');
        Route::get('/changeStatus/{id}','ProductTagsController@changeStatus')->name('admin.productTags.changeStatus');

        Route::get('/create','ProductTagsController@create')->name('admin.productTags.create');
        Route::post('/store','ProductTagsController@store')->name('admin.productTags.store');
        
        Route::get('/edit/{id}','ProductTagsController@edit')->name('admin.productTags.edit');
        Route::post('/update/{id}','ProductTagsController@update')->name('admin.productTags.update');

        Route::get('/delete/{id}','ProductTagsController@destroy')->name('admin.productTags.delete');
    })); 
    //////////////////////// End Product Tgas Routes /////////////////////////
    
    //////////////////////// Begin Tgas Product Routes ////////////////////////
    Route::group(['prefix'=>'tagsProducts' , 'middleware'=>'can:tags'], (function(){
        Route::get('/','TagsProductsController@index')->name('admin.tagsProducts');

        Route::get('/create','TagsProductsController@create')->name('admin.tagsProducts.create');
        Route::post('/store','TagsProductsController@store')->name('admin.tagsProducts.store');
        
        Route::get('/edit/{id}','TagsProductsController@edit')->name('admin.tagsProducts.edit');
        Route::post('/update/{id}','TagsProductsController@update')->name('admin.tagsProducts.update');

        Route::get('/delete/{id}','TagsProductsController@destroy')->name('admin.tagsProducts.delete');
    })); 
    //////////////////////// End Tgas Product Routes /////////////////////////
    
    //////////////////////// Begin Promo Categories Routes ////////////////////////
     Route::group(['prefix'=>'promoCategories' , 'middleware'=>'can:subCategories'], (function(){
        Route::get('/','PromoCategoriesController@index')->name('admin.promoCategories');

        Route::get('/create','PromoCategoriesController@create')->name('admin.promoCategories.create');
        Route::post('/store','PromoCategoriesController@store')->name('admin.promoCategories.store');
        
        Route::get('/edit/{id}','PromoCategoriesController@edit')->name('admin.promoCategories.edit');
        Route::post('/update/{id}','PromoCategoriesController@update')->name('admin.promoCategories.update');

        Route::get('/delete/{id}','PromoCategoriesController@destroy')->name('admin.promoCategories.delete');
    })); 
    //////////////////////// End Promo Categories Routes /////////////////////////    

    //////////////////////// Begin Installment Form Routes ////////////////////////
    Route::group(['prefix'=>'installmentForm' , 'middleware'=>'can:installment'], (function(){
        Route::get('/','InstallmentsFormController@index')->name('admin.installmentForm');

        Route::get('/create','InstallmentsFormController@create')->name('admin.installmentForm.create');
        Route::post('/store','InstallmentsFormController@store')->name('admin.installmentForm.store');
        
        Route::get('/edit/{id}','InstallmentsFormController@edit')->name('admin.installmentForm.edit');
        Route::post('/update/{id}','InstallmentsFormController@update')->name('admin.installmentForm.update');

        Route::get('/delete/{id}','InstallmentsFormController@destroy')->name('admin.installmentForm.delete');

    }));
    //////////////////////// End Installment Form Routes /////////////////////////

    //////////////////////// Begin Roles Routes ////////////////////////
    Route::group(['prefix'=>'roles' , 'middleware'=>'can:roles'], (function(){
        Route::get('/','RoleController@index')->name('admin.roles');

        Route::get('/create','RoleController@create')->name('admin.roles.create');
        Route::post('/store','RoleController@store')->name('admin.roles.store');
        
        Route::get('/edit/{id}','RoleController@edit')->name('admin.role.edit');
        Route::post('/update/{id}','RoleController@update')->name('admin.role.update');
    }));
    //////////////////////// End Roles Routes /////////////////////////
    
    //////////////////////// Begin C-Panel Users Routes ////////////////////////
    Route::group(['prefix'=>'users' , 'middleware'=>'can:users'], (function(){
        Route::get('/','UsersController@index')->name('admin.users');

        Route::get('/create','UsersController@create')->name('admin.users.create');
        Route::post('/store','UsersController@store')->name('admin.users.store');
        
        Route::get('/edit/{id}','UsersController@edit')->name('admin.user.edit');
        Route::post('/update/{id}','UsersController@update')->name('admin.user.update');

        Route::get('/delete/{id}','UsersController@destroy')->name('admin.user.delete');

    }));
    //////////////////////// End C-Panel Users Routes /////////////////////////

    //////////////////////// Begin API Users Routes ////////////////////////
    Route::group(['prefix'=>'ApiUser' , 'middleware'=>'can:ApiUser'], (function(){
        Route::get('/','Api_adminController@index')->name('admin.userApi');

        Route::get('/create','Api_adminController@create')->name('admin.userApi.create');
        Route::post('/store','Api_adminController@store')->name('admin.userApi.store');
    }));
    //////////////////////// End API Users Routes /////////////////////////

    //////////////////////// Begin Financials Routes ////////////////////////
    Route::group(['prefix'=>'financials'], (function(){
        Route::get('/accountSummary','FinancialsController@accountSummary')->name('admin.financials.accountSummary');
        Route::get('/requestWithdrawal','FinancialsController@requestWithdrawal')->name('admin.financials.requestWithdrawal');
        Route::get('/withdrawalStatus','FinancialsController@withdrawalStatus')->name('admin.financials.withdrawalStatus');
        Route::get('/compensation','FinancialsController@compensation')->name('admin.financials.compensation');
    }));
    //////////////////////// End Financials Routes /////////////////////////

    /////////////////////// Begin Discount Routers ////////////////////////

    Route::group(['prefix'=>'discount'], (function(){
        Route::get('/create',[discountController::class,'create'])->name('admin.discount.create');
        Route::post('/store',[discountController::class,'store'])->name('admin.discount.store');
        Route::get('/show',[discountController::class,'show'])->name('admin.discount.show');
        Route::get('/getProduct/{id}',[discountController::class,'getProduct']);
        Route::get('/deltete/{id}',[discountController::class,'deleteDiscount'])->name('admin.discount.delete');
        Route::get('/edit/{id}',[discountController::class,'editDiscount'])->name('admin.discount.edit');
        Route::post('/update',[discountController::class,'update'])->name('admin.discount.update');
    }));

    //////////////////////// End Discount Routes /////////////////////////





}));

Route::group(['namespace'=>'admin'] ,(function () { 

    Route::get('/login', 'LoginController@getLogin')->name('admin_login');
    Route::post('/handleLogin', 'LoginController@handleLogin')->name('admin_handleLogin');   

    Route::get('/editProfile/{id}', 'LoginController@editProfile')->name('admin_editProfile');    
    Route::post('/updateProfile/{id}', 'LoginController@updateProfile')->name('admin_updateProfile'); 

    Route::get('/logout', 'LoginController@logout')->name('admin_logout');
}));
