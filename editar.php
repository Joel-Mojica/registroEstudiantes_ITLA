<?php 
include 'utility.php';
session_start();

if(isset($_GET['id'])){
    $estudianteID = $_GET['id'];

    $_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ? $_SESSION['estudiantes'] : array();
    
    $estudiantes = $_SESSION['estudiantes'];

    $elemento = searchProperty($estudiantes,'id',$estudianteID)[0];
    $elementoIndex = getIndexElement($estudiantes,'id',$estudianteID);

        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) && isset($_POST['estado']) ){
    
                $actualizarEstudiante= ['id'=>$estudianteID,'nombre'=> $_POST['nombre'], 'apellido'=> $_POST['apellido'], 'carrera'=> $_POST['carrera'], 'estado'=>$_POST['estado'] ];

                $estudiantes[$elementoIndex] = $actualizarEstudiante;
                
                    $_SESSION['estudiantes'] = $estudiantes;
            
                    header('location: index.php');
                    exit();
        }







    }else{

            header('location: index.php');
            exit();
}

//Utilize el mismo metodo que usted, por una parte aun no se porque usamos un array dentro de otro

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<hr>

<h1 class="container bg-primary radius text-white" style="border-radius:3px">Editar / Actualizar Registro Estudiantes ITLA</h1>

<form action="editar.php?id=<?php echo $elemento['id']; ?>" method="post">

    <div class="formu container border jumbotron">

                    <label for="nombre">NOMBRE</label>
                    <input class="form-group form-text" value="<?php echo $elemento['nombre']; ?>" type="text" style="width:600px" name="nombre" id="nombre">
                
                    <label for="apellido">APELLIDO</label>
                    <input class="form-group form-text" value="<?php echo $elemento['apellido']; ?>" type="text" style="width:600px" name="apellido" id="apellido">
                
                    <label for="carrera">CARRERA</label>
                    <select class="form-group form-text" name="carrera" id="carrera">
                <?php 
                        
                foreach($carreras as $id => $nombreCarreras): ?>

                    <?php if($id == $elemento['carrera']): ?>
                        <option selected value="<?php echo $id; ?>"> <?php echo $nombreCarreras; ?> </option>
                    <?php else: ?> 
                        <option  value="<?php echo $id; ?>"> <?php echo $nombreCarreras; ?> </option>
                    <?php endif; ?> 

                <?php endforeach; ?>
                    </select>
    
         <div>
            <label for="estado">ESTADO</label>
            <input type="radio"  name="estado" value="activo" checked><label for="activo">ACTIVO</label>
            <input type="radio"  name="estado" value="inactivo"><label for="inactivo">INACTIVO</label>
            </div>
            
            <hr>
            <input type="submit" value="GUARDAR" class="btn btn-success">
            <a href="index.php"><input type="submit" value="ATRAS" class="btn btn-danger"></a>
        
         </div>
    </div>

        

</form>



</body>
</html>