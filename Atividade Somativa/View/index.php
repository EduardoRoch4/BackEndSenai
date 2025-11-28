<?php
require_once __DIR__ . '/../Controller/BibliotecaController.php';

$controller = new BibliotecaController();
$buscaAtiva = false;
$livroBuscado = null;
$msg = "";

// Processa requisições POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    try {
        if ($acao === 'salvar') {
            $msg = $controller->criar(
                $_POST['titulo'],
                $_POST['autor'],
                intval($_POST['ano_publicacao']),
                $_POST['genero_literario'],
                intval($_POST['qtde'])
            );
        } elseif ($acao === 'deletar') {
            $controller->deletar($_POST['titulo']);
            $msg = "Livro excluído com sucesso!";
        } elseif ($acao === 'atualizar') {
            $msg = $controller->atualizar(
                $_POST['tituloAntigo'],
                $_POST['tituloNovo'],
                $_POST['autor'],
                intval($_POST['ano_publicacao']),
                $_POST['genero_literario'],
                intval($_POST['qtde'])
            );
        } elseif ($acao === 'buscar') {
            $buscaAtiva = true;
            $livroBuscado = $controller->buscarPorTitulo($_POST['tituloBusca']);
        }
    } catch (Exception $e) {
        $msg = "Erro: " . $e->getMessage();
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
body { font-family: "Poppins", sans-serif; background: linear-gradient(135deg,#6ec6ff,#b3e5fc); margin:0; padding:20px; color:#333; min-height:100vh; display:flex; flex-direction:column; align-items:center; }
/* ALERTAS */
.alert { padding:12px 20px; margin:10px auto; border-radius:8px; width:80%; text-align:center; font-weight:bold; }
.alert-success { background:#d4edda; color:#155724; }
.alert-error { background:#f8d7da; color:#721c24; }
/* TÍTULOS */
h1,h2 { text-align:center; color:#fff; text-shadow:2px 2px 6px rgba(0,0,0,0.4); margin-bottom:15px; }
/* FORMULÁRIOS */
form input,form select { padding:12px; border-radius:10px; border:2px solid #4dabf7; outline:none; font-size:15px; background:#f9fcff; }
form input:focus,form select:focus { border-color:#1e88e5; box-shadow:0 0 10px #1e88e5aa; background:#fff; }
/* BOTÕES */
button { padding:12px 18px; border:none; background:linear-gradient(135deg,#4dabf7,#1e88e5); color:#fff; font-weight:bold; border-radius:10px; cursor:pointer; transition:0.3s; }
button:hover { background:linear-gradient(135deg,#1e88e5,#1565c0); transform:scale(1.07); }
/* TABELA */
table { width:90%; margin:20px auto; border-collapse:collapse; background:#fff; border-radius:15px; overflow:hidden; box-shadow:0px 6px 16px rgba(0,0,0,0.25); }
th { background:linear-gradient(135deg,#1e88e5,#1565c0); color:#fff; padding:15px; }
td { padding:12px; text-align:center; border-bottom:1px solid #bbdefb; }
tr:nth-child(even){background:#e3f2fd;} tr:nth-child(odd){background:#fff;} tr:hover{background:#bbdefb;}
/* BOTÕES DE AÇÃO */
.btn-editar{background:#29b6f6;margin-right:5px;} .btn-editar:hover{background:#0288d1;} .btn-excluir{background:#ef5350;} .btn-excluir:hover{background:#b71c1c;}
/* FORMULÁRIO DE EDIÇÃO */
.edit-form { background:#e8f3ff; padding:12px; border-radius:12px; border:2px dashed #4dabf7; margin-top:12px; display:none; }
</style>
<script>
function toggleEditForm(id) {
    const form = document.getElementById('edit-' + id);
    if (form.style.display === '' || form.style.display === 'none') {
        form.style.display = 'table-row';
    } else {
        form.style.display = 'none';
    }
}
</script>
</head>
<body>

<h1>Gerenciamento de Livros</h1>
<hr>

<?php if ($msg): ?>
    <div class="alert <?= strpos($msg,'Erro')!==false?'alert-error':'alert-success' ?>">
        <?= htmlspecialchars($msg) ?>
    </div>
<?php endif; ?>

<!-- FORMULÁRIO DE BUSCA -->
<form method="POST">
    <input type="hidden" name="acao" value="buscar">
    <input type="text" name="tituloBusca" placeholder="Buscar livro por título..." required>
    <button type="submit">Buscar</button>
    <?php if ($buscaAtiva): ?>
        <a href="index.php"><button type="button" style="background:#757575;">Limpar busca</button></a>
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

<h2><?= $buscaAtiva ? "Resultado da busca" : "Livros Cadastrados"; ?></h2>

<table>
    <tr>
        <th>Título</th><th>Autor</th><th>Ano</th><th>Gênero</th><th>Quantidade</th><th>Ações</th>
    </tr>
    <?php
    if ($buscaAtiva) {
        $livros = $livroBuscado ? [$livroBuscado] : [];
        if (!$livroBuscado) echo "<tr><td colspan='6'>Nenhum livro encontrado.</td></tr>";
    } else {
        $livros = $lista;
    }
    foreach ($livros as $index => $livro): ?>
        <tr>
            <td><?= htmlspecialchars($livro->getTítulo()) ?></td>
            <td><?= htmlspecialchars($livro->getAutor()) ?></td>
            <td><?= htmlspecialchars($livro->getAno_publicacao()) ?></td>
            <td><?= htmlspecialchars($livro->getGênero_Literario()) ?></td>
            <td><?= htmlspecialchars($livro->getQtde()) ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="acao" value="deletar">
                    <input type="hidden" name="titulo" value="<?= htmlspecialchars($livro->getTítulo()) ?>">
                    <button type="submit" class="btn-excluir">Excluir</button>
                </form>
                <button type="button" class="btn-editar" onclick="toggleEditForm('<?= $index ?>')">Editar</button>
            </td>
        </tr>
                <tr id="edit-<?= $index ?>" class="edit-form">
            <td colspan="6">
                <form method="POST">
                    <input type="hidden" name="acao" value="atualizar">
                    <input type="hidden" name="tituloAntigo" value="<?= htmlspecialchars($livro->getTítulo()) ?>">
                    <input type="text" name="tituloNovo" value="<?= htmlspecialchars($livro->getTítulo()) ?>" required>
                    <input type="text" name="autor" value="<?= htmlspecialchars($livro->getAutor()) ?>" required>
                    <input type="number" name="ano_publicacao" value="<?= htmlspecialchars($livro->getAno_publicacao()) ?>" required>
                    <select name="genero_literario" required>
                        <?php foreach ($generos as $g): ?>
                            <option value="<?= $g ?>" <?= $livro->getGênero_Literario() === $g ? 'selected' : '' ?>><?= $g ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="qtde" value="<?= htmlspecialchars($livro->getQtde()) ?>" required>
                    <button type="submit">Salvar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

