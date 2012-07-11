<?php

## Database Configuration

$HOST = '127.0.0.1:3307';
$USER = 'root';
$PASSWORD = '';
$DBNAME = 'testdata';

## increase times
$ADD = 20;

$connect = mysql_connect($HOST,$USER,$PASSWORD);
if(!$connect){
	die('can\'t connect' . mysql_error());
	exit;
}else{
	mysql_select_db($DBNAME, $connect);
	startCalc($ADD);
	mysql_query('delete from data where 1=1;');
}

function startCalc($ADD){

    for($ss=1;$ss<$ADD;$ss++){
	
	## next query times
	$q = pow(2,$ss);
	
	$time = doInsert($q);
	printf("(%s/%s) %s : %s\n",$ss,$ADD,$q,$time);  
    }

}

function doInsert($q){
 
    ## number of determinations 
    $nod = 10;

    $tar = array();
    for($i=0;$i<$nod;$i++){
	mysql_query('delete from data where 1=1;');
	$start = microtime(true);
        for($j=0;$j<$q;$j++){
            $val = uniqid();
            ## insert
	    $sql = sprintf('insert into data (`value`) values ("%s");',$val);
            mysql_query($sql);       
        }
 	$end = microtime(true);
	$time = $end - $start;
	array_push($tar,$time);
     }
    ## calculate average
    $time = array_sum($tar) / count($tar);

    ## insert log
    $logSql = sprintf('insert into log (`max`, `time`) values ("%s","%s")',$q,$time);
    mysql_query($logSql);

    return $time;

}

?>

