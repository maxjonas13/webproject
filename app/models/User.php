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

	public function job() {
		return $this->hasMany('Job', 'FK_userId');
	}

	public function comment() {
		return $this->hasMany('Comment', 'FK_userId');
	}

	public function candidate() {
		return $this->hasMany('Candidate', 'FK_userId');
	}

	public function category() {
		return $this->belongsToMany('Category', 'users_categories', 'FK_userId', 'FK_categoryId');
	}

	public function rating() {
		return $this->hasMany('Rating', 'FK_userId');
	}

	public function usercategory() {
		return $this->hasMany('UserCategory', 'FK_userId');
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
		$checkboxes = Input::get('grouped');

		//get all the categories and put it in a variable (array)
		$categories = Category::all();

		$user = User::find(Auth::user()->PK_userId)->load('Profile', 'Credit');

		$user->name = Input::get('name');
		$user->email = Input::get('email');

		if(Input::get('newpassword') != NULL && Input::get('password') != NULL) {
			$user->password = Hash::make(Input::get('newpassword'));
		}

		$user->profile->website = Input::get('website');
		$user->profile->twitter = Input::get('twitter');
		$user->profile->github = Input::get('github');
		$user->profile->linkedin = Input::get('linkedin');
		$user->profile->pintres = Input::get('pintrest');
		$user->profile->googleplus = Input::get('googleplus');
		$user->profile->instagram = Input::get('instagram');
		$user->profile->myspace = Input::get('myspace');
		$user->profile->bio = Input::get('bio');

		if(Input::hasFile('profilepicture')) {
			$file = Input::file('profilepicture');
			$filename = Input::get('email') . '.' . $file->getClientOriginalExtension();
			if(file_exists(public_path('img/profilepictures/' . $filename))) {
				unlink(public_path('img/profilepictures/') . $filename);
			}
			Image::make($file)->widen(70)->save(public_path('img/profilepictures/' . $filename));

			$user->profile->profilePicture = '/img/profilepictures/' . $filename;
		}
		
		$user->save();
		$user->profile->save();

		//get all the categories off the job
		$userCategorie = UserCategory::where('FK_userId', '=', $user->PK_userId)->get();

		//loop true alle the categories off the job
		foreach($userCategorie as $row) {
			//get the id out off the pivot table
			$id = $row->PK_users_categoryId;
			//delete the categorie out of the pivot table
			UserCategory::where('PK_users_categoryId', '=', $id)->delete();
		}

		// loop true the checkboxes
		// checkbox = name of the checkbox, value = true / false
		foreach($checkboxes as $checkbox => $value) {
			//check if the value of the checkbox is true or an empty string (true eighter).
			if($value || $value == '') {
				//loop true the categories
				foreach($categories as $category) {
					//check if the checkbox name and categoryName maches
					if($checkbox == strtolower($category->categoryName)) {
						//if they match create a new reacord in the pivot table
						$usercategorie = new UserCategory;
						$usercategorie->FK_categoryId = $category->PK_categoryId;
						$usercategorie->user()->associate($user);

						//save the data in the pivot table
						$usercategorie->save();
					}
				}
			}
		}

	}




}
