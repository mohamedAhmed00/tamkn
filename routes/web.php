<?php

Route::get('/', function (){ return view('welcome'); })->name('public');
Route::get('/login', 'App\Modules\Credential\Controller\Credential@getFormLogin')->name('login');

Route::post('/auth/login', 'App\Modules\Credential\Controller\Credential@login')->name('auth.login');
Route::get('/auth/home', 'App\Modules\Credential\Controller\Credential@home')->middleware('auth')->name('auth.home');
Route::get('/auth/logout', 'App\Modules\Credential\Controller\Credential@logout')->middleware('auth')->name('auth.logout');

Route::group(['namespace' => 'App\Modules\Category\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/category'], function () {
    Route::get('', 'Category@index')->name('auth.category.index')->middleware('can:view,App\Modules\Category\Model\Category');
    Route::get('create', 'Category@create')->name('auth.category.create')->middleware('can:create,App\Modules\Category\Model\Category');
    Route::post('store', 'Category@store')->name('auth.category.store')->middleware('can:create,App\Modules\Category\Model\Category');
    Route::get('{id}/edit', 'Category@edit')->name('auth.category.edit')->middleware('can:update,App\Modules\Category\Model\Category');
    Route::post('update/{id}', 'Category@update')->name('auth.category.update')->middleware('can:update,App\Modules\Category\Model\Category');
    Route::get('delete/{id}', 'Category@delete')->name('auth.category.delete')->middleware('can:delete,App\Modules\Category\Model\Category');
});


Route::group(['namespace' => 'App\Modules\User\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/user'], function () {
    Route::get('', 'User@index')->name('auth.user.index')->middleware('can:view,App\Modules\User\Model\User');
    Route::get('/profile', 'User@profile')->name('auth.user.profile');
    Route::get('create', 'User@create')->name('auth.user.create')->middleware('can:create,App\Modules\User\Model\User');
    Route::post('store', 'User@store')->name('auth.user.store')->middleware('can:create,App\Modules\User\Model\User');
    Route::get('{id}/edit', 'User@edit')->name('auth.user.edit')->middleware('can:update,App\Modules\User\Model\User');
    Route::post('update/{id}', 'User@update')->name('auth.user.update')->middleware('can:update,App\Modules\User\Model\User');
    Route::post('profile', 'User@updateProfile')->name('auth.user.profile')->middleware('can:update,App\Modules\User\Model\User');
    Route::get('delete/{id}', 'User@delete')->name('auth.user.delete')->middleware('can:delete,App\Modules\User\Model\User');
});
Route::group(['namespace' => 'App\Modules\Student\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/student'], function () {
    Route::get('', 'Student@index')->name('auth.student.index')->middleware('can:view,App\Modules\Student\Model\Student');
    Route::get('create', 'Student@create')->name('auth.student.create')->middleware('can:create,App\Modules\Student\Model\Student');
    Route::post('store', 'Student@store')->name('auth.student.store')->middleware('can:create,App\Modules\Student\Model\Student');
    Route::get('{id}/edit', 'Student@edit')->name('auth.student.edit')->middleware('can:update,App\Modules\Student\Model\Student');
    Route::post('update/{id}', 'Student@update')->name('auth.student.update')->middleware('can:update,App\Modules\Student\Model\Student');
    Route::get('delete/{id}', 'Student@delete')->name('auth.student.delete')->middleware('can:delete,App\Modules\Student\Model\Student');
});

Route::group(['namespace' => 'App\Modules\Teacher\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/teacher'], function () {
    Route::get('', 'Teacher@index')->name('auth.teacher.index');
    Route::get('create', 'Teacher@create')->name('auth.teacher.create');
    Route::post('store', 'Teacher@store')->name('auth.teacher.store');
    Route::get('{id}/edit', 'Teacher@edit')->name('auth.teacher.edit');
    Route::post('update/{id}', 'Teacher@update')->name('auth.teacher.update');
    Route::get('delete/{id}', 'Teacher@delete')->name('auth.teacher.delete');
});

Route::group(['namespace' => 'App\Modules\Course\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/course'], function () {
    Route::get('', 'Course@index')->name('auth.course.index')->middleware('can:view,App\Modules\Course\Model\Course');
    Route::get('create', 'Course@create')->name('auth.course.create')->middleware('can:create,App\Modules\Course\Model\Course');
    Route::post('store', 'Course@store')->name('auth.course.store')->middleware('can:create,App\Modules\Course\Model\Course');
    Route::get('{id}/edit', 'Course@edit')->name('auth.course.edit')->middleware('can:update,App\Modules\Course\Model\Course');
    Route::post('update/{id}', 'Course@update')->name('auth.course.update')->middleware('can:update,App\Modules\Course\Model\Course');
    Route::get('delete/{id}', 'Course@delete')->name('auth.course.delete')->middleware('can:delete,App\Modules\Course\Model\Course');
});

