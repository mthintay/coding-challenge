<?php

namespace App\Libraries;

use Doctrine\ORM\EntityManagerInterface;

interface DataImporterInterface {
	public function import($count, EntityManagerInterface $em);
}