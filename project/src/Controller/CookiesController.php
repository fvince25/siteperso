<?php

namespace App\Controller;

use App\Entity\CookiesToken;
use App\Modules\TokenGenerator;
use App\Repository\CookiesTokenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class CookiesController extends AbstractController
{


    /**
     * @Route("/accept_cookies", name="accept_cookies")
     */
    public function accept_cookies(EntityManagerInterface $entityManager,
                                   TokenGenerator $tokenGenerator,
                                   Request $request,
                                   CookiesTokenRepository $cookiesTokenRepository): Response
    {
        dump($request);

        if ($uuid = $request->cookies->get('tokenSite')) {
            $token = $cookiesTokenRepository->findOneBy(['uuid' => $uuid]);
            if ($token) {
                return $this->json([
                    'code' => 200,
                    'type' => 'cookies',
                    'info' => 'allready_accepted',
                ]);
            }
        }


        $tokenSite = $tokenGenerator->generateToken();

        $content = [
            'code' => 200,
            'type' => 'cookies',
            'status' => 'ok',
            'message' => "Cookies acceptés"
        ];

        $response = new Response();
        $response->setContent(json_encode($content))
            ->headers->set('Content-Type', 'application/json');

        $response->headers->remove('Connection');
        $response->headers->set('Connection', 'Keep-Alive');
        $response->headers->set('Keep-Alive', 'timeout=5, max=100');


        $cookie = Cookie::create('tokenSite')
            ->withValue($tokenSite)
            ->withExpires(new \DateTime('+1 year'));

        $response->headers->setCookie($cookie);


        return $response->send();
    }
}
