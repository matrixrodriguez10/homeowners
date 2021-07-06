<?php

//importing csv data to php database
class csv extends mysqli
{
	
	private $state_csv = false;
	public function __construct()
	{
		parent::__construct('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');
		if ($this->connect_error) {
			echo "Fail to connect to Database: ". $this->connect_error;
		}
	}

	public function import($file)
	{	
		$first = false;
		$this->state_csv =false;
		$file = fopen($file, 'r');

		while ($row = fgetcsv($file)) {

			if (!$first) {
				$first = true;
			}
			else {
			$value = "'". implode("','", $row) ."'";
			$q = "INSERT INTO clearance (fullname, date, contact, email, adds) VALUES(". $value .")";
			if ($this->query($q)) {
				$this->state_csv = true;
			}
			else {
				$this->state_csv =false;
				echo $this->error;
			}
		}
	}

		if($this->state_csv) {
			echo "Successfully Imported";
		}
		else {
			echo "Something went wrong";
		}
	}

	public function export() {
		$this->state_csv = false;
		$q = "SELECT t.fullname, t.date, t.contact, t.email, t.adds FROM clearance as t";
		$run = $this->query($q);
		if ($run->num_rows > 0) {
			$fn = "csv_". uniqid() .".csv";
			$file = fopen("csvfile/residency/". $fn, "w");
			while ($row = $run->fetch_array(MYSQLI_NUM)) {
				if(fputcsv($file, $row)){
					$this->state_csv = true;
				}else {
					$this->state_csv =false;
				}
			}
			if($this->state_csv) {
				echo "Successfully Export";
			}
			else {
				echo "Something went wrong";
			}
			fclose($file); 
		}else{
			echo "No data found";
		}
	}
}
?>