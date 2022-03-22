<?php


namespace App\Modules;


use App\Entity\CookiesToken;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;

class TokenGenerator
{


    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * Génère et stocke un token cookie en BDD
     * @return string
     */
    public function generateToken() : string {

        $uuid = Uuid::v1();

        $cookieToken = new CookiesToken();
        $cookieToken->setUuid($uuid)
            ->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($cookieToken);
        $this->entityManager->flush();

        return $uuid;

    }

}