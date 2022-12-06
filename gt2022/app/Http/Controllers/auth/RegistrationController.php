<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
 
class RegistrationController extends Controller
{
    public function register()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'device_name' =>['sometimes'],
            'referralcode' =>['sometimes'],
            'phonenumber'=>['sometimes|string']
        ]);
 
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
 
        event(new Registered($user));
 
        return $user->createToken(request('device_name'))->plainTextToken;
    }
}