<?php

use App\Http\Controllers\API\discountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('isApiUser')->group(function () {

    //////////////////////// Begin Main Categories Routes ////////////////////////
    Route::group(['prefix' => 'mainCategories'], (function () {
        Route::get('/', 'API\ApiMainCategoryController@index')->name('api.mainCategories');

        Route::get('/count', 'API\ApiMainCategoryController@count')->name('api.mainCategories.count');

        Route::get('/show/{id}', 'API\ApiMainCategoryController@show')->name('api.mainCategory.show');

        Route::post('/store', 'API\ApiMainCategoryController@store')->name('api.mainCategories.store');

        Route::post('/update/{id}', 'API\ApiMainCategoryController@update')->name('api.mainCategory.update');

        Route::get('/delete/{id}', 'API\ApiMainCategoryController@destroy')->name('api.mainCategory.delete');
    }));
    //////////////////////// End Main Categories Routes /////////////////////////

    //////////////////////// Begin Splash Screen Routes ////////////////////////
    Route::group(['prefix' => 'splashScreen'], (function () {
        Route::get('/', 'API\ApiSplashScreenController@index')->name('api.splashScreen');

        Route::post('/store', 'API\ApiSplashScreenController@store')->name('api.splashScreen.store');

        Route::post('/update/{id}', 'API\ApiSplashScreenController@update')->name('api.splashScreen.update');

        Route::get('/delete/{id}', 'API\ApiSplashScreenController@destroy')->name('api.splashScreen.delete');
    }));
    //////////////////////// End Splash Screen Routes /////////////////////////

    //////////////////////// Begin Count Down Routes ////////////////////////
    Route::group(['prefix' => 'countDown'], (function () {
        Route::get('/', 'API\ApiCountDownController@index')->name('admin.countDowns');
    }));
    //////////////////////// End Count Down Routes /////////////////////////

    //////////////////////// Begin Categories Routes ////////////////////////
    Route::group(['prefix' => 'categories'], (function () {
        Route::get('/', 'API\ApiCategoryController@index')->name('api.categories');

        Route::get('/getProducts/{id}', 'API\ApiCategoryController@getProducts')->name('api.categories.getProducts');

        Route::get('/count', 'API\ApiCategoryController@count')->name('api.category.count');

        Route::get('/show/{id}', 'API\ApiCategoryController@show')->name('api.category.show');

        Route::post('/store', 'API\ApiCategoryController@store')->name('api.categories.store');

        Route::post('/update/{id}', 'API\ApiCategoryController@update')->name('api.category.update');

        Route::get('/delete/{id}', 'API\ApiCategoryController@destroy')->name('api.category.delete');
    }));
    //////////////////////// End Categories Routes /////////////////////////

    //////////////////////// Begin Category Slider Routes ////////////////////////
    Route::group(['prefix' => 'categorySlider'], (function () {
        Route::get('/', 'API\ApiCategoryImagesController@index')->name('api.categorySlider');

        Route::post('/store', 'API\ApiCategoryImagesController@store')->name('api.categorySlider.store');

        Route::post('/update/{id}', 'API\ApiCategoryImagesController@update')->name('api.categorySlider.update');

        Route::get('/delete/{id}', 'API\ApiCategoryImagesController@destroy')->name('api.categorySlider.delete');
    }));
    //////////////////////// End Category Slider Routes /////////////////////////

    //////////////////////// Begin Sub Categories Routes ////////////////////////
    Route::group(['prefix' => 'subCategories'], (function () {
        Route::get('/', 'API\ApiSubCategoryController@index')->name('api.subCategories');

        Route::get('/getProducts/{id}', 'API\ApiSubCategoryController@getProducts')->name('api.subCategories.getProducts');

        Route::get('/count', 'API\ApiSubCategoryController@count')->name('api.subCategory.count');

        Route::get('/show/{id}', 'API\ApiSubCategoryController@show')->name('api.subCategory.show');

        Route::post('/store', 'API\ApiSubCategoryController@store')->name('api.subCategories.store');

        Route::post('/update/{id}', 'API\ApiSubCategoryController@update')->name('api.subCategory.update');

        Route::get('/delete/{id}', 'API\ApiSubCategoryController@destroy')->name('api.subCategory.delete');
    }));
    //////////////////////// End Sub Categories Routes /////////////////////////

    //////////////////////// Begin Sub Sub Categories Routes ////////////////////////
    Route::group(['prefix' => 'subSubCategories'], (function () {
        Route::get('/', 'API\ApiSubSubCategoryController@index')->name('api.subSubCategories');

        Route::get('/getProducts/{id}', 'API\ApiSubSubCategoryController@getProducts')->name('api.subSubCategories.getProducts');

        Route::get('/getSubCategory/{id}', 'API\ApiSubSubCategoryController@getSubCategory')->name('api.subSubCategories.getSubCategory');
    }));
    //////////////////////// End Sub Sub Categories Routes /////////////////////////

    //////////////////////// Begin Main Categories Routes ////////////////////////
    Route::group(['prefix' => 'popUp'], (function () {
        Route::get('/', 'API\ApiPopUpController@index')->name('api.popUp');
    }));
    //////////////////////// End Main Categories Routes /////////////////////////

    //////////////////////// Begin Tags Routes ////////////////////////
    Route::group(['prefix' => 'tags'], (function () {
        Route::get('/', 'API\ApiTagsController@index')->name('api.tags');

        Route::get('/count', 'API\ApiTagsController@count')->name('api.tags.count');

        Route::get('/show/{id}', 'API\ApiTags@show')->name('api.tags.show');

        Route::post('/store', 'API\ApiTagsController@store')->name('api.tags.store');

        Route::post('/update/{id}', 'API\ApiTagsController@update')->name('api.tag.update');

        Route::get('/delete/{id}', 'API\ApiTagsController@destroy')->name('api.tag.delete');
    }));
    //////////////////////// End Tags Routes /////////////////////////

    //////////////////////// Begin Wheel Routes ////////////////////////
    Route::group(['prefix' => 'wheel', 'namespace' => 'API'], (function () {
        Route::get('/', 'ApiWheelController@index')->name('api.wheel');

        Route::post('/store', 'ApiWheelController@store')->name('api.wheel.store');

        Route::post('/update/{id}', 'ApiWheelController@update')->name('api.wheel.update');

        Route::get('/delete/{id}', 'ApiWheelController@destroy')->name('api.wheel.delete');
    }));
    //////////////////////// End Wheel Routes /////////////////////////

    //////////////////////// Begin Gifts Routes ////////////////////////
    Route::group(['prefix' => 'gifts', 'namespace' => 'API'], (function () {
        Route::get('/', 'ApiGiftsUsersController@index')->name('api.gifts_users');

        Route::post('/store', 'ApiGiftsUsersController@store')->name('api.gifts_users.store');

        Route::post('/update/{id}', 'ApiGiftsUsersController@update')->name('api.gifts_users.update');

        Route::get('/delete/{id}', 'ApiGiftsUsersController@destroy')->name('api.gifts_users.delete');
    }));
    //////////////////////// End Gifts Routes /////////////////////////

    //////////////////////// Begin Related Products Routes ////////////////////////
    Route::group(['prefix' => 'related_products', 'namespace' => 'API'], (function () {
        Route::get('/', 'ApiRelatedProductsController@index')->name('api.related_products');

        Route::post('/store', 'ApiRelatedProductsController@store')->name('api.related_products.store');

        Route::post('/update/{id}', 'ApiRelatedProductsController@update')->name('api.related_products.update');

        Route::get('/delete/{id}', 'ApiRelatedProductsController@destroy')->name('api.related_products.delete');
    }));
    //////////////////////// End Related Products Routes /////////////////////////

    //////////////////////// Begin Review Products Routes ////////////////////////
    Route::group(['prefix' => 'review_products', 'namespace' => 'API'], (function () {
        Route::get('/', 'ApiReviewProductsController@index')->name('api.review_products');

        Route::post('/store', 'ApiReviewProductsController@store')->name('api.review_products.store');

        Route::post('/update/{id}', 'ApiReviewProductsController@update')->name('api.review_products.update');

        Route::get('/delete/{id}', 'ApiReviewProductsController@destroy')->name('api.review_products.delete');
    }));
    //////////////////////// End Review Products Routes /////////////////////////

    //////////////////////// Begin Recommended Products Routes ////////////////////////
    Route::group(['prefix' => 'recommended_products', 'namespace' => 'API'], (function () {
        Route::get('/', 'ApiRecomendedProductsController@index')->name('api.recommended_products');

        Route::post('/store', 'ApiRecomendedProductsController@store')->name('api.recommended_products.store');

        Route::post('/update/{id}', 'ApiRecomendedProductsController@update')->name('api.recommended_products.update');

        Route::get('/delete/{id}', 'ApiRecomendedProductsController@destroy')->name('api.recommended_products.delete');
    }));
    //////////////////////// End Recommended Products Routes /////////////////////////


    //////////////////////// Begin Products Routes ////////////////////////
    Route::group(['prefix' => 'products'], (function () {

        Route::get('/', 'API\ApiProductController@index')->name('api.products');

        Route::get('/{count}', 'API\ApiProductController@index2')->name('api.products.count');

        Route::get('/variant/{variant}', 'API\ApiProductController@byVariant')->name('api.products.byVariant');

        Route::get('/tag/{tag}', 'API\ApiProductController@byTag')->name('api.products.byTag');

        Route::get('/deals/{count}', 'API\ApiProductController@deals')->name('api.products.deals');

        Route::get('/count', 'API\ApiProductController@count')->name('api.products.count');

        Route::get('/show/{id}', 'API\ApiProductController@show')->name('api.product.show');

        Route::get('/priceRange/{min_price}/{max_price}', 'API\ApiProductController@priceRange')->name('api.product.PriceRange');
    }));
    //////////////////////// End Products Routes /////////////////////////

    //////////////////////// Begin Products Routes ////////////////////////
    Route::group(['prefix' => 'variants'], (function () {

        Route::get('/{id}', 'API\ApiVariantController@index')->name('api.products');
    }));
    //////////////////////// End Products Routes /////////////////////////

    //////////////////////// Begin Sellers Routes ////////////////////////
    Route::group(['prefix' => 'sellers'], (function () {
        Route::get('/', 'API\ApiSellerController@index')->name('api.sellers');

        Route::get('/count', 'API\ApiSellerController@count')->name('api.sellers.count');

        Route::get('/show/{id}', 'API\ApiSellerController@show')->name('api.seller.show');

        Route::post('/store', 'API\ApiSellerController@store')->name('api.sellers.store');

        Route::post('/update/{id}', 'API\ApiSellerController@update')->name('api.seller.update');

        Route::get('/delete/{id}', 'API\ApiSellerController@destroy')->name('api.seller.delete');
    }));
    //////////////////////// End Sellers Routes /////////////////////////

    //////////////////////// Begin Sliders Routes ////////////////////////

    Route::group(['prefix' => 'sliders'], (function () {
        Route::get('/', 'API\ApiSliderController@index')->name('api.sliders');

        Route::get('/count', 'API\ApiSliderController@count')->name('api.sliders.count');

        Route::get('/show/{id}', 'API\ApiSliderController@show')->name('api.slider.show');

        Route::post('/store', 'API\ApiSliderController@store')->name('api.slider.store');

        Route::post('/update/{id}', 'API\ApiSliderController@update')->name('api.slider.update');

        Route::get('/delete/{id}', 'API\ApiSliderController@destroy')->name('api.slider.delete');
    }));

    //////////////////////// End Sliders Routes /////////////////////////

    //////////////////////// Begin Rates Routes ////////////////////////

    Route::group(['prefix' => 'rates'], (function () {
        Route::get('/', 'API\ApiRateController@index')->name('api.rates');

        Route::get('/review', 'API\ApiRateController@review')->name('api.rate.review');

        Route::post('/store', 'API\ApiRateController@store')->name('api.rate.store');
    }));

    //////////////////////// End Rates Routes ////////////////////////    
});

