<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE 
    
        VIEW his.v_nationality_top3 AS
            SELECT 
                top_three.u_nationality AS u_nationality,
                top_three.count AS count
            FROM
                (SELECT 
                    his.u_hispatients.U_NATIONALITY AS u_nationality,
                        COUNT(his.u_hispatients.U_NATIONALITY) AS count
                FROM
                    onedoc_his_template.u_hispatients
                    where u_nationality != ''
                GROUP BY onedoc_his_template.u_hispatients.U_NATIONALITY
                ORDER BY COUNT(onedoc_his_template.u_hispatients.U_NATIONALITY) DESC
                LIMIT 3) top_three
      
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS v_nationality_top3');
    }
};
