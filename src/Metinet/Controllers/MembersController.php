<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Controllers;

use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\FormValidation\MemberSignUp;

class MembersController extends Controller
{
    public function signUp(Request $request): Response
    {
        if ($this->getAuthenticationContext()->isAccountLoggedIn()) {

            return new Response('You are already logged-in, you cannot register');
        }

        $signUp = MemberSignUp::fromRequest($request);

        if ($request->isPost()) {
//            $email = $request->getRequest()->get('email');
//            $password = $request->getRequest()->get('password');
//            $passwordConfirm = $request->getRequest()->get('password_confirm');
//            $firstName = $request->getRequest()->get('first_name');
//            $lastName = $request->getRequest()->get('last_name');
//            $phoneNumber = $request->getRequest()->get('phone_number');
//
//            var_dump($email, $password, $passwordConfirm, $firstName, $lastName);

            $formErrors = $signUp->getErrors();
        }

        return new Response($this->render('members/signUp.html.php', [
            'errors' => $formErrors ?? [],
            'signUp' => $signUp
        ]));
    }

    public function logout(Request $request): Response
    {
        $this->getAuthenticationContext()->logout();

        return new Response('', 303, ['Location' => '/login']);
    }
}