//////////////////////// Begin Customer_location Routes ////////////////////////

Route::group(['prefix' => 'customer_location', 'namespace' => 'front'], (function () {
    Route::get('/', 'ApiCustomer_LocationController@index')->name('api.customer_location');

    Route::get('/count', 'ApiCustomer_LocationController@count')->name('api.customer_location.count');

    Route::get('/show', 'ApiCustomer_LocationController@show')->name('api.customer_location.show');

    Route::post('/store', 'ApiCustomer_LocationController@store')->name('api.customer_location.store');

    Route::post('/update/{id}', 'ApiCustomer_LocationController@update')->name('api.customer_location.update');

    Route::get('/delete/{id}', 'ApiCustomer_LocationController@destroy')->name('api.customer_location.delete');
}));

//////////////////////// End Customer_location Routes /////////////////////////

//////////////////////// Begin Customer_location Routes ////////////////////////

Route::group(['prefix' => 'images'], (function () {
    Route::get('/{id}', 'API\ApiImagesController@index')->name('api.images');

    Route::get('/show', 'API\ApiImagesController@show')->name('api.images.show');

    Route::post('/store', 'API\ApiImagesController@store')->name('api.images.store');
}));

//////////////////////// End Customer_location Routes /////////////////////////

//////////////////////// Begin Customer_location Routes ////////////////////////

