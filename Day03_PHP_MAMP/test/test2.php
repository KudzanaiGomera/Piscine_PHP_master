<?php
function writeConfig($file = 'config.php'){
	$write = array (
				'$name' => "'Kudzanai';",
				'$age' => "'25';",
				'$password' => "'Gomera';",
	);
	$open = fopen($file, 'w');
	$text = '';
	foreach ($write as $key => $value){
		$text .= " \r\n$key = $value \r\n";
	}

	fwrite ($open, "<?php \r\n $text \r\n ?>");
	fclose ($open);
}

writeConfig();
?>
