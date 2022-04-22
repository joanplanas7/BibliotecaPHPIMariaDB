<?php 
    session_start();
    if($_POST){
        if($_POST['usuari'] == "joan" && $_POST['contrassenya'] == "1234"){
            $_SESSION['usuari'] = "ok";
            $_SESSION['nomUsuari'] = "joan";
            header('Location: inici.php');
        }else{
            $missatje= "Dades incorrectes";
        }

        
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
        <div class="container">
            <br><br><br>
            <div class="row">
                <div class="col-md-4 offset-4">
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            <?php if(isset($missatje)){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $missatje ?>
                                </div>
                            <?php  }?>

                            <form method="POST"> 
                                <div class = "form-group">
                                    <label>Usuari</label>
                                    <input type="text" class="form-control" name="usuari" placeholder="Entrar l'usuari">
                                </div>
                                <div class="form-group">
                                    <label>Contrassenya:</label>
                                    <input type="password" class="form-control" name="contrassenya" placeholder="Contrassenya">
                                </div>
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                        </div>
                    
                    </div>
                    
                </div> 
            </div>
        </div>
  
  </body>
</html>