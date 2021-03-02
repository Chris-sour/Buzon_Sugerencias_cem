<?php
   try{
	if (isset($_POST['envia'])) {
        //echo "OKS entra.<br />"; dame un momento  ahora si probare 
		$conection = mssql_connect("199.199.0.210\CEM","sa","Hss2012") or die("no se puede conectar a SQL Server");
		mssql_select_db("CLINICA",$conection);


        if( $conection ) {
        
 
                $fecha = date('Y-m-d H:i:s', strtotime($_POST['fecha']));
                $hora= date('H:i:s', strtotime($_POST['hora'])); 
                $Nombre = $_POST["nombres"];
                $n_dni = $_POST['n_dni'];
                $edad = $_POST["edad"];
                $telefono = $_POST["celular"];
                $correo = $_POST["email"];         
                $direccion = $_POST["direccion"];
                $distrito = $_POST["distrito"];     
                $condicion = $_POST["condicion"];
                $tipo_paciente = $_POST["tipo_paciente"];
                $cuerpo = $_POST["sexo"];         
                $observacion = $_POST["correo"];
                $flagdatos = $_POST["flagdatos"];         
                $flagley = $_POST["flagdatos"];
				$tsql_callSP = "INSERT INTO PW_Buzon_Sugerencias(   fecha,
                                                                     hora,
                                                                     nombres,
                                                                     n_dni,
                                                                     edad,
                                                                     celular,
                                                                     email,
                                                                     direccion,
                                                                     distrito,
                                                                     condicion,
                                                                     tipo_paciente,
                                                                     motivo,
                                                                     observacion,
                                                                     flagdatos,
                                                                     flagley)
                                                             VALUES 
                                                        ('".$_POST['fecha']."',
                                                        '".$_POST['hora']."',
                                                        '".$_POST['nombres']."',
                                                        '".$_POST['n_dni']."',
                                                        '".$_POST['edad']."',
                                                        '".$_POST['celular']."',
                                                        '".$_POST['correo']."',
                                                        '".$_POST['direccion']."',
                                                        '".$_POST['distrito']."',
                                                        '".$_POST['condicion']."',
                                                        '".$_POST['tipo_paciente']."',
                                                        '".$_POST['motivo']."',
                                                        '".$_POST['observacion']."',
                                                        '".$_POST['flagdatos']."',
                                                        '".$_POST['flagley']."')"; 
             
				$stmt3 = mssql_query($tsql_callSP); 
                if( $stmt3 === false )  
                {  
                     echo "Error in executing statement 1.\n";  
                     die( print_r( mssql_errors(), true));  
                }else {
                } 
        }else{
             echo "Conexión no se pudo establecer.<br />";
             die( print_r( mssql_errors(), true));
            }   
            
        } 
  //  }
   }catch(Exception $e){ 
     echo "Error: ".$e;
     //dale asi OK
   }   
