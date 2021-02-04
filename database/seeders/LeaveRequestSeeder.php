<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Http\Request;
use DB;

class LeaveRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('leave_requests')->insert([
            'title' => 'I need break',
            'description' => 'WTF',
            'duration' => "1 month",
            'status' => 0,
            'user_id' => 1,
            // 'description' => 'Super Admin User',
            // 'permissions' => [
            //   'user.create'   => true,
            //   'user.view'   => true,
            //   'user.update'   => true,
            //   'user.delete' => true,
            // ]
          ]);
        
          DB::table('leave_requests')->insert([
            'title' => 'I need break',
            'description' => 'WTF',
            'duration' => "2 months",
            'status' => 0,
            'user_id' => 1,
            // 'description' => 'Super Admin User',
            // 'permissions' => [
            //   'user.create'   => true,
            //   'user.view'   => true,
            //   'user.update'   => true,
            //   'user.delete' => true,
            // ]
          ]);
          
          
          DB::table('leave_requests')->insert([
            'title' => 'I need break',
            'description' => 'WTF',
            'status' => 0,
            'duration' => "1 month",
            'user_id' => 1,
            // 'description' => 'Super Admin User',
            // 'permissions' => [
            //   'user.create'   => true,
            //   'user.view'   => true,
            //   'user.update'   => true,
            //   'user.delete' => true,
            // ]
          ]);
    }
}
