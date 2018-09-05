<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
	        	'name' => 'role-read',
	        	'display_name' => 'Display Role list',
	        	'description' => 'See only Listing of Role'
       	 	],
       	 	[
	        	'name' => 'role-show',
	        	'display_name' => 'Display Role menu',
	        	'description' => 'Display Role'
       	 	],
       	 	[
	        	'name' => 'role-create',
	        	'display_name' => 'Create Role',
	        	'description' => 'Create New Role'
       	 	],
       	 	[
	        	'name' => 'role-edit',
	        	'display_name' => 'Update Role',
	        	'description' => 'Update Role'
       	 	],
       	 	[
	        	'name' => 'role-delete',
	        	'display_name' => 'Delete Role',
	        	'description' => 'Delete Role'
       	 	],
            [
	        	'name' => 'role-create-user',
	        	'display_name' => 'Create user',
	        	'description' => 'Create user'
       	 	],
            [
	        	'name' => 'role-update-user',
	        	'display_name' => 'Update user',
	        	'description' => 'Delete user'
       	 	],
            [
	        	'name' => 'role-delete-user',
	        	'display_name' => 'Delete user',
	        	'description' => 'Delete user'
       	 	],
            [
                'name' => 'role-show-user',
                'display_name' => 'Show user',
                'description' => 'Show user'
            ],

    	];


    	foreach ($permissions as $key=>$value){
    		Permission::create($value);
    	}
    }
}