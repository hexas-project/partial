<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    /**
     * SURAKKHA: test kokhono asol MySQL database e cholte parbe na.
     *
     * phpunit.xml e `DB_CONNECTION=sqlite` deoa ache, kintu `php artisan config:cache`
     * chalano thakle Laravel cached config-i pore ar env upekkha kore — tokhon test
     * gula sqlite er bodle MySQL e chole jay, ar RefreshDatabase sob table drop kore
     * dey. Ekbar ei bhabe local database muche gechilo.
     *
     * Tai protita test er age connection ta jachai kora hoy. sqlite chara onno kichu
     * hole test sathe sathe theme jabe — database e hat porar AGEI.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $driver = DB::connection()->getDriverName();

        if ($driver !== 'sqlite') {
            $database = config('database.connections.' . config('database.default') . '.database');

            throw new RuntimeException(
                "THAMANO HOLO: test '{$driver}' connection e cholchilo (database: {$database}), sqlite e noy.\n" .
                "Prai nishchit karon — config cache. Ei command ta chalie abar try korun:\n\n" .
                "    php artisan config:clear\n\n" .
                "(config:cache thakle phpunit.xml er DB_CONNECTION=sqlite kaj kore na, ar\n" .
                " RefreshDatabase asol database er sob table drop kore dey.)"
            );
        }
    }
}
