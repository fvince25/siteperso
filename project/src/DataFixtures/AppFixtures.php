<?php

namespace App\DataFixtures;

use App\Entity\NavbarMenu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $menus = [
            [
                'item' => 'home',
                'label' => '<i class="fa-solid fa-house"></i>',
                'textreplace' => 'Acceuil'
            ], [
                'item' => 'profil',
                'label' => 'Profil',
                'textreplace' => 'Profil'
            ], [
                'item' => 'skills',
                'label' => 'Compétences',
                'textreplace' => 'Compétences'
            ], [
                'item' => 'experiences',
                'label' => 'Expériences',
                'textreplace' => 'Expériences'
            ], [
                'item' => 'trainings',
                'label' => 'Formations',
                'textreplace' => 'Formations'
            ], [
                'item' => 'links',
                'label' => 'Liens utiles',
                'textreplace' => 'Liens utiles'
            ]
        ];

        foreach ($menus as $m) {

            $menu = new NavbarMenu();

            $menu->setItem($m['item'])
                ->setLabel($m['label'])
                ->setCreatedat(new \DateTime())
                ->setTextreplace($m['textreplace']);

            $manager->persist($menu);

        }

        $manager->flush();
    }
}
