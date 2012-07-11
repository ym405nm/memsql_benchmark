MemSQL Benchmark
======================

Initialization
--------

### 1. Install MemSQL and MySQL ###

ref. http://developers.memsql.com/docs/1b/guides/starting.html

### 2. Create Database ###

Execute following queries.

	CREATE DATABASE  `testdata`;
	CREATE TABLE  `data` (
	    `value` VARCHAR( 13 ) NOT NULL ,
	    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	);
	CREATE TABLE  `log` (
	    `max` INT NOT NULL ,
	    `time` FLOAT NOT NULL ,
	    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	); 

Execution
--------

Execute the following command.

	php cal.php

You can see the result at command lines and log tables.

