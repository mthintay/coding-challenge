<?php

namespace App\Repositories;

interface CustomerRepository {

	/**
	 * Get all customers;
	 * 
	 * @return App\Entities\Customer[]
	 */
	public function findAll();

	/**
	 * Find an entity by its primary key
	 * 
	 * @param mixed $id	The identifier.
	 * 
	 * @return App\Entities\Customer
	 */
	public function find($id);	

	/**
	 * Find an entity by email
	 * 
	 * @param mixed $email The email.
	 *
	 * @return App\Entities\Customer
	 */
	public function findByEmail($email);
}