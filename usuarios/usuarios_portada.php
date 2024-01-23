<!DOCTYPE html>
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
		<link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
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

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="http://192.168.1.113"> 
    <img src="/temperatura/3.png" alt="" width="31" height="30">
     </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://192.168.1.113/temperatura">Temperaturas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://192.168.1.113/">Contador de aves</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://192.168.1.113/calidad">Calidad</a>
        </li>
      </ul>
	  <a href="../cerrar_sesion.php"><button class="btn btn-dark"></span> Cerrar Sesion</button></a>
      <span class="navbar-text">
      </span>
    </div>
  </div>
</nav>
	<body>
	<?php
				session_start();
				if(!isset($_SESSION['usuarios_login']))	
				{
					header("location: ../index.php");
				}
				if(isset($_SESSION['admin_login']))	
				{
					header("location: ../admin/admin_portada.php");
				}
				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");
				}
				if(isset($_SESSION['usuarios_login']))
				{
				?>
					
				<?php
						
				}

				?>
		
     	<div style="height:150px !important; background:#1B1464" class="col-auto p-5 text-center">

     	<h1 style="color:white">
			CONTADOR DE AVES
             </h1>
			<!––BOTONES––>
	    <a href="http://e13/reportes.php" class="btn btn-outline-light">Reportes HISTORICOS</a>
        
		    </div>

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
	
}
///////////////////////// CAMBIA LOTE A 1 ////////////////////////////
           extract($_GET);
           if(@$campo1==1){
		
           $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 1";
           $resborrar=mysqli_query($conexion,$sqllote);
           
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
	       $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 2";
           $resborrar=mysqli_query($conexion,$sqllote);
           }
///////////////////////// CAMBIA LOTE A 3 ////////////////////////////
			extract($_GET);
           if(@$campo1==3){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 3. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		   $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 3";
           $resborrar=mysqli_query($conexion,$sqllote);
          }
///////////////////////// CAMBIA LOTE A 4 ////////////////////////////
			extract($_GET);
           if(@$campo1==4){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 4. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		   $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 4";
           $resborrar=mysqli_query($conexion,$sqllote);
          }
///////////////////////// CAMBIA LOTE A 5 ////////////////////////////
			extract($_GET);
           if(@$campo1==5){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 5. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		   $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 5";
           $resborrar=mysqli_query($conexion,$sqllote);
       
            }
///////////////////////// CAMBIA LOTE A 6 ////////////////////////////
			extract($_GET);
           if(@$campo1==6){
			echo'<script type="text/javascript">
			
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 6. Debe reiniciar el contador para comenzar en cero.", "success");
			
			</script>';
		
           $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 6";
           $resborrar=mysqli_query($conexion,$sqllote);
         
            }
///////////////////////// CAMBIA LOTE A 7 ////////////////////////////
			extract($_GET);
           if(@$campo1==7){
			echo'<script type="text/javascript">
			
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 7. Debe reiniciar el contador para comenzar en cero.", "success");
			
			</script>';
		
           $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 7";
           $resborrar=mysqli_query($conexion,$sqllote);
       
            }
///////////////////////// CAMBIA LOTE A 8 ////////////////////////////
			extract($_GET);
           if(@$campo1==8){
			echo'<script type="text/javascript">
			swal("Lote cambiado correctamente!", "El contador comenzara a contar en el lote 8. Debe reiniciar el contador para comenzar en cero.", "success");
			</script>';
		    $sqllote="ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 8";
           $resborrar=mysqli_query($conexion,$sqllote);
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
		   $sqllote="DELETE FROM valores WHERE id=0";
           $resborrar=mysqli_query($conexion,$sqllote);
            }
?>
			Aves por minuto:
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
	<p class="lead"> </p>
	</footer>
</html>