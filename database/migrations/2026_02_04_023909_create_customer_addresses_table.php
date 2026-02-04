<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();

            // SESUAIKAN DENGAN users.id_user
            $table->unsignedBigInteger('user_id');

            $table->string('label', 50);
            $table->string('recipient_name', 50);
            $table->string('phone_number', 20);
            $table->text('address_detail');

            /**
             * LARAVOLT INDONESIA
             * SEMUA DISIMPAN SEBAGAI CODE (STRING)
             */
            $table->string('province_id', 10);
            $table->string('city_id', 10);
            $table->string('district_id', 10);
            $table->string('village_id', 10);

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // FK MANUAL KE users.id_user
            $table->foreign('user_id')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
