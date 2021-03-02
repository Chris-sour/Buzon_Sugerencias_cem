<?php
		//echo "OKS entra.<br />";
		$serverName = "199.199.0.210\CEM";
		$connectionInfo = array( "Database"=>"CLINICA", "UID"=>"sa", "PWD"=>"Hss2012" );
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
        echo "<h1>Conectado</h1>"; 
        }else{
             echo "Conexión no se pudo establecer.<br />";
             die( print_r( sqlsrv_errors(), true));
        }
?>