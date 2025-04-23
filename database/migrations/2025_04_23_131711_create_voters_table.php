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
        DB::beginTransaction();

        try {
            Schema::create('voters', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('first_name');
                $table->string('last_name');
                $table->date('dob');
                $table->string('mobile');
                $table->string('email')->unique();
                $table->text('address');
                $table->string('taluk');
                $table->string('district');
                $table->string('state');
                $table->timestamps();
                $table->softDeletes();
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; 
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
