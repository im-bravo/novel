<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableNovelAndChapter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('novel', function (Blueprint $table) {
            $table->string('source')->after('is_over')->default('');
        });

        Schema::table('novel', function(Blueprint $table) {
            $table->renameColumn('biquge_url', 'source_link');
        });

        Schema::table('chapter', function(Blueprint $table) {
            $table->renameColumn('biquge_url', 'source_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
