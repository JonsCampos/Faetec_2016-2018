<?php 
		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: index.php"); exit;
		}else{
			switch($_SESSION['UsuarioNivel']){
					case 1: 
						include "listamenuindexcomercial.html";
						break;
                    case 2: 
						include "listamenuindexcompras.html";
						break;
                    case 3: 
						include "listamenuindexlogistica.html";
						break;
					case 4: 
						include "listamenuindexrh.html";
						break;
					case 5: 
						include "listamenuindexgerencial.html";
						break;
			}
			
		}
?>