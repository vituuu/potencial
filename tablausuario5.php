<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="getbootstrap/bootstrap.css"	rel="stylesheet">
<link href="getbootstrap/bootstrap-responsive.css" rel="stylesheet">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<?php
function mostrar($tabla){
    $primera=1;
    global $contador, $pre;
    $letra=$pre[$contador];
    $resultado=getmerito($tabla,'0');
    while ($lineaBD = $resultado->fetch_assoc()) {
        if ($primera==1){
 echo"
    <div id=\"collapse".$letra."\" class=\"row-fluid collapse out\">
			<div>
               <div class=\"table\">
                  <table id=\"mytable\" class=\"table table-bordred table-stripedt\">
                  <thead>
                    <th style=\"text-align:left;\">Titulo</th>
                    <th style=\"text-align:left;\">Estado</th>
                  </thead>";
        $primera=0;
        }
        echo "
        <tbody>
            <tr>
							<td style=\"text-align:left;\">
								 " . $lineaBD['titulo']."
							</td>
							<td style=\"text-align:left;\">";
							switch ($lineaBD['estado']) {
								case 0:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:grey\">fiber_manual_record</i>";
									break;
								case 1:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:green\">fiber_manual_record</i>";
									break;
								case 2:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:yellow\">fiber_manual_record</i>";
									break;
								case 3:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:red\">fiber_manual_record</i>";
									break;
								default:
									echo 'Su usuario es incorrecto, intente nuevamente.';
									break;
							}
							
							
							
							echo 	$lineaBD['infoestado']."</td>
							<td style=\"text-align:right;\">
								<button style=\"color:blue; background-color: #ffffff;border: #ffffff\" data-toggle=\"modal\" data-target=\"#newia\"> <i class=\"material-icons\">create</i></button>
								<button style=\"color:blue; background-color: #ffffff;border: #ffffff\"data-toggle=\"modal\" data-target=\"#newia\"><i class=\"material-icons\">delete_sweep</i></button>
							</td>
						 
						</tr>
                        ";
        }
    echo'</tbody>
    </table>
    </div>
    </div>
    </div>';
    }
function borra_entrada($tabla, $id)
  {
  $mysqli = new mysqli("localhost", "vrodriguez", "7672", "potencial");
    if ($mysqli->connect_errno) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
  $userid=$_SESSION["id"];
  $query="SELECT FROM $tabla WHERE userdid=$userid AND id==$id";
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
      //recargar la tabla!!!
  }
  else {
      echo "Error deleting record: " . $conn->error;
  }
}
    function mostrar_sub($fichero, $num_linea){
        global $contador, $pre, $tabla, $tabla_total;
        $letra=$pre[$contador];
        $linea=$fichero[++$num_linea];
        $primera=1;
        
        while ($linea[0]=="."){
            if ($primera!=1)
                echo"<div id=\"collapse".$letra."\" class=\"row-fluid collapse in\">";  
            if ($primera=1){
                echo"<div id=\"collapse".$letra."\" class=\"row-fluid collapse out\">"; 
                $primera=0;}    
			echo"
			<div>
               <div class=\"table\">
                  <table id=\"mytable\" class=\"table table-bordred table-stripedt\">";
                     for ($subtipo = 1,$linea=$fichero[$num_linea]; $linea[0]=='.'; $subtipo++,$linea=$fichero[++$num_linea] ){
                        $resultado=getmerito($tabla_total,$subtipo);
                        
                        echo"<thead>
                        <th style=\"text-align:left;\">".$letra.$subtipo.$linea."</th>
                        <th style=\"text-align:left;\">Estado</th>
                     </thead>";
                        echo "<tbody>";
                            while ($lineaBD = $resultado->fetch_assoc()) {
                                if ($lineaBD['subtipo']==$subtipo) {
                                    echo"
					 	<tr>
							<td style=\"text-align:left;\">
								 " . $lineaBD['titulo']."
							</td>
							<td style=\"text-align:left;\">";
							switch ($lineaBD['estado']) {
								case 0:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:grey\">fiber_manual_record</i>";
									break;
								case 1:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:green\">fiber_manual_record</i>";
									break;
								case 2:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:yellow\">fiber_manual_record</i>";
									break;
								case 3:
									echo"<i class=\"material-icons\" style=\"font-size:24px;color:red\">fiber_manual_record</i>";
									break;
								default:
									echo 'Su usuario es incorrecto, intente nuevamente.';
									break;
							}
							
							
							
							echo 	$lineaBD['infoestado']
    						."</td>
							<td style=\"text-align:right;\">
								<button style=\"color:blue; background-color: #ffffff;border: #ffffff\" data-toggle=\"modal\" data-target=\"#modif".$tabla.$pre[$contador]."\"> <i class=\"material-icons\">create</i></button>
								<button style=\"color:blue; background-color: #ffffff;border: #ffffff\"data-toggle=\"modal\" data-target=\"#delete".$tabla.$pre[$contador]."\"><i class=\"material-icons\">delete_sweep</i></button>
							</td>
						 
						</tr>
                        ";
                                }
                            }
                            echo "
                            </tbody>
                            ";
                        }
                        
                  echo"
                  </table>       
                  </div>
			      </div>";
                    }
            echo"</div>
			      </div>";
            return ($num_linea);
            }
