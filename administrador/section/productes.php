<?php require("../template/capçalera.php"); ?>

<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNom = (isset($_POST['txtNom']))?$_POST['txtNom']:"";

$txtImg = (isset($_FILES['txtImatge']['name']))?$_FILES['txtImatge']['name']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";


include("../config/bd.php"); 

switch ($accion) {
    case 'afegir':
        $sentenciaSQL = $conexio->prepare("INSERT INTO llibres(nom, imatge) VALUES (:nom, :img);");
        $sentenciaSQL->bindParam(':nom', $txtNom);
        $sentenciaSQL->bindParam(':img', $txtImg);
        $sentenciaSQL->execute();
        break;
    
    case 'modificar':
        $sentenciaSQL = $conexio->prepare("UPDATE llibres set nom=:nom WHERE id=:id");
        $sentenciaSQL->bindParam(':nom', $txtNom);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImg != ""){
            $sentenciaSQL = $conexio->prepare("UPDATE llibres set imatge=:imatge WHERE id=:id");
            $sentenciaSQL->bindParam(':imatge', $txtImg);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }

        break;
    
    case 'cancelar': 
        echo "3";
        break;

    case 'Seleccionar': 
        $sentenciaSQL = $conexio->prepare("SELECT * FROM llibres WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        $llibre = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNom = $llibre['nom'];
        $txtImg = $llibre['imatge'];
        break;

    case 'Eliminar': 
        $sentenciaSQL = $conexio->prepare("DELETE FROM llibres WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        break;
    
}

$sentenciaSQL = $conexio->prepare("SELECT * FROM llibres");
$sentenciaSQL->execute();

$llistaLlibres = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="col-md-5">
    <br>
    <div class="card">
        <div class="card-header">
            Dades dels llibres: 
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">

                <div class = "form-group">
                    <input type="hidden" class="form-control" name="txtID" id="txtID" value="<?php echo $txtID; ?>" placeholder="ID">
                </div>

                <div class = "form-group">
                    <label for="txtNom"> Nom llibre:</label>
                    <input type="text" class="form-control" name="txtNom" id="txtNom"  value="<?php echo $txtNom; ?>" placeholder="Nom del llibre">
                </div>

                <div class = "form-group">
                    <label for="txtImatge">Imatge: </label>
                    <?php echo $txtImg; ?>
                    <input type="file" class="form-control" name="txtImatge" id="txtImatge" accept="image/*">
                </div>



                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="afegir" class="btn btn-success">Afegir</button>
                    <button type="submit" name="accion" value="modificar" class="btn btn-warning">Editar</button>
                    <button type="submit" name="accion" value="cancelar" class="btn btn-info">Cancelar</button>
                </div>

            </form>
        </div>
    </div>
    
</div>

<div class="col-md-7">
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Imatge</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($llistaLlibres as $llibre){ ?>
                <tr>
                    <td> <?php echo $llibre['id']; ?></td>
                    <td><?php echo $llibre['nom']; ?></td>
                    <td><?php echo $llibre['imatge']; ?></td>

                    <td>            
                        <form method="post"> 
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $llibre['id']; ?>"/>
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"> 
                            <input type="submit" name="accion" value="Eliminar" class="btn btn-danger"> 
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>

<?php include("../template/peu.php"); ?>