<?php

namespace App\Libraries;

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\ClientException;
use \GuzzleHttp\Exception\RequestException;

class RandomUserAPI {
	
	protected $client = null;
	protected $defaultParams = [];

	public function __construct()
	{
		$this->client = new Client(['verify' => false]);
		$this->setDefaultParams();
	}

	public function getUsers($params)
	{
		return $this->sendRequest(
			'GET', 
			'https://randomuser.me/api', 
			$params
		);
	}

	private function setDefaultParams()
	{
		$this->defaultParams = [
			'inc' => 'name, gender, location, email, login, phone',	
		];
	}

	private function sendRequest($protocol, $path, $params)
	{
		try
		{
			$params = array_merge($this->defaultParams, $params);

			$response = $this->client->request(
				$protocol,
				$path,
				[
					'query' => $params
				]
			);

			$statusCode = $response->getStatusCode();
			$response 	= $response->getBody()->getContents();
		} 
		catch(ClientException|RequestException $e)
		{
			$statusCode = $e->getResponse()->getStatusCode();
			$response   = $e->getResponse()->getBody()->getContents();
		}
		catch(Exception $e)
		{
			throw $e;
		}

		return [
			'data' 		  => json_decode($response, true)['results'],
			'status_code' => $statusCode,
		];
	}
}