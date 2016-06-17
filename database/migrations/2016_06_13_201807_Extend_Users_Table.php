<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('about_me')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('address')->nullable();
            $table->string('tel',30)->nullable();
            $table->string('mobile',30)->nullable();
            $table->string('url_1',512)->nullable();
            $table->string('url_2',512)->nullable();
            $table->string('url_3',512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['about_me','profile_pic','address','tel','mobile','url_1','url_2','url_3']);
        });
    }
}
