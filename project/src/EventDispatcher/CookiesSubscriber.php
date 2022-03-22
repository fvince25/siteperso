<?php

namespace App\EventDispatcher;

use App\Repository\CookiesTokenRepository;
use Doctrine\DBAL\Types\ConversionException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class CookiesSubscriber implements EventSubscriberInterface {

    // Plus besoin d'écrire la configuration dans le service.yaml, on le fait directement dans le PHP,
    // grâce à EventSubscriberInterface.
    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            'kernel.response' => 'checkCookies',
            'kernel.request' => 'checkCookiesRequest',
        ];
    }

    protected $cookieTokenRepository;
    protected $session;

    public function __construct(CookiesTokenRepository $cookieTokenRepository, SessionInterface $session) {
        $this->cookieTokenRepository = $cookieTokenRepository;
        $this->session = $session;
    }

    public function checkCookies(ResponseEvent $responseEvent) {

        $token = $this->session->get('tokenSite');

        if ($token) {
            try {
                $cookie = $this->cookieTokenRepository->findOneBy(['uuid' => $token]);

                if (!$cookie) {
                    $responseEvent->getResponse()->headers->clearCookie('tokenSite');
                }
            } catch (ConversionException $e) {
                $responseEvent->getResponse()->headers->clearCookie('tokenSite');
            }

        }


    }

    public function checkCookiesRequest(RequestEvent $requestEvent) {


        try {

            $token = $requestEvent->getRequest()->cookies->get('tokenSite');

            if ($token) {
                $this->session->set("tokenSite",$token);

                $cookie = $this->cookieTokenRepository->findOneBy(['uuid' => $token]);

                if (!$cookie) {
                    $requestEvent->getRequest()->cookies->remove('tokenSite');
                }
            }

        } catch (ConversionException $e) {
            $requestEvent->getRequest()->cookies->remove('tokenSite');
        }



    }

}

?>