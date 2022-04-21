<?php include("../template/capçalera.php"); ?>

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
        echo "2";
        break;
    
    case 'cancelar': 
        echo "3";
        break;
    
}

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
                    <label for="txtID"> ID: </label>
                    <input type="text" class="form-control" name="txtID" id="txtID"  placeholder="ID">
                </div>

                <div class = "form-group">
                    <label for="txtNom"> Nom llibre:</label>
                    <input type="text" class="form-control" name="txtNom" id="txtNom"  placeholder="Nom del llibre">
                </div>

                <div class = "form-group">
                    <label for="txtImatge">Imatge: </label>
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
            <tr>
                <td>2</td>
                <td>Apren</td>
                <td>imatge.jpg</td>
                <td>Seleccionar | Borrar</td>
            </tr>
        </tbody>
    </table>
    
</div>

<?php include("../template/peu.php"); ?>