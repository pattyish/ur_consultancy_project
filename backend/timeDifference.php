<?php
	// function to time counting
	function timerCounter($Savedate)
	{
		$bynow=date("Y-m-d H:i:s");

		$datetime1 = new DateTime($Savedate);
		$datetime2 = new DateTime($bynow);
		$interval=date_diff($datetime1,$datetime2);
		$months=$interval->format("%m");
		$days=$interval->format("%d");
		$hours=$interval->format("%h");
		$mins=$interval->format("%i");
		if($months >1)
		{
			echo $months."mos";
		}
		else if($months ==1)
		{
			echo $months."mo";
		}
		else if($days >=1)
		{
			echo $days."d";
		}
		else if($hours >1)
		{
			echo $hours."hrs";
		}
		else if($hours ==1)
		{
			echo $hours."hr";
		}
		else if($mins >1)
		{
			echo $mins."mins";
		}
		else if($mins ==1)
		{
			echo $mins."min";
		}
		else 
		{
			echo "Now";
		}
	}
?>