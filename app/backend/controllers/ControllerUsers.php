<?php

class ControllerUsers extends MasterController
{
	public function __construct() {
		parent::__construct();
	}


	public function getHTML($sContent = NULL)
	{
		global $manager;
		global $sections;
		$params = Manager::getParams();


		

		//Common::DebugThis($params);





		#
		# 	ACCIONES
		#
		
		// Create User

		if (isset($_POST['firstname'])) {
			$user = new MDLUsers();

			$user->setFirstname(	$_POST['firstname']);
			$user->setLastname(		$_POST['lastname']);
			$user->setEmail(		$_POST['email']);
			$user->setPassword(		rand(10000,99999));

			$id_user = $user->update();

		}

		//Delete User

		if (count($params) > 2) {
			if ($params[2] == "delete") {
				$vista = "list";
				$user = new MDLUsers();

				$user->setId($params[3]);
				$user->retrieve();
				$user->setDeleted(1);
				$user->update();
			}
		}

		#
		#	VISTAS
		#


		//Seteo Vistas
		if (count($params) > 2) {
			if ($params[2] == "list") {
				$vista = "list";
			}
			else {
				$vista = "list";	
			}
		}


		# LISTAR USERS

		if ($vista = "list") {



			//Variables de Paginado
			$totalpage 	= ceil( LogicUsers::numRows() / ITEMS_PER_PAGE );
			$pagina 	= (is_array($params) && array_key_exists(3, $params) && $params[3] != '' && $params[2] == "list") ? $params[3] : 1;
			$oderBy 	= (is_array($params) && array_key_exists(4, $params) && $params[4] != '' && $params[2] == "list") ? $params[4] : 'id';
			$sort 		= (is_array($params) && array_key_exists(5, $params) && $params[5] != '' && $params[2] == "list") ? $params[5] : 'asc';
			$backpage 	= ($pagina == 1) ? 1 : $pagina - 1;
			$nextpage 	= $pagina + 1;



			$list = LogicUsers::listPerPage($pagina);

			//Common::DebugThis($list);

			parent::newBlock("ITEMLIST");

		 	//ITEMS DE LA LISTA PERSE

			while ($obj = $list->fetch_object()) {
				parent::newBlock("ITEMLISTITEM");
				parent::assign( 'ID'			, $obj->id );
				parent::assign( 'FIRSTNAME'		, $obj->firstname);
				parent::assign( 'LASTNAME'		, $obj->lastname);
				parent::assign( 'EMAIL'			, $obj->email);
				parent::assign( 'USERTYPE'		, $obj->user_type);
				parent::gotoBlock("_ROOT");	

			}

			parent::gotoBlock("_ROOT");	
		}






		// #Datos para listar los clientdeals

		// $totalRows = $mod_deals->listClientDealsByClient($userid);
		// $totalpage = ceil( $totalRows->num_rows / $pageSize );
		// $pagina = (is_array($params) && array_key_exists(2, $params) && $params[2] != '') ? $params[2] : 1;
		// $backpage = ($pagina == 1) ? 1 : $pagina - 1;
		// $nextpage = $pagina + 1;
		// $clientdeals = $mod_deals->listClientDealsByClientPerPage($userid, $pagina, $pageSize);
		// $orderBy = $params[5];


		// $fileList = LogicUploads::DoList();

		// if ($fileList != false) {
		// 	parent::newBlock("ITEMLIST");

		// // 	//ITEMS DE LA LISTA PERSE

		// 	while ($obj = $fileList->fetch_object()) {
		// 		parent::newBlock("ITEMLISTITEM");
		// 		parent::assign( 'ID'	, $obj->id );
		// 		parent::assign( 'FILENAME', $obj->filename);
		// 		parent::assign( 'DESCRIPTION', $obj->description);
		// 		parent::gotoBlock("_ROOT");	

		// 	}

		// 	parent::gotoBlock("_ROOT");	

		// }
		

		






		

		
		



		





		return parent::getOutputContent();

	}





}