Route::group(['prefix' => 'customer_location', 'namespace' => 'Front'], (function () {
    Route::get('/', 'ApiCustomer_LocationController@index')->name('api.customer_location');

    Route::get('/count', 'ApiCustomer_LocationController@count')->name('api.customer_location.count');

    Route::get('/show', 'ApiCustomer_LocationController@show')->name('api.customer_location.show');

    Route::post('/store', 'ApiCustomer_LocationController@store')->name('api.customer_location.store');

    Route::post('/update/{id}', 'ApiCustomer_LocationController@update')->name('api.customer_location.update');

    Route::get('/delete/{id}', 'ApiCustomer_LocationController@destroy')->name('api.customer_location.delete');
}));
//////////////////////// End Customer_location Routes /////////////////////////

//////////////////////// Begin Chat Routes ////////////////////////
Route::group(['prefix' => 'chat', 'namespace' => 'API'], (function () {
    Route::get('/{id}', 'ApiChatController@index')->name('api.chat');

    Route::post('/store', 'ApiChatController@store')->name('api.chat.store');

    Route::post('/update/{id}', 'ApiChatController@update')->name('api.chat.update');

    Route::get('/delete/{id}', 'ApiChatController@destroy')->name('api.chat.delete');
}));
//////////////////////// End Chat Routes /////////////////////////

