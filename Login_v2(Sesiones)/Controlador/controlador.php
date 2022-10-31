<?php
    include_once '..\BBDD\bbdd.php';

       if (isset($_POST['enviar'])) 
       {
            $usuario = $_POST['nombre'];
            $password = $_POST['password'];
            
            // Conectamos a la base de datos
            conexion();
            
            //Registro  de usuarios
            if (!empty($_POST['rol'])) 
            {
                $rol = $_POST['rol'];
                if (empty($usuario) || empty($password) || empty($rol))
                {
                    $error = "Campos vacios";
                }
                else 
                {               
                    insert(conexion(), $usuario, $password, $rol);
                    header('location: ../Vista/login.php');
                }
            }
            //Inicio de sesión
            else 
            {     
                session_start();
                
                if (isset($_GET['cerrar_sesion'])) 
                {
                    session_unset();
                    session_destroy();
                }

                if (isset($_SESSION['rol'])) 
                {
                    switch ($_SESSION['rol']) 
                    {
                        case 'a':
                            header('location: ../Vista/Administrador.php');
                            break;
                        
                        case 'c':
                            header('location: ../Vista/Normal.php');
                            break;
                    }
                }
            
                selectWhere(conexion(),$usuario, $password);
                       
            }
       }

    ?>