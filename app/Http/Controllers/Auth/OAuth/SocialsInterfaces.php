<?php
namespace App\Http\Controllers\Auth\OAuth;

interface socialsinterfaces
{
    public function openOAuthPage($social);

    public function OAuthCallBack($social);
}

?>