<!-- <?php

@define(_lib, "../../lib/");

include_once _lib."functions.php";

if (@$_COOKIE['user']['username'] == "") {

	die();

	exit(1);

}

else {

	$result = array();

	for ($k=0; $k < count($_FILES['file']['name']); $k++) {

		$name = explode(".", $_FILES['file']['name'][$k]);

		$ext = end($name);

		if(getimagesize($_FILES['file']['tmp_name'][$k]) == false) {

			die();

			exit(1);

		}

		if(!is_dir("../../upload/noi-dung")) {

			mkdir("../../upload/noi-dung");

			chmod("../../upload/noi-dung", 0777);

		}

		$name = implode("-", array_slice($name, 0, count($name)-1));

		$name = changeTitle($name);

		$tmp_name = $_FILES['file']['tmp_name'][$k];

		$i = "";

		$j = "";

		while (file_exists("../../upload/noi-dung/{$name}{$j}.{$ext}")) {

			if($i == "") $i = 1;

			else $i++;

			$j = "-" . $i;

		}

		move_uploaded_file($tmp_name, "../../upload/noi-dung/{$name}{$j}.{$ext}");

		$result[] = "upload/noi-dung/{$name}{$j}.{$ext}";

	}

	echo implode(";", $result);

}

?> -->