<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Василий',
                'surname' => 'Васильев',
                'patronymic' => 'Васильевич',
                'email' => 'test1@example.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Александр',
                'surname' => 'Александров',
                'patronymic' => 'Александрович',
                'email' => 'test2@example.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Алексей',
                'surname' => 'Алексеев',
                'patronymic' => 'Алексеевич',
                'email' => 'test3@example.com',
                'password' => bcrypt('12345678'),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::table('users')->whereIn('email', ['test1@example.com', 'test2@example.com', 'test3@example.com'])->delete();
    }
};
