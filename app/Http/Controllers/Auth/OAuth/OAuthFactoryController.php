<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Auth\OAuth\Socials\Google;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OAuthFactoryController extends Controller implements socialsinterfaces
{


    protected $socials=[
        'google'=>Google::class,
    ];

    protected $social;
    public function classSetter($socialName)
    {
        // dd(in_array('google',array_keys($this->socials)));
        if(in_array($socialName,array_keys($this->socials)))
        {
            $this->social= new $this->socials[$socialName];        
        }
    }

    public function openOAuthPage($social)
    {
        $this->classSetter($social);

        return $this->social->openOAuthPage();
    }

    public function OAuthCallBack($social)
    {
        $this->classSetter($social);

        return $this->social->OAuthCallBack();
    }

}

