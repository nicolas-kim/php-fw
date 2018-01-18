<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain\Login;

class Password
{
    private $account;
    private $password;
    private $password_hash;
    private $salt;

    public function __construct(Account $account, $password)
    {
        $this->account = $account;
        $this->password = $password;
        $this->password_hash = password_hash($password, PASSWORD_DEFAULT);
    }
}
