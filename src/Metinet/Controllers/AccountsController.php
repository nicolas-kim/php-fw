<?php

namespace Metinet\Controllers;

use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

class AccountsController
{
    public function login($username, $password)
    {
        $account = new Account().get($username);
        var_dump($account);
        die();
        if($this->password_verify($password, get($username)) == 1){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            return true;
        }
    }
}
