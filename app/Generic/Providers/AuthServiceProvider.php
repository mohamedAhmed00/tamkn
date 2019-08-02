<?php

namespace App\Generic\Providers;

use App\Modules\Answer\Model\Answer;
use App\Modules\Answer\Policy\AnswerPolicy;
use App\Modules\Category\Model\Category;
use App\Modules\Category\Policy\CategoryPolicy;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Policy\CoursePolicy;
use App\Modules\Document\Model\Document;
use App\Modules\Document\Policy\DocumentPolicy;
use App\Modules\Lesson\Model\Lesson;
use App\Modules\Lesson\Policy\LessonPolicy;
use App\Modules\News\Model\News;
use App\Modules\News\Policy\NewsPolicy;
use App\Modules\Page\Model\Page;
use App\Modules\Page\Policy\PagePolicy;
use App\Modules\Part\Model\Part;
use App\Modules\Part\Policy\PartPolicy;
use App\Modules\Question\Model\Question;
use App\Modules\Question\Policy\QuestionPolicy;
use App\Modules\Slider\Model\Slider;
use App\Modules\Slider\Policy\SliderPolicy;
use App\Modules\SliderItem\Model\SliderItem;
use App\Modules\SliderItem\Policy\SliderItemPolicy;
use App\Modules\Student\Model\Student;
use App\Modules\Student\Policy\StudentPolicy;
use App\Modules\RolePermission\Model\RolePermission;
use App\Modules\RolePermission\Policy\RolePermissionPolicy;
use App\Modules\Setting\Model\Setting;
use App\Modules\Setting\Policy\SettingPolicy;
use App\Modules\Test\Model\Test;
use App\Modules\Test\Policy\TestPolicy;
use App\Modules\User\Model\User;
use App\Modules\User\Policy\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
        Student::class => StudentPolicy::class,
        RolePermission::class => RolePermissionPolicy::class,
        Setting::class => SettingPolicy::class,
        User::class => UserPolicy::class,
        Course::class => CoursePolicy::class,
        Part::class => PartPolicy::class,
        Lesson::class => LessonPolicy::class,
        Document::class => DocumentPolicy::class,
        Test::class => TestPolicy::class,
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,
        News::class => NewsPolicy::class,
        Page::class => PagePolicy::class,
        Slider::class => SliderPolicy::class,
        SliderItem::class => SliderItemPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
