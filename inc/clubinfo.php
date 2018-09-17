<?php
include('dbh.php');
class Club extends Dbh
{

	public function getAllClubs()
	{
		$stmt=$this->connect()->query("select * from pasistence_club");
		while($row=$stmt->fetch())
		{
			$uid=$row['name'];
			return $uid;

		}

	}

	public function getClubWithCountCheck()
	{
		$id=1;
		$name="thikana";
		$stmt=$this->connect()->prepare("SELECT * FROM pasistence_club WHERE id=? AND name=?");
		$stmt->execute([$id,$name]);

		if($stmt->rowCount())
		{
			while($row=$stmt->fetch())
			{

				return $row['name'];
			}
		}
		else
		{
			echo "not a true code should change";
		}
	}

}

?>