<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\contracts\User as SocialContract;

class SocialService implements Social
{
    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user) {
            //dd($socialUser);
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account.index');
            }
            
            throw new Exception("Wasn't auth user, we can try latter");
        }else {
            //todo: register here or redirect on register
            return route('register');
        }
    }
}