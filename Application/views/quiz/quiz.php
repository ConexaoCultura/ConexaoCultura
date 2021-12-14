<?php
    include_once '../../core/conex.php';
    error_reporting(E_PARSE);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/assets/css/syle.css">
    <link rel="stylesheet" href="../../../public/assets/css/quiz/quiz.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../../public/assets/img/favicon.ico" type="image/x-icon">
    <title>Conexão Cultura</title>
</head>

<body class="body">
    <!-- NAVIGATION -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img class="logo show1" src="../../../public/assets/img/logo.png" alt="Logo Conexão Cultura">
            <img class="logo show2" src="../../../public/assets/img/logoSemNome.png" alt="Logo Conexão Cultura">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="../../views/home/index.php"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i>Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-signs"></i>Mapa</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i>Quiz</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h2 class="titulo">Quiz</h2>
        <div class="questionario">
            <form action="../roteiro/roteiro.php" method="post">
                <div class="card">
                    <div class="card-header">
                        Pergunta
                    </div>
                    <div class="card-body">
                        <?php
                        $query_questao = "SELECT id_questao, conteudo FROM questao";
                        $result_questao = $conn->prepare($query_questao);
                        $id_questoes = 0;
                        ?>

                        <?php foreach ($conn->query($query_questao) as $row) { ?>
                            <div class="questao <?php echo $row['id_questao'] == 1 ? "questao-ativa" : ""; ?> <?php echo ("questao" . $row["id_questao"]) ?>" id=<?php echo ("questao" . $row["id_questao"]) ?>>
                                <p class="title_opcoes">
                                    <?php echo ($row["conteudo"]); ?>
                                </p>
                                <div class="opcoes">
                                    <?php
                                        $query_alternativa = "SELECT * FROM alternativa WHERE id_questao = " . $row["id_questao"];
                                        $result_alternativa = $conn->prepare($query_alternativa);

                                        foreach ($conn->query($query_alternativa) as $row) {
                                    ?>
                                        <div class="div_opcao">
                                            <label id=<?php echo($row["id_alterantiva"]) ?> id_questao=<?php echo($row["id_questao"]);?> class="alternativa" for=<?php echo("alternativa") . $row["id_alterantiva"] ?>>
                                                <?php echo $row["enunciado"] ?>
                                            </label>
                                            <input class="inputAlternativa" value=<?php echo($row["letra_alternativa"])?> type="radio" name=<?php echo("questao" . $row["id_questao"]);?> id=<?php echo($row["id_alterantiva"]);?>>
                                        </div>
                                    <?php  } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        Questões
                    </div>
                    <div class="card-questoes">
                        <div class="card-body dois perguntas">
                            <div questao=1 class="quest questao1">
                                <button type="button" class="questButton questButtonActive">
                                    <p>1</p>
                                </button>
                            </div>
                            <div questao=2 class="quest questao2">
                                <button type="button" class="questButton">
                                    <p>2</p>
                                </button>
                            </div>
                            <div questao=3 class="quest questao3">
                                <button type="button"class="questButton">
                                    <p>3</p>
                                </button>
                            </div>
                            <div questao=4 class="quest questao4">
                                <button type="button" class="questButton">
                                    <p>4</p>
                                </button>
                            </div>
                            <div questao=5 class="quest questao5">
                                <button type="button" class="questButton">
                                    <p>5</p>
                                </button>
                            </div>
                            <div questao=6 class="quest questao6">
                                <button type="button" class="questButton">
                                    <p>6</p>
                                </button>
                            </div>
                            <div questao=7 class="quest questao7">
                                <button type="button" class="questButton">
                                    <p>7</p>
                                </button>
                            </div>
                            <div questao=8 class="quest questao8">
                                <button type="button" class="questButton">
                                    <p>8</p>
                                </button>
                            </div>
                            <div questao=9 class="quest questao9">
                                <button type="button" class="questButton">
                                    <p>9</p>
                                </button>
                            </div>
                            <div questao=10 class="quest questao10">
                                <button type="button" class="questButton">
                                    <p>10</p>
                                </button>
                            </div>
                            <div questao=11 class="quest questao11">
                                <button type="button" class="questButton">
                                    <p>11</p>
                                </button>
                            </div>
                            <div questao=12 class="quest questao12">
                                <button type="button" class="questButton">
                                    <p>12</p>
                                </button>
                            </div>
                            <div questao=13 class="quest questao13">
                                <button type="button" class="questButton">
                                    <p>13</p>
                                </button>
                            </div>
                            <div questao=14 class="quest questao14">
                                <button type="button" class="questButton">
                                    <p>14</p>
                                </button>
                            </div>
                            <div questao=15 class="quest questao15">
                                <button type="button" class="questButton">
                                    <p>15</p>
                                </button>
                            </div>
                        </div>
        
                        <div class='button'>
                            <input id='finalizar' type='submit' value='Finalizar' name='questionario' class='botao' disabled>
                            <input type="hidden" id='resposta' name='resposta'>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3eecc79a6a.js" crossorigin="anonymous"></script>
    <!-- SCRIPT -->
    <script src="../../../public/assets/js/quiz/quiz.js"></script>
    <script src="../../../public/assets/js/main.js"></script>
</body>

</html>