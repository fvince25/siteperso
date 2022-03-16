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
                'label' => '<i class="fa-solid fa-house"></i>'
            ], [
                'item' => 'profil',
                'label' => 'Profil'
            ], [
                'item' => 'skills',
                'label' => 'Compétences'
            ], [
                'item' => 'experiences',
                'label' => 'Expériences'
            ], [
                'item' => 'trainings',
                'label' => 'Formations'
            ]
        ];

        foreach ($menus as $m) {

            $menu = new NavbarMenu();

            $menu->setItem($m['item'])
                ->setLabel($m['label'])
                ->setCreatedat(new \DateTime());

            $manager->persist($menu);

        }

        $manager->flush();
    }
}
