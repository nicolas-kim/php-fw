<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain\Accounts;

interface AccountRepository
{
    public function save(Account $account): void;
    public function get($username): Account;
}
