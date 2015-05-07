<?php
	ini_set('display_errors', 'Off');
    $url = preg_replace('/(\s)/','+',$_GET['url']);
    $res = file_get_contents ( $url );
    echo($res);
?>