<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Controllers;

use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Core\Security\AccountAuthenticator;
use Metinet\Core\Security\AuthenticationContext;
use Metinet\Core\Security\AuthenticationFailed;
use Metinet\Core\Security\PlainTextPasswordEncoder;
use Metinet\Core\Session\NativeSession;
use Metinet\Core\Templating\PhpViewRenderer;
use Metinet\Domain\Conferences\Email;
use Metinet\Infrastructure\Repositories\InMemoryMemberRepository;
use Metinet\Infrastructure\Security\MemberAccountProvider;
use Metinet\Domain\Members\Member;

class SecurityController
{
    public function login(Request $request): Response
    {
        $viewRenderer = new PhpViewRenderer(__DIR__ . '/../Resources/views/', __DIR__ . '/../Resources/views/layout.html.php');

        $session = new NativeSession();
        $session->start();

        $authenticationContext = new AuthenticationContext($session);

        if ($authenticationContext->isAccountLoggedIn()) {
            return new Response('Already logged-in !!');
        }

        if ($request->isPost()) {
            $email = $request->getRequest()->get('email');
            $password = $request->getRequest()->get('password');

            try {
                $accountAuthenticator = new AccountAuthenticator(
                    new MemberAccountProvider(new InMemoryMemberRepository()),
                    new PlainTextPasswordEncoder(),
                    $session
                );

                $accountAuthenticator->authenticate(new Email($email), $password);

            } catch (AuthenticationFailed $e) {

                return new Response($viewRenderer->render(
                    'loginFailed.html.php',
                    ['reason' => $e->getMessage()]
                ), 403);
            }

            return new Response($viewRenderer->render(
                'successfulLogin.html.php',
                ['email' => $authenticationContext->getAccount()->getEmail()]
            ));

        }

        return new Response($viewRenderer->render('login.html.php', [
            'email' => $email ?? '',
            'password' => $password ?? ''
        ]));
    }

    public function logout(Request $request): Response
    {
        $session = new NativeSession();
        $session->start();

        $authenticationContext = new AuthenticationContext($session);
        $authenticationContext->logout();

        return new Response('', 303, ['Location' => '/login']);
    }

    public function registerNewAccount(Request $request): Response
    {
        $viewRenderer = new PhpViewRenderer(__DIR__ . '/../Resources/views/', __DIR__ . '/../Resources/views/layout.html.php');

        $email = $request->getRequest()->get('email');
        $password = $request->getRequest()->get('password');
        $passwordBis = $request->getRequest()->get('passwordBis');
        $phoneNumber = $request->getRequest()->get('phoneNumber');
        $firstName = $request->getRequest()->get('firstName');
        $lastName = $request->getRequest()->get('lastName');

        var_dump($email, $password, $passwordBis, $phoneNumber, $firstName, $lastName);
        if($password != $passwordBis) {
            echo("pabon");
        }
        else {
            $test = new Member($email, $password, $phoneNumber, $firstName, $lastName);
        }

        return new Response($viewRenderer->render('register.html.php', [
            'email' => $email ?? '',
            'password' => $password ?? '',
            'phoneNumber' => $phoneNumber ?? '',
            'firstName' => $firstName ?? '',
            'lastName' => $lastName ?? ''
        ]));
    }
}
