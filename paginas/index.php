<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit;
}
$user_id = $_SESSION['user_id'];    

if(isset($_GET['logout'])){
    session_unset();
    session_destroy(); 
    header('location:login.php');
    exit;
}

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'Produto já está adicionado ao carrinho! (Clique para ocultar)';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
       $message[] = 'Produto adicionado no carrinho! (Clique para ocultar)';
    }
};

if(isset($_POST['buy_now'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'Produto já está adicionado ao carrinho! (Clique para ocultar)';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
       header('location:carrinho.php');
    }
};

$category = isset($_GET['category']) ? $_GET['category'] : 'all';
$category = mysqli_real_escape_string($conn, $category);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinsmoke Informática</title>
    <link rel="stylesheet" href="../estilos/index.css" />
    <link rel="icon" type="image/jpg" href="../images/Vinsmoke_I._Logo_1.png" />

</head>

<body>

<?php
if (!empty($message)) {
    foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">'.$msg.'</div>';
    }
}
?>

    <div id="header">

        <a href="index.php"><img id="logo" src="../images/Vinsmoke_Info.png"></a>

        <form action="">
            <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text" id="busca">
            <button type="submit"><img id="buscaricon" src="../images/buscar.png"></button>
        </form>

        <div id="end">
            <a href="carrinho.php"><img id="carrinho" src="../images/carrinho.png"></a>
            <a href="login.php"><img id="user" src="../images/usuario.png"></a>
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Você tem certeza que deseja sair?');" class="delete-btn"><svg id="login" fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 296.999 296.999" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M146.603,0c-31.527,0-61.649,9.762-87.11,28.232c-4.377,3.176-5.567,9.188-2.73,13.791l23.329,37.845 c1.509,2.449,3.971,4.158,6.793,4.716c2.82,0.559,5.748-0.084,8.077-1.773c13.897-10.081,30.343-15.41,47.56-15.41 c44.718,0,81.098,36.38,81.098,81.098c0,44.718-36.38,81.098-81.098,81.098c-17.217,0-33.663-5.329-47.56-15.41 c-2.329-1.689-5.255-2.331-8.077-1.773c-2.821,0.558-5.283,2.267-6.793,4.716l-23.329,37.846 c-2.838,4.603-1.647,10.615,2.73,13.791c25.46,18.47,55.583,28.232,87.11,28.232c81.883,0,148.5-66.617,148.5-148.5 S228.486,0,146.603,0z M146.603,276.326c-23.925,0-46.906-6.529-67.024-18.965l12.579-20.407 c15.288,8.741,32.497,13.317,50.364,13.317c56.117,0,101.771-45.655,101.771-101.771c0-56.116-45.655-101.771-101.771-101.771 c-17.866,0-35.076,4.576-50.364,13.317L79.579,39.638c20.117-12.435,43.099-18.965,67.024-18.965 c70.483,0,127.826,57.343,127.826,127.826S217.087,276.326,146.603,276.326z"></path> <path d="M105.966,193.934c-2.115,3.172-2.312,7.25-0.513,10.611c1.799,3.36,5.302,5.459,9.113,5.459h45.482 c3.456,0,6.684-1.727,8.601-4.603l34.112-51.167c2.315-3.472,2.315-7.996,0-11.467L168.65,91.599 c-1.917-2.876-5.144-4.603-8.601-4.603h-45.482c-3.812,0-7.315,2.099-9.113,5.459c-1.799,3.361-1.602,7.44,0.513,10.611 l12.027,18.041H29.288c-15.104,0-27.393,12.288-27.393,27.393s12.288,27.393,27.393,27.393h88.705L105.966,193.934z M29.288,155.219c-3.705,0-6.719-3.014-6.719-6.719c0-3.705,3.014-6.719,6.719-6.719h108.02c3.812,0,7.315-2.099,9.113-5.459 c1.799-3.361,1.602-7.44-0.513-10.611l-12.027-18.041h20.635l27.22,40.83l-27.22,40.83h-20.635l12.027-18.041 c2.115-3.172,2.312-7.25,0.513-10.611c-1.799-3.36-5.302-5.459-9.113-5.459H29.288z"></path> </g> </g> </g> </g></svg></a>
        </div>
        
    </div>

    <ul>
        <li class="dropdown">
            <a href="javascript:void(0)" class="menu">
                <svg width="1.5vw" height="1.5vw" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="menusvg" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H4ZM3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12ZM3 18C3 17.4477 3.44772 17 4 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" fill="#ffffff"></path>
                    </g>
                </svg>
            </a>
            <div class="dropdown-content">   
                <a href="index.php?category=peripherals">Periféricos</a>
                <a href="index.php?category=pc">Computadores</a> 
                <a href="index.php?category=monitor">Monitores</a>
            </div>
        </li>        
        <li><a id="links" href="index.php?category=monitor"> Monitores </a></li>
        <li><a id="links" href="index.php?category=mouse"> Mouses </a></li>
        <li><a id="links" href="index.php?category=processor"> Processadores </a></li>
    </ul>

    <div id="carrossel">

        <div class="mySlides fade">
            <a id="produtos0" href="#popup<?php echo $fetch_product['id']; ?>"><img id="image0" src="../images/1.png"></a>
        </div>

        <div class="mySlides fade">
            <a id="produtos0" href="#popup<?php echo $fetch_product['id']; ?>"><img id="image0"src="../images/14.png"></a>
        </div>

        <div class="mySlides fade">
            <a id="produtos0" href="#popup<?php echo $fetch_product['id']; ?>"><img id="image0" src="../images/16.png"></a>
        </div>

    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div id="pontinhos" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <br>

    <h1 id="promoção">TODOS OS PRODUTOS:</h1>

    <br><br>

    <div id="produtos">
    
        <?php
        if (!isset($_GET['busca'])) {
            if ($category == 'all') {
                $query = "SELECT * FROM `products`";
            } else if ($category == 'peripherals'){
                $query = "SELECT * FROM `products` WHERE category = 'mouse' OR category = 'keyboard' OR category = 'sound box' OR category = 'headset' OR category = 'monitor'";
            } else{
                $query = "SELECT * FROM `products` WHERE category = '$category'";
            }
            $select_product = mysqli_query($conn, $query) or die('query failed');
            if(mysqli_num_rows($select_product) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_product)){
        ?>
                    <div id="secoes">

                        <figure class="a">

                            <div id="figuras">
                                <a href="#popup<?php echo $fetch_product['id']; ?>"><img id="images" src="<?php echo $fetch_product['image']; ?>"></a>
                            </div>
                            <?php //formatando o número de preço para o formato br
                                $preco = $fetch_product['price'];
                                $preco = number_format($preco, 2, ',', '.');
                            ?>
                            <a id="descricao"><br><?php echo $fetch_product['name']; ?></a><br><br>
                            <a id="promo">À vista no PIX com até 15% OFF</a><br><br>
                            <a id="valor">R$ <?php echo $preco; ?></a>
                            <form method="post" class="box" action="">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <button type="submit" name="add_to_cart" class="btn">
                                    <img id="carrinho1" src="../images/carrinho.png">
                                </button>
                            
                            </form>
                            
                        </figure>

                        <div id="popup<?php echo $fetch_product['id']; ?>" class="overlay">

                            <div class="popup">

                                <div id="figuras0">
                                        <a><img id="images0" src="<?php echo $fetch_product['image']; ?>"></a>
                                </div>

                                <a class="close" href="#">&times;</a>

                                <div id="info0">
                                    <a id="descricao"><br><?php echo $fetch_product['name']; ?></a><br><br>
                                    <a id="promo0">À vista no PIX com até 15% OFF</a><br><br>
                                    <a id="valor0">R$ <?php echo $preco; ?></a>

                                    <li id="info2">
                                        <?php echo $fetch_product['details']; ?>
                                    </li> <br>
                                    
                                    <br><hr><br>
                                    
                                    <!-- Avaliações dos usuários -->
                                    <p class="total-reviews"><i id="like"class="fa-solid fa-thumbs-up"></i> <span><?php echo $fetch_product['like']; ?></span></p>
                                    <p class="total-reviews"><i id="deslike"class="fa-solid fa-thumbs-down"></i> <span><?php echo $fetch_product['deslike']; ?></span></p>
                                    <br>
                                    <?php 
                                    $id = base64_encode($fetch_product['id']);
                                    echo "<a href='reviews.php?id=$id' class='inline-btn'>Ver avaliações</a>";
                                    ?> <br>
                                    </div>

                                    <div id="comprar">
                                
                                    <br>
                                    <a id="promo1">Devolução grátis</a> <a id="promo0">Você tem 7 dias a partir da data de
                                        recebimento.</a><br><br>
                                    <a id="promo1">Compra Garantida </a> <a id="promo0">Abrirá em uma nova janela, receba o produto que está
                                        esperando ou devolvemos o dinheiro.</a><br><br>
                                    <a id="promo1">10 meses </a> <a id="promo0">de garantia de fábrica.</a><br>
                                    <hr>

                                    <div id='botao'>
                                    <form method="post" class="box" action="">
                                        <input type="hidden" name="product_quantity" value="1">
                                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                        <input type="submit" name="add_to_cart" value="Adicionar ao carrinho" id="comprar1"/>
                                        <input type="submit" value="Comprar agora" name="buy_now" id="colocarcarrinho"/>
                                    </form> 
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
        <?php
                };
            };
        } else { 
            $search = mysqli_real_escape_string($conn, $_GET['busca']); 
            $search_product = mysqli_query($conn,"SELECT * FROM `products` WHERE `name` LIKE '%$search%'") or die('query failed');
            if (mysqli_num_rows($search_product) == 0) {
                ?>
                <h1 id="promoção">Nenhum produto foi encontrado!</h1>
            <?php
            } else {  
                while($resultados = mysqli_fetch_assoc($search_product)) {
                    ?>
                    <div id="secoes">

                        <figure class="a">

                            <div id="figuras">
                                <a href="#popup<?php echo $resultados['id']; ?>"><img id="images" src="<?php echo $resultados['image']; ?>"></a>
                            </div>
                            <?php //formatando o número de preço para o formato br
                                $preco = $resultados['price'];
                                $preco = number_format($preco, 2, ',', '.');
                            ?>
                            <a id="descricao"><br><?php echo $resultados['name']; ?></a><br><br>
                            <a id="promo">À vista no PIX com até 15% OFF</a><br><br>
                            <a id="valor">R$ <?php echo $preco; ?></a>
                            <form method="post" class="box" action="">
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_image" value="<?php echo $resultados['image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $resultados['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $resultados['price']; ?>">
                                <button type="submit" name="add_to_cart" class="btn">
                                    <img id="carrinho1" src="../images/carrinho.png">
                                </button>
                            
                            </form>
                            
                        </figure>

                        <div id="popup<?php echo $resultados['id']; ?>" class="overlay">

                            <div class="popup">

                                <div id="figuras0">
                                        <a><img id="images0" src="<?php echo $resultados['image']; ?>"></a>
                                </div>

                                <a class="close" href="#">&times;</a>

                                <div id="info0">
                                    <a id="descricao"><br><?php echo $resultados['name']; ?></a><br><br>
                                    <a id="promo0">À vista no PIX com até 15% OFF</a><br><br>
                                    <a id="valor0">R$ <?php echo $preco; ?></a>
                                    <br>
                                    <li id="info2">
                                        <?php echo $resultados['details']; ?>
                                    </li>

                                    <br><hr><br>
                                    
                                    <!-- Avaliações dos usuários -->
                                    <p class="total-reviews"><i id="like"class="fa-solid fa-thumbs-up"></i> <span><?php echo $resultados['like']; ?></span></p>
                                    <p class="total-reviews"><i id="deslike"class="fa-solid fa-thumbs-down"></i> <span><?php echo $resultados['deslike']; ?></span></p>
                                    <br>
                                    <?php 
                                    $id = base64_encode($resultados['id']);
                                    echo "<a href='reviews.php?id=$id' class='inline-btn'>Ver avaliações</a>";
                                    ?> <br>

                                    </div>
                            
                                    <div id="comprar">
                                
                                    <br>
                                    <a id="promo1">Devolução grátis</a> <a id="promo0">Você tem 7 dias a partir da data de
                                        recebimento.</a><br><br>
                                    <a id="promo1">Compra Garantida </a> <a id="promo0">Abrirá em uma nova janela, receba o produto que está
                                        esperando ou devolvemos o dinheiro.</a><br><br>
                                    <a id="promo1">10 meses </a> <a id="promo0">de garantia de fábrica.</a><br>
                                    <hr>

                                    <div id='botao'>
                                    <form method="post" class="box" action="">
                                        <input type="hidden" name="product_quantity" value="1">
                                        <input type="hidden" name="product_image" value="<?php echo $resultados['image']; ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $resultados['name']; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $resultados['price']; ?>">
                                        <input type="submit" name="add_to_cart" value="Adicionar ao carrinho" id="comprar1"/>
                                        <input type="submit" value="Comprar agora" name="buy_now" id="colocarcarrinho"/>
                                    </form>
                                        
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>                    
                    <?php
                }
            }
            ?>
        <?php
        } ?>
        

    </div>

    <footer id="footer1">
        
    <p id="copyright">Os preços anunciados neste site ou via e-mail promocional podem ser alterados sem prévio aviso. Vinsmoke Informatica, não é responsável por erros descritivos.</p> 
        <p id="copyright">2023 by Vinsmoke Informartica.</p>

        <div id="footer"> <a id="footer2" href="quem_somos.php">Quem somos</a></div>
        <div id="footer"> <a id="footer2" href="politicas_do_site.php">Políticas do site</a></div>
        <div id="footer"> <a id="footer2" href="pagamento.php">Pagamento</a></div>
        <div id="footer"> <a id="footer2" href="duvidas.php">Dúvidas frequentes</a></div>

    </footer>

    <script src="../javascript/funcional"></script>

</body>

</html>