?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Buzon de Suegerencias - CEM</title>
    <style>
        textarea {
            resize: none;
        }

        .checkbox label:after {
            content: '';
            display: table;
            clear: both;
        }

        .checkbox .cr {
            position: relative;
            display: inline-block;
            border: 1px solid #a9a9a9;
            border-radius: .25em;
            width: 1.3em;
            height: 1.3em;
            float: left;
            margin-right: .5em;
        }
        .checkbox .cr .cr-icon {
                position: absolute;
                font-size: .8em;
                line-height: 0;
                top: 50%;
                left: 15%;
            }

        .checkbox label input[type="checkbox"] {
            display: none;
        }

            .checkbox label input[type="checkbox"] + .cr > .cr-icon {
                opacity: 0;
            }

            .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon {
                opacity: 1;
            }

        .text_html {
            max-height: 100px;
            background: whitesmoke;
            overflow: auto;
            text-align: justify;
            padding: 0.5em;
            border: 1px solid grey;
            border-radius: 0.25em;
        }

        .container{
            font-family: 'Trasandina Regular';
        }
        .row{
            font-family: 'Trasandina Regular';
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-xs-2 hidden-xs"></div>
                <div class="col-sm-8" style="margin: 1em 0;">
                    <!-- <div class="col-xs-12 text-center">
          <img src="img/logo-clinica-apj.svg" width="200px" alt="">
        </div> -->
                    <div class="col-xs-12">
                        <br>
                        <img src="../img/Buzondesugerencias.png" width="100%" alt="">
                    </div>


                    <div class="col-xs-12" style="padding-bottom: 1em; border-radius: 0.5em;">
                        <div style="background: #f1f1f1;display: grid;border: 1px solid grey;padding: 0.5em 1em;border-radius: 0.25em;margin: 0 1em; padding-bottom: 1em;">
                            <font face="arial">
                            <!--<font face="Comic Sans MS,arial,verdana"  Times New Roman   Trasandina Regular>-->
                       <!--    <label style="margin-top: 0.5em; color: #080808;">
                            Estimado paciente, por favor bríndenos sus datos y nos comunicaremos con
                            usted a la brevedad para informarle sobre su Consulta Ambulatoria con la 
                            especialidad médica que nos indique. </label>
                        	<br>
                        	<br>
							Recuerde que en caso de solicitar una Consulta Ambulatoria Presencial solo 
                            se permitirá el ingreso al paciente que recibirá la atención médica.  
                            Únicamente podrán ingresar al consultorio dos personas cuando el paciente 
                            requiera de asistencia indispensable de un acompañante. Todo paciente y 
                            personal de salud que ingrese a la clínica debe venir con mascarilla 
                            quirúrgica (no de tela) y sin guantes. De lo contrario no se le 
                            permitirá el acceso.</label> -->

                            <div class="form-group" style="margin-bottom: 0 !important;">
                                <div class="col-lg-8 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                                    <label>FECHA DE SUGERENCIA :</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required="required" autocomplete="off">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>HORA:</label>
                                    <input type="time" name="hora" id="hora" class="form-control" required="required" autocomplete="off">
                            </div>
                            <br>
                            <label style="margin-top: 0.5em; color: #1919A3;">DATOS DEL PACIENTE:</label>
                        	<br>
                            <div class="col-lg-12 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>NOMBRES Y APELLIDOS:</label>
                                    <input type="text" name="nombres" id="nombres" class="form-control" required="required" autocomplete="off">
                            </div>
                            <div class="col-lg-2 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>N° DE DNI:</label>
                                    <input type="text" name="n_dni" id="n_dni" class="form-control" required="required" autocomplete="off" onkeypress="if(this.value.length==11) return false;">
                            </div>
                            <div class="col-lg-2 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>EDAD:</label>
                                   <!-- <select name="edad" id="edad" class="form-control" required="required">-->
                                    <input type="text" name="edad" id="edad" class="form-control" required="required" autocomplete="off">
                            </div>
                            <br>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>TELÉFONO:</label>
                                        <input type="number" name="celular" id="celular" class="form-control" required="required" autocomplete="off" onkeypress="if(this.value.length==10) return false;">
                            </div>
                            <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>CORREO ELECTRÓNICO:</label>
                                    <input type="email" name="correo" id="correo" class="form-control" required="required" autocomplete="off">
                            </div>
                            <div class="col-lg-12 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>DIRECCION:</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" required="required" autocomplete="off">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>DISTRITO:</label>
                                    <input type="text" name="distrito" id="distrito" class="form-control" required="required" autocomplete="off">
                            </div>

							<div class="col-xs-12" style="padding: 0.15em .5em;">
                                   <label>CONDICION: </label>
                                   <div class="form-group" style="margin-bottom: 0 !important;">
                                       <div class="col-xs-12" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="condicion" value="P">Particular.</label></div>
                                       </div>
                                       <div class="col-xs-12" style="padding: 0.15em .5em;">
                                           <div class="radio"><label><input type="radio" name="condicion" value="A">Asegurado</label></div>
                                       </div>
                                    </div>
                              </div>


                                <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>TIPO DE PACIENTE:</label>
                                    <div class="form-group" style="margin-bottom: 0 !important;">
                                        <div class="col-xs-6" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="tipo_paciente" value="N">Nuevo</label></div>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="tipo_paciente" value="C">Continuador</label></div>
                                        </div>
                                    </div>
                                </div>

                               
                                <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>DETALLE DE LA SUGERENCIA:</label>
                                    <input type="textarea" name="motivo" id="motivo" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                </div>
                            </div>
                        </div>
                        <div>
                        <div class="col-xs-12" style="padding: 0.15em .5em;">
                            <label>Nuestras politicas:</label>
                         <br><br>
                        <?php 
                        echo '<a href="https://drive.google.com/file/d/1JJamjf9BHmH9oJVe2xlehytFM4OKcmem/view?usp=sharing" target="_blank">Política de Privacidad</a>';
                        ?>
                        <br><br>
                        <?php 
                        echo '<a href="https://drive.google.com/file/d/1Dyf42FqNvZ6DCCfwqJs1dFgLrtHFk1rG/view?usp=sharing" target="_blank">Términos y Condiciones</a>';
                        ?>
                        <br><br>
                        </div>
                        </div>
                            <div class="col-xs-12" style="margin-top: 1em;">
                            <div class="col-xs-12" style="padding: 0.15em .5em;">
                                ¿Autorizas la utilización de tus datos para contactarte?
                            </div>

                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="flagdatos" value="1"><b>SI ACEPTO</b></label></div>
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="flagdatos" value="0">NO ACEPTO</label></div>
                            </div>
                            <div class="col-xs-12" style="padding: 0.15em .5em;">
                                ¿Autorizas el tratamiento de sus datos personales?
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="flagley" value="1"><b>SI ACEPTO</b></label></div>
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="flagley" value="0">NO ACEPTO</label></div>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin: 1em 0;">
                            <input type="submit" value="ENVIAR" class="btn btn-large btn-lg btn-block" style="background: #1919A3; color: #fff" name="envia"/>
                            <<?php 
                                echo "Gracias por registrarte en breves momentos un teleoperador se comunicara para confirmar su cita ";
                             ?>
                        </div>

                    </div>
                    <div class="col-xs-2 hidden-xs"></div>
                </div>
            </form>
        </div>
    </div>  
</body>
</html>
