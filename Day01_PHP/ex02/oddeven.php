#!/usr/bin/env php
<?php
function do_op($input)
{
	if (is_numeric($input))
	{
		if ($input % 2 == 0)
			echo ("The number ".$input." is even\n");
		else
			echo ("The number ".$input." is odd\n");
	}
	else
		echo ("'".$input."'"." is not a number\n");
}

while(1)
{
	echo 'Enter a number: ';
	$line = trim(fgets(STDIN));
	if(feof(STDIN))
	{
		echo ("\n");
		return;
	}
	else
		do_op($line);
}
?>
