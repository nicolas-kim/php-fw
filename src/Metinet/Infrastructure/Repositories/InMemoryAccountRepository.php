<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Infrastructure\Repositories;

use Metinet\Domain\Accounts\Account;
use Metinet\Domain\Accounts\AccountRepository;

class InMemoryAccountRepository implements AccountRepository
{
    private $accounts = [];

    public function save(Account $account): void
    {
        $this->accounts[$account->getId()] = $account;
    }

    public function get($username): Account
    {
        if (!isset($this->accounts[$username])) {

            throw new AccountNotFound($username);
        }

        return $this->accounts[$id];
    }
}
