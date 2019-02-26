<!-- The header contains the basic HTML code that you’ll want to display before 
loading the main view, together with a heading. It will also output the $title
variable, which we’ll define later in the controller. -->
<html>
        <head>
            <title><?php echo $title; ?> | holanerd.com.ar</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/main.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/home.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/header.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/nav.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/sidebar.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/homeForum.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/post.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/payment.css" />
                <?php if( isset($_SESSION['email']) && ($_SESSION['email'] !== NULL) ) { ?>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/profile.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/postCreator.css" />
                <?php } ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/holanerd/footer.css" />
            <?php if( isset($headerExtraCode) && (!empty($headerExtraCode)) ) {
                    echo $headerExtraCode;
                    }
                    /* Permite la adición de más código CSS, por ejemplo, sin necesidad de llamar a <head> en las
                    vistas */ 
            ?>
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
        </head>
        <body>
<div id="fashionHeader"> <!-- Un header muy fachero -->
    <?php
    if( isset($_SESSION['less']) && (!$_SESSION['less']) ) { // Si 'less' (menos) existe y es FALSO, entonces el usuario "quiere más" y habilitamos el JS
        $this->load->view('templates/particles');
    } ?>
    <div class="logo" title="<?php echo $title; ?>"></div>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>">inicio</a></li> <!-- Un feed general de todo el sitio -->
            <li><a href="<?php echo base_url(); ?>forum">foro</a></li>
            <li><a href="<?php echo base_url(); ?>store">tienda</a></li>
            <?php if( $this->session->has_userdata('email') ) {
                ?>
                <li><a href="<?php echo base_url(); ?>profile#profile">perfil</a></li>
                <?php
            } else {
                ?>
                <li><a href="<?php echo base_url(); ?>about">holanerd!</a></li>
                <?php
            }
                ?>
            
            <!--<li><a href="login">entrar</a></li>-->
        </ul>
    </nav>

</div> <!-- Termina el header fachero -->