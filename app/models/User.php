<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $primaryKey = 'PK_userId';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function profile() {
		return $this->hasOne('Profile', 'FK_userId');
	}

	public function credit() {
		return $this->hasOne('Credit', 'FK_userId');
	}

	public function storeRegistrationData() {
		//create new Role
		$role = new Role;
		//get the "normal" role
		$role = Role::where('roleName', '=', 'normal')->first();
		//get the id off the "normal" role
		$roleid = $role->PK_roleId;

		//create new user
		$user = new User;

		//define wich column needs wich input data
		$user->name = Input::get('firstname') . ' ' . Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->FK_roleId = $roleid;
		$user->active = TRUE;

		//store data into the users table
		$user->save();

		//create new profile
		$profile = new Profile;
		//link the profile to the registered user with the id
		$profile->FK_userId = $user->PK_userId;

		//store data into the profiles table
		$profile->save();

		//create new credit
		$credit = new Credit;

		//give the user his start credits and link it to the record to the registered user
		$credit->credits = 3;
		$credit->FK_userId = $user->PK_userId;

		//store data into the table credits
		$credit->save();

	}

	public function updateProfile() {
		$user = User::find(Auth::user()->PK_userId)->load('Profile', 'Credit');

		$user->name = Input::get('name');
		$user->profile->instagram = Input::get('instagram');
		
		$user->save();
		$user->profile->save();
	}


}
