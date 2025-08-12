<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IconServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /*Blade::directive('icon', function ($expression) {
            return "<?php echo config('icons.'.$expression) ?? ''; ?>";
        });*/

        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        $blade->extend(function ($value) {
            return preg_replace_callback(
                '/@icon\s*\(\s*[\'"]([a-zA-Z0-9-]+)[\'"]\s*\)/',
                function ($matches) {
                    return config('icons.'.$matches[1]) ?? '';
                },
                $value
            );
        });
    }
}
