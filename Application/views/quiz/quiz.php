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
    <link rel="stylesheet" href="../../../public/assets/css/quiz/quiz.css">
    <link rel="stylesheet" href="../../../public/assets/css/syle.css">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../../public/assets/img/favicon.ico" type="image/x-icon">
    <title>Conexão Cultura</title>
    <meta http-equiv="cache-control" content="max-age=0" />

</head>

<body>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="../../views/home/index.php"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i>Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-signs"></i>Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i>Quiz</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h2 class="titulo">Questionário</h2>
        <div class="questionario">
            <div class="card">
                <div class="card-header">
                    Pergunta
                </div>
                <div class="card-body">
                    <p class="title_opcoes">
                        <?php
                        //Pesquisar pergunta 
                        $query_questao = "SELECT id_questao, conteudo FROM questao";
                        $result_questao = $conn->prepare($query_questao);
                        $id_questoes = 0;

                        $questoes = array();
                        $respostas = array("A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A");

                        foreach ($conn->query($query_questao) as $row) {
                            array_push($questoes, $row);
                        }
                        $currentQuestion;

                        $_POST['question'] == "" ? ($currentQuestion = 0) : ($currentQuestion = $_POST['question']);

                        echo ($questoes[$currentQuestion]["conteudo"]);
                        ?>
                    </p>
                    <div class="opcoes">
                        <?php
                        $query_alternativa = "SELECT * FROM alternativa WHERE id_questao = " . $questoes[$currentQuestion]["id_questao"];
                        $result_alternativa = $conn->prepare($query_alternativa);
                        $alternativas = array();
                        $cont = 0;
                        foreach ($conn->query($query_alternativa) as $row) {
                            array_push($row, $cont);
                            array_push($alternativas, $row);
                            $cont++;
                        }
                        foreach ($alternativas as $alternativa) {
                        ?>
                            <div class="div_opcao">
                                <button onclick="select(<?php echo $alternativa[0]; ?>, <?php echo $currentQuestion ?>)" id="alternativa" class="alternativa">
                                    <?php echo $alternativa["enunciado"] ?>
                                </button>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-header">
                    Questões
                </div>

                <form action="quiz.php" method="post">
                    <div class="card-body dois">
                        <div class="quest um ">
                            <button class=<?php if ($currentQuestion == 0) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="0" type="submit">
                                <p>1</p>
                            </button>
                        </div>
                        <div class="quest dois">
                            <button class=<?php if ($currentQuestion == 1) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="1" type="submit">
                                <p>2</p>
                            </button>
                        </div>
                        <div class="quest tres">
                            <button class=<?php if ($currentQuestion == 2) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="2" type="submit">
                                <p>3</p>
                            </button>
                        </div>
                        <div class="quest quatro">
                            <button class=<?php if ($currentQuestion == 3) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="3" type="submit">
                                <p>4</p>
                            </button>
                        </div>
                        <div class="quest cinco">
                            <button class=<?php if ($currentQuestion == 4) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="4" type="submit">
                                <p>5</p>
                            </button>
                        </div>
                        <div class="quest seis">
                            <button class=<?php if ($currentQuestion == 5) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="5" type="submit">
                                <p>6</p>
                            </button>
                        </div>
                        <div class="quest sete">
                            <button class=<?php if ($currentQuestion == 6) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="6" type="submit">
                                <p>7</p>
                            </button>
                        </div>
                        <div class="quest oito">
                            <button class=<?php if ($currentQuestion == 7) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="7" type="submit">
                                <p>8</p>
                            </button>
                        </div>
                        <div class="quest nove">
                            <button class=<?php if ($currentQuestion == 8) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="8" type="submit">
                                <p>9</p>
                            </button>
                        </div>
                        <div class="quest dez">
                            <button class=<?php if ($currentQuestion == 9) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="9" type="submit">
                                <p>10</p>
                            </button>
                        </div>
                        <div class="quest onze">
                            <button class=<?php if ($currentQuestion == 10) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="10" type="submit">
                                <p>11</p>
                            </button>
                        </div>
                        <div class="quest doze">
                            <button class=<?php if ($currentQuestion == 11) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="11" type="submit">
                                <p>12</p>
                            </button>
                        </div>
                        <div class="quest treze">
                            <button class=<?php if ($currentQuestion == 12) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="12" type="submit">
                                <p>13</p>
                            </button>
                        </div>
                        <div class="quest catorze">
                            <button class=<?php if ($currentQuestion == 13) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="13" type="submit">
                                <p>14</p>
                            </button>
                        </div>
                        <div class="quest quinze">
                            <button class=<?php if ($currentQuestion == 14) {
                                                echo "questButtonActive";
                                            } else {
                                                echo "questButton";
                                            } ?> name="question" value="14" type="submit">
                                <p>15</p>
                            </button>
                        </div>
                    </div>
                </form>

                <form action='../roteiro/roteiro.php' method='post'>
                    <div class='button'>
                        <?php
                        $a =  "<script> document.write(finalizar()) </script>";
                        ?>
                        <button id='resposta' onclick='finalizar()' type='submit' name='questionario' value="a" class='botao' type='button'>
                            Finalizar</button>
                    </div>
                </form>

                <div class="card-footer text-muted">
                    Conexão Cultura
                </div>
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
                        <h6 class="text-uppercase fw-bold mb-4"><a href="../../views/home/index.html">Home</a></h6>
                        <p><a href="#!" class="text-reset">Perfil</a></p>
                        <p><a href="#!" class="text-reset">Mapa</a></p>
                        <p><a href="#!" class="text-reset">Quiz</a></p>
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
                        <p><i class="fab fa-facebook"></i> Facebook</a></p>
                        <p><i class="fab fa-instagram"></i> Instagram</a></p>
                        <p><i class="fab fa-twitter"></i> Twitter</a></p>
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
</body>

</html>