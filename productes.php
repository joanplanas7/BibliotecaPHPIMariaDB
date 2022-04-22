<?php 
    include("template/capçelera.php"); 
    include("administrador/config/bd.php");    
?>

<?php 
     $sentenciaSQL = $conexio->prepare("SELECT * FROM llibres");
     $sentenciaSQL->execute();
     $llistaLlibres = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>


<?php foreach ($llistaLlibres as $llibre){ ?>
    <div class="col-md-3">
        <div class="card">
            <img src="img/<?php echo $llibre['imatge']; ?>" alt="" srcset="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $llibre['nom']; ?></h4>
                <a name="" id="" class="btn btn-primary" href="" role="button">Veure més</a>
            </div>
        </div>
    </div>
<?php } ?>

<?php include("template/peu.php"); ?>