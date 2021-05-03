<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkColsInFooterData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footer_data', function (Blueprint $table) {
            $table->string('contact_us_link')->nullable()->after('image_five_link');
            $table->string('terms_of_use_link')->nullable()->after('contact_us_link');
            $table->string('privacy_policy_link')->nullable()->after('terms_of_use_link');
            $table->string('order_link')->nullable()->after('privacy_policy_link');
            $table->string('shipping_link')->nullable()->after('order_link');
            $table->string('who_we_are_link')->nullable()->after('shipping_link');
            $table->string('product_faqs_link')->nullable()->after('who_we_are_link');
            $table->string('science_link')->nullable()->after('product_faqs_link');
            $table->string('quality_link')->nullable()->after('science_link');
            $table->string('buddy_club_link')->nullable()->after('quality_link');
            $table->string('subscribe_link')->nullable()->after('buddy_club_link');
            $table->string('affiliate_link')->nullable()->after('subscribe_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footer_data', function (Blueprint $table) {
            $table->dropColumn('contact_us_link');
            $table->dropColumn('terms_of_use_link');
            $table->dropColumn('privacy_policy_link');
            $table->dropColumn('order_link');
            $table->dropColumn('shipping_link');
            $table->dropColumn('who_we_are_link');
            $table->dropColumn('product_faqs_link');
            $table->dropColumn('science_link');
            $table->dropColumn('quality_link');
            $table->dropColumn('buddy_club_link');
            $table->dropColumn('subscribe_link');
            $table->dropColumn('affiliate_link');
        });
    }
}
