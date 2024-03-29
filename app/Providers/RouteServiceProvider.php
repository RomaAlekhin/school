<?php

namespace App\Providers;

use App\Models\Lesson;
use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        $this->bindModels();
    }

    private function bindModels()
    {
        Route::model('user_id', User::class);
        Route::model('lesson_id', Lesson::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapStudentRoutes();

        $this->mapTeacherRoutes();

        $this->mapMainRoutes();

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "student" routes for the student application.
     *
     * @return void
     */
    protected function mapStudentRoutes()
    {
        Route::prefix('student')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/student.php'));
    }

    /**
     * Define the "teacher" routes for the teacher application.
     *
     * @return void
     */
    protected function mapTeacherRoutes()
    {
        Route::prefix('teacher')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/teacher.php'));
    }

    /**
     * Define the "main" routes for the teacher application.
     *
     * @return void
     */
    protected function mapMainRoutes()
    {
        Route::prefix('main')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/main.php'));
    }
}
