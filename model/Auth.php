<?php
class model_Auth {

	public function Verification($login, $password)
	{
		if($login = 'admin' && $password == '123'){
			return true;
		} else {
			return false;
		}

	}

}
?>