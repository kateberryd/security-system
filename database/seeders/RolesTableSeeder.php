<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Http\Request;
use DB;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('roles')->insert([
      'slug' => 'superadmin',
      'name' => 'Super Admin',
      // 'description' => 'Super Admin User',
      // 'permissions' => [
      //   'user.create'   => true,
      //   'user.view'   => true,
      //   'user.update'   => true,
      //   'user.delete' => true,
      // ]
    ]);
    
    DB::table('roles')->insert([
      'slug' => 'admin',
      'name' => 'Admin',
      // 'description' => 'Admin User',
      // 'permissions' => [
      //   'user.create'   => true,
      //   'user.view'   => true,
      //   'user.update'   => true,
      //   'user.delete' => true,
      // ]
    ]);


    DB::table('roles')->insert([
      'slug' => 'user',
      'name' => 'user',
      // 'description' => 'Moderator User',
      // 'permissions' => [
      //   'user.create'   => false,
      //   'user.view'   => true,
      //   'user.update'   => false,
      //   'user.delete' => false,
      // ]
    ]);
  }
}
