<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setFirstname('Administrateur')
            ->setLastname('Principal')
            ->setEmail('admin@admin.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($user, 'admin'));
        $manager->persist($user);

        $user = new User();
        $user->setFirstname('Utilisateur')
            ->setLastname('Lambda')
            ->setEmail('user@user.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->hasher->hashPassword($user, 'user'));
        $manager->persist($user);

        $manager->flush();
    }


    public function getOrder()
    {
        return 1;
    }
}
