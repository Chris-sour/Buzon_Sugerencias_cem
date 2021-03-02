<?php
   try{
	if (isset($_POST['envia'])) {
        //echo "OKS entra.<br />"; dame un momento  ahora si probare 
		$conection = mssql_connect("199.199.0.210\CEM","sa","Hss2012") or die("no se puede conectar a SQL Server");
		mssql_select_db("CLINICA",$conection);
        
        $dir_subida = '/var/www/html/Formulario/img/';
        $fichero_subido = $dir_subida . basename($_FILES['subida_dni']['name']);

        if( $conection ) {
            if (move_uploaded_file($_FILES['subida_dni']['tmp_name'], $fichero_subido)) {
 
                $Fec_cita = date('Y-m-d H:i:s', strtotime($_POST['fecha_cita']));
                $Hora_cita = date('H:i:s', strtotime($_POST['hora_cita'])); 
				$F_Nacimiento = date('Y-m-d H:i:s', strtotime($_POST['fecha_nacimiento'])); 
				$Fechita = date('Y-m-d H:i:s');
                $T_consulta = $_POST['decision'];
                $Especialidad = $_POST["especialidad"];
                $T_documento = $_POST["tipo_documento"];
                $N_documento = $_POST["documento"];         
                $Nombre = $_POST["nombres"];
                $A_paterno = $_POST["apellido_paterno"];
                $A_Materno = $_POST["apellido_materno"];     
                $Celular = $_POST["celular"];
                $Telefono = $_POST["tel_fijo"];
                $Sexo = $_POST["sexo"];         
                $Email = $_POST["correo"];
                $Motivo = $_POST["motivo"];
                $Subida_dni = basename($_FILES['subida_dni']['name']);       
                $Flagdatos = $_POST['condicion_01'];  
                $Flagley = $_POST['condicion_02'];  
				$tsql_callSP = "INSERT INTO PW_FormCem(t_consulta,
                                                      Especialidad,
                                                          fec_cita,
                                                         hora_cita,
                                                       t_documento,
                                                       n_documento,
                                                            nombre,
                                                         a_paterno,
                                                         a_Materno,
                                                      f_Nacimiento,
                                                           Celular,
                                                          telefono,
                                                              sexo,
                                                             email,
                                                            motivo,
                                                        subida_dni,
                                                         Flagdatos,
                                                           Flagley) 
                                                             VALUES 
                                           ('".$_POST['decision']."',
                                        '".$_POST['especialidad']."',
                                          '".$_POST['fecha_cita']."',
                                           '".$_POST['hora_cita']."',
                                      '".$_POST['tipo_documento']."',
                                           '".$_POST['documento']."',
                                             '".$_POST['nombres']."',
                                    '".$_POST['apellido_paterno']."',
                                    '".$_POST['apellido_materno']."',
                                    '".$_POST['fecha_nacimiento']."',
                                             '".$_POST['celular']."',
                                            '".$_POST['tel_fijo']."',
                                                '".$_POST['sexo']."',
                                              '".$_POST['correo']."',
                                              '".$_POST['motivo']."',
                                         '".$Subida_dni."',
                                        '".$_POST['condicion_01']."',
                                        '".$_POST['condicion_02']."')"; 
             
				$stmt3 = mssql_query($tsql_callSP); 
                if( $stmt3 === false )  
                {  
                     echo "Error in executing statement 1.\n";  
                     die( print_r( mssql_errors(), true));  
                }else{ 
                }
            } else { 
            }       
        }else{
             echo "Conexión no se pudo establecer.<br />";
             die( print_r( mssql_errors(), true));
        }       
        
    }

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

    <title>Formulario de Citas</title>
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
                        <img src="../img/Cabecera.png" width="100%" alt="">
                    </div>


                    <div class="col-xs-12" style="padding-bottom: 1em; border-radius: 0.5em;">
                        <div style="background: #f1f1f1;display: grid;border: 1px solid grey;padding: 0.5em 1em;border-radius: 0.25em;margin: 0 1em; padding-bottom: 1em;">
                            <font face="arial">
                            <!--<font face="Comic Sans MS,arial,verdana"  Times New Roman   Trasandina Regular>-->
                        	<label style="margin-top: 0.5em; color: #080808;">Estimado paciente, por favor bríndenos sus datos y nos comunicaremos con usted a la brevedad para informarle sobre su Consulta Ambulatoria con la especialidad médica que nos indique. </label>
                        	<br>
                        	<br>
							Recuerde que en caso de solicitar una Consulta Ambulatoria Presencial solo se permitirá el ingreso al paciente que recibirá la atención médica.  Únicamente podrán ingresar al consultorio dos personas cuando el paciente requiera de asistencia indispensable de un acompañante. Todo paciente y personal de salud que ingrese a la clínica debe venir con mascarilla quirúrgica (no de tela) y sin guantes. De lo contrario no se le permitirá el acceso.</label>
							<div class="col-xs-12" style="padding: 0.15em .5em;">
                                   <label style="margin-top: 0.5em; color: #1919A3;">¿QUÉ TIPO DE CONSULTA NECESITA? </label>
                                   <div class="form-group" style="margin-bottom: 0 !important;">
                                       <div class="col-xs-12" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="decision" value="V">Online.</label></div>
                                       </div>
                                       <div class="col-xs-12" style="padding: 0.15em .5em;">
                                           <div class="radio"><label><input type="radio" name="decision" value="P">Presencial</label></div>
                                       </div>
                                    </div>
                              </div>
                              <div  class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>ESPECIALIDAD:</label>
									<select name="especialidad" id="especialidad" class="form-control" required="required">
                                    <?php
										$SQL = "";
										$SQL.= " SELECT DISTINCT s.descripcion AS [Servicio] FROM TurnosMedicos tm  ";
										$SQL.= " inner join consultorios c  on c.codigoconsultorio = tm.consultorio ";
										$SQL.= " inner join servicios s on s.codigoservicio = tm.servicio ";
										$SQL.= " where c.modifica ='V' and tm.flgest='S'  ";
										$SQL.= " order by s.descripcion  ";

									//$connx = sqlsrv_connect( $serverNamex, $connectionInfox);
										$conection = mssql_connect("199.199.0.210\CEM","sa","Hss2012") or die("no se puede conectar a SQL Server");
										mssql_select_db("CLINICA",$conection);

										$result = mssql_query($SQL) or exit("MS-Query Error:<br>" . $SQL);
										
										while ($row = mssql_fetch_array($result)) {
											echo "<option value='" . $row['Servicio'] . "'>" . $row['Servicio'] . "</option>";
										}
                                    ?>
                                    </select> 
                                </div>
                                <div class="form-group" style="margin-bottom: 0 !important;">
                                <div class="col-lg-6 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                                    <label>FECHA DE PREFERENCIA A SU CONSULTA:</label>
                                    <input type="date" name="fecha_cita" id="fecha_cita" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-6 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>HORA DE PREFERENCIA DE SU CONSULTA:</label>
                                    <input type="time" name="hora_cita" id="hora_cita" class="form-control" required="required" autocomplete="off">
                                </div>
                            <label style="margin-top: 0.5em; color: #1919A3;">DATOS DEL PACIENTE:</label>
                            <div class="form-group" style="margin-bottom: 0 !important;">
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>DOCUMENTO:</label>
                                    <select name="tipo_documento" id="tipo_documento" class="form-control" required="required">
                                        <option value="DNI">DNI</option>
                                        <option value="CE">CE</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                                <div class="col-lg-8 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>NÚMERO DE DOCUMENTO:</label>
                                    <input type="text" name="documento" id="documento" class="form-control" required="required" autocomplete="off" onkeypress="if(this.value.length==11) return false;">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>NOMBRES:</label>
                                    <input type="text" name="nombres" id="nombres" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>APELLIDO PATERNO:</label>
                                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>APELLIDO MATERNO:</label>
                                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" required="required" autocomplete="off">
                                </div>

                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>FECHA NACIMIENTO:</label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>TELÉFONO CELULAR:</label>
                                        <input type="number" name="celular" id="celular" class="form-control" required="required" autocomplete="off" onkeypress="if(this.value.length==10) return false;">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>TELÉFONO FIJO:</label>
                                    <input type="number" name="tel_fijo" id="tel_fijo" class="form-control" autocomplete="off" onkeypress="if(this.value.length==10) return false;">
                                </div>
                                <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>SEXO:</label>
                                    <div class="form-group" style="margin-bottom: 0 !important;">
                                        <div class="col-xs-6" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="sexo" value="M">MASCULINO</label></div>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="sexo" value="F">FEMENINO</label></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>CORREO ELECTRÓNICO:</label>
                                    <input type="email" name="correo" id="correo" class="form-control" required="required" autocomplete="off">
                                </div>
                               
                                <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>MOTIVO:</label>
                                    <input type="text" name="motivo" id="motivo" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                </div>
                                <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>ADJUNTAR DNI:</label>
                                    <input type="file" name="subida_dni" id="subida_dni" required="required" /><br><br>
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
                        <?php 
                        echo '<a href="https://drive.google.com/file/d/1RmK_s93c4KjaczatLYedibElfHCInQ9k/view?usp=sharing" target="_blank">Derechos y Deberes del Paciente</a>';
                        ?>
                        </div>
                        </div>
                        <div class="col-xs-12" style="margin-top: 1em;">
                            <div class="col-xs-12" style="padding: 0.15em .5em;">
                                ¿Autorizas la utilización de tus datos para contactarte?
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="condicion_01" value="1"><b>SI ACEPTO</b></label></div>
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="condicion_01" value="0">NO ACEPTO</label></div>
                            </div>
                            <div class="col-xs-12" style="padding: 0.15em .5em;">
                                ¿Autorizas el tratamiento de sus datos personales?
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="condicion_02" value="1"><b>SI ACEPTO</b></label></div>
                            </div>
                            <div class="col-xs-6" style="padding: 0.15em .5em;">
                                <div class="radio"><label><input type="radio" name="condicion_02" value="0">NO ACEPTO</label></div>
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
