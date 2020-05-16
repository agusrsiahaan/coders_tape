<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    public function show(Profile profile)
    {
    	//$profile = Profile::find($profile);
    	//$profile = Profile::where('username', $profile)->first();
    	
    	return $profile;
    }
}
