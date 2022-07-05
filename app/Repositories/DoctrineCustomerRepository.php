<?php

namespace App\Repositories;

use App\Entities\Customer;
use Doctrine\ORM\EntityManager;

class DoctrineCustomerRepository implements CustomerRepository {

	private $class = 'App\Entities\Customer';

	private $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}
	
	/**
	 * Get all customers;
	 * 
	 * @return App\Entities\Customer[]
	 */
	public function findAll()
	{
		return $this->em->getRepository($this->class)->findAll();
	}

	/**
	 * Find an entity by its primary key
	 * 
	 * @param mixed $id	The identifier.
	 * 
	 * @return App\Entities\Customer
	 */
	public function find($id)
	{
		$customer = $this->em->find($this->class, $id);

		if (!$customer) {
			return false;
		}

		return $customer;
	}

	/**
	 * Find an entity by email
	 * 
	 * @param mixed $email The email.
	 *
	 * @return App\Entities\Customer
	 */
	public function findByEmail($email)
	{
		return $this->em->findByEmail($email);
	}
}