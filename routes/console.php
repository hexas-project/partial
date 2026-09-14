<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/*
|--------------------------------------------------------------------------
| Purono test data cleanup
|--------------------------------------------------------------------------
|
| Protidin raat 3:30 (Dhaka) e chole — je data retention window er cheye
| purono, sudhu seta muche. Window config/hexas.php e (default 2 month).
|
| "2 month por por ekbar" na kore protidin chalano hocce icche kore: ek sathe
| koyek mash er data delete korle MySQL onek khon table lock kore rakhto ar sei
| somoy site atke jeto. Protidin chhoto kore muchle window ekii thake, kintu
| kono din boro lock hoy na.
|
| ⚠️ Server e cron na thakle eta chalu hobe na. VPS e ekbar ei line ta lagate hobe:
|     * * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
|
| Prothome ekbar dekhe nite: php artisan hexas:cleanup-old-test-data --dry-run
|
*/
Schedule::command('hexas:cleanup-old-test-data')
    ->dailyAt('03:30')
    ->timezone('Asia/Dhaka')
    ->withoutOverlapping()
    ->runInBackground();
