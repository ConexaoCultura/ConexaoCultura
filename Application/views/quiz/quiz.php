<?php
include_once '../../core/conex.php';
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
                        <a class="nav-link" href="../../views/home/index.html"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i>Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-signs"></i>Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i>Roteiro</a>
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
                    <?php
                        //Pesquisar pergunta 
                        $query_questao = "SELECT id_Questoes, conteudo FROM questoes ORDER BY RAND() LIMIT 1";
                        $result_questao = $conn->prepare($query_questao);
                        $id_questoes = 0;
                        //$result_questao->execute();
                        
                        foreach ($conn->query($query_questao) as $row) { 
                            echo utf8_encode($row['conteudo']);
                            $id_questoes = $row['id_Questoes'];
                        }
                        
                    ?>
                    <div class="opcoes">
                        <?php
                            $query_alternativa = "SELECT * FROM Alternativas WHERE conteudo = " . $id_questoes;
                            $result_alternativa = $conn->prepare($query_alternativa);

                            foreach ($conn->query($query_alternativa) as $row) { 
                               
                            
                        ?>
                        <div class="div_opcao">
                            <input type="radio" class="opcao Um" id="um" name="quest1" value="Apreciar a natureza">
                            <label for="um"><?php echo utf8_encode($row['enunciado']); ?></label>
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
                <div class="card-body dois">
                    <div class="quest um">
                        <p>1</p>
                    </div>
                    <div class="quest dois">
                        <p>2</p>
                    </div>
                    <div class="quest tres">
                        <p>3</p>
                    </div>
                    <div class="quest quatro">
                        <p>4</p>
                    </div>
                    <div class="quest cinco">
                        <p>5</p>
                    </div>
                    <div class="quest seis">
                        <p>6</p>
                    </div>
                    <div class="quest sete">
                        <p>7</p>
                    </div>
                    <div class="quest oito">
                        <p>8</p>
                    </div>
                    <div class="quest nove">
                        <p>9</p>
                    </div>
                    <div class="quest dez">
                        <p>10</p>
                    </div>
                    <div class="quest once">
                        <p>11</p>
                    </div>
                    <div class="quest doze">
                        <p>12</p>
                    </div>
                    <div class="quest treze">
                        <p>13</p>
                    </div>
                    <div class="quest catorze">
                        <p>14</p>
                    </div>
                    <div class="quest quinze">
                        <p>15</p>
                    </div>
                </div>
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
                        <p><a href="#!" class="text-reset">Roteiro</a></p>
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
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3eecc79a6a.js" crossorigin="anonymous"></script>
</body>

</html>