<?php 
const ALL_SERVER_NAMES = 1;
const ALL_SNAPSHOT_DETAILS_SERVER_NAMES = 2;
const TIME_DATE = 3;
const SIZE = 4;

include ('snapshot.php');
include ('speedometer.php');

$Snap =  new Snapshot();

echo 'Q1 first part :  number of snapshots available for every server <br> ================ <br>';
$Snap->numOfSnaps();
echo '<br>';

echo 'Q1 second part :   oldest snapshot for any given server  <br> ================ <br>';
$Snap->getOldestSnapshot('services');
echo '<br>';

echo 'Q1 third part :   size of all snapshots, 
and the total size of snapshots for any given snapshot  <br> ================ <br>';
echo "Size of of the snapshots for services server : <br>";
$Snap->sizeOfSnapshot('services');

echo '<br>';
echo "Size of of all snapshots: <br>";
$Snap->sizeOfSnapshot();

echo '<br>';