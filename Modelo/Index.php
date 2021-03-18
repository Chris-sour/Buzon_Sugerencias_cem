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

    <title>Control de Gases Medicinales</title>
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
                    <div class="col-xs-12">
                        <br>
                        <img src="../img/GasesMedicinales.jpg" width="100%" alt="">
                    </div>

                    <script type="text/javascript">
                    function multiplicar()
                        {
                            var num6=6;
                            var num7=7;
                            var num8=8;
                            var num9=9;
                            var num10=10;
                            var num2800=2800; 
                            var n6=document.getElementById("stock6").value;
                            document.getElementById("total6").value=(n6*num6);
                            var n7=document.getElementById("stock7").value;
                            document.getElementById("total7").value=(n7*num7);  
                            var n8=document.getElementById("stock8").value;
                            document.getElementById("total8").value=(n8*num8);
                            var n9=document.getElementById("stock9").value;
                            document.getElementById("total9").value=(n9*num9);
                            var n10=document.getElementById("stock10").value;
                            document.getElementById("total10").value=(n10*num10);
                            var n11=document.getElementById("consumo1a").value;
                            document.getElementById("total1a").value=(num2800-n11);
                            var n12=document.getElementById("consumo2b").value;
                            document.getElementById("total2b").value=(num2800-n12);
                        }
                    </script>

                    <div class="col-xs-12" style="padding-bottom: 1em; border-radius: 0.5em;">
                        <div style="background: #f1f1f1;display: grid;border: 1px solid grey;padding: 0.5em 1em;border-radius: 0.25em;margin: 0 1em; padding-bottom: 1em;">
                            <font face="arial">

                            <div class="form-group" style="margin-bottom: 0 !important;">
                                <div class="col-lg-8 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                                    <label>FECHA DE CONTROL :</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required="required" autocomplete="off">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>HORA DE CONTROL:</label>
                                    <input type="time" name="hora" id="hora" class="form-control" required="required" autocomplete="off">
                            </div>
                            <br>

                        	<br>
                            <div class="col-lg-12 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>PRESENTACION:</label>
                                    <input type="text" name="nombres" id="nombres" class="form-control" required="required" autocomplete="off">
                            </div>

                            <div  class="col-xs-12" style="padding: 0.15em .5em;">
                            <label>COLOR DE CILINDRO:</label>
                            <select name="color" class="form-control" required="required">
                            <option>Verde</option>
                            <option>Plomo</option>
                            <option>Amarillo</option>
                            </select>
                            </div>

                            <div  class="col-xs-12" style="padding: 0.15em .5em;">
                            <label>CONTENIDO:</label>
                            <select name="contenido" class="form-control" required="required">
                            <option>Oxigeno</option>
                            <option>Nitrogeno</option>
                            <option>Co2</option>
                            </select>
                            </div>

                            <div class="col-lg-12 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>CONCENTRACION:</label>
                                    <input type="text" name="concentracion" id="concentracion" class="form-control" required="required" autocomplete="off">
                            </div>
                            <br>
            
                            <div  class="col-xs-12" style="padding: 0.15em .5em;">
                            <label>ESTADO DE CILINDRO:</label>
                            <select name="estado" class="form-control" required="required">
                            <option>Bueno</option>
                            <option>Malo</option>
                            <option>Critico</option>
                            </select>
                            </div>

                            <br>
                            <label style="margin-top: 0.5em; color: #1919A3;">CAPACIDAD DE CILINDROS:</label>
                        	<br>

                            <div class="form-group" style="margin-bottom: 0 !important;">
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                                    <label>MEDIDAS DE CILINDROS</label>
                                    <label>          6 Mts3</label>
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                                    <label>STOCK CILINDROS :</label>
                                    <input type="text" name="stock6" id="stock6" class="form-control" required="required" autocomplete="off" onkeyup="multiplicar()" placeholder="Ingrese Stock">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <label>CONTENIDO TOTAL M3 :</label>
                                    <input type="text" name="total6" id="total6" class="form-control"  autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>

                            <div class="form-group" style="margin-bottom: 0 !important;">
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                            <label>          7 Mts3</label>
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="stock7" id="stock7"  class="form-control" required="required" autocomplete="off" onkeyup="multiplicar()" placeholder="Ingrese Stock">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="total7" id="total7" class="form-control" autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>

                            <div class="form-group" style="margin-bottom: 0 !important;">
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                            <label>          8 Mts3</label>
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="stock8" id="stock8"  class="form-control" required="required" autocomplete="off" onkeyup="multiplicar()" placeholder="Ingrese Stock">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="total8" id="total8" class="form-control" autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>

                            <div class="form-group" style="margin-bottom: 0 !important;">
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                            <label>          9 Mts3</label>
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="stock9" id="stock9"  class="form-control" required="required" autocomplete="off" onkeyup="multiplicar()" placeholder="Ingrese Stock">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="total9" id="total9" class="form-control" autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>

                            <div class="form-group" style="margin-bottom: 0 !important;">
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                            <label>          10 Mts3</label>
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="stock10" id="stock10" class="form-control" required="required" autocomplete="off" onkeyup="multiplicar()" placeholder="Ingrese Stock">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="total10" id="total10" class="form-control"  autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>

                            <div class="form-group" style="margin-bottom: 0 !important;">
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;"> <!--col-lg-4 -->
                            <label>          Otros Mts3</label>
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="stockotros"  class="form-control" required="required" autocomplete="off" placeholder="Ingrese Stock">
                            </div>
                            <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                    <input type="text" name="totalotros"  class="form-control" required="required" autocomplete="off">
                            </div>

                            <label>MEDIDOR RED 1:</label>
                            <br>
                            <div class="col-lg-2 col-xs-4" style="padding: 0.15em .5em;">
                                    <input type="text" name="medidor1a" id="medidor1a" class="form-control" autocomplete="off" readonly="true" value="2800" onkeyup="multiplicar()">
                            </div>

                            <div class="col-lg-3 col-xs-4" style="padding: 0.15em .5em;">
                                    <input type="text" name="consumo1a" id="consumo1a" class="form-control" required="required" autocomplete="off" placeholder="Ingrese consumo" onkeyup="multiplicar()">
                            </div>
                            <div class="col-lg-2 col-xs-4" style="padding: 0.15em .5em;">
                                    <input type="text" name="total1a" id="total1a" class="form-control" autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>
                           <br> 
                           <br>
                            <label>MEDIDOR RED 2:</label>
                            <br>
                            <div class="col-lg-2 col-xs-4" style="padding: 0.15em .5em;">                                   
                                    <input type="text" name="medidor2b" id="medidor2b" class="form-control" autocomplete="off" readonly="true" value="2800" onkeyup="multiplicar()">
                            </div>
                            <div class="col-lg-3 col-xs-4" style="padding: 0.15em .5em;">                                   
                                    <input type="text" name="consumo2b" id="consumo2b" class="form-control" required="required" autocomplete="off" placeholder="Ingrese consumo" onkeyup="multiplicar()">
                            </div>
                            <div class="col-lg-2 col-xs-4" style="padding: 0.15em .5em;">                                   
                                    <input type="text" name="total2b" id="total2b" class="form-control" autocomplete="off" onkeyup="multiplicar()" readonly="true">
                            </div>

                            <div  class="col-xs-12" style="padding: 0.15em .5em;">
                            <label>RESPONSABLE DE CONTROL:</label>
                            <select name="contenido" class="form-control" required="required">
                            <option>GIANCARLO BOSSIO</option>
                            <option>GISELLA SECLEN</option>
                            <option>TERESITA VARGAS</option>
                            </select>
                            </div>

                            <div  class="col-xs-12" style="padding: 0.15em .5em;">
                            <label>AREA:</label>
                            <select name="contenido" class="form-control" required="required">
                            <option>LOGISTICA</option>
                            <option>FARMACIA</option>
                            <option>HOSPITALIZACIÓN</option>
                            </select>
                            </div>


                                <div class="col-lg-4 col-xs-12" style="padding: 0.15em .5em;">
                                </div>
                            </div>
                        </div>
                        <div>

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
