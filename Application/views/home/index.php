<?php
    include_once '../../core/conex.php';
    session_start();
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
    <link rel="stylesheet" href="../../../public/assets/css/home/home.css">
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
            <button id="btn_menu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-bar">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="height: 0;">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fas fa-home"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i>Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-map-signs"></i>Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../quiz/quiz.php"><i class="fas fa-map-marked-alt"></i>Quiz</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php
            $query_usuario = "SELECT u.id_usuario, u.nome_completo FROM usuario u where u.id_usuario = 1";
            $usuario = mysqli_fetch_array($conn->query($query_usuario));
        ?>
        <div class="banner">
            <div class="mensagem">
                <h1>Olá <?php echo explode(" ", $usuario['nome_completo'])[0]   ?>!</h1>
                <p>Seja bem-vindo ao conexão cultura</p>
            </div>
            <div class="imagemLogo">
                <img src="../../../public/assets/img/home/imgBanner.svg" alt="Bonecos no metro">
            </div>
        </div>

        <div class="eventos">
            <h2 class="titulo">Eventos</h2>
            <div class="linha"></div>
            <p class="explicacao">Veja os próximos eventos do estado de São Paulo.</p>
            <div class="conteudo">
                <div class="detalhes">

                    <?php
                        $query_evento = "SELECT e.id_evento, e.imagem, e.nome_evento, e.informacao FROM eventos e ORDER BY RAND() LIMIT 3";
                        $result_evento = $conn->prepare($query_evento);

                        $id_evento = [];
                        foreach ($conn->query($query_evento) as $row) {
                            array_push($id_evento, $row['id_evento']);
                    ?>
                        <div class="eventoUm">
                            <div class="imgEvento">
                                <img src="<?php echo $row['imagem'] ?>" alt="">
                            </div>
                            <div class="descricao">
                                <div class="tituloEvento">
                                    <h4><?php echo $row['nome_evento'] ?></h4>
                                </div>
                                <div class="descricaoEvento">
                                    <p><?php echo $row['informacao'] ?></p>
                                </div>
                                <div class="saberMais">
                                    <div class="publicacao">
                                        <p>Publicado em
                                            <?php
                                            $date = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
                                            $datecorrect = $date->format('d/m/Y');
                                            echo $datecorrect;
                                            ?>
                                        </p>
                                    </div>
                                    <form action="../evento/evento.php" method="post" class="botaoSaibaMais">
                                        <label for="<?php echo ("evento" . $row['id_evento']); ?>">Saiba Mais</label>
                                        <button type="submit" id="<?php echo ("evento" . $row['id_evento']); ?>" name="evento" value=<?php echo $row['id_evento']; ?>>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="button">
                        <input class="verMais vermais" type="button" value="VER MAIS">
                    </div>
                    <?php
                        $query_evento = "SELECT e.id_evento, e.imagem, e.nome_evento, e.informacao FROM eventos e  WHERE e.id_evento != '$id_evento[0]' and e.id_evento != '$id_evento[1]' and e.id_evento != '$id_evento[2]' ORDER BY RAND()";
                        $result_evento = $conn->prepare($query_evento);

                        $id_evento = [];
                        foreach ($conn->query($query_evento) as $row) {
                            array_push($id_evento, $row['id_evento']);
                    ?>
                        <div class="eventoUm vermais_none vermais">
                            <div class="imgEvento">
                                <img src="<?php echo $row['imagem'] ?>" alt="">
                            </div>
                            <div class="descricao">
                                <div class="tituloEvento">
                                    <h4><?php echo $row['nome_evento'] ?></h4>
                                </div>
                                <div class="descricaoEvento">
                                    <p><?php echo $row['informacao'] ?></p>
                                </div>
                                <div class="saberMais">
                                    <div class="publicacao">
                                        <p>Publicado em
                                            <?php
                                                $date = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
                                                $datecorrect = $date->format('d/m/Y');
                                                echo $datecorrect;
                                            ?>
                                        </p>
                                    </div>
                                    <form action="../evento/evento.php" method="post" class="botaoSaibaMais">
                                        <label for="<?php echo ("evento" . $row['id_evento']); ?>">Saiba Mais</label>
                                        <button type="submit" id="<?php echo ("evento" . $row['id_evento']); ?>" name="evento" value=<?php echo $row['id_evento']; ?>>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="button">
                        <input class="verMais vermais vermais_none" type="button" value="VER MENOS">
                    </div>
                </div>

                <div class="calendar">
                    <div class="month-indicator">
                        <time datetime="2021-12">Dezembro</time>
                    </div>
                    <div class="day-of-week">
                        <div>DOM</div>
                        <div>SEG</div>
                        <div>TER</div>
                        <div>QUA</div>
                        <div>QUI</div>
                        <div>SEX</div>
                        <div>SAB</div>
                    </div>
                    <div class="date-grid">
                        <button disabled>
                            <time datetime="2021-12-01">1</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-02">2</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-03">3</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-04">4</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-05">5</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-06">6</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-07">7</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-08">8</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-09">9</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-10">10</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-11">11</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-12">12</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-13">13</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-14">14</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-15">15</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-16">16</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-17">17</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-18">18</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-19">19</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-20">20</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-21">21</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-22">22</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-23">23</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-24">24</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-25">25</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-26">26</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-27">27</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-28">28</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-29">29</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-30">30</time>
                        </button>
                        <button disabled>
                            <time datetime="2021-12-31">31</time>
                        </button>
                    </div>
                    <div class="infos">
                        <p>Quarta-feira, 15 de dezembro</p>
                        <div class="linhaInfo"></div>
                        <div class="infosEvento">
                            <div class="nomeEvento">
                                <h6>Vou Pro Sereno no Bar Templo</h6>
                                <p>R$35,00</p>
                            </div>
                            <div class="horaEvento">
                                <i class="far fa-clock"></i>
                                <p>19:00</p>
                            </div>
                        </div>
                        <p>Sexta-feira, 17 de dezembro</p>
                        <div class="linhaInfo"></div>
                        <div class="infosEvento">
                            <div class="nomeEvento">
                                <h6>Jorge e Matheus no Espaço das Américas</h6>
                                <p>R$110,00</p>
                            </div>
                            <div class="horaEvento">
                                <i class="far fa-clock"></i>
                                <p>20:30</p>
                            </div>
                        </div>
                        <div class="infosEventoDois">
                            <div class="infosEvento">
                                <div class="nomeEvento">
                                    <h6>Henrique e Juliano After Lounge Bar</h6>
                                    <p>R$50,00</p>
                                </div>
                                <div class="horaEvento">
                                    <i class="far fa-clock"></i>
                                    <p>18:00</p>
                                </div>
                            </div>
                        </div>
                        <p>Sábado, 18 de dezembro</p>
                        <div class="linhaInfo"></div>
                        <div class="infosEvento">
                            <div class="nomeEvento">
                                <h6>Marcelo D2 Assim Tocam os Meus Tambores</h6>
                                <p>R$60,00</p>
                            </div>
                            <div class="horaEvento">
                                <i class="far fa-clock"></i>
                                <p>22:00</p>
                            </div>
                        </div>
                        <p>Domingo, 19 de dezembro</p>
                        <div class="linhaInfo"></div>
                        <div class="infosEvento">
                            <div class="nomeEvento">
                                <h6>Luan The Comeback</h6>
                                <p>R$110,00</p>
                            </div>
                            <div class="horaEvento">
                                <i class="far fa-clock"></i>
                                <p>21:00</p>
                            </div>
                        </div>
                    </div>
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
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3eecc79a6a.js" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../../../public/assets/js/home/home.js"></script>
    <script src="../../../public/assets/js/main.js"></script>
</body>

</html>