//////////////////////// Begin Chat Bot Routes ////////////////////////
Route::group(['prefix' => 'chatBot', 'namespace' => 'API'], (function () {
    Route::get('/', 'ApiChatBotController@index')->name('api.chatBot');

    Route::post('/store', 'ApiChatBotController@store')->name('api.chatBot.store');

    Route::post('/update/{id}', 'ApiChatBotController@update')->name('api.chatBot.update');

    Route::get('/delete/{id}', 'ApiChatBotController@destroy')->name('api.chatBot.delete');
}));
//////////////////////// End Chat Bot Routes /////////////////////////

//////////////////////// Begin Deals Routes ////////////////////////
Route::group(['prefix' => 'deals', 'namespace' => 'API'], (function () {
    Route::get('/', 'ApiDealsController@index')->name('api.dealBanners');

    Route::post('/store', 'ApiDealsController@store')->name('api.dealBanners.store');

    Route::post('/update/{id}', 'ApiDealsController@update')->name('api.dealBanners.update');

    Route::get('/delete/{id}', 'ApiDealsController@destroy')->name('api.dealBanners.delete');
}));
//////////////////////// End Deals Routes /////////////////////////

//////////////////////// Begin Videos Routes ////////////////////////
Route::group(['prefix' => 'videos', 'namespace' => 'API'], (function () {
    Route::get('/', 'ApiVideoController@index')->name('api.videos');
}));
//////////////////////// End Videos Routes /////////////////////////

