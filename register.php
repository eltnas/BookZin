<?php
// Incluir arquivo de configuração
require_once "./main/init/db_config.php";

// Defina variáveis e inicialize com valores vazios
$username = $useremail = $password = $confirm_password = "";
$username_err = $useremail_err = $password_err = $confirm_password_err = "";
// $ckhWtp = false;

// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar nome de usuário
    if(empty(trim($_POST["usrUser"]))){
        $username_err = "Por favor coloque um nome de usuário.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["usrUser"]))){
        $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
    } else{
        // Prepare uma declaração selecionada
        $sql = "SELECT id_user FROM bkz_user WHERE usr_user = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = trim($_POST["usrUser"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome de usuário já está em uso.";
                } else{
                    $username = trim($_POST["usrUser"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }

    // Validar Email
    if(empty(trim($_POST["usrEmail"]))){
        $username_err = "Por favor coloque um Email.";
    } else{
        // Prepare uma declaração selecionada
        $sql = "SELECT id_user FROM bkz_user WHERE email_user = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_email = trim($_POST["usrEmail"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este Email de usuário já está em uso.";
                } else{
                    $useremail = trim($_POST["usrEmail"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Validar senha
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";     
    } elseif(strlen(trim($_POST["password"])) < 5){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar e confirmar a senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não confere.";
        }
    }
    
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // cpf e rg4
        $cpf = $_POST['usrCpf'];
        $cpf = str_replace(['.', '-'], '', $cpf);
        $rg = $_POST['usrRg'];
        $rg = str_replace(['.', '-'], '', $rg);

        // Data de Nascimento
        $data = $_POST['usrDataNasc'];
        $data = implode("-", array_reverse(explode("/", $data)));
        
        // Prepare uma declaração de inserção
        $sql = "INSERT INTO bkz_user (usr_user, nome_user, email_user, senha_user, endereco_user, telefone_user, celular_user, cpf_user, rg_user, dataNasc_user, registro_user) VALUES (:username, :nome, :email, :pass, :endereco, :telefone, :celular, :cpf, :rg, :dataNasc, NOW())";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":nome", $param_nome, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":pass", $param_pass, PDO::PARAM_STR);
            $stmt->bindParam(":endereco", $param_endereco, PDO::PARAM_STR);
            $stmt->bindParam(":telefone", $param_telefone, PDO::PARAM_STR);
            $stmt->bindParam(":celular", $param_celular, PDO::PARAM_STR);
            // $stmt->bindParam(":wtp", $param_wtp, PDO::PARAM_STR);
            $stmt->bindParam(":cpf", $param_cpf, PDO::PARAM_STR);
            $stmt->bindParam(":rg", $param_rg, PDO::PARAM_STR);
            $stmt->bindParam(":dataNasc", $param_dataNasc, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = $username;
            $param_pass = sha1(md5($password)); // Creates a password hash
            $param_email = $useremail;
            $param_nome = $_POST['usrNome'];
            $param_endereco = $_POST['usrEnd'];
            $param_telefone = $_POST['usrTel'];
            $param_celular = $_POST['usrCel'];
            // $param_wtp = $_POST['usrEmail']
            $param_cpf = $cpf;
            $param_rg = $rg;
            $param_dataNasc = $data;
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Redirecionar para a página de login
                header("location: login.php");
            } else{
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Cadastro</h2>
        <p>Por favor, preencha este formulário para criar uma conta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="usrNome" class="form-control">
            </div>  
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="usrUser" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="usrEmail" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirme a senha</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Endereço</label>
                <input type="text" name="usrEnd" class="form-control">
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="usrTel" placeholder="(__) ____-____" class="form-control">
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" name="usrCel" placeholder="(__) ____-____" class="form-control">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" name="usrCpf" placeholder="___.___.___-__" class="form-control">
            </div>
            <div class="form-group">
                <label>RG</label>
                <input type="text" name="usrRg" class="form-control">
            </div>
            <div class="form-group">
                <label>Data de Nascimento</label>
                <input type="date" name="usrDataNasc" placeholder="dd/mm/aaaa" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar Conta">
                <input type="reset" class="btn btn-secondary ml-2" value="Apagar Dados">
            </div>
            <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
        </form>
    </div>    
</body>
</html>