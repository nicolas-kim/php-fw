<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain\Members;

use Metinet\Core\Security\Account;
use Metinet\Core\Security\EncodedPassword;
use Metinet\Domain\Conferences\Email;

class Member implements Account
{
    private $email;
    private $encodedPassword;
    private $phoneNumber;
    private $firstName;
    private $lastName;

    private function __construct(Email $email, EncodedPassword $encodedPassword, ?string $phoneNumber = "", string $firstName, string $lastName)
    {
        $this->email = $email;
        $this->encodedPassword = $encodedPassword;
        $this->phoneNumber = $phoneNumber;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public static function register(Email $email, EncodedPassword $encodedPassword): self
    {
        return new self($email, $encodedPassword);
    }

    public function getEmail(): string
    {
        return (string) $this->email;
    }

    public function getEncodedPassword(): EncodedPassword
    {
        return $this->encodedPassword;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
    
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
