<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class,100)->create();
        $user=User::find(1);
        $user->name="阿升";
        $user->email="464829738@qq.com";
        $user->password=bcrypt('12345678');
        $user->is_admin=true;
        $user->save();
        $user=User::find(2);
        $user->name="阿明";
        $user->email="348180212@qq.com";
        $user->password=bcrypt('123456');
        $user->save();
    }
}
