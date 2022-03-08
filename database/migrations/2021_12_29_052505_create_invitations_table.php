<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('design_id');
            $table->integer('price_id')->default(null);
            $table->date('active')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('cover_image');
            $table->string('groom_name');
            $table->string('bride_name');
            $table->string('groom_fullname');
            $table->string('bride_fullname');
            $table->string('groom_info');
            $table->string('bride_info');
            $table->string('groom_image');
            $table->string('bride_image');
            $table->date('wedding_date');
            $table->time('wedding_time_start');
            $table->time('wedding_time_end');
            $table->string('wedding_address');
            $table->string('wedding_venue');
            $table->date('reception_date');
            $table->time('reception_time_start');
            $table->time('reception_time_end');
            $table->string('reception_address');
            $table->string('reception_venue');
            $table->text('embed_maps');
            $table->string('audio');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
