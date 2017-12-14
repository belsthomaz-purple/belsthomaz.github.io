<?php
	require_once('../vendor/autoload.php');
	require_once('simple_html_dom.php');
	function css_inlignment($html){
		$content = str_get_html($html);
		$buildStyle = null;

		foreach($content->find('link') as $element){
			if($element->type=="text/css" || $element->type=="css" || $element->type=="stylesheet"){
				$url = $element->href;
				$css = file_get_contents($url);
				$buildStyle .= "<style>".$css."</style>";
			}
		}
		$e = $content->find('head',0);
		$e->innertext = $buildStyle . $e->innertext;

		return $content;
	}
	function var_check($index,$required){
		if(isset($_POST[$index])){
			return $_POST[$index];
		} else if (isset($_GET[$index])){
			return $_GET[$index];
		} else {
			if($required){
				$result['success'] = false;
				$result['error'] = "No ".$index;
				echo json_encode($result);
				exit();
			}
			return false;
		}
	}
	function html_template($file,$data){
		if(file_exists($file)){
			$content = file_get_contents($file);
		} else {
			$content = $file;
		}

		preg_match_all("/\{([^\}]*)\}/", $content, $modify);
		for($i=0; $i<count($modify[1]); $i++){
			$key = $modify[1][$i];
			if(isset($data[$key])){
				$content = str_replace($modify[0][$i], $data[$modify[1][$i]], $content);
			}
		}
		return $content;
	}

	function ajax_error($error = null, $msg = null, $debug = null){
		header('HTTP/1.1 500 Internal Server Booboo');
		header('Content-Type: application/json; charset=UTF-8');
		die(json_encode(array('msg' => $msg, 'error' => $error, 'debug'=> $debug)));
	}
?>
