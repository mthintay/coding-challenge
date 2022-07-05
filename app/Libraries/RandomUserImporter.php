<?php

namespace App\Libraries;

use App\Libraries\DataImporter;
use App\Libraries\RandomUserAPI;
use App\Entities\Customer;
use Doctrine\ORM\EntityManagerInterface;
use App\Repositories\DoctrineCustomerRepository;

class RandomUserImporter implements DataImporterInterface {

	private $class = 'App\Entities\Customer';

	public function import($count, EntityManagerInterface $em)
	{
		$users = $this->fetchUsers($count);

		foreach ($users as $user) 
		{
			$this->save($user, $em);
		}

		$em->flush();
	}

	private function save($user, $em)
	{
		$repository = $em->getRepository($this->class);
	    $entity = $repository->findOneBy(['email' => $user['email']]);

		if ($entity)
		{
			$entity->updateCustomer($user);
		}
		else
		{
			$entity = new Customer($user);
		}

		$em->persist($entity);
	}

	private function fetchUsers($count)
	{
		$response = (new RandomUserAPI())->getUsers([
			'results' => $count,
			'nat'	  => 'au'
		]);	

		return $this->prepareUsers($response['data']);
	}

	private function prepareUsers($users)
	{
		$mappedUsers = [];

		foreach ($users as $user) 
		{
			$mappedUsers[] = $this->mapUser($user);
		}

		return $mappedUsers;
	}

	private function mapUser($user)
	{
		return [
			'email' 	=> $user['email'],
			'username' 	=> $user['login']['username'],
			'password'  => $user['login']['password'],
			'firstname' => $user['name']['first'],
			'lastname' 	=> $user['name']['last'],
			'gender'	=> $user['gender'],
			'country'	=> $user['location']['country'],
			'city'		=> $user['location']['city'],
			'phone'		=> $user['phone'],
		];
	}
}