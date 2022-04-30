<?php

namespace App\Contracts;

use Laravel\Socialite\contracts\User as SocialContract;

interface Social
{
    public function authUser(SocialContract $socialUser): string;
}