<?
    require_once './main/init/conn.php';

    // Inicia com valores vazios

    $nomeUser = $emailUser = $senhaUser = "";
    $nomeUser_err = $emailUser_err = $senhaUser_err = "";

    // Verifica se foi enviado algum dado
    if($_SERVER['REQUEST_METHOD'] == "post"){

        // Validar nome de Usuário
        if(empty(trim($_POST['nomeUser']))){
            $nomeUser_err = "O campo \"Usuário\" precisa ser preenchido";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["nomeUser"]))){
            $nomeUser_err = "O nome de \"Usuário\" pode conter apenas letras, números e sublinhados.";
        }

        // Aqui cria as variaveis com os valores a serem salvos
        $nomeUser = $_POST['nomeUser'];
        $emailUser = $_POST['emailUser'];
        $senhaUser = $_POST['senhaUser'];

        // Criptografar a senha
        $hashPass = sha1(md5($senhaUser));
    }

    