Route::group(['namespace' => 'App\Modules\Part\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/part'], function () {
    Route::get('/{course_id}', 'Part@index')->name('auth.course.part.index')->middleware('can:view,App\Modules\Part\Model\Part');
    Route::get('create/{course_id}', 'Part@create')->name('auth.course.part.create')->middleware('can:create,App\Modules\Part\Model\Part');
    Route::post('store/{course_id}', 'Part@store')->name('auth.course.part.store')->middleware('can:create,App\Modules\Part\Model\Part');
    Route::get('{id}/edit/{course_id}', 'Part@edit')->name('auth.course.part.edit')->middleware('can:update,App\Modules\Part\Model\Part');
    Route::post('update/{id}/{course_id}', 'Part@update')->name('auth.course.part.update')->middleware('can:update,App\Modules\Part\Model\Part');
    Route::get('delete/{id}/{course_id}', 'Part@delete')->name('auth.course.part.delete')->middleware('can:delete,App\Modules\Part\Model\Part');
});

Route::group(['namespace' => 'App\Modules\Lesson\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/lesson'], function () {
    Route::get('/{part_id}', 'Lesson@index')->name('auth.part.lesson.index')->middleware('can:view,App\Modules\Lesson\Model\Lesson');
    Route::get('create/{part_id}', 'Lesson@create')->name('auth.part.lesson.create')->middleware('can:create,App\Modules\Lesson\Model\Lesson');
    Route::post('store/{part_id}', 'Lesson@store')->name('auth.part.lesson.store')->middleware('can:create,App\Modules\Lesson\Model\Lesson');
    Route::get('{id}/edit/{part_id}', 'Lesson@edit')->name('auth.part.lesson.edit')->middleware('can:update,App\Modules\Lesson\Model\Lesson');
    Route::post('update/{id}/{part_id}', 'Lesson@update')->name('auth.part.lesson.update')->middleware('can:update,App\Modules\Lesson\Model\Lesson');
    Route::get('delete/{id}/{part_id}', 'Lesson@delete')->name('auth.part.lesson.delete')->middleware('can:delete,App\Modules\Lesson\Model\Lesson');
});

Route::group(['namespace' => 'App\Modules\Document\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/Document'], function () {
    Route::get('/{lesson_id}', 'Document@index')->name('auth.lesson.document.index')->middleware('can:view,App\Modules\Document\Model\Document');
    Route::get('create/{lesson_id}', 'Document@create')->name('auth.lesson.document.create')->middleware('can:create,App\Modules\Document\Model\Document');
    Route::post('store/{lesson_id}', 'Document@store')->name('auth.lesson.document.store')->middleware('can:create,App\Modules\Document\Model\Document');
    Route::get('{id}/edit/{lesson_id}', 'Document@edit')->name('auth.lesson.document.edit')->middleware('can:update,App\Modules\Document\Model\Document');
    Route::post('update/{id}/{lesson_id}', 'Document@update')->name('auth.lesson.document.update')->middleware('can:update,App\Modules\Document\Model\Document');
    Route::get('delete/{id}/{lesson_id}', 'Document@delete')->name('auth.lesson.document.delete')->middleware('can:delete,App\Modules\Document\Model\Document');
});


Route::group(['namespace' => 'App\Modules\Test\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/test'], function () {
    Route::get('/{part_id}', 'Test@index')->name('auth.part.test.index')->middleware('can:view,App\Modules\Test\Model\Test');
    Route::get('create/{part_id}', 'Test@create')->name('auth.part.test.create')->middleware('can:create,App\Modules\Test\Model\Test');
    Route::post('store/{part_id}', 'Test@store')->name('auth.part.test.store')->middleware('can:create,App\Modules\Test\Model\Test');
    Route::get('{id}/edit/{part_id}', 'Test@edit')->name('auth.part.test.edit')->middleware('can:update,App\Modules\Test\Model\Test');
    Route::post('update/{id}/{part_id}', 'Test@update')->name('auth.part.test.update')->middleware('can:update,App\Modules\Test\Model\Test');
    Route::get('delete/{id}/{part_id}', 'Test@delete')->name('auth.part.test.delete')->middleware('can:delete,App\Modules\Test\Model\Test');
});

