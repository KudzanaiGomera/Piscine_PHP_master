#!/usr/bin/env php
<?php
function do_op($input)
{
	if (!(is_numeric($input)))
		echo $input ."is not a number\n";

	if (is_numeric($input))
	{ 
		echo "stop";
		if ($input % 2 == 0)
			echo "The number " .$input ." is even\n";

		if ($input % 2 == 1)
			echo "The number " .$input ." is odd\n";
	}
}

for ($i = 0; $i < 10; $i++)
{
	echo 'Enter a number: ';

	$line = fgets(STDIN);

	if($line == NULL)
	{
		echo ("\n");
		return;
	}
	else
		do_op($line);
}
?>
