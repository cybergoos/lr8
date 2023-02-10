<?php

include 'app/lib/db.php';
session_start();

class Model_Main extends Model
{
	public function get_result()
	{
		$gender = $_COOKIE["gender"];

		$userCategories = ["cat1" => 0, "cat2" => 0, "cat3" => 0, "cat4" => 0, "cat5" => 0, "cat6" => 0, "cat7" => 0, "cat8" => 0];

		for ($i = 1; $i <= 8; $i++) {
			$userCategories["cat$i"] = $_SESSION["cat$i"];
		}

		$cat1 = $userCategories["cat1"];
		$cat2 = $userCategories["cat2"];
		$cat3 = $userCategories["cat3"];
		$cat4 = $userCategories["cat4"];
		$cat5 = $userCategories["cat5"];
		$cat6 = $userCategories["cat6"];
		$cat7 = $userCategories["cat7"];
		$cat8 = $userCategories["cat8"];

		// connect to database
		$db = new DB();

		// get all names from the database
		$names = $db->query("SELECT * FROM `name` WHERE `gender_id`=$gender");

		$nameCounter = 0;
		$result = array();

		$result100 = array();
		$nameCounter100 = 0;

		$result75 = array();
		$nameCounter75 = 0;

		$result50 = array();
		$nameCounter50 = 0;
		$result50t = array();
		$nameCounter50t = 0;

		while ($row = $names->fetch_assoc()) {
			$equalCounter = 0;
		
			if (!empty($cat1)) { if ($cat1 == $row['name_cat_1']) { $equalCounter++; } }
			if (!empty($cat2)) { if ($cat2 == $row['name_cat_2']) { $equalCounter++; } }
			if (!empty($cat3)) { if ($cat3 == $row['name_cat_3']) { $equalCounter++; } }
			if (!empty($cat4)) { if ($cat4 == $row['name_cat_4']) { $equalCounter++; } }
			if (!empty($cat5)) { if ($cat5 == $row['name_cat_5']) { $equalCounter++; } }
			if (!empty($cat6)) { if ($cat6 == $row['name_cat_6']) { $equalCounter++; } }
			if (!empty($cat7)) { if ($cat7 == $row['name_cat_7']) { $equalCounter++; } }
			if (!empty($cat8)) { if ($cat8 == $row['name_cat_8']) { $equalCounter++; } }
		
			if ($equalCounter >= 2 && $nameCounter < 5) {

				if ($equalCounter == 4) {
					$result100[$nameCounter100] = $row;
					$nameCounter100 ++;

					$nameCounter++;
				} else if ($equalCounter == 3) {
					$result75[$nameCounter75] = $row;
					$nameCounter75++;

					$nameCounter++;
				} else {
					$result50t[$nameCounter50t] = $row;
					$nameCounter50t++;
				}

			} 
		}

		if ($nameCounter < 5) {
			foreach ($result50t as $row) 
			{
				if ($nameCounter < 5) {
					$result50[$nameCounter50] = $row;
					$nameCounter50++;

					$nameCounter++;
				} 
			}
		}

		$result["result100"] = $result100;
		$result["result75"] = $result75;
		$result["result50"] = $result50;

		return $result;
	}

	public function get_favorites()
	{
		// connect to database
		$db = new DB();

		// get all names from the database
		$names = $db->query("SELECT * FROM `name`");

		$nameCounter = 0;
		$result = array();

		while ($row = $names->fetch_assoc()) {
			if (isset($_COOKIE[$row['name_name']])) {
				$nameCounter++;
				$result[$nameCounter] = $row;
			}
		}

		return $result;
	}
}
?>