Route::group(['namespace' => 'App\Modules\Question\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/question'], function () {
    Route::get('/{test_id}', 'Question@index')->name('auth.test.question.index')->middleware('can:view,App\Modules\Question\Model\Question');
    Route::get('create/{test_id}', 'Question@create')->name('auth.test.question.create')->middleware('can:create,App\Modules\Question\Model\Question');
    Route::post('store/{test_id}', 'Question@store')->name('auth.test.question.store')->middleware('can:create,App\Modules\Question\Model\Question');
    Route::get('{id}/edit/{test_id}', 'Question@edit')->name('auth.test.question.edit')->middleware('can:update,App\Modules\Question\Model\Question');
    Route::post('update/{id}/{test_id}', 'Question@update')->name('auth.test.question.update')->middleware('can:update,App\Modules\Question\Model\Question');
    Route::get('delete/{id}/{test_id}', 'Question@delete')->name('auth.test.question.delete')->middleware('can:delete,App\Modules\Question\Model\Question');
});

Route::group(['namespace' => 'App\Modules\Answer\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/answer'], function () {
    Route::get('/{test_id}', 'Answer@index')->name('auth.question.answer.index')->middleware('can:view,App\Modules\Answer\Model\Answer');
    Route::get('create/{question_id}', 'Answer@create')->name('auth.question.answer.create')->middleware('can:create,App\Modules\Answer\Model\Answer');
    Route::post('store/{question_id}', 'Answer@store')->name('auth.question.answer.store')->middleware('can:create,App\Modules\Answer\Model\Answer');
    Route::get('{id}/edit/{question_id}', 'Answer@edit')->name('auth.question.answer.edit')->middleware('can:update,App\Modules\Answer\Model\Answer');
    Route::post('update/{id}/{question_id}', 'Answer@update')->name('auth.question.answer.update')->middleware('can:update,App\Modules\Answer\Model\Answer');
    Route::get('delete/{id}/{question_id}', 'Answer@delete')->name('auth.question.answer.delete')->middleware('can:delete,App\Modules\Answer\Model\Answer');
});

Route::group(['namespace' => 'App\Modules\Setting\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/setting'], function () {
    Route::get('', 'Setting@index')->name('auth.setting.index')->middleware('can:view,App\Modules\Setting\Model\Setting');
    Route::get('create', 'Setting@create')->name('auth.setting.create')->middleware('can:create,App\Modules\Setting\Model\Setting');
    Route::post('store', 'Setting@store')->name('auth.setting.store')->middleware('can:create,App\Modules\Setting\Model\Setting');
    Route::get('{id}/edit', 'Setting@edit')->name('auth.setting.edit')->middleware('can:update,App\Modules\Setting\Model\Setting');
    Route::post('update/{id}', 'Setting@update')->name('auth.setting.update')->middleware('can:update,App\Modules\Setting\Model\Setting');
    Route::get('delete/{id}', 'Setting@delete')->name('auth.setting.delete')->middleware('can:delete,App\Modules\Setting\Model\Setting');
});

Route::group(['namespace' => 'App\Modules\Role\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/role'], function () {
    Route::get('', 'Role@index')->name('auth.role.index');
    Route::get('create', 'Role@create')->name('auth.role.create');
    Route::post('store', 'Role@store')->name('auth.role.store');
    Route::get('{id}/edit', 'Role@edit')->name('auth.role.edit');
    Route::post('update/{id}', 'Role@update')->name('auth.role.update');
    Route::get('delete/{id}', 'Role@delete')->name('auth.role.delete');
});

Route::group(['namespace' => 'App\Modules\Permission\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/permission'], function () {
    Route::get('', 'Permission@index')->name('auth.permission.index');
    Route::get('create', 'Permission@create')->name('auth.permission.create');
    Route::post('store', 'Permission@store')->name('auth.permission.store');
    Route::get('{id}/edit', 'Permission@edit')->name('auth.permission.edit');
    Route::post('update/{id}', 'Permission@update')->name('auth.permission.update');
    Route::get('delete/{id}', 'Permission@delete')->name('auth.permission.delete');
});

Route::group(['namespace' => 'App\Modules\Language\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/language'], function () {
    Route::get('', 'Language@index')->name('auth.language.index');
    Route::get('create', 'Language@create')->name('auth.language.create');
    Route::post('store', 'Language@store')->name('auth.language.store');
    Route::get('{id}/edit', 'Language@edit')->name('auth.language.edit');
    Route::post('update/{id}', 'Language@update')->name('auth.language.update');
    Route::get('delete/{id}', 'Language@delete')->name('auth.language.delete');
});

