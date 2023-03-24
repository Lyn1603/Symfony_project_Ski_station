<?php

namespace App\DataFixtures;

use App\Entity\SuperAdmin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SuperAdminFixtures extends Fixture
{
	private UserPasswordHasherInterface $passwordHasher;
	public function __construct(UserPasswordHasherInterface $hasher)
	{
		$this->hasher = $hasher;
	}
    public function load(ObjectManager $manager): void
    {
			$superAdmin = new SuperAdmin();
			$superAdmin->setEmail('superadmin@localhost');
			$superAdmin->setPassword($this->hasher->hashPassword($superAdmin, 'superadmin'));
			$superAdmin->setRoles(['ROLE_SUPER_ADMIN']);
			$manager->persist($superAdmin);
			$manager->flush();
    }
}
