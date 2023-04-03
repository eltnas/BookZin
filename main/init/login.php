<?php
    require_once './conn.php';
    $usrName = $usrPass = '';
    $usrName_err = $usrPass_err = $login_err = '';
    $usrTrim = trim($_POST["usrText"]);
    $pswTrim = trim($_POST["usrPass"]);

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Parte do usuário
        // Verifica se o nome de Usuário está vazio.
        if(empty($usrTrim))
        {
            $usrName_err = "Digite o Usuário!";
        }
        // Filtra os valores inseridos
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', $usrTrim))
        {
            $usrName_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
        } else{
            // Prepare uma declaração selecionada
            $usrName = $usrTrim;
        }

        // Parte da senha
        if(empty($usrTrim))
        {
            $usrName_err = "Digite o Usuário!";
        }
        // Filtra os valores inseridos
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', $usrTrim))
        {
            $usrName_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
        } else{
            // Prepare uma declaração selecionada
            $usrPass = sha1(md5($pswTrim));
        }

        // Validação
        if(empty($usrName_err) && empty($usrPass_err))
        {
            $sql = "SELECT id_user, usr_user, nome_user, senha_user FROM bkz_user WHERE usr_user = :usr";
            
            if($stmt = $pdo->prepare($sql))
            {
                $stmt->bindParam(':usr', $param_usr, PDO::PARAM_STR);

                // Define os parametros
                $param_usr = $usrTrim;
                print_r($param_usr);
                // Aqui tenta executar a declaração SQL
                if($stmt->execute())
                {
                    if($stmt->rowCount() == 1)
                    {
                        if($row = $stmt->fetch())
                        {
                            $id = $row['id_user'];
                            $user = $row['nome_user'];
                            $pass = $row['senha_user'];
                            print_r($id);
                            // Verifica a senha
                            if($usrPass == $pass)
                            {
                                // Se a senha estiver correta, inicia a sessão e armazenas as variaveis da sessão
                                session_start();

                                $_SESSION['logged_in'] = true;
                                $_SESSION['idUser'] = $id;
                                $_SESSION['userName'] = $user;

                                // Envia para o main
                                header("Location: ../main.php");
                            }
                            else
                            {
                                $login_err = "Usuário ou senha incorretos";
                            }
                        }
                    }
                else
                {
                    // O nome de usuário não existe, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } 
            else
            {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
}
?>