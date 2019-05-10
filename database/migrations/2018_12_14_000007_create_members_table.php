<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_no')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name_kana')->nullable();
            $table->string('first_name_kana')->nullable();
            $table->integer('place_id')->nullable();
            $table->string('place_name')->nullable();
            $table->string('sex')->nullable();
            $table->date('birthday')->nullable();
            $table->date('hire_date')->nullable();
            $table->date('retirement_date')->nullable();
            $table->string('retirement_type')->nullable();
            $table->text('retirement_note')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('salary_classification')->nullable();
            $table->integer('work_days')->nullable();
            $table->boolean('is_monday')->nullable();
            $table->boolean('is_tuesday')->nullable();
            $table->boolean('is_wednesday')->nullable();
            $table->boolean('is_thursday')->nullable();
            $table->boolean('is_friday')->nullable();
            $table->boolean('is_saturday')->nullable();
            $table->boolean('is_sunday')->nullable();
            $table->integer('yearly_limit')->nullable();
            $table->integer('dayly_transportation_cost')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_type')->nullable();
            $table->integer('account_number')->nullable();
            $table->boolean('is_social_insurance')->nullable();
            $table->date('social_insurance_start')->nullable();
            $table->string('social_insurance_id')->nullable();
            $table->boolean('is_basic_pension')->nullable();
            $table->date('basic_pension_start')->nullable();
            $table->string('basic_pension_id')->nullable();
            $table->boolean('is_welfare_pension')->nullable();
            $table->date('welfare_pension_start')->nullable();
            $table->string('welfare_pension_id')->nullable();
            $table->boolean('is_employment_insurance')->nullable();
            $table->date('employment_insurance_start')->nullable();
            $table->string('employment_insurance_id')->nullable();
            $table->boolean('has_dependent')->nullable();
            $table->boolean('job_title')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
