<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Purono test data koto din rakha hobe
    |--------------------------------------------------------------------------
    |
    | Ei koy month er data rakha hobe; er cheye purono listening / reading /
    | writing attempt ar test progress row `hexas:cleanup-old-test-data`
    | command muche debe. Table chhoto thakle backup, migration ar admin er
    | result page — sob druto thake.
    |
    | ⚠️ Ei data muche gele oi somoy er result / band score / PDF ar dekha
    | jabe na. Purono result rakhte hole ei value barate hobe.
    |
    */

    'test_data_retention_months' => (int) env('TEST_DATA_RETENTION_MONTHS', 2),

    /*
    | false kore dile scheduler command ta chalabe na. Prothome `--dry-run`
    | diye koto row jabe dekhe nite chaile eta false rekhe test korben.
    */

    'cleanup_enabled' => filter_var(env('TEST_DATA_CLEANUP_ENABLED', true), FILTER_VALIDATE_BOOLEAN),

];
