<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>BookZin - Gerenciando seus livros</title>
    <meta charset="utf-8">

    <!-- CSS -->
    <link rel="stylesheet" href="./Assets/css/style.css"/>
</head>
<body>
<header>
    <div class="content">
        <h2 id="header-title">BookiZin</h2>
        <div id="header-search">
            <img src="./Assets/Images/lupa.png"/>
            <input type="text" placeholder="Procurar"/>
            <div id="btnProcura"><img src="./Assets/Images/seta-para-a-direita.png"/></a></div>

        </div>
        <div id="header-config">
            <div id="config-baloon">
                <img src="./Assets/Images/falando.png"/>
            </div>
            <div id="config-user">
                <img src="./Assets/Images/avatar.png"/>
            </div>

            <div id="config-sair">
                <a href="./init/loggout.php"><img src="./Assets/Images/sair.png"/></a>

            </div>

        </div>
    </div>
</header>
<section id="perfil-menu">
    <section id="perfil">
        <div id="perfil-img">
            <img src="./Assets/Images/usuario.png" alt="Usuário" />
        </div>
        <div id="perfil-nome">
            <h3>Elton C. Nascimento</h3>
        </div>
    </section>
    <nav id="menu">
        <ul>
            <li class="menu-lateral" id="pag-inicial"><img src="./Assets/Images/botao-home.png" alt="Inicio"/> Página inicial</li>
                <ul class="inicial-menu">
                    <li class="sub-menu">Visão geral</li>
                    <li class="sub-menu">Estatísticas e métricas</li>
                    <li class="sub-menu">Últimos livros adicionados</li>
                    <li class="sub-menu">Livros mais populares</li>
                </ul>

            <li class="menu-lateral" id="pag-livros"><img src="./Assets/Images/pilha-de-livros.png" alt="Pilha de livros"> Livros</li>
                <ul class="inicial-menu">
                    <li class="sub-menu">Todos os livros</li>
                    <!-- Filtrar e pesquisar livros -->
                    <li class="sub-menu">Adicionar livro</li>
                    <!-- Formulário para adicionar um novo livro à biblioteca -->
                    <li class="sub-menu">Categorias</li>
                    <!-- Adicionar, editar e excluir categorias -->
                    <li class="sub-menu">Autores</li>
                    <!-- Adicionar, editar e excluir autores -->
                </ul>

            <li class="menu-lateral" id="pag-emprestimos"><img src="./Assets/Images/pedindo-emprestado.png" alt="Pedindo Emprestado"> Empréstimos</li>
                <ul class="inicial-menu">
                    <li class="sub-menu">Livros Emprestados</li>
                    <!-- Lista de livros emprestados -->
                    <!-- Detalhes do empréstimo, como data de empréstimo, data de devulução, usuário, etc. -->
                    <li class="sub-menu">Emprestar livro</li>
                    <!-- Formulário para registrar um novo empréstimo de livro -->
                    <li class="sub-menu">Receber Livro</li>
                    <!-- Formulário para registrar um recebimento de livro emprestado -->
                    <li class="sub-menu">Histórico de Emprestimos</li>
                    <!-- Lista de todos os empréstimos anteriores -->
                </ul>

                <li class="menu-lateral" id="pag-emprestimos"><img src="./Assets/Images/usuario.png" alt="Avatar Usuário"> Usuários</li>
                <ul class="inicial-menu">
                    <li class="sub-menu">Todos os usuários</li>
                    <!-- Lista de todos os usuários da biblioteca (membros, funcionários, etc.) -->
                    <!-- Filtrar e pesquisar usuários -->
                    <li class="sub-menu">Adicionar usuário</li>
                    <!-- Formulário para adicionar um novo usuário -->
                </ul>

                <li class="menu-lateral" id="pag-emprestimos"><img src="./Assets/Images/relatorio.png" alt="Relatório"> Relatório</li>
                <ul class="inicial-menu">
                    <li class="sub-menu">Livros Emprestados</li>
                    <!-- Estatísticas e informações sobre livros emprestados atualmente -->
                    <li class="sub-menu">Livros atrasados</li>
                    <!-- Lista de livros com devulução atrasada -->
                    <li class="sub-menu">Livros populares</li>
                    <!-- Lista dos livros mais populares com base em empréstimos ou avaliações -->
                    <li class="sub-menu">Outros relatórios</li>
                    <!-- Outros relatórios relevantes para a biblioteca -->
                </ul>

                <li class="menu-lateral" id="pag-emprestimos"><img src="./Assets/Images/config.png" alt="Engrenagens"> Configurações</li>
                <ul class="inicial-menu">
                    <li class="sub-menu">Configurações gerais do sistema</li>
                    <!-- Configurações de idioma, moeda, fuso horário, etc. -->
                    <li class="sub-menu">Configurações de empréstimo</li>
                    <!-- Definições de prazos, limites e pulíticas de empréstimo -->
                    <li class="sub-menu">Personalização</li>
                    <!-- Configuração de temas, logotipos, cores, etc. -->
                </ul>

                <li class="menu-lateral" id="pag-emprestimos">Sair</li>

        </ul>

    </nav>
</section>
</body>
</html>