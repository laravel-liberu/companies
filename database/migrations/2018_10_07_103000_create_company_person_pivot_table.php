<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_person', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained('companies')->index()->name('company_person_company_id_foreign');
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('person_id')->constrained('people')->index()->name('company_person_person_id_foreign');
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('position')->nullable();

            $table->boolean('is_main');
            $table->boolean('is_mandatary');

            $table->primary(['company_id', 'person_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_person');
    }
};
