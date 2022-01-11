<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(10)->create();

        // Schema::table('role_user', function(Blueprint $table) {
        //     $table->dropForeign('role_user_role_id_foreign');
        //     $table->dropForeign('role_user_user_id_foreign');
        // });

        // User::truncate();
        // User::factory()->times(10)->create();
    }
}