//////////////////////// Begin Notification Routes ////////////////////////
Route::group(['prefix' => 'notifications', 'namespace' => 'API'], (function () {
    Route::get('/', 'ApiNotificationController@index')->name('api.notifications');

    Route::post('/store', 'ApiNotificationController@store')->name('api.notifications.store');

    Route::post('/update/{id}', 'ApiNotificationController@update')->name('api.notifications.update');

    Route::get('/delete/{id}', 'ApiNotificationController@destroy')->name('api.notifications.delete');
}));
//////////////////////// End Notification Routes /////////////////////////

//////////////////////// Begin Installment Routes ////////////////////////
Route::group(['prefix' => 'installment',  'namespace' => 'API'], (function () {
    Route::get('/', 'ApiInstallmentsController@index')->name('admin.installments');
}));
//////////////////////// End Installment Routes /////////////////////////

//////////////////////// Begin Product Tgas Routes ////////////////////////
Route::group(['prefix' => 'productTgas',  'namespace' => 'API'], (function () {
    Route::get('/', 'ApiProductTagsController@index')->name('admin.installmentForm');
}));
//////////////////////// End Product Tgas Routes /////////////////////////

//////////////////////// Begin Promo Categories Routes ////////////////////////
Route::group(['prefix' => 'promoCategories',  'namespace' => 'API'], (function () {
    Route::get('/', 'ApiPromoCategoriesController@index')->name('admin.promoCategories');
}));
//////////////////////// End Promo Categories Routes /////////////////////////

//////////////////////// Begin Installment Form Routes ////////////////////////
Route::group(['prefix' => 'installmentForm',  'namespace' => 'API'], (function () {
    Route::get('/', 'ApiInstallmentsFromController@index')->name('admin.installmentForm');

    Route::get('/create', 'ApiInstallmentsFromController@create')->name('admin.installmentForm.create');
    Route::post('/store', 'ApiInstallmentsFromController@store')->name('admin.installmentForm.store');

    Route::get('/edit/{id}', 'ApiInstallmentsFromController@edit')->name('admin.installmentForm.edit');
    Route::post('/update/{id}', 'ApiInstallmentsFromController@update')->name('admin.installmentForm.update');

    Route::get('/delete/{id}', 'ApiInstallmentsFromController@destroy')->name('admin.installmentForm.delete');
}));
//////////////////////// End Installment Form Routes /////////////////////////
////////////////////// Begin Discount Routes ////////////////////////////
Route::group(['prefix' => 'discount'], (function () {
    Route::get('/getDiscount', [discountController::class, 'getDiscount']);
}));
////////////////////// end Discount Routes ////////////////////////////
//////////////////////// Begin Login Routes ////////////////////////

Route::group(['prefix' => 'authentication'], (function () {
    Route::post('/register', 'ApiAuthController@register')->name('api.authentication.register');

    Route::post('/login', 'ApiAuthController@login')->name('api.authentication.login');

    Route::post('/updateProfile/{id}', 'ApiAuthController@update')->name('api.authentication.updateProfile');

    Route::post('/logout', 'ApiAuthController@logout')->name('api.authentication.logout');

    //////////////////////// Begin Social Login Routes ////////////////////////





    // Sign Up Github
    Route::get('/login/github', 'ApiAuthController@redirectToProvider')->name('api.github.redirect');

    Route::get('/login/github/callback', 'ApiAuthController@handleProviderCallback')->name('api.github.callback');

    // Sign Up Google
    Route::get('/login/google', 'ApiAuthController@redirectToProviderGoo')->name('api.google.redirect');

    Route::get('/login/google/callback', 'ApiAuthController@handleProviderCallbackGoo')->name('api.google.callback');

    // Sign Up Facebook
    Route::get('/login/facebook', 'ApiAuthController@redirectToProviderFace')->name('api.facebook.redirect');

    Route::get('/login/facebook/callback', 'ApiAuthController@handleProviderCallbackFace')->name('api.facebook.callback');

    //////////////////////// End Social Login Routes ////////////////////////


}));
    //////////////////////// End Login Routes /////////////////////////
