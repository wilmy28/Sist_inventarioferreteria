<?php 
class clsConexion{

  var $conect;
     function clsConexion(){
	 }
	 
	 function getCon(){
	 return $this->conect;
	 }
	 
	 function conectarse() {
		
	     if(!($con=@mysql_connect("localhost","root","",true,65536)))
		 {
		     echo"Error al conectar a la base de datos";	
			 exit();
	      }
		  if (!@mysql_select_db("dbventasweb",$con)) {
		   echo "error al seleccionar la base de datos";  
		   exit();
		  }
	       $this->conect=$con;
		   return true;	
	 }
}

?>
