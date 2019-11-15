<?php declare(strict_types=1);

namespace PosLifestyle\TextFilter;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class FilterServiceProvider extends ServiceProvider
{
    protected const JS_FILE = __DIR__ . '/../dist/js/filter.js';

    public function boot(): void
    {
        Nova::serving(static function () {
            Nova::script('text-filter', self::JS_FILE);
        });
    }
}
