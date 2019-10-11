#!/usr/bin/env php
<?php
function ft_is_sort($value)
{
	$temp =$value;
	sort($temp);	
	if ($value == $temp)
		return (true);
	else
		return(false);
}
?>
