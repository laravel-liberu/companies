<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique()->index();

            $table->string('reg_com_nr')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();

            $table->string('bank')->nullable();
            $table->string('bank_account')->nullable();

            $table->text('notes')->nullable();

            $table->boolean('pays_vat')->nullable();
            $table->tinyInteger('status');
            $table->boolean('is_tenant')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->index()->name('comments_created_by_foreign');

            $table->foreignId('updated_by')->nullable()->constrained('users')->index()->name('comments_updated_by_foreign');

            $table->timestamps();

            $table->unique('reg_com_nr');
            $table->unique('fiscal_code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
