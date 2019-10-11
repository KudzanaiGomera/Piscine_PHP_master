#!/usr/bin/env php
<?php
for ($i = 0; $i < count($argv); $i++) {
	if($argc != 4)
	{
		echo "Incorrect Parameters\n";
		exit;
	}

	else
	{
		if(trim($argv[2]) == '+')
		{
			echo (trim($argv[1]) + trim($argv[3])."\n");
			exit;
		}
		if(trim($argv[2]) == '-')
		{
			echo (trim($argv[1]) - trim($argv[3])."\n");
			exit;
		}
		if(trim($argv[2]) == '/')
		{
			echo (trim($argv[1]) / trim($argv[3])."\n");
			exit;
		}
		if(trim($argv[2]) == '%')
		{
			echo (trim($argv[1]) % trim($argv[3])."\n");
			exit;
		}
		if(trim($argv[2]) == '*')
		{
			echo (trim($argv[1]) * trim($argv[3])."\n");
			exit;
		}		
	}
}
?>
