<?php 

/*
*	following are the Unit tests writen for the two classes, speedometer and snapshot
*/

const ALL_SERVER_NAMES = 1;
const ALL_SNAPSHOT_DETAILS_SERVER_NAMES = 2;
const TIME_DATE = 3;
const SIZE = 4;
const OLDERS_SNAP = 5;
const PI = 3.142;
const URL_SNAPSHOT_DATA = "data/sample.txt";

include ('snapshot.php');
include ('speedometer.php');

$Snap =  new Snapshot();
echo 'Question one <br><hr><br>';
echo 'Q1 first part :  number of snapshots available for every server <br> ================ <br>';
$Snap->numOfSnaps();
echo '<br>';

echo 'Q1 second part :   oldest snapshot for any given server, "services" has been given as a parameter for the function  <br> ================ <br>';
$Snap->getOldestSnapshot('services');
echo '<br>';

echo 'Q1 third part :   size of all snapshots, 
and the total size of snapshots for any given snapshot  <br> ================ <br>';
echo "Size of of the snapshots for 'services' server, 'services' has been given as a parameter for the function  : <br>";
$Snap->sizeOfSnapshot('services');
echo ' GB <br>';

echo "Size of of all snapshots: <br>";
$Snap->sizeOfSnapshot();
echo ' GB <br>';

echo 'Q1 fourth part :  snapshots older than two weeks <br> ================ <br>';
$Snap->snapshotsOlderThanTwoWeeks();
echo '<br>';


echo 'Question two <br><hr><br>';


$speedo = new SpeedoMeter();
echo 'Q2 first part :  calculate the speed (in kilometers per hour) for your racing car <br> ================ <br>';
$speedo->getSpeedOfVehicle(7, 1.5);
echo ' Kmph<br>';

echo 'Q2 second part :  write an odometer function that calculates the distance travelled <br> ================ <br>';
$speedo->odometer(7, 1.5, 30);
echo ' Meters <br>';