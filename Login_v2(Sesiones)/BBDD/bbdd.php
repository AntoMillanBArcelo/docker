<?php
    //Conexión a la base de datos
    function conexion(){
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = "mysql:host=localhost;dbname=sesion";
            $dwes = new PDO($dsn, "root", "", $opc);
            return $dwes;
        }
        catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    //Coger uno
    function selectWhere($dwes,$usuario,$password){
        
        $selectWhere = $dwes->prepare('SELECT * FROM usuario WHERE nombre = :nombre AND contrasenia = :contrasenia');
        $selectWhere->bindParam(":nombre", $usuario);
        $selectWhere->bindParam(":contrasenia", $password);

        $selectWhere -> execute();
        $row = $selectWhere -> fetch(PDO::FETCH_NUM);
        if ($row == true) 
        {
            $rol = $row[2];
            $_SESSION['rol'] = $rol;
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
        else
        {
            echo "El usuario o contraseña son incorrectos";
        }
    }

    //Insert
    function insert($dwes,$usuario,$password,$rol){
        $insert = $dwes->prepare('INSERT INTO usuario (nombre, contrasenia, rol) VALUES (:nombre, :contrasenia, :rol)');
        $insert->bindParam(":nombre", $usuario);
        $insert->bindParam(":contrasenia", $password);
        $insert->bindParam(":rol", $rol);

        $insert -> execute();
    }

?>