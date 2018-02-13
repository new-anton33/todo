<?php
class model_Todo {

	public function GetTask($id)
	{
		$result = DB::query("SELECT * FROM tasks WHERE id = '{$id}'");
		$task = DB::fetch_assoc($result);

		return $task;

	}

	public function GetTasks($page = 0)
	{
		$tasks = array();
		$result = DB::query("SELECT * FROM tasks");
		while($res = DB::fetch_assoc($result)){
			$tasks[] = $res;
		}

		return $tasks;

	}

	public function AddTask($post, $files)
	{
		if(!empty($post['username'])){ $username = mysql_real_escape_string($post['username']); } else { return false;}
		if(!empty($post['email'])){ $email = mysql_real_escape_string($post['email']); } else { return false;}
		if(!empty($post['title'])){ $title = mysql_real_escape_string($post['title']); } else { return false;}
		if(!empty($post['descr'])){ $descr = mysql_real_escape_string($post['descr']); } else { return false;}

		if(!empty($files['img'])){

			$mime = trim(substr($files['img']['type'],strpos($files['img']['type'],'/')+1));
			if(!in_array($mime, ['jpg', 'jpeg', 'gif', 'png'])) return false;

			$new_img = date('YmdHis').basename($files['img']['name']);
			if(move_uploaded_file($files['img']['tmp_name'], 'images/'.$new_img)){
				$this->ImgResize('images/'.$new_img, 'images/'.$new_img, 320, 240);
			}

			$img = mysql_real_escape_string($new_img);
		} else {
			return false;
		}

		DB::query("INSERT INTO tasks (username,
										email,
										title,
										img,
										descr,
										date_add) VALUES ('{$username}', '{$email}', '{$title}', '{$img}', '{$descr}', '".date('Y-m-d H:i:s')."')");

		return true;
	}

	public function UpTask($id, $post, $files)
	{
		if(!empty($post['username'])){ $username = mysql_real_escape_string($post['username']); } else { return false;}
		if(!empty($post['email'])){ $email = mysql_real_escape_string($post['email']); } else { return false;}
		if(!empty($post['title'])){ $title = mysql_real_escape_string($post['title']); } else { return false;}
		if(!empty($post['descr'])){ $descr = mysql_real_escape_string($post['descr']); } else { return false;}

		$status = (!empty($post['status']))? mysql_real_escape_string($post['status']) : 0 ;

		if(!empty($files['img'])){

			$mime = trim(substr($files['img']['type'],strpos($files['img']['type'],'/')+1));
			if(!in_array($mime, ['jpg', 'jpeg', 'gif', 'png'])) return false;

			$new_img = date('YmdHis').basename($files['img']['name']);
			if(move_uploaded_file($files['img']['tmp_name'], 'images/'.$new_img)){
				$this->ImgResize('images/'.$new_img, 'images/'.$new_img, 320, 240);
			}

			unlink('images/'.$post['old_img']);

			$img = mysql_real_escape_string($new_img);
		} else {
			$img = mysql_real_escape_string($post['old_img']);
		}

		DB::query("UPDATE tasks SET username ='{$username}', email = '{$email}', title = '{$title}', img = '{$img}', descr = '{$descr}', status = '{$status}' WHERE id = '{$id}'");

		return true;
	}


	function ImgResize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100)
	{

		if (!file_exists($src)) return false;

		$size = getimagesize($src);

		if ($size === false) return false;

		$format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
		$icfunc = "imagecreatefrom" . $format;
		if (!function_exists($icfunc)) return false;

		if($size[0] < $width || $size[1] < $height) return false;

		$x_ratio = $width / $size[0];
		$y_ratio = $height / $size[1];

		$ratio       = min($x_ratio, $y_ratio);
		$use_x_ratio = ($x_ratio == $ratio);

		$new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
		$new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
		$new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
		$new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

		$isrc = $icfunc($src);
		$idest = imagecreatetruecolor($width, $height);

		imagefill($idest, 0, 0, $rgb);
		imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
			$new_width, $new_height, $size[0], $size[1]);

		imagejpeg($idest, $dest, $quality);

		imagedestroy($isrc);
		imagedestroy($idest);

		return true;

	}
}
?>