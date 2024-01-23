<html lang="es">
    <head>
	<script>    
    /////Url limpia
	if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }

</script>       
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
       <title>CONTADOR</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" >
		<script src="/js/jquery.min.js"></script>

		<script type="text/javascript">
		
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'tablaConsulta.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("miTabla").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);
		</script>
		
		<script type="text/javascript">
		   function ConfirmDelete()
		   {
			   var respuesta = ConfirmDelete("¿Estas seguro?");
			   if (respuesta == true )
            {
				return true;
			}
			else 
			{
				return false;
			}
            }
		   </script>

<script src="http://192.168.1.113/js/sweetalert.min.js"></script>

	</head>			
	<body>
	
		 <!-- Option 1: Bootstrap Bundle with Popper -->
		 <script src="htts://192.168.1.113/js/bootstrap.bundle.min.js"></script>
		<header>
		
     	<div style="height:310px !important; background:#1B1464" class="col-auto p-5 text-center">

     	<h1 style="color:white">
			CONTADOR DE AVES
             </h1>
			
			<!––BOTONES––>

			<form class="row g-3" action="contador.php" method="get">

  <input type="text" maxlength="1" id="campo1" name="campo1" class="form-control" placeholder="Ingrese lote a cambiar y presione enter" aria-label="Lote" aria-describedby="basic-addon1">
 
  <input type="submit" class="btn btn-outline-light" value="Cambiar LOTE"/>
 
  <input type='button' class="btn btn-outline-light" value='Reiniciar CONTADOR' onclick='salir()'> 
  		 
  <input type='button' class="btn btn-outline-light" value='Exportar a PDF' onclick='salir3()'> 
  
		</div>
		
<script type="text/javascript">


function salir(){
	swal("¿Esta seguro?", "Esto pone el contador en cero. Solo usar luego de cambiar lote." , {
		
		icon: "warning",
  buttons: {
    cancel: "Cancelar",
    catch: {
      text: "Sí, Reiniciar contador",
      value: "Simple",
    },
	
  },
})
.then((value) => {
  switch (value) {
 
    case "Simple":
		window.location="/iot/get.php/";
		swal("Contador Reiniciado!", "En unos segundos la pagina se actualizará...", "success");
      break;
 
    default:
      swal("Cancelado.");
  }
});
	
}
 </script>

 <script type="text/javascript">
////////////////// aviso de borra todo ////////////////////////////////////
function salir2(){
	var respuesta=confirm("¿Estas seguro? ESTO BORRA TODOS LOS REGISTROS DE HOY Y NO SE PUEDE RECUPERAR.");
	if(respuesta==true)
		window.location="contador.php?id=2&idborrar=2";
   
}
  </script>

<script type="text/javascript">
////////////////// exporta pdf ////////////////////////////////////
function salir3(){
	swal("¿Qué reporte desea exportar a PDF?", {
		icon: "info",
  buttons: {
    cancel: "Cancelar",
    catch: {
      text: "Reporte Completo",
      value: "catch",
    },
	Simple: {
      text: "Reporte Simple",
      value: "Simple",
    },
  },
})
.then((value) => {
  switch (value) {
 
    case "Simple":
		window.open('http://192.168.1.113/crea_pdf_simple.php');
      break;
 
    case "catch":
		window.open('http://192.168.1.113/crea_pdf.php');
      break;
 
    default:
      swal("Exportación a PDF cancelada.");
	  
  }
});	
}
  </script>
		<?php
///////////////////////////// DATO INVALIDO ////////////////////////////////////
          extract($_GET);
           
		  if(@$campo1 >8 ){
			echo'<script type="text/javascript">
			swal("Lote invalido", "Solo puede ingresar lotes del 1 al 8.", "error");
			
			</script>';
		  }
			if(@$campo1 <0 ){
				echo'<script type="text/javascript">
				swal("Lote invalido", "Solo puede ingresar lotes del 1 al 8.", "error");
				
				</script>';
		}
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="localhost";
$usuario="root";
$contraseña="";
$base="sensores";
$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		mysqli_connect_error());
}
///////////////////////// CAMBIA LOTE A 1 ////////////////////////////
           extract($_GET);
           if(@$campo1==1){
		
           $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 1";
           $resborrar=mysqli_query($conexion,$sqlborrar);
           
		   echo'<script type="text/javascript">
           swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 1. Debe reiniciar el contador para comenzar en cero.", "success");
            </script>';
          }
///////////////////////// CAMBIA LOTE A 2 ////////////////////////////
			extract($_GET);
           if(@$campo1==2){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 2. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
	       $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 2";
           $resborrar=mysqli_query($conexion,$sqlborrar);
           }
///////////////////////// CAMBIA LOTE A 3 ////////////////////////////
			extract($_GET);
           if(@$campo1==3){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 3. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		   $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 3";
           $resborrar=mysqli_query($conexion,$sqlborrar);
          }
///////////////////////// CAMBIA LOTE A 4 ////////////////////////////
			extract($_GET);
           if(@$campo1==4){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 4. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		   $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 4";
           $resborrar=mysqli_query($conexion,$sqlborrar);
          }
///////////////////////// CAMBIA LOTE A 5 ////////////////////////////
			extract($_GET);
           if(@$campo1==5){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 5. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		   $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 5";
           $resborrar=mysqli_query($conexion,$sqlborrar);
       
            }
///////////////////////// CAMBIA LOTE A 6 ////////////////////////////
			extract($_GET);
           if(@$campo1==6){
			echo'<script type="text/javascript">
			
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 6. Debe reiniciar el contador para comenzar en cero.", "success");
			
			</script>';
		
           $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 6";
           $resborrar=mysqli_query($conexion,$sqlborrar);
         
            }
///////////////////////// CAMBIA LOTE A 7 ////////////////////////////
			extract($_GET);
           if(@$campo1==7){
			echo'<script type="text/javascript">
			
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 7. Debe reiniciar el contador para comenzar en cero.", "success");
			
			</script>';
		
           $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 7";
           $resborrar=mysqli_query($conexion,$sqlborrar);
       
            }
///////////////////////// CAMBIA LOTE A 8 ////////////////////////////
			extract($_GET);
           if(@$campo1==8){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 8. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		    $sqlborrar="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 8";
           $resborrar=mysqli_query($conexion,$sqlborrar);
        }
?>
<?php
////////////////// BORRA TODO ///////////////////////
           extract($_GET);
           if(@$idborrar==2){
            echo'<script type="text/javascript">
           alert("Se borraron todos los registros de la base");
           window.location.href="contador.php";
           </script>';
		   $sqlborrar="DELETE FROM valores WHERE id=0";
           $resborrar=mysqli_query($conexion,$sqlborrar);
            }
?>
			
		</div>
		</header>
		<div class="col-auto p-5 text-center">
		<section
		id="miTabla">
		<div class="text-center">

<div class="spinner-border" style="color: #1B1464; width: 3rem; height: 3rem;" role="status">
  <span class="visually-hidden" style="color:#1B1464">Loading...</span>
</div>
<h1 style="color:#1B1464">Actualizando valores...</h1>
</div>
		</section> 
		</div>

<script type="text/javascript">
		   function ConfirmDelete()
		   {
			   var respuesta = ConfirmDelete("¿Estas seguro?");
			   if (respuesta == true)
            {
				return true;
			}
			else 
			{
				return false;
			}


		   }
		   </script>

	</body>
	
	<footer class="text-center" >
	<img class="img-fluid" src="/img/1.png" style="width:90px !important; height:60px !important" alt="" >
	<p class="lead"> Contador de aves en tiempo real V1.30 </p>
	</footer>
</html>