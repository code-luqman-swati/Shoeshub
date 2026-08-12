
<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Store Information
            $table->string('site_name',100);
            $table->string('site_logo',100)->nullable();
            $table->text('footer_description')->nullable();

            // Contact
            $table->string('address',255)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',100)->nullable();

            // Social Links
            $table->string('facebook',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('linkedin',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->string('youtube',100)->nullable();

            // Developer
            $table->string('developer_name',100)->nullable();
            $table->string('developer_title',100)->nullable();
            $table->string('developer_email',100)->nullable();
            $table->string('developer_github',100)->nullable();
            $table->string('developer_linkedin',100)->nullable();
            $table->string('developer_portfolio',255)->nullable();

            // Footer
            $table->text('copyright')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};