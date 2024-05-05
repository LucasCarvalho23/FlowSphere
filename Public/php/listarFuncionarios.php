<?php 

    session_start();

    if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] == false) {
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <title>~FlowSphere - Lista de funcionários</title>
</head>
<body>

    <div class="container-button-logoff">
        <a class="button-logoff" href="../../Private/php/logoff.php">Deslogar</a>
    </div>
    
    <div class="container container-fluid">
        <div class="row d-flex justify-content-center">

            <div class="col-6 mt-5">
                <form action="../../Private/php/consultas.php?read" method="post" class="container-list">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Listar</button>
                    </div>
                </form>
            </div>

            <?php 
                if (isset($_SESSION['read']) && $_SESSION['read'] == true) {
            ?>

                <div class="col-8 mt-5">
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                NOME 
                            </div>
                            <div class="col-3">
                                update 
                            </div>
                            <div class="col-3">
                                delete 
                            </div>
                        </div>
                    </div>

                </div>

            <?php } ?>

        </div>
    </div>

    <!-- script -->
    <script src="../javascript/jquery-3.7.1.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../javascript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>