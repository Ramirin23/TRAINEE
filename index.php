<?php

    #VALORES DEL FORMULARIO
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $txt_nombre = (isset($_POST['txt_nombre']))?$_POST['txt_nombre']:"";
    $txt_apellido = (isset($_POST['txt_apellido']))?$_POST['txt_apellido']:"";
    $txt_tipoI = (isset($_POST['txt_tipoI']))?$_POST['txt_tipoI']:"";
    $txt_numeroI = (isset($_POST['txt_numeroI']))?$_POST['txt_numeroI']:"";
    $txt_razonS = (isset($_POST['txt_razonS']))?$_POST['txt_razonS']:"";
    $txt_municipio = (isset($_POST['txt_municipio']))?$_POST['txt_municipio']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    include("../Conexion/conexion.php");

    
    switch($accion){
        case "btn_agregar":
        
            $sentencia_insert=$conn->prepare("INSERT INTO cliente (Tipo_de_identificacion, Numero_identificacion, Nombres, Apellidos,Razon_social, Municipio)
            VALUES (:Tipo_de_identificacion, :Numero_identificacion, :Nombres, :Apellidos,:Razon_social, :Municipio)");

            $sentencia_insert->bindParam(':Tipo_de_identificacion', $txt_tipoI);
            $sentencia_insert->bindParam(':Numero_identificacion', $txt_numeroI);
            $sentencia_insert->bindParam(':Nombres', $txt_nombre);
            $sentencia_insert->bindParam(':Apellidos', $txt_apellido);
            $sentencia_insert->bindParam(':Razon_social', $txt_razonS);
            $sentencia_insert->bindParam(':Municipio', $txt_municipio);
            $sentencia_insert->execute();

            echo "Agregado";
            
            
        break;
        case "btn_modificar":
            $sentencia_update=$conn->prepare("UPDATE cliente SET 
            Tipo_de_identificacion=:Tipo_de_identificacion, 
            Numero_identificacion=:Numero_identificacion,
            Nombres=:Nombres, 
            Apellidos=:Apellidos,
            Razon_social=:Razon_social,
            Municipio=:Municipio WHERE ID=:ID");
            echo $txtID; 

           

            $sentencia_update->bindParam(':Tipo_de_identificacion', $txt_tipoI);
            $sentencia_update->bindParam(':Numero_identificacion', $txt_numeroI);
            $sentencia_update->bindParam(':Nombres', $txt_nombre);
            $sentencia_update->bindParam(':Apellidos', $txt_apellido);
            $sentencia_update->bindParam(':Razon_social', $txt_razonS);
            $sentencia_update->bindParam(':Municipio', $txt_municipio);
            $sentencia_update->bindParam(':ID', $txtID);
            $sentencia_update->execute();
            header('Location: index.php');
            break;

        case "btn_eliminar":
            break;
        
               
        

    }
    $sentencia_insert=$conn->prepare("SELECT * FROM cliente");
    $sentencia_insert->execute();
    $tabla_cliente=$sentencia_insert->fetchAll(PDO :: FETCH_ASSOC);
    #print_r($tabla_cliente); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <form action="" method="post">


            <label for="">Nombre(s):</label>
            <input type="text" name="txt_nombre" value="<?php echo $txt_nombre?>" placeholder="" id="txt_nombre" requiere="">
            <br>

            <label for="">Apellido(s):</label>
            <input type="text" name="txt_apellido" value="<?php echo $txt_apellido?>" placeholder="" id="txt_apellido" requiere="">
            <br>

            <label for="">Tipo de identificacion:</label>
            <input type="text" name="txt_tipoI" value="<?php echo $txt_tipoI?>" placeholder="" id="txt_tipoI" requiere="">
            <br>

            <label for="">Numero de identificacion:</label>
            <input type="text" name="txt_numeroI" value="<?php echo $txt_numeroI?>" placeholder="" id="txt_numeroI" requiere="">
            <br>

            <label for="">Razon social:</label>
            <input type="text" name="txt_razonS" value="<?php echo $txt_razonS?>" placeholder="" id="txt_razonS" requiere="">
            <br>

            <label for="">Municipio:</label>
            <input type="text" name="txt_municipio" value="<?php echo $txt_municipio?>" placeholder="" id="txt_municipio" requiere="">
            <br>

            <button value="btn_agregar" type="submit" name="accion">Agregar</button>
            <button value="btn_modificar" type="submit" name="accion">Modificar</button>
            <button value="btn_eliminar" type="submit" name="accion">Eliminar</button>
            <button value="btn_cancelar" type="submit" name="accion">Cancelar</button>

        </form>

        <div class = "row">
            <table>
                <thead>
                    <tr>
                        <th>Tipo Identificación</th>
                        <th>Número Identificación</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Razón Social</th>
                        <th>Municipio</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>

                <?php
                    foreach($tabla_cliente as $cliente){ ?>
                        <tr>
                            <td><?php echo $cliente['Tipo_de_identificacion']; ?></td>
                            <td><?php echo $cliente['Numero_identificacion']; ?> </td>
                            <td><?php echo $cliente['Nombres']; ?></td>
                            <td><?php echo $cliente['Apellidos']; ?></td>
                            <td><?php echo $cliente['Razon_social']; ?></td>
                            <td><?php echo $cliente['Municipio']; ?></td>
                            <td>
                            
                                <form action="" method="post">

                                    <input type="hidden" name="txtID"  value="<?php  echo $cliente['ID'];?>">
                                    <input type="hidden" name="txt_tipoI" value="<?php echo $cliente['Tipo_de_identificacion'];?>">
                                    <input type="hidden" name="txt_numeroI" value="<?php echo $cliente['Numero_identificacion'];?>">
                                    <input type="hidden" name="txt_nombre" value="<?php echo $cliente['Nombres'];?>">
                                    <input type="hidden" name="txt_apellido" value="<?php echo $cliente['Apellidos'];?>">
                                    <input type="hidden" name="txt_razonS" value="<?php echo $cliente['Razon_social'];?>">
                                    <input type="hidden" name="txt_municipio" value="<?php echo $cliente['Municipio'];?>">
                                    
                                    
                                    <input type="submit" value="Seleccionar" name="accion">
                                </form>
                            </td>
                           
                        </tr>

                <?php  }  ?>

            </table>
        </div>

    </div>
</body>
</html>