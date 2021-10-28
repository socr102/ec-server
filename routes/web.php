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

Route::get('/', 'AuthController@showFormLogin')->name('login');

Route::post('/login', 'AuthController@login')->name('login-post');

Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('login/{provider}', 'AuthController@redirectToProvider')->name('social.login');

Route::get('login/{provider}/callback', 'AuthController@handleProviderCallback')->name('social.callback');

Route::post('/dish/search', 'DishController@searchDish')->name('dish.search.name');

Route::get('/dish/{id}/comments', 'DishCommentController@index')->name('dish.comments');

Route::post('/dish/{id}/comments', 'DishCommentController@create')->name('dish.comments.create');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Authentication
Route::prefix('/signup')->group(function () {

    Route::match(array('GET', 'POST'), '/customer', 'SignUpController@signUpCustomer')->name('signup.customer');

    Route::prefix('/homechef')->group(function () {
        Route::get('/', 'SignUpController@showFormSignUpHomeChef')->name('signup.homechef');
        Route::post('/step1', 'SignUpController@validateFormUserAccount')->name('signup.homechef.step-1');
        Route::post('/step2', 'SignUpController@validateFormUserAddress')->name('signup.homechef.step-2');
        Route::post('/step3', 'SignUpController@validateFormUserBankAccount')->name('signup.homechef.step-3');
        Route::post('/signup', 'SignUpController@signUpHomeChef')->name('signup.homechef.post');
        // Route::get('/step-2', function () {
        //     return view('auth.signup.homechef.step-2');
        // })->name('signup.homechef.step-2');

        // Route::get('/step-3', function () {
        //     return view('auth.signup.homechef.step-3');
        // })->name('signup.homechef.step-3');
    });

    Route::prefix('/chefmanager')->group(function () {
        Route::get('/', 'SignUpController@showFormSignUpChefManager')->name('signup.chefmanager');
        Route::post('/step1', 'SignUpController@validateFormUserAccount')->name('signup.chefmanager.step-1');
        Route::post('/step-2', 'SignUpController@validateFormUserAddress')->name('signup.chefmanager.step-2');
        Route::post('/signup', 'SignUpController@signUpChefManager')->name('signup.chefmanager.post');
    });
});

// route based on role user
Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::prefix('/home')->group(function () {
        Route::prefix('/customer')->group(function () {
            Route::get('/', 'DishController@dishListCustomer')->name('home.customer.dish-list');

            // Route::get('/leaderboard', 'DishController@dishLeaderboardCustomer')->name('home.customer.leaderboard');

            Route::get('/help-me', 'Customer\HelpController@index')->name('home.customer.help-me');
            Route::post('/help-me', 'Customer\HelpController@store')->name('home.customer.help-me.post');

            Route::post('/user/change-photo', 'UserController@storePhoto')->name('home.customer.change.photo.post');

            Route::prefix('dish')->group(function () {
                Route::get('/{id}', 'DishController@infoDishCustomer')->name('home.customer.dish.dish');

                Route::get('/{id}/details', 'DishController@detailsInfoDishCustomer')->name('home.customer.dish.details');

                Route::get('/{id}/video', 'DishController@videoDishCustomer')->name('home.customer.dish.video');

                Route::post('/{id}/upvote', 'DishController@upvote')->name('home.customer.dish.upvote');

                Route::get('/{id}/comment', 'DishCommentController@index')->name('home.customer.dish.comment');
            });

            Route::prefix('/order')->group(function () {
                Route::get('/', function () {
                    return view('home.customer.order.list');
                })->name('home.customer.order.list');

                Route::get('/summary', function () {
                    return view('home.customer.order.summary');
                })->name('home.customer.order.summary');

                Route::get('/track', function () {
                    return view('home.customer.order.track');
                })->name('home.customer.order.track');

                Route::get('/cart', function () {
                    return view('home.customer.order.cart');
                })->name('home.customer.order.cart');

                Route::get('/history', function () {
                    return view('home.customer.order.history');
                })->name('home.customer.order.history');

                Route::prefix('/new-order')->group(function () {
                    Route::get('/', function () {
                        return view('home.customer.order.new-order.delivery-options');
                    })->name('home.customer.order.new-order.step-1');

                    Route::get('/homedelivery-information', function () {
                        return view('home.customer.order.new-order.homedelivery-information');
                    })->name('home.customer.order.new-order.homedelivery-information');

                    Route::get('/pickup-information', function () {
                        return view('home.customer.order.new-order.pickup-information');
                    })->name('home.customer.order.new-order.pickup-information');

                    Route::get('/add-address', function () {
                        return view('home.customer.order.new-order.add-address');
                    })->name('home.customer.order.new-order.add-address');

                    Route::get('/step-2', function () {
                        return view('home.customer.order.new-order.payment-options');
                    })->name('home.customer.order.new-order.step-2');

                    Route::get('/step-2/details', function () {
                        return view('home.customer.order.new-order.payment-details');
                    })->name('home.customer.order.new-order.step-2.details');

                    Route::get('/order-confirmation', function () {
                        return view('home.customer.order.new-order.order-confirmation');
                    })->name('home.customer.order.new-order.order-confirmation');
                });
            });
        });
    });
});

