<?php

// namespace App;
//
// use Laravel\Socialite\Contracts\Factory as Socialite;
// use Illuminate\Contracts\Auth\Guard as Guard;
// use App\Repositories\UserRepository as UserRepository;
// use Log;
//
// class AuthenticateUser {
//
//     private $users;
//     private $socialite;
//     private $auth;
//
//     public function __construct (UserRepository $users, Socialite $socialite, Guard $auth) {
//         $this->users = $users;
//         $this->socialite = $socialite;
//         $this->auth = $auth;
//     }
//
//     public function execute ($hasCode) {
//         if( ! $hasCode){
//             Log::info('1');
//             return $this->getAuthorizationFirst();
//         }
//         Log::info('2');
//         $user = $this->socialite->driver('github')->user();
//     }
//
//     public function getAuthorizationFirst(){
//         return $this->socialite->driver('github')->redirect();
//     }
//
// }
