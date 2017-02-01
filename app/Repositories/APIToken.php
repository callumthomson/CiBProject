<?php
namespace App\Repositories;

use App\User;

class APIToken
{
    /**
     * Generate a random 64 character string for the API token and make sure it is not already in use. Then apply it to
     * the supplied user
     *
     * @param User $user
     * @return void
     */
    public static function createOn(User $user)
    {
        do {
            $token = str_random(64);
        } while(User::where('api_token', '=', $token)->first());
        $user->api_token = $token;
        $user->save();
    }

	/**
     * Get the user associated with an api key or false if no user
     *
     * @param $token
     * @return bool
     */
    public static function getUser($token)
    {
        $user = User::where('api_token', '=', $token)->first();
        return ($user ? $user : false);
    }
}