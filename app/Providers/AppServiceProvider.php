<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

         Blade::directive('money', function($num){
            if($num>1000) {

                    $x = round($num);
                    $x_number_format = number_format($x);
                    $x_array = explode(',', $x_number_format);
                    $x_parts = array('k', 'm', 'b', 't');
                    $x_count_parts = count($x_array) - 1;
                    $x_display = $x;
                    $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                    $x_display .= $x_parts[$x_count_parts - 1];

                    return "<?php echo $x_display;?>";

              }

              return "<?php echo $num;?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