//route for role home-chef
Route::group(['middleware' => ['auth', 'role:home-chef']], function () {
    Route::prefix('/home')->group(function () {
        Route::prefix('/home-chef')->group(function () {
            Route::get('/competition', function () {
                return view('home.home-chef.competition');
            })->name('home.home-chef.competition');

            Route::get('/help-me', 'Chef\HelpController@index')->name('home.home-chef.help-me');
            Route::post('/help-me', 'Chef\HelpController@store')->name('home.home-chef.help-me.post');

            Route::get('/', 'DishController@dishLeaderboardHomeChef')->name('home.home-chef.leaderboard');

            Route::get('/dish-list', 'DishController@dishListHomeChef')->name('home.home-chef.dish-list');

            Route::post('/user/change-photo', 'UserController@storePhoto')->name('home.home-chef.change.photo.post');

            Route::get('/stages', function () {
                return view('home.home-chef.stages');
            })->name('home.home-chef.stages');

            Route::get('/chef-award', function () {
                return view('home.home-chef.chef-award');
            })->name('home.home-chef.chef-award');

            Route::get('/critique-evaluation', function () {
                return view('home.home-chef.critique-evaluation');
            })->name('home.home-chef.critique-evaluation');

            Route::prefix('/competition')->group(function () {
                Route::prefix('/dish')->group(function () {
                    Route::get('/', function () {
                        return view('home.home-chef.competition.dish');
                    })->name('home.home-chef.competition.dish');
                    Route::get('/add', function () {
                        return view('home.home-chef.competition.new-dish');
                    })->name('home.home-chef.competition.new-dish');
                    Route::get('/list', 'DishController@dishListHomeChef')->name('home.home-chef.competition.dish-list');
                    Route::get('/video', function () {
                        return view('home.home-chef.competition.dish-video');
                    })->name('home.home-chef.competition.dish-video');
                });
            });

            Route::prefix('dish')->group(function () {
                Route::get('/{id}/comment', 'DishCommentController@index')->name('home.home-chef.dish.comment');

                Route::prefix('/new-dish')->group(function () {
                    Route::get('/', 'DishController@showFormCreateDishMain')->name('home.home-chef.dish.new-dish.step-1');
                    Route::post('/step1', 'DishController@storeMain')->name('home.home-chef.dish.new-dish.step-1.post');

                    Route::get('/step-2', 'DishController@showFormCreateIngredient')->name('home.home-chef.dish.new-dish.step-2');
                    Route::post('/step2', 'DishController@storeIngredient')->name('home.home-chef.dish.new-dish.step-2.post');

                    Route::get('/step-3', 'DishController@showFormCreateNutrition')->name('home.home-chef.dish.new-dish.step-3');
                    Route::post('/step3', 'DishController@storeNutritionAndAllDataDish')->name('home.home-chef.dish.new-dish.step-3.post');
                });
                Route::get('/{id}', 'DishController@infoDishHomeChef')->name('home.home-chef.dish.dish');

                Route::get('/{id}/details', 'DishController@detailsInfoDishHomeChef')->name('home.home-chef.dish.details');

                Route::get('/{id}/video', 'DishController@videoDishHomeChef')->name('home.home-chef.dish.video');

                Route::post('/{id}/upvote', 'DishController@upvote')->name('home.home-chef.dish.upvote');
            });
        });
    });
});

//route for role chef-manager
Route::group(['middleware' => ['auth', 'role:chef-manager']], function () {
    Route::prefix('/home')->group(function () {
        Route::prefix('/chef-manager')->group(function () {

            Route::post('/user/change-photo', 'UserController@storePhoto')->name('home.chef-manager.change.photo.post');

            Route::prefix('/notification')->group(function () {
                Route::get('/', 'NotificationsChefManagerController@index')->name('home.chef-manager.notification.list');
                Route::get('/taste-approval/{approvalDish}', 'NotificationsChefManagerController@tasteApproval')->name('home.chef-manager.notification.taste-approval');
                Route::post('/taste-approval', 'NotificationsChefManagerController@tasteApprovalDish')->name('home.chef-manager.notification.taste-approval.post');
            });
            Route::prefix('/list')->group(function () {
                Route::get('/users', 'ChefManager\UserController@getUser')->name('home.chef-manager.list.users');
                Route::delete('/users/delete', 'ChefManager\UserController@destroyUser')->name('home.chef-manager.delete.users');
                Route::get('/home-chefs', 'ChefManager\UserController@getHomeChef')->name('home.chef-manager.list.home-chefs');
                Route::post('/home-chefs/{user}/promote', 'ChefManager\UserController@promote')->name('home.chef-manager.list.home-chefs.promote');
            });
            Route::get('/customer-support', 'ChefManager\SupportController@index')->name('home.chef-manager.customer-support');

            Route::get('/support-details/{help}', 'ChefManager\SupportController@show')->name('home.chef-manager.support-details');
        });
    });
});

