<?php 

/**
* This class is the handle database snapshots
* Test JadoPado
* By Deegha Galkissa
*/
class Snapshot 
{
	//const COUNT_PER_SERVER = '1';
	
	private $snap_count_per_server;
	private $server_names;
	private $snapshot_dates;
	private $size_snapshot;
	

	private function getAllSnapDetails($selector = null)
	{
		$snaps_file = fopen("data/sample.txt", "r");
		if ($snaps_file) 
		{
			$incri = 0;
			$server_names_key = 0;
			$response = array();

		    while (($server_detail = fgets($snaps_file)) !== false) 
		    {
		     	$line_breakers[$incri] = explode("-", $server_detail);
		     	
		     	if($selector == ALL_SERVER_NAMES)
		     	{
		     		if(!in_array($line_breakers[$incri][1], $response))
					{
						$response[$server_names_key] = $line_breakers[$incri][1];
						$server_names_key++;

					}
		     	}
		     	elseif($selector == ALL_SNAPSHOT_DETAILS_SERVER_NAMES){
		     		 $response[$incri]	= $line_breakers[$incri][1];
		     	}else if($selector == SIZE){
		     		$size =  explode(" ", $line_breakers[$incri][4]);
		     		$response[$incri]['size']	= $size[6];
		     		$response[$incri]['server_name'] = $line_breakers[$incri][1];
		     	}else if($selector == TIME_DATE){
		     		$time =  explode(" ", $line_breakers[$incri][4]);
		     		$response[$incri]['date']	= $line_breakers[$incri][2];
		     		$response[$incri]['time']	= $time[4];
		     		$response[$incri]['time_difference']	= $time[5];
		     		$response[$incri]['server']	= $line_breakers[$incri][1];
		     	}else{
		     		$response[$incri]	= $line_breakers[$incri];
		     	}

		     
		     $incri++;		
		    }

		    fclose($snaps_file);
		    return $response;
		} else {
		    return false; 
		}
	}

	private function testArrays($array)
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

	public function numOfSnaps()
	{
		$this->server_names = $this->getAllSnapDetails(ALL_SERVER_NAMES);	
		if(!$this->server_names)
		{
			echo "Coulden't get the server names <br>";
		}

		foreach ($this->server_names as $key => $server_name) {
			
			$all_snap_records_server_names 
				= implode(" ", $this->getAllSnapDetails(ALL_SNAPSHOT_DETAILS_SERVER_NAMES));
			$snap_count_per_server[$server_name] 
				= substr_count($all_snap_records_server_names, $server_name);
			echo 'Server name :'.' '.$server_name. ', Snapshot Count :'.$snap_count_per_server[$server_name].'<br>';
		}		
	} 

	public function getOldestSnapshot($server_name)
	{
		$curren_date =  date("Y-m-d H:i:s");
		$oldest_snap =  date("Y-m-d H:i:s");
		$this->snapshot_dates = $this->getAllSnapDetails(TIME_DATE);
		
		foreach ($this->snapshot_dates as $date) {
			 $record_date 
			 	= date("Y-m-d H:i:s",strtotime($date['date'].$date['time'].$date['time_difference']));

			if($record_date < $curren_date && $server_name == $date['server'])
			{
				$oldest_snap = $record_date;
			}
		} 
	  echo  'Oldest snapshot for '.$date['server'].' server '.$oldest_snap .'<br>';
	}

	public function sizeOfSnapshot($server = null)
	{ 
		$size_snapshots = $this->getAllSnapDetails(SIZE);
		//$this->testArrays($size_snapshot);
		$x= 0;

		if($server != null )
		{
			foreach ($size_snapshots as $key => $snapshot) 
			{
				if($server == $snapshot['server_name'])
				{	
					$x =  $x+$snapshot['size'];
				}
			}
		}else{
			foreach ($size_snapshots as $key => $snapshot) 
			{
				$x =  $x+$snapshot['size'];
			}
		}
		
			
		echo $x;
	}
}