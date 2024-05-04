<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("create view vw_ciudadLocale as
        SELECT
            c.nombre,
            p.locale
        FROM
            ciudad c
        INNER JOIN municipios m ON
            m.id = c.municipio_id
        INNER JOIN estados e ON
            e.id = m.Estado_id
        INNER JOIN pais p ON
            p.id = e.pais_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW vw_ciudadLocale');
    }
};
