<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */
class Customer {

	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $username;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $email;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $password;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $firstname;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $lastname;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $gender;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $country;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $city;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $phone;

	public function __construct($inputs)
	{
		$this->setUsername($inputs['username']);
		$this->setEmail($inputs['email']);
		$this->setPassword($inputs['password']);
		$this->setFirstname($inputs['firstname']);
		$this->setLastname($inputs['lastname']);
		$this->setGender($inputs['gender']);
		$this->setCountry($inputs['country']);
		$this->setCity($inputs['city']);
		$this->setPhone($inputs['phone']);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = md5($password);
	}

	public function getFirstname()
	{
		return $this->firstname;
	}

	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}

	public function getLastname()
	{
		return $this->lastname;
	}

	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function setGender($gender)
	{
		$this->gender = $gender;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function updateCustomer($inputs)
	{
		$this->setUsername($inputs['username']);
		$this->setPassword($inputs['password']);
		$this->setFirstname($inputs['firstname']);
		$this->setLastname($inputs['lastname']);
		$this->setGender($inputs['gender']);
		$this->setCountry($inputs['country']);
		$this->setCity($inputs['city']);
		$this->setPhone($inputs['phone']);
	}
}