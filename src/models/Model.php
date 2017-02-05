<?php

	namespace Models;

	class Model
	{
		protected $pdo = NULL;

		public function __construct($pdo)
		{
			$this->pdo = $pdo;
		}
	}