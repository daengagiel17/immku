<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlfileToDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->string('url_pdf_widget')->after('url_pdf');
            $table->string('url_foto_widget')->after('url_pdf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            //
        });
    }
}
