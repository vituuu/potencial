

<?php


//$userid=$_SESSION["id"];

$userid=8;

$id = htmlspecialchars($_POST['id']);
$tabla = htmlspecialchars($_POST['tabla']);


$mysqli = new mysqli("localhost", "vrodriguez", "7672", "potencial");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die("Error: No se pudo conectar");
}
  switch ($tabla) {
    case "ia":
    $query = "SELECT * FROM $tabla WHERE id=$id";
    $resultado = $mysqli->query($query);
    $lineaBD = $resultado->fetch_assoc();

    echo"



    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>
    
                      <div>
                         <label for=\"nombre\">Nombre del Proyecto</label>
                         <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                      </div>
              <br>
                      <div>
                        <label for=\"orgfin\">Organización Financiadora</label>
                        <input type=\"text\" class=\"form-control\" id=\"orgfin\" name=\"orgfin\" value = \"".$lineaBD['orgfin']."\">
                      </div>
              <br>
              <div>
                        <label for=\"entcol\">Entidades Colaboradoras</label>
                        <input type=\"text\" class=\"form-control\" id=\"entcol\" name=\"entcol\" value = \"".$lineaBD['entidades']."\">
                      </div>
                      <br>
                      <div>
                        <label for=\"fechaini\">Fecha inicio</label>
                        <input class=\"form-control\" id=\"fechaini\" name=\"fechaini\" type=\"date\"\ value = \"".$lineaBD['desde']."\">
                        <label for=\"fechafin\">Fecha finalización</label>
                        <input class=\"form-control\" id=\"fechafin\" name=\"fechafin\"type=\"date\"\ value = \"".$lineaBD['hasta']."\">
                      </div>
                      <div>
                        <p class=\"subtitulo\"><label for=\"subtot\">Subvención total</label></p>
                        <input type=\"text\" class=\"form-control\" id=\"subtot\" name=\"subtot\" value = \"".$lineaBD['subvencion']."\">
                      </div>
                      <div>
                        <p class=\"subtitulo\"><label for=\"investigador\">Investigador</label></p>
                        <input type=\"text\" class=\"form-control\" id=\"investigador\" name=\"investigador\" value = \"".$lineaBD['invprincipal']."\">
                      </div>
                      <div>
                        <p class=\"subtitulo\"><label for=\"numinv\">Número de investigadores</label></p>
                        <input type=\"text\" class=\"form-control\" id=\"numinv\" name=\"numinv\" value = \"".$lineaBD['numinv']."\">
                      </div>
                      <input type=\"hidden\" name=\"tabla\" value=\"ia\" />
                      <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                      <div class=\"modal-footer\">
                        <input type=\"submit\" name=\"insertaia\" id=\"newia\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                      </div>
                    </form>
";

      break;

      case "ib":
      
     echo"   <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method=\"post\" class=\"form-horizontal\" autocomplete=\"on\">
     
                        <label for=\"id\">Grupo de Investigación</label></p>
                         <select name=\"select\">";
                            $mysqli = new mysqli("localhost", "vrodriguez", "7672", "potencial");
                               if ($mysqli->connect_errno) {
                                 echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                                 die("Error: No se pudo conectar");
                               }
                               $query = "SELECT * FROM grupoinv";
                               $resultado = $mysqli->query($query);
                               while ($lineaBD = $resultado->fetch_assoc())
                           echo"
                           <option value=".$lineaBD['id'].">".$lineaBD['nombre']."</option>";
                           
                        echo" </select>";
                         $query = "SELECT * FROM $tabla WHERE id=$id ";
                         $resultado = $mysqli->query($query);
                         $lineaBD = $resultado->fetch_assoc();
                echo" 
               <br>
                       <div class=\"form-group\">
                          <label for=\"orgfin\">Cargo</label></p>
                          <input type=\"text\" class=\"form-control\" id=\"cargo\" name=\"cargo\" value =".$lineaBD['cargo'].">
                        </div>
               <br>
                        <div class=\"form-group\">
                          <label for=\"orgfin\">Unidades Docentes</label></p>
                          <input type=\"text\" class=\"form-control\" id=\"orgfin\" name=\"orgfin\" value=".$lineaBD['UD'].">
                        </div>
                <br>
                        <input type=\"hidden\" name=\"tabla\" value=\"ib\" />
                        <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                        <div class=\"modal-footer\">
                          <input type=\"submit\" name=\"insertaib\" id=\"newib\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                        </div>
                      </form>
     ";
 
       break;
    

    case "ic":
     
    $query = "SELECT * FROM $tabla WHERE id=$id";
    $resultado = $mysqli->query($query);
    $lineaBD = $resultado->fetch_assoc();

    echo"    <form id=\"insertaic\" name=\"newic\" action=\"library/tablausuario/update.php\" method=\"post\" class=\"form-horizontal\" autocomplete=\"on\">
    
   
                         <label for=\"nombre\">Título</label></p>
                        <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value=".$lineaBD['titulo'].">
                       <br>
                        <label for=\"orgfin\">Unidades Docentes</label></p>
                        <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value=".$lineaBD['UD'].">
                      <br>
                     <label for=\"subtipo\">Subtipo</label></p>
                       <select name=\"subtipo\">    
                         <option value=\"1\" selected=\"selected\">Reconocimiento de la investigación</option>
                         <option value=\"2\">Publicaciones de investigación indexada</option>
                         <option value=\"3\">Publicaciones de investigación no indexada</option>
                       </select>
                      <br>
   
                        <label for=\"fechapub\">Fecha de publicación</label>
                        <input class=\"form-control\" id=\"fechapub\" name=\"fechapub\" type=\"date\"  value=".$lineaBD['fecha'].">
   
                        <label for=\"autores\">Autores</label>
                        <input class=\"form-control\" id=\"autores\" name=\"autores\"type=\"text\"  value=".$lineaBD['autores'].">
   
                        <label for=\"revista\">Revista</label>
                        <input class=\"form-control\" id=\"revista\" name=\"revista\" type=\"text\"  value=".$lineaBD['revista'].">
   
                        <label for=\"isbn\">ISBN</label>
                        <input class=\"form-control\" id=\"isbn\" name=\"isbn\"type=\"text\"  value=".$lineaBD['isbn'].">
   
                        <label for=\"clave\">Clave</label>
                        <input class=\"form-control\" id=\"clave\" name=\"clave\" type=\"text\"  value=".$lineaBD['clave'].">
   
                        <label for=\"volumen\">Volumen</label>
                        <input class=\"form-control\" id=\"volumen\" name=\"volumen\"type=\"text\"  value=".$lineaBD['volumen'].">
   
                        <label for=\"pin\">pin</label>
                        <input class=\"form-control\" id=\"pin\" name=\"pin\"type=\"text\"  value=".$lineaBD['pin'].">
   
                        <label for=\"pfin\">pfin</label>
                        <input class=\"form-control\" id=\"pfin\" name=\"pfin\"type=\"text\"  value=".$lineaBD['pfin'].">
   
                        <label for=\"impacto\">Impacto</label>
                        <input class=\"form-control\" id=\"impacto\" name=\"impacto\" type=\"text\"  value=".$lineaBD['impacto'].">
   
                        <label for=\"citas\">Citas</label>
                        <input class=\"form-control\" id=\"citas\" name=\"citas\"type=\"text\" value=".$lineaBD['citas']." >
   
                        <label for=\"acta\">Acta</label>
                        <input class=\"form-control\" id=\"acta\" name=\"acta\" type=\"text\"  value=".$lineaBD['acta'].">
   
                        <label for=\"editorial\">Editorial</label>
                        <input class=\"form-control\" id=\"editorial\" name=\"editorial\"type=\"text\"  value=".$lineaBD['editorial'].">
   
                        <label for=\"lugar\">Lugar</label>
                        <input class=\"form-control\" id=\"lugar\" name=\"lugar\"type=\"text\"  value=".$lineaBD['lugar'].">
   
                        <input type=\"hidden\" name=\"tabla\" value=\"ic\" />
                        <input type=\"hidden\" name=\"id\" value=\"".$id."\" />                     
   
                      <div class=\"modal-footer\">
                        <input type=\"submit\" name=\"insertaic\" id=\"newic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                      </div>
                    </form>
    ";
    break;

    case "id":
    
   $query = "SELECT * FROM $tabla WHERE id=$id";
   $resultado = $mysqli->query($query);
   $lineaBD = $resultado->fetch_assoc();

   echo"    <form id=\"insertaid\" name=\"newid\" action=\"library/tablausuario/update.php\" method=\"post\" class=\"form-horizontal\" autocomplete=\"on\">
  
                       <label for=\"nombre\">Nombre del Congreso</label>
                       <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">

                       <label for=\"orgfin\">Unidades Docentes</label></p>
                       <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
  
                       <label for=\"fechapub\">Fecha</label>
                       <input class=\"form-control\" id=\"fecha\" name=\"fecha\" type=\"date\" value = \"".$lineaBD['fecha']."\">
  
                       <label for=\"participacion\">Participación</label>
                       <input class=\"form-control\" id=\"participacion\" name=\"participacion\" type=\"text\"  value = \"".$lineaBD['participacion']."\">
  
                       <label for=\"regional\">Regional</label>
                       <input class=\"form-control\" id=\"regional\" name=\"regional\" type=\"text\"  value = \"".$lineaBD['regional']."\">
  
                       <label for=\"lugar\">Lugar</label>
                       <input class=\"form-control\" id=\"lugar\" name=\"lugar\"type=\"text\"  value = \"".$lineaBD['lugar']."\">
  
                       <input type=\"hidden\" name=\"tabla\" value=\"id\" >
                       <input type=\"hidden\" name=\"id\" value=\"".$id."\" />                     
  
  
                       <div class=\"modal-footer\">
                       <input type=\"submit\" name=\"insertaid\" id=\"newid\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                     </div>
                   </form>
   ";


      break;
    case "ie":
          
   $query = "SELECT * FROM $tabla WHERE id=$id";
   $resultado = $mysqli->query($query);
   $lineaBD = $resultado->fetch_assoc();

      
   echo"   <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method=\"post\" class=\"form-horizontal\" autocomplete=\"on\">
   
                      <label for=\"id\">Grupo de Investigación</label></p>
                       <select name=\"select\">";
                          $mysqli = new mysqli("localhost", "vrodriguez", "7672", "potencial");
                             if ($mysqli->connect_errno) {
                               echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                               die("Error: No se pudo conectar");
                             }
                             $query = "SELECT * FROM redinv";
                             $resultado = $mysqli->query($query);
                             while ($lineaBD = $resultado->fetch_assoc())
                         echo"
                         <option value=".$lineaBD['id'].">".$lineaBD['nombre']."</option>";
                         
                      echo" </select>";
                       $query = "SELECT * FROM $tabla WHERE id=$id ";
                       $resultado = $mysqli->query($query);
                       $lineaBD = $resultado->fetch_assoc();
              echo" 
             <br>

                      <input type=\"hidden\" name=\"tabla\" value=\"ie\" />
                      <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                      <div class=\"modal-footer\">
                        <input type=\"submit\" name=\"editie\" id=\"editie\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                      </div>
                    </form>

   ";

      break;

      case "iff":
      
     $query = "SELECT * FROM $tabla WHERE id=$id";
     $resultado = $mysqli->query($query);
     $lineaBD = $resultado->fetch_assoc();
 
     echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>
     
                       <div>
                          <label for=\"nombre\">Título</label>
                         <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                       </div>
               <br>
                       <input type=\"hidden\" name=\"tabla\" value=\"iff\" />
                       <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                       <div class=\"modal-footer\">
                         <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                       </div>
                     </form>
     ";
     break;
       
      case "ig":
      
     $query = "SELECT * FROM $tabla WHERE id=$id";
     $resultado = $mysqli->query($query);
     $lineaBD = $resultado->fetch_assoc();
 
     echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>
     
                       <div>
                          <label for=\"nombre\">Título</label>
                         <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                       </div>
               <br>
                       <div>
                         <label for=\"orgfin\">Unidades Docentes</label>
                         <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
                       </div>
               <br>
               <div>
                         <label for=\"entcol\">Investigador Principal</label>
                         <input type=\"text\" class=\"form-control\" id=\"investigador\" name=\"investigador\" value = \"".$lineaBD['investigador']."\">
                       </div>
                       <br>
                       <div>
                         <p class=\"subtitulo\"><label for=\"subtot\">Editor </label></p>
                         <input type=\"text\" class=\"form-control\" id=\"editor\" name=\"editor\" value = \"".$lineaBD['editor']."\">
                       </div>
                       <br>
                       <div>
                         <p class=\"subtitulo\"><label for=\"investigador\">Revista</label></p>
                         <input type=\"text\" class=\"form-control\" id=\"revista\" name=\"revista\" value = \"".$lineaBD['revista']."\">
                       </div>
                       <br>
                       <div>
                         <p class=\"subtitulo\"><label for=\"numinv\">Impacto</label></p>
                         <input type=\"text\" class=\"form-control\" id=\"impacto\" name=\"impacto\" value = \"".$lineaBD['impacto']."\">
                       </div>
                       <br>
                       <div>
                         <p class=\"subtitulo\"><label for=\"numinv\">Nacional</label></p>
                         <input type=\"text\" class=\"form-control\" id=\"nacional\" name=\"nacional\" value = \"".$lineaBD['nacional']."\">
                       </div>
                       <br>
                       <div>
                         <p class=\"subtitulo\"><label for=\"numinv\">Fecha de inicio</label></p>
                         <input type=\"date\" class=\"form-control\" id=\"desde\" name=\"desde\" value = \"".$lineaBD['desde']."\">
                       </div>
                       <br>
                       <div>
                         <p class=\"subtitulo\"><label for=\"numinv\">Fecha de finalización</label></p>
                         <input type=\"date\" class=\"form-control\" id=\"hasta\" name=\"hasta\" value = \"".$lineaBD['hasta']."\">
                       </div>
                      
                       <input type=\"hidden\" name=\"tabla\" value=\"ig\" />
                       <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                       <div class=\"modal-footer\">
                         <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                       </div>
                     </form>
     ";
     break;
      
   case "ih":
   
  $query = "SELECT * FROM $tabla WHERE id=$id";
  $resultado = $mysqli->query($query);
  $lineaBD = $resultado->fetch_assoc();

  echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>
  
                    <div>
                       <label for=\"nombre\">Título</label>
                      <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                    </div>
            <br>
                    <div>
                      <label for=\"orgfin\">Unidades Docentes</label>
                      <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
                    </div>
            <br>
            <div>
                      <label for=\"entcol\">Investigador Principal</label>
                      <input type=\"text\" class=\"form-control\" id=\"investigador\" name=\"investigador\" value = \"".$lineaBD['investigador']."\">
                    </div>
                    <br>
                    <div>
                      <p class=\"subtitulo\"><label for=\"subtot\">Centro </label></p>
                      <input type=\"text\" class=\"form-control\" id=\"centro\" name=\"centro\" value = \"".$lineaBD['centro']."\">
                    </div>
                    <br>
                    <div>
                      <p class=\"subtitulo\"><label for=\"investigador\">País</label></p>
                      <input type=\"text\" class=\"form-control\" id=\"pais\" name=\"pais\" value = \"".$lineaBD['pais']."\">
                    </div>
                    <br>
                    <div>
                      <p class=\"subtitulo\"><label for=\"numinv\">Fecha de inicio</label></p>
                      <input type=\"date\" class=\"form-control\" id=\"inicio\" name=\"inicio\" value = \"".$lineaBD['inicio']."\">
                    </div>
                    <br>
                    <div>
                      <p class=\"subtitulo\"><label for=\"numinv\">Fecha de finalización</label></p>
                      <input type=\"date\" class=\"form-control\" id=\"fin\" name=\"fin\" value = \"".$lineaBD['fin']."\">
                    </div>
                    <input type=\"hidden\" name=\"tabla\" value=\"ih\" />
                    <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                    <div class=\"modal-footer\">
                      <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                    </div>
                  </form>
  ";
  break;
      
  case "ii":
  
 $query = "SELECT * FROM $tabla WHERE id=$id";
 $resultado = $mysqli->query($query);
 $lineaBD = $resultado->fetch_assoc();

 echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method=\"post\" class=\"form-horizontal\" autocomplete=\"on\">
 
                    <label for=\"id\">Tesis</label></p>
                     <select name=\"select\">";
                        $mysqli = new mysqli("localhost", "vrodriguez", "7672", "potencial");
                           if ($mysqli->connect_errno) {
                             echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                             die("Error: No se pudo conectar");
                           }
                           $query = "SELECT * FROM tesis";
                           $resultado = $mysqli->query($query);
                           while ($lineaBD = $resultado->fetch_assoc())
                       echo"
                       <option value=".$lineaBD['id'].">".$lineaBD['titulo']."</option>";
                       
                    echo" </select>";
                     $query = "SELECT * FROM $tabla WHERE id=$id ";
                     $resultado = $mysqli->query($query);
                     $lineaBD = $resultado->fetch_assoc();
            echo" 
          
                    <input type=\"hidden\" name=\"tabla\" value=\"ii\" />
                    <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                    <div class=\"modal-footer\">
                      <input type=\"submit\" name=\"insertaii\" id=\"newii\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                    </div>
                  </form>
 ";
 break;
      
 case "ij":
 
$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method=\"post\" class=\"form-horizontal\" autocomplete=\"on\">

                   <label for=\"id\">Tesis</label></p>
                    <select name=\"select\">";
                       $mysqli = new mysqli("localhost", "vrodriguez", "7672", "potencial");
                          if ($mysqli->connect_errno) {
                            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            die("Error: No se pudo conectar");
                          }
                          $query = "SELECT * FROM tesis";
                          $resultado = $mysqli->query($query);
                          while ($lineaBD = $resultado->fetch_assoc())
                      echo"
                      <option value=".$lineaBD['id'].">".$lineaBD['titulo']."</option>";
                      
                   echo" </select>";
                    $query = "SELECT * FROM $tabla WHERE id=$id ";
                    $resultado = $mysqli->query($query);
                    $lineaBD = $resultado->fetch_assoc();
           echo" 
         
                   <input type=\"hidden\" name=\"tabla\" value=\"ij\" />
                   <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                   <div class=\"modal-footer\">
                     <input type=\"submit\" name=\"insertaii\" id=\"newii\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                   </div>
                 </form>
";
break;
      
case "ik":

$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>

                 <div>
                    <label for=\"nombre\">Título</label>
                   <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                 </div>
         <br>
                 <div>
                   <label for=\"orgfin\">Unidades Docentes</label>
                   <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
                 </div>
         <br>
         <div>
                   <label for=\"entcol\">Organización Financiadora</label>
                   <input type=\"text\" class=\"form-control\" id=\"orgfin\" name=\"orgfin\" value = \"".$lineaBD['orgfin']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"subtot\">Entidades Colaboradoras </label></p>
                   <input type=\"text\" class=\"form-control\" id=\"entidades\" name=\"entidades\" value = \"".$lineaBD['entidades']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"investigador\">Fecha de inicio</label></p>
                   <input type=\"date\" class=\"form-control\" id=\"desde\" name=\"desde\" value = \"".$lineaBD['desde']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Fecha de finalización</label></p>
                   <input type=\"date\" class=\"form-control\" id=\"hasta\" name=\"hasta\" value = \"".$lineaBD['hasta']."\">
                 </div>
                 <br>
                 <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Investigador principal</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"invprincipal\" name=\"invresponsable\" value = \"".$lineaBD['numinv']."\">
               </div>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Número de investigadores</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"numinv\" name=\"numinv\" value = \"".$lineaBD['numinv']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Subvencion</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"subvencion\" name=\"subvencion\" value = \"".$lineaBD['subvencion']."\">
                 </div>
                 <input type=\"hidden\" name=\"tabla\" value=\"ik\" />
                 <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                 <div class=\"modal-footer\">
                   <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                 </div>
               </form>
";
break;
      
case "il":

$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>

                 <div>
                    <label for=\"nombre\">Título</label>
                   <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                 </div>
         <br>
                 <div>
                   <label for=\"orgfin\">Unidades Docentes</label>
                   <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
                 </div>
         <br>
         <div>
                   <label for=\"entcol\">Fecha de publicación</label>
                   <input type=\"date\" class=\"form-control\" id=\"fecha\" name=\"fecha\" value = \"".$lineaBD['fecha']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"subtot\">Autores </label></p>
                   <input type=\"text\" class=\"form-control\" id=\"autores\" name=\"autores\" value = \"".$lineaBD['autores']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"investigador\">Revista</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"revista\" name=\"revista\" value = \"".$lineaBD['revista']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">ISBN</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"isbn\" name=\"isbn\" value = \"".$lineaBD['isbn']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Clave</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"clave\" name=\"clave\" value = \"".$lineaBD['clave']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Volumen</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"volumen\" name=\"volumen\" value = \"".$lineaBD['volumen']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Impacto</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"impacto\" name=\"impacto\" value = \"".$lineaBD['impacto']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Págnia de inicio</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"pini\" name=\"pini\" value = \"".$lineaBD['pin']."\">
                 </div>
                 <br>
                 <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Página de finalización</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"pfin\" name=\"pfin\" value = \"".$lineaBD['pfin']."\">
               </div>
               <br>
               <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Citas</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"citas\" name=\"citas\" value = \"".$lineaBD['citas']."\">
               </div>
               <br>
               <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Acta</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"acta\" name=\"acta\" value = \"".$lineaBD['acta']."\">
               </div>
               <br>
               <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Editorial</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"editorial\" name=\"editorial\" value = \"".$lineaBD['editorial']."\">
               </div>
               <br>
               <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Lugar de publicación</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"lugar\" name=\"lugar\" value = \"".$lineaBD['lugar']."\">
               </div>
               <br>
                 <input type=\"hidden\" name=\"tabla\" value=\"il\" />
                 <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                 <div class=\"modal-footer\">
                   <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                 </div>
               </form>
";
break;
      
case "im":

$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>

                 <div>
                    <label for=\"nombre\">Nombre de la empresa</label>
                   <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                 </div>
         <br>
                 <div>
                   <label for=\"orgfin\">CIF</label>
                   <input type=\"text\" class=\"form-control\" id=\"CIF\" name=\"CIF\" value = \"".$lineaBD['CIF']."\">
                 </div>
         <br>
         <div>
                   <label for=\"entcol\">Razón social</label>
                   <input type=\"text\" class=\"form-control\" id=\"razsocial\" name=\"razsocial\" value = \"".$lineaBD['titulo']."\">
                 </div>

                 <input type=\"hidden\" name=\"tabla\" value=\"im\" />
                 <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                 <div class=\"modal-footer\">
                   <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                 </div>
               </form>
";
break;
      
case "inn":

$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>

                 <div>
                    <label for=\"nombre\">Título</label>
                   <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                 </div>
         <br>
                 <div>
                   <label for=\"orgfin\">Unidades Docentes</label>
                   <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
                 </div>
         <br>
         <div>
                   <label for=\"entcol\">Investigadores</label>
                   <input type=\"text\" class=\"form-control\" id=\"investigadores\" name=\"investigadores\" value = \"".$lineaBD['investigadores']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"subtot\">Entidades </label></p>
                   <input type=\"text\" class=\"form-control\" id=\"entidad\" name=\"entidad\" value = \"".$lineaBD['entidad']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"investigador\">Tema</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"tema\" name=\"tema\" value = \"".$lineaBD['tema']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Fecha de colaboración</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"fecha\" name=\"fecha\" value = \"".$lineaBD['fecha']."\">
                 </div>

                 <input type=\"hidden\" name=\"tabla\" value=\"inn\" />
                 <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                 <div class=\"modal-footer\">
                   <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                 </div>
               </form>
";
break;
      
case "innn":

$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>

                 <div>
                    <label for=\"nombre\">Título</label>
                   <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                 </div>
         <br>
                 <div>
                   <label for=\"orgfin\">Unidades Docentes</label>
                   <input type=\"text\" class=\"form-control\" id=\"UD\" name=\"UD\" value = \"".$lineaBD['UD']."\">
                 </div>
         <br>
         <div>
                   <label for=\"entcol\">Organización financiadora</label>
                   <input type=\"text\" class=\"form-control\" id=\"orgfin\" name=\"orgfin\" value = \"".$lineaBD['orgfin']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"subtot\">Entidades financiadoras </label></p>
                   <input type=\"text\" class=\"form-control\" id=\"entidades\" name=\"entidades\" value = \"".$lineaBD['entidades']."\">
                 </div>
                 <br>
                 <div>
                 <p class=\"subtitulo\"><label for=\"numinv\">Subvencion</label></p>
                 <input type=\"text\" class=\"form-control\" id=\"subvencion\" name=\"subvencion\" value = \"".$lineaBD['subvencion']."\">
               </div>
               <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"investigador\">Fecha de inicio</label></p>
                   <input type=\"date\" class=\"form-control\" id=\"desde\" name=\"desde\" value = \"".$lineaBD['desde']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Fecha de finalización</label></p>
                   <input type=\"date\" class=\"form-control\" id=\"hasta\" name=\"hasta\" value = \"".$lineaBD['hasta']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Investigadores principal</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"invprincipal\" name=\"invprincipal\" value = \"".$lineaBD['invprincipal']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Núnero de investigadores</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"numinv\" name=\"numinv\" value = \"".$lineaBD['numinv']."\">
                 </div>

                 <input type=\"hidden\" name=\"tabla\" value=\"innn\" />
                 <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                 <div class=\"modal-footer\">
                   <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                 </div>
               </form>
";
break;
      
case "io":

$query = "SELECT * FROM $tabla WHERE id=$id";
$resultado = $mysqli->query($query);
$lineaBD = $resultado->fetch_assoc();

echo"    <form id=\"form_Cv_2\" name=\"form_Cv_2\" action=\"library/tablausuario/update.php\" method='post'>

                 <div>
                    <label for=\"nombre\">Título</label>
                   <input type=\"text\" class=\"form-control\" id=\"titulo\" name=\"titulo\" value = \"".$lineaBD['titulo']."\">
                 </div>
         <br>
                 <div>
                   <label for=\"orgfin\">Autores</label>
                   <input type=\"text\" class=\"form-control\" id=\"autores\" name=\"autores\" value = \"".$lineaBD['autores']."\">
                 </div>
         <br>
         <div>
                   <label for=\"entcol\">Participación</label>
                   <input type=\"text\" class=\"form-control\" id=\"participacion\" name=\"participacion\" value = \"".$lineaBD['participacion']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"subtot\">Congreso </label></p>
                   <input type=\"text\" class=\"form-control\" id=\"congreso\" name=\"congreso\" value = \"".$lineaBD['congreso']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"investigador\">Regional</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"regional\" name=\"regional\" value = \"".$lineaBD['regional']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Lugar de celebración</label></p>
                   <input type=\"text\" class=\"form-control\" id=\"lugar\" name=\"lugar\" value = \"".$lineaBD['lugar']."\">
                 </div>
                 <br>
                 <div>
                   <p class=\"subtitulo\"><label for=\"numinv\">Fecha de celebración</label></p>
                   <input type=\"date\" class=\"form-control\" id=\"fecha\" name=\"fecha\" value = \"".$lineaBD['fecha']."\">
                 </div>

                 <input type=\"hidden\" name=\"tabla\" value=\"io\" />
                 <input type=\"hidden\" name=\"id\" value=\"".$id."\" />
                 <div class=\"modal-footer\">
                   <input type=\"submit\" name=\"updateic\" id=\"updateic\" class=\"btn btn-success\" style=\"width:100%;\" value=\"Guardar\"/>
                 </div>
               </form>
";
break;

default:
echo "ha fallado la edición, pruebe de nuevo";

  }
  ?>