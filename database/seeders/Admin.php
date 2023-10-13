<?php

namespace Database\Seeders;

use App\Models\Admin as ModelsAdmin;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsAdmin::create([
            'name'=>'Mahmoud Nasr',
            'username'=>'admin',
            'password'=> bcrypt('123456')
        ]);
    }
}
