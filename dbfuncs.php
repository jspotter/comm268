<?php
	/*
	 * Executes the given query. Returns an array where each 
	 * entry is a row in the result.
	 */
	function executeQuery($db, $query)
	{
		$return_value = array();

		try
		{
			$stmt = $db->prepare($query);
			$stmt->execute();

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			while($result !== false) 
			{
				array_push($return_value, $result);
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
			}

			$stmt->closeCursor();
			return $return_value;
		} 
		catch (PDOException $e) 
		{
			print $e->getMessage();
		}

		return false;
	}
?>

