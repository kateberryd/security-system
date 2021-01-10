<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use DB;
use Sentinel;
class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $superAdminCredentials = [
      'first_name' => 'Super',
      'last_name' => 'Admin',
      // 'phone' => '1234567890',
      'email' => 'superadmin@security-system.com.ng',
      'password' => 'secret2@2!',
      'user_role' => 'superadmin',
      'slug' => 'super-admin',
    ];
    
    $superAdmin = Sentinel::registerAndActivate($superAdminCredentials, true);
    $role = Sentinel::findRoleBySlug('superadmin');
    $role->users()->attach($superAdmin);
    
    $adminCredentials = [
      'first_name' => 'Admin',
      'last_name' => 'Admin',
      // 'phone' => '1234567890',
      'email' => 'admin@security-system.com.ng',
      'password' => 'secret2@2!',
      'user_role' => 'admin',
      'slug' => 'admin'      
    ];
  
    $admin = Sentinel::registerAndActivate($adminCredentials, true);
    $role = Sentinel::findRoleBySlug('admin');
    $role->users()->attach($admin);
    
 

    $userCredentials = [
      'first_name' => 'User',
      'last_name' => 'tester',
      // 'phone' => '1234567890',
      'email' => 'user@security-system.com.ng',
      // 'username' => 'user',
      'user_role' => 'user',
      'password' => 'secret2@2!',
      'slug' => 'user',
    ];
    
    $user = Sentinel::registerAndActivate($userCredentials, true);
    $role = Sentinel::findRoleBySlug('user');
    $role->users()->attach($user);
  }
}
