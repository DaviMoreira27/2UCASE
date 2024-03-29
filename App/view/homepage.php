<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use app\model\Manager;

$manager  = new Manager();
$returnBanners = $manager->listClient("adm_carrossel", 'id_carrossel');
session_start();

//Novidades
$returnNovidades = $manager->exibProducts('categoria_special_produto', 'Novidades', 'preco_produto',5);

//Mais Vendidos
$returnVendidos = $manager->exibProducts('categoria_special_produto','Mais Vendidos', 'preco_produto',5);

//Promoções
$returnPromos = $manager->exibProducts('categoria_special_produto','Promoções', 'preco_produto ASC',5);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once __DIR__ . "/../config/stylesConfig.php"  ?>
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="../../node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
    <link rel="stylesheet" href="../assets/styles/homepage.css">
</head>
<!-- Barra de Navegação -->
<?php require_once './navbar.php'; ?>

<body id="body-margin">
    <main class="homepage-content">
        <article class="homepage-carrossel">

            <section class="carrossel-container">

                <!--TODO: MUDAR O NOME DO HREF DO CARROSSEL AO SUBIR PARA PRODUÇÃO-->
                <?php
                if(count($returnBanners) > 0):
                ?>
                <section class="glide carrossel-container-box">
                    <div class="glide__arrows left" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left glide-arrow-home" data-glide-dir="<"> <i class="fa-solid fa-angle-left fa-2x"></i> </button>
                    </div>
                    <div class="glide__track" data-glide-el="track">

                        <ul class="glide__slides">

                            <?php
                            for ($i = 0, $iMax = count($returnBanners); $i < $iMax; $i++):
                            ?>

                            <div class="carrossel-box glide__slide">
                                <a href="<?=$returnBanners[$i]['link_promo_carrossel']?>">
                                    <picture>
                                        <source media="(max-width:512px)" srcset="../assets/img/Mobile-Homepage-<?=$returnBanners[$i]['nome_carrossel']?>.png">
                                        <img src="../../adm/databases/<?=$returnBanners[$i]['link_carrossel']?>"
                                             alt="<?=$returnBanners[$i]['nome_carrossel']?>">
                                    </picture>
                                </a>

                            </div>

                            <?php
                            endfor;
                            ?>

                        </ul>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                            <?php
                            for ($j = 0, $jMax = count($returnBanners); $j < $jMax; $j++):
                            ?>
                            <button class="glide__bullet" data-glide-dir="=<?=$j?>"></button>
                            <?php
                            endfor;
                            ?>
                        </div>
                    </div>

                    <div class="glide__arrows right" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--right glide-arrow-home" data-glide-dir=">"> <i class="fa-solid fa-angle-right fa-2x"></i> </button>
                    </div>
                </section>

            </section>
                <?php
                endif;
                ?>

        </article>

        <article class="homepage-beneficios">
            <section class="container-beneficio" id="beneficio1">
                <img src="../assets/img/fast-time-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Ja já em sua casa</h3>
                <p>Entrega rápida para todo o Brasil.</p>
            </section>

            <section class="container-beneficio" id="beneficio2">
                <img src="../assets/img/like-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Dificil de escolher</h3>
                <p>Capinhas para todos os celulares e gostos.</p>
            </section>

            <section class="container-beneficio" id="beneficio3">
                <img src="../assets/img/premium-icon.png" alt="Entregas rápidas para todo o Brasil">
                <h3>Qualidade garantida</h3>
                <p>Produtos da mais alta qualidade para você.</p>
            </section>
        </article>

        <article class="homepage-about-section">
            <section class="texts-about">
                <h1>Saiba mais sobre nós</h1>
                <p>Empresa N° 1 No ramo de capinhas personalizadas.</p>
                <button onclick="window.location.href='./about.php'" id="btn-about-more">Saiba Mais</button>
            </section>

            <img src="../assets/img/bannerAboutPage.jpg" alt="Mais sobre a loja.">
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Novidades</h1>
            <section class="glide prod-container-box">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left fa-2x"></i></button>
                </div>
                <div class="glide__track" data-glide-el="track">
                        <?php
                        if (count($returnNovidades) > 0):
                        ?>

                    <ul class="glide__slides">
                        <?php
                            for ($i = 0, $iMax = count($returnNovidades); $i < $iMax; $i++) :
                        ?>

                            <a class="produto-box glide__slide" href="./produto.php?pd=<?=$returnNovidades[$i]['id_produto']?>">
                                <img src="<?=$returnNovidades[$i]['imagem_principal_produto']?>" alt="<?=$returnNovidades[$i]['nome_produto']?>">
                                <h4><?=$returnNovidades[$i]['nome_produto']?></h4>
                                <p>R$ <?=$returnNovidades[$i]['preco_produto']?></p>
                            </a>

                        <?php
                            endfor;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                </div>
            </section>
        </article>

        <article class="homepage-category">
            <h1>Categorias</h1>
            <section class="homepage-category-cards">
                <a href="./category.php?category=Animacoes" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Animações</h2>
                    </div>
                    <img src="../assets/img/animacoes-categoria.png" alt="Banner 1">
                </a>

                <a href="./category.php?category=Estampas" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Estampas</h2>
                    </div>
                    <img src="../assets/img/AmendoeiraVanGoghCase.png" alt="Banner 1">
                </a>

                <a href="./category.php?category=Flork" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Flork</h2>
                    </div>
                    <img src="../assets/img/Florkgirly.png" alt="Banner 1">
                </a>

                <a href="./category.php?category=Herois" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Heroís</h2>
                    </div>
                    <img src="../assets/img/herois-categoria.png" alt="Banner 1">
                </a>

                <a href="./category.php?category=Times" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Times</h2>
                    </div>
                    <img src="../assets/img/times-categoria.png" alt="Banner 1">
                </a>

                <a href="./acessorios-page.php?category=Acessorios" class="card-category" id="card1">
                    <div class="shadow-hover">
                        <h2>Acessórios</h2>
                    </div>
                    <img src="../assets/img/acessorios-categoria.png" alt="Banner 1">
                </a>
            </section>
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Mais vendidos</h1>
            <section class="glide prod-container-box-like">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left fa-2x"></i></button>
                </div>
                <div class="glide__track" data-glide-el="track">

                    <?php
                    if (count($returnVendidos) > 0):
                    ?>

                    <ul class="glide__slides">
                        <?php
                        for ($j = 0, $iMax = count($returnVendidos); $j < $iMax; $j++) :
                            ?>

                            <a class="produto-box glide__slide" href="./produto.php?pd=<?=$returnVendidos[$j]['id_produto']?>">
                                <img src="<?=$returnVendidos[$j]['imagem_principal_produto']?>" alt="<?=$returnVendidos[$j]['nome_produto']?>">
                                <h4><?=$returnVendidos[$j]['nome_produto']?></h4>
                                <p>R$ <?=$returnVendidos[$j]['preco_produto']?></p>
                            </a>

                        <?php
                        endfor;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                </div>
            </section>
        </article>

        <article class="homepage-prod-carrossel">
            <h1>Promoções</h1>
            <section class="glide prod-container-box-sell">
                <div class="glide__arrows left" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa-solid fa-angle-left fa-2x"></i></button>
                </div>
                <div class="glide__track" data-glide-el="track">

                    <?php
                    if (count($returnPromos) > 0):
                    ?>

                    <ul class="glide__slides">
                        <?php
                        for ($i = 0, $iMax = count($returnPromos); $i < $iMax; $i++) :
                            ?>

                            <a class="produto-box glide__slide" href="./produto.php?pd=<?=$returnPromos[$i]['id_produto']?>">
                                <img src="<?=$returnPromos[$i]['imagem_principal_produto']?>" alt="<?=$returnPromos[$i]['nome_produto']?>">
                                <h4><?=$returnPromos[$i]['nome_produto']?></h4>
                                <p>R$ <?=$returnPromos[$i]['preco_produto']?></p>
                            </a>

                        <?php
                        endfor;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="glide__arrows right" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                </div>
            </section>
        </article>
    </main>

    <!--MODAL DE ERRO-->

</body>
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script src="../assets/js/homepage.js"></script>
<script src="../assets/js/error-handling.js"></script>
<script>

    // Quarto carrosel Produtos mais vendidos

    let carrosselProdSell = new Glide(carrossel4Sell, {
        type: "slide",
        startAt: 0,
        perView: 4,
        autoplay: 1500,
        gap: 2,
        breakpoints: {
            800: {
                perView: 3,
            },
            600: {
                perView: 2,
            },
            500: {
                perView: 1,
            },
        },
    });

    carrosselProdSell.mount();


    // Terceiro carrosel Produtos mais curtidos

    let carrosselProdLikes =  new Glide(carrossel3Like, {
        type: "slide",
        startAt: 0,
        perView: 4,
        autoplay: 1500,
        gap: 2,
        breakpoints: {
            800: {
                perView: 3,
            },
            600: {
                perView: 2,
            },
            500: {
                perView: 1,
            },
        },
    });

    carrosselProdLikes.mount();



</script>
<!-- Footer -->
<?php require_once "./footer.php"; ?>

</html>