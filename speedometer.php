<?php 
/** 
* This class is to create a speeo meter
* by deegha
* @params : rpm, diameter of the wheel in meters 
*/
class SpeedoMeter 
{
	
	public function getSpeedOfVehicle($rpm, $diameter_of_wheel)
	{
		if($rpm == null || $diameter_of_wheel == null)
		{
			echo 'Wrong parameters';die();
		}
		
		$distance_traveled_in_single_revolution = $diameter_of_wheel*PI; //in meters
		$number_of_revolutions_per_min			= $rpm;

		$total_distance_traveled_per_min		= $distance_traveled_in_single_revolution*$number_of_revolutions_per_min; //in meters

		/*
		*	converting to kelometers pre hours
		*/

		$total_km_traveled_per_hour= $total_distance_traveled_per_min*(60/1000);
		echo $total_km_traveled_per_hour;
	}

	public function odometer($rpm, $diameter_of_wheel, $time)
	{
		if($rpm == null || $diameter_of_wheel == null || $time == null)
		{
			echo 'Wrong parameters';die();
		}

		$distance_traveled_in_single_revolution = $diameter_of_wheel*PI; //in meters
		$number_of_revolutions_per_min			= $rpm;
		$total_distance_traveled_per_min		= $distance_traveled_in_single_revolution*$number_of_revolutions_per_min; //in meters

		$total_distancetaveled = $total_distance_traveled_per_min*$time;

		echo $total_distancetaveled;		
	}
}