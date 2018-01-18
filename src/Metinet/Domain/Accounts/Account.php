<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain\Accounts;

class Account
{
    private $id;
    private $username;
    private $mail;
    private $password;

    public function __construct(int $id, string $username, string $mail, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
