<?php

use Add\Models\User;
use Add\Models\Role;
use Add\Models\Menu;


function getBasicInfo($url)
{

    $role_id        = Auth::user()->role_id;
    $infoUser       = Role::where('id', $role_id)->with('role_akses')->with('user')->first();

    $infoMenu       = Menu::where('url', $url)->first();

    $result['infoUser'] = $infoUser; 
    $result['infoMenu'] = $infoMenu; 

    return $result;
}
