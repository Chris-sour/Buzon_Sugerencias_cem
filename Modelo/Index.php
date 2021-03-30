<?php
   try{
	if (isset($_POST['envia'])) {
        //echo "OKS entra.<br />"; dame un momento  ahora si probare 
		$conection = mssql_connect("199.199.0.210\CEM","sa","Hss2012") or die("no se puede conectar a SQL Server");
		mssql_select_db("CLINICA",$conection);


        if( $conection ) {

                 
                $teleoperador = $_POST["teleoperador"];
                $dni = $_POST['dni'];
                $nombres = $_POST["nombres"];
                $t_pacientes = $_POST["t_pacientes"];
                $sexo = $_POST["sexo"];         
                $edad = $_POST["edad"];
                $distrito = $_POST["distrito"];     
                $medico = $_POST["medico"];
                $motivo = $_POST["motivo"];
                $estado = $_POST["estado"];         
                $observacion = $_POST["observacion"];
				$tsql_callSP = "INSERT INTO PW_Formulario_Isabell(           teleoperador,
                                                                     dni,
                                                                     nombres,
                                                                     t_pacientes,
                                                                     sexo,
                                                                     edad,
                                                                     distrito,
                                                                     medico,
                                                                     motivo,
                                                                     estado,
                                                                     observacion)
                                                             VALUES 
                                                        ('".$_POST['teleoperador']."',
                                                        '".$_POST['dni']."',
                                                        '".$_POST['nombres']."',
                                                        '".$_POST['t_pacientes']."',
                                                        '".$_POST['sexo']."',
                                                        '".$_POST['edad']."',
                                                        '".$_POST['distrito']."',
                                                        '".$_POST['medico']."',
                                                        '".$_POST['motivo']."',
                                                        '".$_POST['estado']."',
                                                        '".$_POST['observacion']."')"; 

            if($tsql_callSP){
            echo "<script>alert('Registro agregado correctamente');</script>";
            echo "<script>window.location.href='index.html'</script>";
            } else {
            echo "<script>alert('Algo salio mal , intentalo de nuevo');</script>";
            }
             
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
<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Central Telefonica</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <form action="" method="post">
      
        <h1>Produccion Formulario Isabell - Whatsapp Web</h1>
        <fieldset>

        <legend><span class="number">1</span>Información de Teleoperadora</legend>
        <label for="teleoperador">Seleccione Anexo:</label>
        <select id="teleoperador" name="teleoperador" required="required">
          <optgroup label="Anexos">
            <option value="Carla Chavarria">Carla Chavarria</option>
            <option value="Elizabeth Chota">Elizabeth Chota</option>
            <option value="Lastenia Estela">Lastenia Estela</option>
            <option value="Sandra Martinez">Sandra Martinez</option>
            <option value="Jenifer Montenegro">Jenifer Montenegro</option>
            <option value="Gisela Sanchez">Gisela Sanchez</option>
            <option value="Estephani Sanchez">Estephani Sanchez</option>
            <option value="Videl Mariel Vasquez">Videl Mariel Vasquez</option>
            <option value="Giselle Nikol Guerrero">Giselle Nikol Guerrero</option>
          </optgroup>
          </select>
   
         
          <legend><span class="number">2</span>Datos del Paciente</legend>

          <label for="dni">DNI:</label>
          <input type="text" name="dni" size="8" maxlength="8" required="required">
          
          
          <label for="nombres">Apellidos y Nombres:</label>
          <input type="text" id="nombres" name="nombres" required="required">
          
          <label for="t_pacientes">Tipo de Paciente:</label>
        <select id="t_pacientes" name="t_pacientes" required="required">
          <optgroup label="Tipos de Pacientes">
            <option value="Particular">             1.- Particular</option>
            <option value="Paciente Nuevo">         2.- Paciente Nuevo</option>
            <option value="Pacifico">               3.- Pacifico</option>
            <option value="Rimac">                  4.- Rimac</option>
            <option value="Mapfre">                 5.- Mapfre</option>
            <option value="Sanitas">                6.- Sanitas</option>
            <option value="Convenio EO">            7.- Convenio Electro Oriente</option>
            <option value="Convenio Ipasa">         8.- Convenio Ipasa</option>
            <option value="Convenio Univ. Agraria"> 9.- Convenio Universidad Agraria</option>
          </optgroup>
          </select>

          <label>Sexo:</label>
          <input type="radio" id="sexo" value="M" name="sexo"><label for="sexo" class="light">Masculino</label><br>
          <input type="radio" id="sexo" value="F" name="sexo"><label for="sexo" class="light">Femenino</label>
          <br>
          <br>
          <label for="edad">EDAD:</label>
          <input type="text" name="edad" size="2" maxlength="2" required="required">

          <label for="distrito">Seleccione Distrito:</label>
           <select id="distrito" name="distrito" required="required">
          <optgroup label="Aledaños">
            <option value="San Borja">                    San Borja</option>
            <option value="Sabtiago de Surco">            Santiago de Surco</option>
            <option value="San Luis">                     San Luis</option>
            <option value="Surquillo">                    Surquillo</option>
            <option value="La molina">                    La molina</option>
            <option value="LIma Cercado">                 Lima Cercado</option>
            <option value="Ate">                          Ate</option>
            <option value="Miraflores">                   Miraflores</option>
            <option value="San Juan de Miraflores">       San Juan de Miraflores</option>
            <option value="La VictoriA">                  La Victoria</option>
            <option value="Callao">                       Callao</option>
            <option value="Provincia">                    Provincia</option>
            </optgroup>
            <optgroup label="Otros">
            <option value="Ancon">                        Ancon</option>
            <option value="Barranco">                     Barranco</option>
            <option value="Bellavista">                   Bellavista</option>
            <option value="Breña">                        Breña</option>
            <option value="Carabayllo">                   Carabayllo</option>
            <option value="Carmen de la Legua">           Carmen de la Legua</option>
            <option value="Chaclacayo">                   Chaclacayo</option>
            <option value="Chorrillos">                   Chorrillos</option>
            <option value="Cieneguilla">                  Cieneguilla</option>
            <option value="Comas">                        Comas</option>
            <option value="El Agustinno">                 El Agustino</option>
            <option value="Independencia">                Independencia</option>
            <option value="Jesus Maria">                  Jesus Maria</option>
            <option value="La Perla">                     La Perla</option>
            <option value="La Punta">                     La Punta</option>
            <option value="Lince">                        Lince</option>
            <option value="LOs olivos">                   Los olivos</option>
            <option value="Lurigancho (Chosica)">         Lurigancho (Chosica)</option>
            <option value="Lurin">                        Lurin</option>
            <option value="Magdalena del Mar">            Magdalena del Mar</option>
            <option value="Pachacamac">                   Pachacamac</option>
            <option value="Pucusana">                     Pucusana</option>
            <option value="Pueblo Libre">                 Pueblo Libre</option>
            <option value="Puente Piedra">                Puente Piedra</option>
            <option value="Punta Hermosa">                Puenta Hermosa</option>
            <option value="Punta Negra">                  Punta Negra</option>
            <option value="Rimac">                        Rimac</option>
            <option value="San Bartolo">                  San Bartolo</option>
            <option value="San Isidro">                   San Isidro</option>
            <option value="San juan de Lurigancho">       San juan de Lurigancho</option>
            <option value="San Martin de Porres">         San Martin de Porres</option>
            <option value="San Miguel">                   San Miguel</option>
            <option value="Santa Anita">                  Santa Anita</option>
            <option value="Santa Maria del Mar">          Santa Maria del Mar</option>
            <option value="Santa Rosa">                   Santa Rosa</option>
            <option value="Ventanilla">                   Ventanilla</option>
            <option value="Vila el Salvador">             Villa el Salvador</option>
            <option value="Villa maria del Triunfo">      Villa maria del Triunfo</option>
            </select>


          <label for="medico">Médico:</label>
          <input type="text" id="medico" name="medico" required="required">

          <label for="motivo">Causa Especifica:</label>
           <select id="motivo" name="motivo" required="required">
          <optgroup label="Informacion General">
            <option value="1.1">                    Horario de Atención de la Clínica</option>
            <option value="1.2">            Ubicación de la Clínica</option>
            <option value="1.3">                     Tranferencia a otra área</option>
            </optgroup>
            <optgroup label="Citas">
            <option value="2.1">                    Horario Atención de los Médicos (Presencial)</option>
            <option value="2.2">                    Costo de la Consulta/Medios de Pago</option>
            <option value="2.3">                 Reserva de cita presencial</option>
            <option value="2.4">                          Reprogramación de citas</option>
            <option value="2.5">                   Cambio de cita</option>
            <option value="2.6">       Postergación de cita</option>
            <option value="2.7">                  Anulación de cita</option>
            <option value="2.8">                       Confirmación de cita</option>
            <option value="2.9">                    Horarios de Médicos Teleconsulta</option>
            <option value="2.10">                       Reserva de Teleconsulta</option>
            <option value="2.11">                    Orientación Safety Pay</option>
            </optgroup>
            <optgroup label="Tramites">
            <option value="3.1">                        Información sobre horario de atención de presupuesto</option>
            <option value="3.2">                     Información sobre Carta de Garantía</option>
            <option value="3.3">                   Solicitud Copia de Historia Clínica</option>
            <option value="3.4">                        Solicitud de Informe Médico</option>
            <option value="3.5">                   Solicitud de Certificado Médico</option>
            <option value="3.6">           Información sobre Carnet de Sanidad</option>
            <option value="3.7">                   Información sobre trámite Pre-nupcial</option>
            <option value="3.8">                   Información sobre Tarjeta Web</option>
            </optgroup>
            <optgroup label="Servicios de apoyo al diagnóstico">
            <option value="4.1">                  Información sobre costos de exámenes de laboratorio</option>
            <option value="4.2">                        Información sobre servicio de Rayos X</option>
            <option value="4.3">                 Información sobre Servicios de ecografía</option>
            <option value="4.4">                Información sobre servicio de densitometria</option>
            <option value="4.5">                  Información sobre resultado de Patología</option>
            <option value="4.6">                     Información sobre procedimientos de tópico</option>
            <option value="4.7">                     Información sobre servicio de resonancia/tomografía</option>
            </optgroup>
            <optgroup label="Procedimientos">
            <option value="5.1">                        Solicitud de Cita para Procedimiento</option>
            <option value="5.2">                   Costo de procedimientos/Medios de Pago</option>
            </optgroup>
            <optgroup label="Otros relativos al usuario">
            <option value="6.1">         La consulta no pudo ser resuelta por problemas de comunicación con el usuario</option>
            <option value="6.2">                        Otras Consultas</option>
            <option value="6.3">            Demora en atención canal virtual</option>
            </optgroup>
            </select>

          <label>Estado:</label>
          <input type="radio" id="estado" value="R" name="estado"><label for="estado" class="light">Resuelto</label><br>
          <input type="radio" id="estado" value="T" name="estado"><label for="estado" class="light">En trámite</label>
          <br>
          <br>

          <label for="observacion">Observaciones:</label>
          <textarea id="observacion" name="observacion"></textarea>
          </optgroup>

        <button name="envia" type="submit">Enviar Datos</button>
      </form>
      
    </body>
</html>
</html>
