<?php

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
Route::group([
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
	Route::get('/get-city-by-region', 'HomeController@getCitiesByRegion')->name('getCitiesByRegion');

	Route::get('/', 'HomeController@index')->name('home');
    Route::get('/videoLessons', 'HomeController@videoLessons')->name('videoLessons');
    Route::get('/vacancies', 'HomeController@vacancies')->name('vacancies');
    Route::get('/search', 'HomeController@search')->name('search');
	Route::get('/oneid', 'HomeController@oneid')->name('oneid');
    Route::get('search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/svod', 'ResourceController@svod');
	// Registration Routes...
	// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	// Route::post('register', 'Auth\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

	// Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/abkm/create', 'ABKMController@create')->name('abkm.create');
	Route::post('/abkm/store', 'ABKMController@store')->name('abkm.store');
	Route::get('/abkm/isDisabled/{pin}', 'ABKMController@isDisabledPerson')->name('abkm.isDisabledPerson');
	Route::get('/getCities', 'ABKMController@getCities')->name('getCities');
	Route::get('/news', 'NewsController@index')->name('news');
	Route::get('/news/{name}', 'NewsController@show')->name('news.show');
	Route::get('/pages/{name}', 'PagesController@show')->name('pages.show');
	// For Mobile
	Route::get('/pages-mobile/{name}', 'PagesController@showMobile')->name('pages.show.mobile');
	Route::get('/documents-mobile/{name}', 'DocumentsController@showMobile')->name('documents.show.mobile');
	Route::get('/services-mobile/{name}', 'ServicesController@showMobile')->name('services.show.mobile');
	Route::get('/news-mobile/{name}', 'NewsController@showMobile')->name('news.show.mobile');
	// migrant
	Route::get('/migrant/create', 'MigrantController@create')->name('migrant.create');
	Route::post('/migrant/store', 'MigrantController@store')->name('migrant.store');
	// anceta
	Route::get('/anceta/create', 'AncetaController@create')->name('anceta.create');
	Route::post('/anceta/store', 'AncetaController@store')->name('anceta.store');

	Route::get('/news-categories', 'NewsController@categories')->name('news.categories');
	Route::get('/news-list', 'NewsController@list')->name('news.list');

	Route::get('/category/{name}', 'CategoriesController@show')->name('categories.show');
	Route::get('/article/{name}', 'ArticlesController@show')->name('articles.show');
	Route::get('/blog/{name}', 'BlogsController@show')->name('blogs.show');

	Route::get('/employees-categories/{name}', 'EmployeesCategoriesController@show')->name('employee-categories.show');
	Route::get('/employees', 'EmployeesController@index')->name('employees.index');
	Route::get('/employees/{name}', 'EmployeesController@show')->name('employees.show');
	Route::get('/employees/functions/{name}', 'EmployeesController@functions')->name('employees.functions');

	Route::get('/central-apparatus', 'CentralApparatusController@index')->name('central-apparatus.index');
	Route::get('/central-apparatus/position/{id}', 'CentralApparatusController@position')->name('central-apparatus.position');
	Route::get('/central-apparatus/duties/{id}', 'CentralApparatusController@duties')->name('central-apparatus.duties');

	Route::get('/territorial-divisions', 'TerritorialDivisionsController@index')->name('territorial-divisions.index');
	Route::get('/territorial-divisions/structure/{id}', 'TerritorialDivisionsController@structure')->name('territorial-divisions.structure');
	Route::get('/territorial-divisions/position/{id}', 'TerritorialDivisionsController@position')->name('territorial-divisions.position');

	Route::get('/subordinate-organizations', 'SubordinateOrganizationsController@index')->name('subordinate-organizations.index');
	Route::get('/subordinate-organizations/structure/{id}', 'SubordinateOrganizationsController@structure')->name('subordinate-organizations.structure');
	Route::get('/subordinate-organizations/position/{id}', 'SubordinateOrganizationsController@position')->name('subordinate-organizations.position');

	Route::get('/documents/{name}', 'DocumentsController@show')->name('documents.show');
	Route::get('/services/{name}', 'ServicesController@show')->name('services.show');
	Route::get('/professional-standarts', 'ProfessionalStandardsController@index')->name('professional-standarts.index');
	Route::get('/professional-standarts/{id}', 'ProfessionalStandardsController@show')->name('standarts.show');
	Route::post('/professional-standarts/{id}', 'ProfessionalStandardsController@uploadFile')->name('standarts.upload');

	Route::get('/attestations', 'AttestationsController@index')->name('attestations.index');

    //  start Statistics about regions
    Route::get('/regions', 'RegionController@index')->name('regions.index');
    //  end Statistics about regions
    Route::resource('/followers', 'FollowerController');


	Route::get('/feedback', 'FeedbackController@display')->name('feedback');
	Route::post('/feedback/submit', 'FeedbackController@submit')->name('feedback.submit');
	Route::get('/corruption-prevention', 'CorruptionPreventionController@display')->name('corruption-prevention');
	Route::post('/corruption-prevention/submit', 'CorruptionPreventionController@submit')->name('corruption-prevention.submit');

	Route::post('/send-text-error', 'HomeController@sendTextError')->name('sendTextError');

	Route::post('/speech', 'SpeechController@speech')->name('speech');

	Route::get('/signals', 'SignalsFormController@display')->name('signals');
	Route::post('/signals/submit', 'SignalsFormController@submit')->name('signals.submit');

	Route::get('/blogs', 'BlogsController@index')->name('blogs');
	Route::get('/blogs-list', 'BlogsController@list')->name('blogs.list');

	Route::get('/rester', function () {
	    $regions = \App\Region::pluck('name_uz', 'soato');
	    $cities = \App\City::pluck('name_uz', 'soato');
	    return view('reesterReTaughtCitizens', ['regions' => $regions, 'cities' => $cities]);
    });

    Route::get('showStatisticsByRegions/{id}', 'StatisticController@showStatisticsByRegions')->name('showStatisticsByRegions');

    Route::get('/open-data-info/{slug}', 'ResourceController@openData')->name('open.data');
    Route::get('/salary', 'ResourceController@salary')->name('salary');
    //For mobile
    Route::get('/salary-mobile', 'ResourceController@salaryMobile')->name('salary.mobile');

    Route::group([ 'prefix' => 'admin', 'middleware' => ['auth','change-lang:ru'] ], function () {
		Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
		Route::resource('/newsgroups', 'Admin\NewsGroupsController', ['as' => 'admin']);
		Route::delete('/newsgroups/destroy-translate/{id}', 'Admin\NewsGroupsController@destroyTranslate')->name('admin.newsgroups.destroyTranslate');
		Route::resource('/news', 'Admin\NewsController', ['as' => 'admin']);
		Route::delete('/news/destroy-translate/{id}', 'Admin\NewsController@destroyTranslate')->name('admin.news.destroyTranslate');
		Route::resource('/menu', 'Admin\MenuController', ['as' => 'admin']);
		Route::delete('/menu/destroy-translate/{id}', 'Admin\MenuController@destroyTranslate')->name('admin.menu.destroyTranslate');
		Route::resource('/menu-items', 'Admin\MenuItemsController', ['as' => 'admin']);
		Route::delete('/menu-items/destroy-translate/{id}', 'Admin\MenuItemsController@destroyTranslate')->name('admin.menu-items.destroyTranslate');
		Route::resource('/sliders', 'Admin\SlidersController', ['as' => 'admin']);
		Route::delete('/sliders/destroy-translate/{id}', 'Admin\SlidersController@destroyTranslate')->name('admin.sliders.destroyTranslate');
		Route::resource('/slider-items', 'Admin\SliderItemsController', ['as' => 'admin']);
		Route::delete('/slider-items/destroy-translate/{id}', 'Admin\SliderItemsController@destroyTranslate')->name('admin.slider-items.destroyTranslate');
		Route::resource('/services-categories', 'Admin\ServicesCategoriesController', ['as' => 'admin']);
		Route::delete('/services-categories/destroy-translate/{id}', 'Admin\ServicesCategoriesController@destroyTranslate')->name('admin.services-categories.destroyTranslate');
		Route::resource('/services', 'Admin\ServicesController', ['as' => 'admin']);
		Route::delete('/services/destroy-translate/{id}', 'Admin\ServicesController@destroyTranslate')->name('admin.services.destroyTranslate');
		Route::resource('/pages', 'Admin\PagesController', ['as' => 'admin']);
		Route::resource('/dictionary', 'Admin\DictionaryController', ['as' => 'admin']);
		Route::delete('/pages/destroy-translate/{id}', 'Admin\PagesController@destroyTranslate')->name('admin.pages.destroyTranslate');
		Route::resource('/text-blocks', 'Admin\TextBlocksController', ['as' => 'admin']);
		Route::delete('/text-blocks/destroy-translate/{id}', 'Admin\TextBlocksController@destroyTranslate')->name('admin.text-blocks.destroyTranslate');
		Route::resource('/options', 'Admin\OptionsController', ['as' => 'admin']);
		Route::delete('/options/destroy-translate/{id}', 'Admin\OptionsController@destroyTranslate')->name('admin.options.destroyTranslate');
		Route::resource('/employee-categories', 'Admin\EmployeeCategoriesController', ['as' => 'admin']);
		Route::delete('/employee-categories/destroy-translate/{id}', 'Admin\EmployeeCategoriesController@destroyTranslate')->name('admin.employee-categories.destroyTranslate');
		Route::resource('/employees', 'Admin\EmployeesController', ['as' => 'admin']);
		Route::delete('/employees/destroy-translate/{id}', 'Admin\EmployeesController@destroyTranslate')->name('admin.employees.destroyTranslate');
		Route::post('/employees/select-menu', 'Admin\EmployeesController@select_menu')->name('admin.employees.select-menu');
		Route::resource('/document-categories', 'Admin\DocumentCategoriesController', ['as' => 'admin']);
		Route::delete('/document-categories/destroy-translate/{id}', 'Admin\DocumentCategoriesController@destroyTranslate')->name('admin.document-categories.destroyTranslate');
		Route::resource('/documents', 'Admin\DocumentsController', ['as' => 'admin']);
		Route::delete('/documents/destroy-translate/{id}', 'Admin\DocumentsController@destroyTranslate')->name('admin.documents.destroyTranslate');
		Route::resource('/categories', 'Admin\CategoriesController', ['as' => 'admin']);
		Route::delete('/categories/destroy-translate/{id}', 'Admin\CategoriesController@destroyTranslate')->name('admin.categories.destroyTranslate');
		Route::resource('/articles', 'Admin\ArticlesController', ['as' => 'admin']);
		Route::delete('/articles/destroy-translate/{id}', 'Admin\ArticlesController@destroyTranslate')->name('admin.articles.destroyTranslate');
        Route::resource('/blogs', 'Admin\BlogsController', ['as' => 'admin']);
        Route::delete('/blogs/destroy-translate/{id}', 'Admin\BlogsController@destroyTranslate')->name('admin.blogs.destroyTranslate');

		Route::resource('/central-apparatus', 'Admin\CentralApparatusController', ['as' => 'admin']);
		Route::delete('/central-apparatus/destroy-translate/{id}', 'Admin\CentralApparatusController@destroyTranslate')->name('admin.central-apparatus.destroyTranslate');
		Route::post('/central-apparatus/select-menu', 'Admin\CentralApparatusController@select_menu')->name('admin.central-apparatus.select-menu');

		Route::resource('/territorial-divisions', 'Admin\TerritorialDivisionsController', ['as' => 'admin']);
		Route::delete('/territorial-divisions/destroy-translate/{id}', 'Admin\TerritorialDivisionsController@destroyTranslate')->name('admin.territorial-divisions.destroyTranslate');
		Route::post('/territorial-divisions/select-menu', 'Admin\TerritorialDivisionsController@select_menu')->name('admin.territorial-divisions.select-menu');

//		start regions

        Route::resource('/regions', 'Admin\RegionController', ['as' => 'admin']);
        Route::delete('/regions/destroy-translate/{id}', 'Admin\RegionController@destroyTranslate')->name('admin.regions.destroyTranslate');
        Route::post('/regions/select-menu', 'Admin\RegionController@select_menu')->name('admin.regions.select-menu');

//      end regions

		Route::resource('/subordinate-organizations', 'Admin\SubordinateOrganizationsController', ['as' => 'admin']);
		Route::delete('/subordinate-organizations/destroy-translate/{id}', 'Admin\SubordinateOrganizationsController@destroyTranslate')->name('admin.subordinate-organizations.destroyTranslate');
		Route::post('/subordinate-organizations/select-menu', 'Admin\SubordinateOrganizationsController@select_menu')->name('admin.subordinate-organizations.select-menu');

		Route::get('/forms/feedback', 'Admin\FeedbackController@display')->name('admin.feedback');
		Route::post('/forms/feedback', 'Admin\FeedbackController@submit')->name('admin.feedback.submit');
		Route::get('/forms/corruption-prevention', 'Admin\CorruptionPreventionController@display')->name('admin.corruption-prevention');
		Route::post('/forms/corruption-prevention', 'Admin\CorruptionPreventionController@submit')->name('admin.corruption-prevention.submit');


		Route::resource('/attestations', 'Admin\AttestationsController', ['as' => 'admin']);



		Route::resource('/professional-standarts', 'Admin\ProfessionalStandardsController', ['as' => 'admin']);
		Route::post('/professional-standarts/file-upload/{id}', 'Admin\ProfessionalStandardsController@fileUpload')->name('admin.professional-standarts.file-upload');
		Route::delete('/professional-standarts/file-delete/{id}', 'Admin\ProfessionalStandardsController@deleteFile')->name('admin.professional-standarts.file-delete');
		Route::resource('/professional-standarts-uz', 'Admin\ProfessionalStandardsUzController', ['as' => 'admin']);
		Route::post('/professional-standarts-uz/file-upload/{id}', 'Admin\ProfessionalStandardsUzController@fileUpload')->name('admin.professional-standarts-uz.file-upload');
		Route::delete('/professional-standarts-uz/file-delete/{id}', 'Admin\ProfessionalStandardsUzController@deleteFile')->name('admin.professional-standarts-uz.file-delete');

		Route::middleware(['role:admin'])->group(function () {
			Route::resource('/users', 'Admin\UsersController', ['as' => 'admin']);
			Route::resource('/roles', 'Admin\RolesController', ['as' => 'admin']);
		});

		Route::get('/signals', 'Admin\SignalsController@index')->name('admin.signals');

        Route::resource('statistics', 'StatisticController');
        Route::get('regions_statistics', 'StatisticController@regionStatistics')->name('regions_statistics');
        Route::post('regions_statistics', 'StatisticController@storeRegionStatistics')->name('store_regions_statistics');
        Route::post('destroyRegionStatistics', 'StatisticController@destroyRegionStatistics')->name('destroyRegionStatistics');
        Route::get('create_regions_statistics', 'StatisticController@createRegionStatistics')->name('create_regions_statistics');
        Route::get('editRegionStatistics/{id}', 'StatisticController@editRegionStatistics')->name('editRegionStatistics');
    });
});
