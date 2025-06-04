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
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinsmoke Informática</title>
    <link rel="stylesheet" href="../estilos/politicas_do_site.css" />
    <link rel="icon" type="image/jpg" href="../images/Vinsmoke_I._Logo_1.png" />

</head>

<body>

<div id="header">

<a href="index.php"><img id="logo" src="../images/Vinsmoke_Info.png"></a>

<div id="end">
    <a href="carrinho.php"><img id="carrinho" src="../images/carrinho.png"></a>

    <a href="login.php"><img id="user" src="../images/usuario.png"></a>

    <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Você tem certeza que deseja sair?');" class="delete-btn"><svg id="login" fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 296.999 296.999" xml:space="preserve">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <g>
                        <g>
                            <path d="M146.603,0c-31.527,0-61.649,9.762-87.11,28.232c-4.377,3.176-5.567,9.188-2.73,13.791l23.329,37.845 c1.509,2.449,3.971,4.158,6.793,4.716c2.82,0.559,5.748-0.084,8.077-1.773c13.897-10.081,30.343-15.41,47.56-15.41 c44.718,0,81.098,36.38,81.098,81.098c0,44.718-36.38,81.098-81.098,81.098c-17.217,0-33.663-5.329-47.56-15.41 c-2.329-1.689-5.255-2.331-8.077-1.773c-2.821,0.558-5.283,2.267-6.793,4.716l-23.329,37.846 c-2.838,4.603-1.647,10.615,2.73,13.791c25.46,18.47,55.583,28.232,87.11,28.232c81.883,0,148.5-66.617,148.5-148.5 S228.486,0,146.603,0z M146.603,276.326c-23.925,0-46.906-6.529-67.024-18.965l12.579-20.407 c15.288,8.741,32.497,13.317,50.364,13.317c56.117,0,101.771-45.655,101.771-101.771c0-56.116-45.655-101.771-101.771-101.771 c-17.866,0-35.076,4.576-50.364,13.317L79.579,39.638c20.117-12.435,43.099-18.965,67.024-18.965 c70.483,0,127.826,57.343,127.826,127.826S217.087,276.326,146.603,276.326z"></path>
                            <path d="M105.966,193.934c-2.115,3.172-2.312,7.25-0.513,10.611c1.799,3.36,5.302,5.459,9.113,5.459h45.482 c3.456,0,6.684-1.727,8.601-4.603l34.112-51.167c2.315-3.472,2.315-7.996,0-11.467L168.65,91.599 c-1.917-2.876-5.144-4.603-8.601-4.603h-45.482c-3.812,0-7.315,2.099-9.113,5.459c-1.799,3.361-1.602,7.44,0.513,10.611 l12.027,18.041H29.288c-15.104,0-27.393,12.288-27.393,27.393s12.288,27.393,27.393,27.393h88.705L105.966,193.934z M29.288,155.219c-3.705,0-6.719-3.014-6.719-6.719c0-3.705,3.014-6.719,6.719-6.719h108.02c3.812,0,7.315-2.099,9.113-5.459 c1.799-3.361,1.602-7.44-0.513-10.611l-12.027-18.041h20.635l27.22,40.83l-27.22,40.83h-20.635l12.027-18.041 c2.115-3.172,2.312-7.25,0.513-10.611c-1.799-3.36-5.302-5.459-9.113-5.459H29.288z"></path>
                        </g>
                    </g>
                </g>
            </g>
        </svg></a>
</div>

</div>

        <ul>
        <li class="dropdown">
                <a href="javascript:void(0)" class="menu">  <svg width="1.5vw" height="1.5vw" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="menusvg" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H4ZM3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12ZM3 18C3 17.4477 3.44772 17 4 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" fill="#ffffff"></path> </g></svg></a>
                <div class="dropdown-content">   
                    <a href="perifericos.php">Perífericos</a>
                    <a href="computadores.php">Computadores</a> 
                    <a href="monitores.php">Monitores</a>
                </div>
            </li>        
            <li><a id="links" href="monitores.php"> Monitores </a></li>
            <li><a id="links" href="mouses.php"> Mouses </a></li>
            <li><a id="links" href="processadores.php"> Processadores </a></li>
        </ul>

    <div id="conteudo-principal">

        <br>
        <h1 id="titulo"> POLITICAS DO SITE</h1>
        <br />

        <h1 id="titulo1">1. Objetivo</h1>
        <br />

        <p id="informativo">

        O objetivo da nossa política do site de informática é estabelecer diretrizes claras e transparentes para garantir uma experiência segura, inclusiva e informativa 
        para todos os usuários. Buscamos fornecer informações precisas, relevantes e atualizadas sobre tecnologia, além de promover um ambiente de interação saudável e 
        respeitosa entre os usuários.

        </p><br/><br/>

        <h1 id="titulo1">2. Conteúdo</h1>
        <br />

        <p id="informativo">       
        Nosso site se compromete a fornecer informações precisas e atualizadas sobre os temas relacionados à informática. Buscamos verificar cuidadosamente 
        todas as informações publicadas, mas não podemos garantir a precisão ou integridade absoluta. 
        Encorajamos os usuários a verificar as informações em fontes adicionais antes de tomar qualquer decisão com base nelas.
        </p><br/><br/>

        <h1 id="titulo1">3. Participação na comunidade</h1>
        <br />

        <p id="informativo">

        Encorajamos os usuários a participarem ativamente da comunidade, compartilhando seus conhecimentos, fazendo perguntas e fornecendo feedback construtivo. 
        No entanto, solicitamos que as interações sejam feitas de forma respeitosa, evitando insultos, discriminação, 
        linguagem ofensiva ou qualquer outra forma de comportamento inadequado. Comentários que não seguirem essas diretrizes poderão ser removidos.

        </p><br/><br/>

        <h1 id="titulo1">4. Alterações na política</h1>
        <br />

        <p id="informativo">       
        Podemos atualizar esta política de tempos em tempos para refletir mudanças em nossos serviços ou para

        </p>
       
      </div>
      
    <br/><br/>

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