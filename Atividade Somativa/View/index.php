<?php
require_once __DIR__ . '/../Controller/BibliotecaController.php';

$controller = new BibliotecaController();
$buscaAtiva = false;
$livroBuscado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $acao = $_POST['acao'] ?? '';

    // CADASTRAR
    if ($acao === 'salvar') {
        $controller->criar(
            $_POST['titulo'],
            $_POST['autor'],
            intval($_POST['ano_publicacao']),
            $_POST['genero_literario'],
            intval($_POST['qtde'])
        );
    }

    // DELETAR
    elseif ($acao === 'deletar') {
        $controller->deletar($_POST['titulo']);
    }

    // ATUALIZAR
    elseif ($acao === 'atualizar') {
        $controller->atualizar(
            $_POST['tituloAntigo'],
            $_POST['tituloNovo'],
            $_POST['autor'],
            intval($_POST['ano_publicacao']),
            $_POST['genero_literario'],
            intval($_POST['qtde'])
        );
    }

    // BUSCAR POR TÍTULO
    elseif ($acao === 'buscar') {
        $buscaAtiva = true;
        $livroBuscado = $controller->buscarPorTitulo($_POST['tituloBusca']);
    }
}

$lista = $controller->ler();
$generos = ['Ficção', 'Não-ficção', 'Romance', 'Fantasia', 'Mistério', 'Biografia', 'História'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Gerenciamento de Livros</title>

<style>
/* ======= ESTILO GERAL ======= */
body {
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #6ec6ff, #b3e5fc);
    margin: 0;
    padding: 20px;
    color: #333;
}

h1, h2 {
    text-align: center;
    color: #ffffff;
    text-shadow: 2px 2px 4px #00000040;
}

hr {
    border: none;
    height: 2px;
    background: #fff;
    margin: 20px 0;
}

/* ======= FORMULÁRIOS ======= */
form {
    background: #ffffffd5;
    padding: 15px;
    border-radius: 12px;
    width: 80%;
    margin: 10px auto;
    box-shadow: 0px 4px 12px #00000030;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

form input,
form select {
    padding: 10px;
    border-radius: 8px;
    border: 2px solid #4dabf7;
    outline: none;
    font-size: 14px;
    transition: 0.3s ease;
}

form input:focus,
form select:focus {
    border-color: #1e88e5;
    box-shadow: 0 0 8px #1e88e5aa;
}

/* ======= BOTÕES GERAIS ======= */
button {
    padding: 10px 15px;
    border: none;
    background: #4dabf7;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #1e88e5;
    transform: scale(1.05);
}

/* ======= TABELA ======= */
table {
    width: 90%;
    margin: 0 auto;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0px 4px 12px #00000040;
}

th {
    background: #1e88e5;
    color: white;
    padding: 15px;
    font-size: 16px;
}

td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #bbdefb;
}

tr:nth-child(even) {
    background: #e3f2fd;
}

tr:nth-child(odd) {
    background: #ffffff;
}

tr:hover {
    background: #bbdefb;
    transition: 0.2s;
}

/* ======= BOTÕES DE AÇÃO (Editar / Excluir) ======= */
.btn-editar {
    padding: 6px 12px;
    background: #29b6f6;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
    margin-right: 5px;
}

.btn-editar:hover {
    background: #0288d1;
    transform: scale(1.05);
}

.btn-excluir {
    padding: 6px 12px;
    background: #ef5350;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.btn-excluir:hover {
    background: #b71c1c;
    transform: scale(1.05);
}

/* ======= FORMULÁRIO DE EDIÇÃO ======= */
.edit-form {
    background: #e8f3ff;
    padding: 10px;
    border-radius: 10px;
    border: 2px dashed #4dabf7;
    margin-top: 10px;
    animation: pop 0.3s ease;
    display: none;
}

@keyframes pop {
    from { transform: scale(0.9); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
}

.edit-form input,
.edit-form select {
    border-color: #42a5f5;
}

.edit-form button {
    background: #29b6f6;
}

.edit-form button:hover {
    background: #0288d1;
}
</style>

<script>
function toggleEditForm(id) {
    const form = document.getElementById('edit-' + id);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}
</script>

</head>

<body>

<h1>Gerenciamento de Livros</h1>
<hr>

<!-- FORMULÁRIO DE BUSCA -->
<form method="POST">
    <input type="hidden" name="acao" value="buscar">

    <input type="text" name="tituloBusca" placeholder="Buscar livro por título..." required>

    <button type="submit">Buscar</button>

    <?php if ($buscaAtiva): ?>
        <a href="index.php">
            <button type="button" style="background:#757575;">Limpar busca</button>
        </a>
    <?php endif; ?>
</form>

<!-- FORMULÁRIO DE CADASTRO -->
<form method="POST">
    <input type="hidden" name="acao" value="salvar">

    <input type="text" name="titulo" placeholder="Título" required>
    <input type="text" name="autor" placeholder="Autor" required>
    <input type="number" name="ano_publicacao" placeholder="Ano de publicação" required>

    <select name="genero_literario" required>
        <option value="">Selecione o gênero</option>
        <?php foreach ($generos as $g): ?>
            <option value="<?= $g ?>"><?= $g ?></option>
        <?php endforeach; ?>
    </select>

    <input type="number" name="qtde" placeholder="Quantidade em estoque" required>

    <button type="submit">Cadastrar</button>
</form>

<h2>
    <?= $buscaAtiva ? "Resultado da busca" : "Livros Cadastrados"; ?>
</h2>

<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
        <th>Gênero</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>

    <?php
    if ($buscaAtiva) {
        if (!$livroBuscado) {
            echo "<tr><td colspan='6'>Nenhum livro encontrado.</td></tr>";
        } else {
            $livro = $livroBuscado;
            include __DIR__ . '/linha_livro.php';
        }
    } else {
        foreach ($lista as $livro) {
            include __DIR__ . '/linha_livro.php';
        }
    }
    ?>
</table>

</body>
</html>
