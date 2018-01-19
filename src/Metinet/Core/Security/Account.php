<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Security;

interface Account
{
    public function getEmail(): string;
    public function getEncodedPassword(): EncodedPassword;
    public function getPhoneNumber(): string;
    public function getFirstName(): string;
    public function getLastName(): string;
}
