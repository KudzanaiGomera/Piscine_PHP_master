#!/usr/bin/env php
<?php 
function ft_split($str)
{
	$word = explode(" ", $str);
	$sort_word = array_values(array_filter($word));
	sort($sort_word);
	return ($sort_word);
}

if ($argc > 1)
{
	$arr = array();
	for ($i = 1; $i < count($argv); $i++)
	{
		$str = trim(preg_replace("/\s+/", " ", $argv[$i]));
		$dell_space = ft_split($str);
		for ($j = 0; $j < count($dell_space); $j++) { 
			$word = array_push($arr, $dell_space[$j]);
		}
	}
	usort($arr, 'strcasecmp');
	for ($i = 0; $i < count($arr); $i++)
	{	if(ctype_alpha($arr[$i]))
			echo ($arr[$i]."\n");
	}
	for ($i = 0; $i < count($arr); $i++)
	{	if(ctype_digit($arr[$i]))
			echo ($arr[$i]."\n");
	}

	for ($i = 0; $i < count($arr); $i++)
	{
		if(!(ctype_alpha($arr[$i]) | ctype_digit($arr[$i])))
			echo ($arr[$i]."\n");
	}
}
?>
