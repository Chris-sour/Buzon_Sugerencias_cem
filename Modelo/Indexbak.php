<?php
    if (isset($_POST['envia'])) {
		//echo "OKS entra.<br />";
		$serverName = "";
		$connectionInfo = array( "Database"=>"", "UID"=>"", "PWD"=>"" );
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
		
		$dir_subida = '../img/dni/';
		$fichero_subido = $dir_subida . basename($_FILES['subida_dni']['name']);

		if( $conn ) {
			if (move_uploaded_file($_FILES['subida_dni']['tmp_name'], $fichero_subido)) {
				$procedure_params = array(
				array(&$myparams['Item_ID'], SQLSRV_PARAM_OUT),
				array(&$myparams['Item_Name'], SQLSRV_PARAM_OUT)
				);
 
				$sql = "EXEC usp_InsertarCitas @Item_ID = ?, @Item_Name = ?";
				$stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
				
				$tsql_callSP = "{call usp_InsertarCitas(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}"; 
				
				$T_documento = $_POST['tipo_documento'];
				$N_documento = $_POST['documento'];
				$T_consulta = $_POST['decision'];
				$Nombre = $_POST['nombres'];
				$A_paterno = $_POST['apellido_paterno']; 
				$A_Materno = $_POST['apellido_materno'];
				$F_Nacimiento = date('Y-m-d H:i:s', strtotime($_POST['fecha_nacimiento']));   
				$Telefono = $_POST['celular'];  		
				$Email = $_POST['correo']; 
				$Subida_dni = basename($_FILES['subida_dni']['name']); 		
				$Motivo = $_POST['motivo']; 
				$Fec_cita = date('Y-m-d H:i:s', strtotime($_POST['fecha_cita']));  		
				$Especialidad = "especialidad";  		
				$Sexo = $_POST['sexo'];  
				$Hora_cita = date('Y-m-d H:i:s', strtotime($_POST['hora_cita'])); 	
				$Flagdatos = $_POST['condicion_01'];  
				$Flagley = $_POST['condicion_02'];	
		 
				$params = array(   
								 array($T_documento, SQLSRV_PARAM_IN),
								 array($N_documento, SQLSRV_PARAM_IN),  
								 array($T_consulta, SQLSRV_PARAM_IN),  
								 array($Nombre, SQLSRV_PARAM_IN),  
								 array($A_paterno, SQLSRV_PARAM_IN),  
								 array($A_Materno, SQLSRV_PARAM_IN),  
								 array($F_Nacimiento, SQLSRV_PARAM_IN),  
								 array($Telefono, SQLSRV_PARAM_IN),  
								 array($Email, SQLSRV_PARAM_IN),  
								 array($Subida_dni, SQLSRV_PARAM_IN),  
								 array($Motivo, SQLSRV_PARAM_IN),  
								 array($Fec_cita, SQLSRV_PARAM_IN),  
								 array($Especialidad, SQLSRV_PARAM_IN),  
								 array($Sexo, SQLSRV_PARAM_IN),  
								 array($Hora_cita, SQLSRV_PARAM_IN),  
								 array($Flagdatos, SQLSRV_PARAM_IN), 
								 array(&$Flagley, SQLSRV_PARAM_IN)  
							   );
							   
				$stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);  
				
				if( $stmt3 === false )  
				{  
					 echo "Error in executing statement 3.\n";  
					 die( print_r( sqlsrv_errors(), true));  
				}else{ 
				}
			} else { 
			}		
		}else{
			 echo "Conexión no se pudo establecer.<br />";
			 die( print_r( sqlsrv_errors(), true));
		}		
		
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
                            <font face="Trasandina Regular">
                            <!--<font face="Comic Sans MS,arial,verdana">-->
                        	<label style="margin-top: 0.5em; color: #080808;">Estimado paciente, por favor bríndenos sus datos y nos comunicaremos con usted a la brevedad para informarle sobre su Consulta Ambulatoria con la especialidad médica que nos indique. </label>
                        	<br>
                        	<br>
							Recuerde que en caso de solicitar una Consulta Ambulatoria Presencial solo se permitirá el ingreso al paciente que recibirá la atención médica.  Únicamente podrán ingresar al consultorio dos personas cuando el paciente requiera de asistencia indispensable de un acompañante. Todo paciente y personal de salud que ingrese a la clínica debe venir con mascarilla quirúrgica (no de tela) y sin guantes. De lo contrario no se le permitirá el acceso.</label>
							<div class="col-xs-12" style="padding: 0.15em .5em;">
                                   <label style="margin-top: 0.5em; color: #1919A3;">¿QUÉ TIPO DE CONSULTA NECESITA? </label>
                                   <div class="form-group" style="margin-bottom: 0 !important;">
                                       <div class="col-xs-12" style="padding: 0.15em .5em;">
                                            <div class="radio"><label><input type="radio" name="decision" value="d1">Online.</label></div>
                                       </div>
                                       <div class="col-xs-12" style="padding: 0.15em .5em;">
                                           <div class="radio"><label><input type="radio" name="decision" value="d2">Presencial</label></div>
                                       </div>
                                    </div>
                              </div>
                               <div class="col-xs-12" style="padding: 0.15em .5em;">
                                    <label>ESPECIALIDAD:</label>
                                    <select name="especialidad" id="especialidad" class="form-control" required="required">
                                        <option value="CIRUGIA DE CABEZA Y CUELLO">CIRUGIA DE CABEZA Y CUELLO</option>
                                        <option value="DERMATOLOGIA">DERMATOLOGIA</option>
                                        <option value="ENDOCRINOLOGIA">ENDOCRINOLOGIA</option>
                                        <option value="GASTROENTEROLOGIA">GASTROENTEROLOGIA</option>
                                        <option value="GERIATRIA">GERIATRIA</option>
                                        <option value="GINECOLOGIA Y OBSTETRICIA">GINECOLOGIA Y OBSTETRICIA</option>
                                        <option value="MEDICINA GENERAL">MEDICINA GENERAL</option>
                                        <option value="MEDICINA INTERNA">MEDICINA INTERNA</option>
                                        <option value="NEUROLOGIA">NEUROLOGIA</option>
                                        <option value="OTORRINOLARINGOLOGIA">OTORRINOLARINGOLOGIA</option>
                                        <option value="PEDIATRIA">PEDIATRIA</option>
                                        <option value="PSICOLOGIA">PSICOLOGIA</option>
                                        <option value="REUMATOLOGIA">REUMATOLOGIA</option>
                                        <option value="SALUD MENTAL">SALUD MENTAL</option>
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
                                    <label>SUBIR DNI:</label>
                                    <input type="file" name="subida_dni" id="subida_dni" required="required" /><br><br>
                                </div>
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
                        </div>

                    </div>
                    <div class="col-xs-2 hidden-xs"></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
