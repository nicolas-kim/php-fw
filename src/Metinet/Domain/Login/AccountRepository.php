<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain\Login;

interface AccountRepository
{
    public function save(Account $account): void;
    public function get($username): Account;
}
