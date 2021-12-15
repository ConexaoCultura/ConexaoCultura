<?php
    include_once '../../core/conex.php';
    error_reporting(E_PARSE);
    if(!($_POST['resposta']))
        header("Location: ../quiz/quiz.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/assets/css/roteiro/roteiro.css">
    <link rel="stylesheet" href="../../../public/assets/css/syle.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../../public/assets/img/favicon.ico" type="image/x-icon">
    <title>Conexão Cultura</title>
</head>

<body class="body">
    <!-- NAVIGATION -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="../../views/home/index.php"><img class="logo show1" src="../../../public/assets/img/logo.png" alt="Logo Conexão Cultura"></a>
            <a href="../../views/home/index.php"><img class="logo show2" src="../../../public/assets/img/logoSemNome.png" alt="Logo Conexão Cultura"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/home/index.php"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i>Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-signs"></i>Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/quiz/quiz.php"><i class="fas fa-map-marked-alt"></i>Quiz</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h2 class="titulo">Roteiro</h2>
        <?php 
            $alternativa = $_POST['resposta'];
            $query = "SELECT * FROM roteiro JOIN texto ON roteiro.alternativa = texto.id_texto WHERE alternativa = ".$alternativa;
            $result = $conn->query($query);
        ?>
        <p class="souEu">
            <?php 
                while($row = $result->fetch_row())
                {       
                    echo($row[7]);
                    break;  
                }
            ?>
        </p>
        <div class="roteiro">
            <div class="col">
            <?php 
                foreach ($result as $row) {
                ?>
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal"><?php echo $row['pontos_turisticos']?></h4>
                        </div>
                        <div class="card-body">
                            <img src="<?php echo $row['imagem'];?>" alt="Imagem do Evento">
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><span>Endereço:</span></li>
                                <li> <?php echo $row['endereco'] ?>
                                </li>
                                <li class="descricao"><span>Descrição:</span></li>
                                <li>
                                    <?php echo $row['informacoes'] ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php 
                    }
                ?> 
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="contato">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <img class="imagemFooter" src="../../../public/assets/img/logoSemNome.png" alt="">
                        <p>©2021 Conexão Cultura</p>
                        <p>Todos os direitos reservados</p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4"><a href="../../views/home/index.php">Home</a></h6>
                        <p><a href="#" class="text-reset">Perfil</a></p>
                        <p><a href="#" class="text-reset">Mapa</a></p>
                        <p><a href="../../views/quiz/quiz.php" class="text-reset">Quiz</a></p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
                        <p>conexão@cultura.com</p>
                        <p>(11)2222-2222</p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Social
                        </h6>
                        <p><a href="#!" class="text-reset"><i class="fab fa-facebook"></i> Facebook</a></p>
                        <p><a href="#!" class="text-reset"><i class="fab fa-instagram"></i> Instagram</a></p>
                        <p><a href="#!" class="text-reset"><i class="fab fa-twitter"></i> Twitter</a></p>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <!-- Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3eecc79a6a.js" crossorigin="anonymous"></script>
     <!-- JavaScript -->
    <script src="../../../public/assets/js/main.js"></script>
</body>

</html>