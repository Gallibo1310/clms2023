<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Borrowing ;
use App\Models\Apparatus ;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowingdetails', function (Blueprint $table) {
            $table->id();
            $table->string('statusperitem');
            $table->foreignIdFor(Borrowing::class);
            $table->foreignIdFor(Apparatus::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowingdetails');
    }
};
