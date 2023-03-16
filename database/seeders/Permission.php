<?php
namespace Database\Seeders;

use App\Models\Permission as ModelsPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission=ModelsPermission::factory()->has(Role::factory()->count(2))->has(User::factory()->count(1))->count(4)->create();
    }
}
