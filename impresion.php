<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=ResultadosIntermedioNov2013.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php
require_once("conexionh.php");
$conexion=new conexion();
$conexion->conectar();	
?>
<html>
	<head>
	<link href="Favicon.ico" type="image/x-icon" rel="shortcut icon" />
	 <!--[if lt IE 9]> 
	<script type="text/javascript"> 
	   document.createElement("nav"); 
	   document.createElement("header"); 
	   document.createElement("footer"); 
	   document.createElement("section"); 
	   document.createElement("article"); 
	   document.createElement("aside"); 
	   document.createElement("hgroup"); 
	</script> 
	<![endif]-->
		<title>Coordinaci&oacute;n General de Lenguas UNAM</title>
		<link rel="stylesheet" href="css/hugixR.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="print.css" media="print" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
			})

		})
  </script>
		 
	 
		<div class="container">
		
	
		</br><p class="eval" style="color: #000;">La tabla de resultados muestra si el manejo de cada tema o habilidad permite al alumno avanzar sin problemas en su aprendizaje del ingl&eacute;s; &quot;SI&quot; significa que el manejo del tema o habilidad es suficiente, &quot;NO&quot; indica que es necesario que el alumno trabaje y mejore dicho tema o habilidad.</br></br>

		La &uacute;ltima columna indica si el desempe&ntilde;o de cada alumno fue el esperado para el nivel correspondiente a esta etapa del aprendizaje, de acuerdo con los programas de las asignaturas y los est&aacute;ndares del Marco Com&uacute;n Europeo de Referencia para las Lenguas.</br></br>

		Alumnos con resultado final <b>&quot;NO SATISFACTORIO&quot;</b>: son aquellos cuyos conocimientos esperados para los cursos de Ingl&eacute;s no se encuentran firmemente asimilados. Adem&aacute;s, sus habilidades de comprensi&oacute;n auditiva y de lectura tambi&eacute;n se encuentran por debajo de lo esperado.</br></br>
		
		Los resultados que aparecen como NP significan que el alumno no present&oacute; el examen en cuesti&oacute;n.</br>
		</p>
	
	<?php	
	echo"<style type='text/css'>
	a:hover{color:#000;}
  p {
	font-family:Century Gothic, sans-serif;
	font-size:11%;
    color: #000;
    }

	p4{
	font-family:Century Gothic, sans-serif;
	font-size:12%;
    color: #000;
	}

	
	
	.tablin{
	font-size:9px;
	color: #000;
	}
  </style>";
//echo "</br><p align='center'>Los n&uacute;meros de los resultados que aparecen abajo, muestran los paquetes did&aacutecticos que debes consultar de acuerdo a tu nivel.</p></br>";
echo "<table class='tablin' border='1' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr align='center'>		
		<td width='7%'><b>#Cuenta</b></td>
		<td width='7%'><b>Nombre</b></td>
		<td width='7%'><b>Listening</b></td>
		<td width='6%'><b>Tell the time</b></td>
		<td width='5%'><b>a / an</b></td>
		<td width='6%'><b>Simple present be</b></td>
		<td width='6%'><b>Simple present</b></td>
		<td width='6%'><b>There is / There are</b></td>
		<td width='6%'><b>Can</b></td>
		<td width='7%'><b>Present Continuous</b></td>
		<td width='7%'><b>Possessive adjectives</b></td>		
		<td width='8%'><b>Demonstratives adjectives</b></td>
		<td width='6%'><b>much / many</b></td>
		<td width='6%'><b>Reading</b></td>
		<td width='10%'><b>Resultado</b></td>
		
</tr>";

if(empty($_POST[Cuenta])){
echo "Plantel: ".$_POST[Plantel]." y Grupo: ".$_POST[Grupo];
$sql = "select * from Final2013cuartos12 where Plantel='$_POST[Plantel]' && Grupo='$_POST[Grupo]'";}

if(empty($_POST[Plantel]) && empty($_POST[Grupo])){
echo "Cuenta: ".$_POST[Cuenta];
$sql = "select * from Final2013cuartos12 where Cuenta='$_POST[Cuenta]'";}
$sql=$conexion->consulta($sql);

while($row=mysql_fetch_array($sql))
{
echo "<table border='1' class='tablin' align='center' width='100%' cellpadding='0' cellspacing='0'>
<tr align='center'>	
	<td width='7%'>".$row["Cuenta"]."</td>	
	<td width='7%'>".$row["Nombre"]."</td>";
	$conexion->imprime($row,'NO','List',7, '#','#08088A');
	$conexion->imprime($row,'NO','Dummy',6,'#','#08088A');
	$conexion->imprime($row,'NO','aan',5,'#','#08088A');
	$conexion->imprime($row,'NO','be',6,'#','#08088A');
	$conexion->imprime($row,'NO','other',6,'#','#08088A');
	$conexion->imprime($row,'NO','isare',6,'#','#08088A');
	$conexion->imprime($row,'NO','cancant',6,'#','#08088A');
	$conexion->imprime($row,'NO','continuo',7, '#','#08088A');
	$conexion->imprime($row,'NO','padj',7, '#','#08088A');
	$conexion->imprime($row,'NO','dadj',8, '#','#08088A');
	$conexion->imprime($row,'NO','muchmany',6,'#','#08088A');
	$conexion->imprime($row,'NO','read',6,'#','#08088A');
	$conexion->imprime($row,'NO SATISFACTORIO','Resultado',10, '#','#08088A');			
	echo"
</tr>";
}
echo"</table>";
echo"</body>";
?>
		
	</div>	
</div><!-- container --><br/><br/>
		
		
		
		
	</section><!-- Este es el fin tanto de las barras laterales como de el contenido-->	
</div><!-- Fin de la "envoltura" -->
<!--Ingeniero Hugo Luna a.k.a. hugix4-->
</body>
</html>