<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['over_name' => '田中',
            'under_name' => '二郎',
            'over_name_kana' => 'タナカ',
            'under_name_kana' => 'ジロウ',
            'mail_address' => 'tj@mail.com',
            'sex' => '1',
            'birth_day' => '2002-01-01',
            'role' => '2',
            'password' => bcrypt('tjpassword')],
        ]);

    }
}
