<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\Contracts\Social;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Foundation\Application;
use \Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialProvidersCOntroller extends Controller
{
    public function redirect(string $driver): RedirectResponse | SymfonyRedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, SocialService $social): Redirector | Application | RedirectResponse
    {
       return redirect($social->loginAndGetRedirectUrl(
           Socialite::driver($driver)->user()
       ));
    }
}