//esto hay que quitarlo, es solo para pruebas.
$_SESSION["id"]=8;
////////////////////////////////////////
include 'library/libreria.php';
$pre=["A","B","C","D","E","FF","G","H","I","J","K","L","M","NN","NNN","O","P","Q","R","S"];
$num_linea=0;
$contador=0;
$apartado='i';
$fichero = file('txt/titulos3.txt');
if($fichero!=NULL){
    $fichero[0] = substr($fichero[0], 3);
    echo"
    <div class=\"container-fluid\">
		<h1 id=titulo>Planificaci&oacuten Acad&eacutemica</h1>
		<div id=\"table-responsive\">
			<div class=\"row-fluid\">
				<div class=\"span8\">CONCEPTO</div>
				<div class=\"span1\">UAD</div>
			</div>";
    for ($linea=$fichero[$num_linea];$linea[0]!='/';$linea=$fichero[$num_linea]){
        $tabla_total=$apartado.$pre[$contador];
        switch ($linea['0']) {
            case '-':
            $total=mostrar_total($tabla_total);
            $linea = substr($linea, 1);
            echo "<div class=\"row-fluid\">
                    <div class=\"accordion-toggle\" data-toggle=\"collapse\"
                        data-target=\"#collapse".$pre[$contador]."\">
                        <div class=\"span8\">".$pre[$contador]."-".$linea."</div>
                        <div class=\"span1\">".$total."</div> </div>
                        <div class=\"offset10\">
                        <button style=\"color:blue; background-color: #ffffff;border: #ffffff\" data-toggle=\"modal\" data-target=\"#new".$tabla_total."\"> <i class=\"material-icons\">add</i></button>
                        </button>
                    </div>
                </div>";
            $num_linea=mostrar_sub($fichero, $num_linea);
            $contador++;
            break;
            case '#':
               $contador++;
            break 2;
            
            default;
                $total=mostrar_total($tabla_total);
                $linea = '-'.$linea;
                echo   "<div class=\"row-fluid\">
                        <div class=\"accordion-toggle\" data-toggle=\"collapse\"data-target=\"#collapse".$pre[$contador]."\">
                            <div class=\"span8\">".$pre[$contador].$linea."</div>
                            <div class=\"span1\">".$total."</div> </div>
                            <div class=\"offset10\">
                            <button style=\"color:blue; background-color: #ffffff;border: #ffffff\" data-toggle=\"modal\" data-target=\"#new".$apartado.$pre[$contador]."\"> <i class=\"material-icons\">add</i></button>
                            </button>
                        </div>
                    </div>";
                mostrar($tabla_total);
                $num_linea++;
                $contador++;
                break;
        }
    }
}
?>
</div>


	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/holder/holder.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/application.js"></script>