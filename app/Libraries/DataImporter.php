<?php

namespace App\Libraries;

use App\Libraries\RandomUserImporter;
use Doctrine\ORM\EntityManagerInterface;

class DataImporter {

	protected $provider = null;

	public function __construct()
	{
		$this->provider = new RandomUserImporter();
	}

	public function importUsers($count, EntityManagerInterface $em)
	{
		$this->provider->import($count, $em);
	}
}