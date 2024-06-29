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
            'under_name' => '太郎',
            'over_name_kana' => 'タナカ',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'tt@mail.com',
            'sex' => '1',
            'birth_day' => '2000-01-01',
            'role' => '1',
            'password' => 'password'],
        ]);

    }
}
