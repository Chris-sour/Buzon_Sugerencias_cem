<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Teleconsultas</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style media="screen">
      body{
        background:#FAFAFA;
        font-family: 'Roboto', sans-serif;
        padding:20px 0px;
      }
      .content{
        width:100%;
        margin:auto;
        background:#fafafa;
        box-shadow:4px 4px 15px rgba(0, 0, 0, 0.13);
      }
      .header{
        text-align:center;
        padding:30px;
      }
      .header img{
        width:180px;
      }
      .texto{
        padding:20px;
        padding-top:0;
      }

      .texto h4{
        font-size:1rem;
      }
      .texto h3{
        font-size:1rem;
        margin-top:0px;
      }
      .texto h3 small{
        font-size:1rem;
        text-decoration:underline;
      }
      .texto span{
        display:block;
        margin-top:20px;
      }
      .texto a{
          font-size: 0.9rem;
      }
      .texto span:last-child{
        margin-top:0px;
      }
      .footer{
        background:#223873;
        color:#fff;
        padding:30px 50px;
        text-align:center;
      }
      .footer a{
        color:#fff;
        font-size:20px;
        text-decoration:none;
      }
      .footer p{
        margin-top:0px;
      }
      .redes{
        text-align:center;
        margin-top:40px;
      }
      .redes a{
        margin-left:14px;
      }

      @media(min-width:768px){
        .content{
          width:65%;
        }
        .texto h3{
          font-size:1.5rem;
        }
        .texto h3 small{
          font-size:1.5rem;
        }
        .texto h4{
          font-size:1.2rem;
        }
        .texto a{
            font-size: 1rem;
        }
      }

      @media(min-width:1200px){
        .header{
          padding:60px;

        }
        .header img{
          width:250px;
        }
        .content{
          width:50%;
        }
        .texto{
          padding:70px;
          padding-top: 0;
        }
      }

      @media(min-width:1600px){
        .content{
          width:36%;
        }
      }

    </style>
  </head>
  <body>
    <div class="content">
      <div class="header">
        <img src="<?php echo base_url('assets/logo.png') ?>"  alt="">
      </div>
      <div class="texto">
        <h3><small><?php echo utf8_encode(ucwords(strtolower($nombre_corto))); ?></small>, gracias por reservar su cita.</h3>
        <ul>
          <li>Médico: Dr. <?php echo utf8_encode(ucwords(strtolower($medico))); ?></li>
          <li>Especialidad: <?php echo utf8_encode(ucwords(strtolower($especialidad)))?> </li>
          <li>Fecha y hora: <?php echo date("d/m/Y g:i a", strtotime($fecha_hora)); ?></li>
        </ul>
        <h4>Le enviamos la información de su teleconsulta: </h4>
        <p>Clínica de Especialidades Médicas le está invitando a una reunión de Zoom programada.</p>
        <p>Tema: Cita <?php echo utf8_encode(ucwords(strtolower($especialidad)))?> - Dr. <?php echo utf8_encode(ucwords(strtolower($medico))); ?> - Pac. <?php  echo utf8_encode(ucwords(strtolower($nombre_paciente))) ?> Hora: <?php echo date("d/m/Y g:i a", strtotime($fecha_hora)); ?> Lima</p>
        <p>Unirse a la reunión Zoom</p>
        <a href="<?php echo $url_zoom ?>"><?php echo $url_zoom ?></a>
        <p>Le enviamos un videotutorial para la instalacion y uso del aplicativo :</p>
        <a href="https://www.youtube.com/watch?v=ztiDPiV64ZA&feature=youtu.be" target="_blank">Click para ver el tutorial</a>
      </div>
      <br>
      <div class="footer">
        <p>Si tiene alguna duda contáctese a nuestra línea de Consulta Online: </p>
        <a href="tel:014120900">412 0900 anx. 135</a><br>
        <a href="tel:997 574 132">997 574 132</a>
      </div>
    </div>
    <div class="redes">
      <a href="https://www.facebook.com/cemsaborjaoficial/?ref=bookmarks" target="_blank"><img src="<?php echo base_url('assets/facebook.png') ?>" alt=""></a>
      <a href="https://www.especialidadesmedicas.org/" target="_blank"><img src="<?php echo base_url('assets/link.png') ?>" alt=""> </a>
    </div>
  </body>
</html>
