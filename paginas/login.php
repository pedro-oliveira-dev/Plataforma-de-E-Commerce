<?php

include 'config.php';
session_start();

if(!isset($user_id)){
    error_reporting(0);
    $message[] = 'Crie uma conta e/ou faça o login para explorar o site! (Clique para ocultar a mensagem)';
};

$user_id = $_SESSION['user_id'];

if(isset($user_id)){
    header('location:perfil.php');
};

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'Senha ou e-mail incorreto!';
   }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinsmoke Informática</title>
    <link rel="stylesheet" href="../estilos/login.css" />
    <link rel="icon" type="image/jpg" href="../images/Vinsmoke_I._Logo_1.png" />

</head>

<body>
    
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

    <div id="header">

        <a href="index.php"><img id="logo" src="../images/Vinsmoke_Info.png"></a>
        
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

    
    <div id="box">

        <h1 id="titulo" >Login</h1>
            
            <main>

                    <div id="login2">
                        <form action="" method="post">
                        <label for="email"><b>Email:</b></label><br><br>
                        <input type="email" id="email" name="email" required placeholder="Insira seu e-mail."><br><br>
                        <label for="senha"><b>Senha:</b></label><br><br>
                        <input type="password" id="senha" name="password"  required placeholder="Insira sua senha."><br><br>
                        <p>Caso não tenha uma conta, faça o cadastro <a href="cadastro.php">aqui</a></p>
                        <div id='botão'>
                            <input type="submit" name="submit" value="Login" id="confirmar"/>
                        </div>
                        </form>
                    </div>
                
            </main>
    </div> 
    
    <footer id="footer1">
        
        <p id="copyright">Os preços anunciados neste site ou via e-mail promocional podem ser alterados sem prévio aviso. A KEKW Gaming, não é responsável por erros descritivos.</p> 
        <p id="copyright">©Copyright 2021 by PEDROVISCK. All rights reversed.</p>

        <div id="footer"> <a id="footer2" href="quem_somos.php">Quem somos</a></div>
        <div id="footer"> <a id="footer2" href="politicas_do_site.php">Políticas do site</a></div>
        <div id="footer"> <a id="footer2" href="pagamento.php">Pagamento</a></div>
        <div id="footer"> <a id="footer2" href="duvidas.php">Dúvidas frequentes</a></div>

    </footer>

    <script src="../javascript/funcional"></script>

</body>

</html>