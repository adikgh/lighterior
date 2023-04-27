<?


	header("Access-Control-Allow-Origin: *");


	// 
	if(isset($_GET['product_img_add'])) {
		$path = '../assets/uploads/products/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$error = $success = '';
		$datetime = date('Ymd-His', time());

		if (!isset($_FILES['file'])) $error = 'Файлды жүктей алмады';
		else {
			$file = $_FILES['file'];
			if (!empty($file['error']) || empty($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			else {
				$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
				$name = mb_eregi_replace($pattern, '-', $file['name']);
				$name = mb_ereg_replace('[-]+', '-', $name);
				$parts = pathinfo($name);
				$name = $datetime.'-'.$name;

				if (empty($name) || empty($parts['extension'])) $error = 'Файлды жүктей алмады';
				elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) $error = 'Файлды жүктей алмады';
				elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) $error = 'Файлды жүктей алмады';
				else {
					if (move_uploaded_file($file['tmp_name'], $path . $name)) $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
					else $error = 'Файлды жүктей алмады';
				}
			}
		}
		
		if (!empty($error)) $error = '<p style="color:red">'.$error.'</p>';
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $name,
		);
		
		header('Content-Type: application/json');
		// header("Access-Control-Allow-Origin: *");
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit();
	}





	// 
	if(isset($_GET['add_sess'])) {
		$_SESSION['product_id'] = strip_tags($_POST['id']);
		exit();
	}


	// 
	if(isset($_GET['add_item_photo2'])) {
		$id = $_SESSION['product_id'];
		$id = 12;
		$input_name = 'file';
		$path = '../assets/uploads/products/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$data = array();
		$datetime = date('Y-m-d-H-i-s', time());
		$filem = array();

		if (!isset($_FILES[$input_name])) { $error = 'Файлы не загружены.'; }
		else {
			$files = array();
			$diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
			if ($diff == 0) $files = array($_FILES[$input_name]);
			else {
				foreach($_FILES[$input_name] as $k => $l) {
					foreach($l as $i => $v) {
						$files[$i][$k] = $v;
					}
				}
			}

			foreach ($files as $key=>$file) {
				$error = $success = '';
				if (!empty($file['error']) || empty($file['tmp_name'])) {
					$error = 'Не удалось загрузить файл.';
				} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
					$error = 'Не удалось загрузить файл.';
				} else {
					$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
					$name = mb_eregi_replace($pattern, '-', $file['name']);
					$name = mb_ereg_replace('[-]+', '-', $name);
					$parts = pathinfo($name);
					$name = $datetime.'-'.$name;
					array_push($filem, $name);
					
					if (empty($name) || empty($parts['extension'])) {
						$error = 'Недопустимый тип файла';
					} elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
						$error = 'Недопустимый тип файла';
					} elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
						$error = 'Недопустимый тип файла';
					} else {
						if (move_uploaded_file($file['tmp_name'], $path . $name)) {
							$sql = db::query("INSERT INTO `product_img`(`product_id`, `product_item_id`, `number`, `img`) VALUES ('$id', '$id', '$key', '$name')");
							$success = 'Файл «' . $name . '» успешно загружен.';
						} else $error = 'Не удалось загрузить файл.';
					}
				}
			}

			if (!empty($success)) $data[] = '<p style="color: green">' . $success . '</p>';  
			if (!empty($error)) $data[] = '<p style="color: red">' . $error . '</p>';  
		}
				
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $filem,
		);
		
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit();
	}

