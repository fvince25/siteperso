<?php

namespace App\DataFixtures;

use App\Entity\CategorySkill;
use App\Entity\NavbarMenu;
use App\Entity\Skill;
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
                'textreplace' => 'Accueil'
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


        $categorySkills = [
            [
                'label' => 'Back End',
                'ordre' => 1,
                'skills' => [
                    [
                        'label' => 'PHP',
                        'ordre' => 1,
                        'category' => 0
                        , 'level' => 95
                    ],
                    [
                        'label' => 'Symfony',
                        'ordre' => 2,
                        'category' => 0
                        , 'level' => 85

                    ],
                    [
                        'label' => 'NodeJS',
                        'ordre' => 3,
                        'category' => 0
                        , 'level' => 70

                    ]
                ]
            ],
            [
                'label' => 'Front End',
                'ordre' => 2,
                'skills' => [
                    [
                        'label' => 'HTML / CSS',
                        'ordre' => 1,
                        'category' => 1
                        , 'level' => 95

                    ],
                    [
                        'label' => 'Javascript',
                        'ordre' => 2,
                        'category' => 1
                        , 'level' => 85

                    ],
                    [
                        'label' => 'JQuery',
                        'ordre' => 3,
                        'category' => 1
                        , 'level' => 90

                    ],
                    [
                        'label' => 'Typescript',
                        'ordre' => 4,
                        'category' => 1
                        , 'level' => 80

                    ],
                    [
                        'label' => 'Angular',
                        'ordre' => 5,
                        'category' => 1
                        , 'level' => 75

                    ]

                ]
            ],
            [
                'label' => 'Mobile',
                'ordre' => 3,
                'skills' => [
                    [
                        'label' => 'Ionic',
                        'ordre' => 1,
                        'category' => 3
                        , 'level' => 75

                    ]
                ]
            ],
            [
                'label' => 'Bases de données',
                'ordre' => 4,
                'skills' => [
                    [
                        'label' => 'MySQL',
                        'ordre' => 1,
                        'category' => 6
                        , 'level' => 95

                    ],
                    [
                        'label' => 'MariaDB',
                        'ordre' => 2,
                        'category' => 6
                        , 'level' => 87

                    ],
                    [
                        'label' => 'MongoDB',
                        'ordre' => 3,
                        'category' => 6
                        , 'level' => 65

                    ]

                ]
            ],
            [
                'label' => 'Environnement Serveur',
                'ordre' => 5,
                'skills' => [
                    [
                        'label' => 'Docker',
                        'ordre' => 1,
                        'category' => 5
                        , 'level' => 75
                    ],
                    [
                        'label' => 'Linux',
                        'ordre' => 2,
                        'category' => 5
                        , 'level' => 70

                    ],
                    [
                        'label' => 'Appache',
                        'ordre' => 3,
                        'category' => 5
                        , 'level' => 65

                    ]

                ]
            ],
            [
                'label' => 'Versionning',
                'ordre' => 6,
                'skills' => [
                    [
                        'label' => 'GIT, GIT Flow, GitLab, BitBucket',
                        'ordre' => 1,
                        'category' => 5
                        , 'level' => 80

                    ]

                ]
            ],
            [
                'label' => 'CMS',
                'ordre' => 7,
                'skills' => [
                    [
                        'label' => 'WordPress',
                        'ordre' => 1,
                        'category' => 6
                        , 'level' => 55

                    ],
                    [
                        'label' => 'Joomla',
                        'ordre' => 2,
                        'category' => 6
                        , 'level' => 50
                    ]

                ]
            ]
        ];


        foreach ($categorySkills as $cs) {

            $categorySkill = new CategorySkill();
            $categorySkill->setLabel($cs['label'])
                ->setOrdre($cs['ordre']);

            $manager->persist($categorySkill);


            foreach ($cs['skills'] as $s) {

                $Skill = new Skill();

                $Skill->setLabel($s['label'])
                    ->setOrdre($s['ordre'])
                    ->setCreatedAt(new \DateTimeImmutable())
                    ->setLevel($s['level'])
                    ->setCategorySkill($categorySkill);

                $manager->persist($Skill);
            }
        }


        $manager->flush();
    }
}
