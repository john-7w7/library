<?php
if(isset($_POST["submit"])){
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'root';
        $Password = '';
        $dbName = 'library';
        
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
        //Insertar imagen en la base de datos
        $insertar = $db->query("INSERT into images_tabla (imagenes, creado) VALUES ('$imgContenido', now())");
		// COndicional para verificar la subida del fichero
        if($lastInsertId)
        {
        $_SESSION['msg']="Brand Listed successfully";
        header('location:manage-portada.php');
        }
        else 
        {
        $_SESSION['error']="Something went wrong. Please try again";
        header('location:manage.portada.php');
        }
        
        echo "Por favor seleccione imagen a subir.";
    }
}
?>