<?php
	
	namespace Models;
	use \PDO;

	class ProgramModel extends Model
	{
		public function getAllProgrammes()
		{
			//$q="select * from prg";
			$query = $this->pdo->prepare("select * from prg");

     		$query->execute();
     		$progs = $query->fetchAll(PDO::FETCH_OBJ);

      		if ( $progs == NULL || empty($progs) ) {
      	 		$progs = null;
      		}

      		return $progs;  

		}
	}