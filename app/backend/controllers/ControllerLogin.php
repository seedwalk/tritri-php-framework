<?php
class ControllerLogin extends MasterController
{
	public function __construct() {
		parent::__construct();
	}

	public function getHTML( $sContent = NULL)  
	{


		$params = Manager::getParams();
		$error = false;


		$vista = "login";

		//CHEKEA SI ESTA HACIENDO LOGOUT
		if (count($params) > 2) {
			if ($params[2] == "out"){
				Session::kill("userid");
				Session::kill("username");
				Session::kill("usermail");
				$error = "Sesión cerrada correctamente";
				parent::newBlock("SUCCESS");
				parent::assign( 'SUCCESS'	, $error );
				parent::gotoBlock("_ROOT");			
			}





		}


		/*INICNIO SESSION*/


		if (isset($_POST["username"])) // SI EL USUARIO CLICKEO INICIAR SESSION
		{
			if ($_POST["username"] == "" || $_POST["pwd"] == "") { //ALGUN FIELD VIENE VACIO
				$error = "Nombre de usuario o contraseña invalidas";
				parent::newBlock("ERROR");
				parent::assign( 'ERROR'	, $error );
				parent::gotoBlock("_ROOT");
			}
			else {
				$user = LogicUsers::loginCredentialsBackend($_POST["username"], $_POST["pwd"]); //BUSCA EL USUARIO EN LA DB


				Common::DebugThis($user);
				if ($user->num_rows <= 0) { //NO ENCUENTRA EL USUARIO

					$error = "Nombre de usuario o contraseña invalidas";
					parent::assign("USERNAME", $_POST["username"]);
					parent::newBlock("ERROR");
					parent::assign( 'ERROR'	, $error );
					parent::gotoBlock("_ROOT");

				}
				else { //ENCUENTRA EL USUARIO
					$obj = $user->fetch_object();
					Session::set("userid",$obj->id);
					Session::set("usermail",$obj->mail);
					Session::set("backendLogin", true);
					//Session::set("useraccount",$obj->account_id);
					Session::set("userType",$obj->user_type);
					header('Location: '.APP_WEB_PATH);
					exit;
				}

			}
		}


		parent::newBlock( 'LOGIN');

		if (isset($_POST['username'])) {
			parent::assign( 'USERNAME' , $_POST['username'] );
		}
		parent::gotoBlock("_ROOT");		




		



		//Devuelve La View
		return parent::getOutputContent();
	}
	
	
}

?>