Route::group(['namespace' => 'App\Modules\RolePermission\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/role_permission'], function () {
    Route::get('', 'RolePermission@index')->name('auth.rolePermission.index');
    Route::get('{id}/edit', 'RolePermission@edit')->name('auth.rolePermission.edit');
    Route::post('update/{id}', 'RolePermission@update')->name('auth.rolePermission.update');
});

Route::group(['namespace' => 'App\Modules\News\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/news'], function () {
    Route::get('/', 'News@index')->name('auth.news.index')->middleware('can:view,App\Modules\News\Model\News');
    Route::get('create/', 'News@create')->name('auth.news.create')->middleware('can:create,App\Modules\News\Model\News');
    Route::post('store/', 'News@store')->name('auth.news.store')->middleware('can:create,App\Modules\News\Model\News');
    Route::get('{id}/edit/', 'News@edit')->name('auth.news.edit')->middleware('can:update,App\Modules\News\Model\News');
    Route::post('update/{id}/', 'News@update')->name('auth.news.update')->middleware('can:update,App\Modules\News\Model\News');
    Route::get('delete/{id}/', 'News@delete')->name('auth.news.delete')->middleware('can:delete,App\Modules\News\Model\News');
});

Route::group(['namespace' => 'App\Modules\Page\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/page'], function () {
    Route::get('/', 'Page@index')->name('auth.page.index')->middleware('can:view,App\Modules\Page\Model\Page');
    Route::get('create/', 'Page@create')->name('auth.page.create')->middleware('can:create,App\Modules\Page\Model\Page');
    Route::post('store/', 'Page@store')->name('auth.page.store')->middleware('can:create,App\Modules\Page\Model\Page');
    Route::get('{id}/edit/', 'Page@edit')->name('auth.page.edit')->middleware('can:update,App\Modules\Page\Model\Page');
    Route::post('update/{id}/', 'Page@update')->name('auth.page.update')->middleware('can:update,App\Modules\Page\Model\Page');
    Route::get('delete/{id}/', 'Page@delete')->name('auth.page.delete')->middleware('can:delete,App\Modules\Page\Model\Page');
});

Route::group(['namespace' => 'App\Modules\Slider\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/slider'], function () {
    Route::get('/', 'Slider@index')->name('auth.slider.index')->middleware('can:view,App\Modules\Slider\Model\Slider');
    Route::get('create/', 'Slider@create')->name('auth.slider.create')->middleware('can:create,App\Modules\Slider\Model\Slider');
    Route::post('store/', 'Slider@store')->name('auth.slider.store')->middleware('can:create,App\Modules\Slider\Model\Slider');
    Route::get('{id}/edit/', 'Slider@edit')->name('auth.slider.edit')->middleware('can:update,App\Modules\Slider\Model\Slider');
    Route::post('update/{id}/', 'Slider@update')->name('auth.slider.update')->middleware('can:update,App\Modules\Slider\Model\Slider');
    Route::get('delete/{id}/', 'Slider@delete')->name('auth.slider.delete')->middleware('can:delete,App\Modules\Slider\Model\Slider');
});

Route::group(['namespace' => 'App\Modules\SliderItem\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/sliderItem'], function () {
    Route::get('/{slider_id}', 'SliderItem@index')->name('auth.slider.item.index')->middleware('can:view,App\Modules\SliderItem\Model\SliderItem');
    Route::get('create/{slider_id}', 'SliderItem@create')->name('auth.slider.item.create')->middleware('can:create,App\Modules\SliderItem\Model\SliderItem');
    Route::post('store/{slider_id}', 'SliderItem@store')->name('auth.slider.item.store')->middleware('can:create,App\Modules\SliderItem\Model\SliderItem');
    Route::get('{id}/edit/{slider_id}', 'SliderItem@edit')->name('auth.slider.item.edit')->middleware('can:update,App\Modules\SliderItem\Model\SliderItem');
    Route::post('update/{id}/{slider_id}', 'SliderItem@update')->name('auth.slider.item.update')->middleware('can:update,App\Modules\SliderItem\Model\SliderItem');
    Route::get('delete/{id}/{slider_id}', 'SliderItem@delete')->name('auth.slider.item.delete')->middleware('can:delete,App\Modules\SliderItem\Model\SliderItem');
});
