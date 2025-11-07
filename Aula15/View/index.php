<?php
require_once __DIR__ . '/../Controller/bebidaController.php';

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
    } elseif ($_POST['acao'] === 'atualizar') {
        $nomeAntigo = $_POST['nomeAntigo'] ?? null;
        $nomeNovo   = $_POST['nomeNovo'] ?? null;
        $categoria  = $_POST['categoria'] ?? null;
        $volume     = $_POST['volume'] ?? null;
        $valor      = $_POST['valor'] ?? null;
        $qtde       = $_POST['qtde'] ?? null;

        if ($nomeAntigo && $nomeNovo && $categoria && $volume && $valor !== null && $qtde !== null) {
            $controller->atualizar($nomeAntigo, $nomeNovo, $categoria, $volume, $valor, $qtde);
        } else {
            echo "<p style='color:red;'>Erro: todos os campos são obrigatórios para atualizar.</p>";
        }
    }
}

$lista = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Bebidas</title>
    <style>
        .edit-form { display: none; margin-top: 5px; }
    </style>
    <script>
        function toggleEditForm(id) {
            const form = document.getElementById('edit-' + id);
            if (!form) return;
            form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
        }
    </script>
</head>
<body>
<h1>Gerenciamento de bebidas</h1>
<hr>

<!-- Formulário de cadastro -->
<form method="POST">
    <input type="hidden" name="acao" value="salvar">
    <input type="text" name="nome" placeholder="Nome da bebida:" required>
    <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <?php
        $categorias = ['Refrigerante', 'Cerveja', 'Vinho', 'Destilado', 'Água', 'Suco', 'Energético'];
        foreach ($categorias as $cat) {
            echo "<option value=\"$cat\">$cat</option>";
        }
        ?>
    </select>
    <input type="text" name="volume" placeholder="Volume (ex: 300ml)" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor (R$)" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque" required>
    <button type="submit">Cadastrar</button>
</form>

<h2>Bebidas cadastradas</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Volume</th>
        <th>Valor (R$)</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($lista as $bebida): 
        $id = urlencode($bebida->getNome());
    ?>
    <tr>
        <td><?= $bebida->getNome(); ?></td>
        <td><?= $bebida->getCategoria(); ?></td>
        <td><?= $bebida->getVolume(); ?></td>
        <td><?= $bebida->getValor(); ?></td>
        <td><?= $bebida->getQtde(); ?></td>
        <td>
            <!-- Botão de edição -->
            <button type="button" onclick="toggleEditForm('<?= $id ?>')">Editar</button>

            <!-- Botão de exclusão -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="acao" value="deletar">
                <input type="hidden" name="nome" value="<?= $bebida->getNome(); ?>">
                <button type="submit">Excluir</button>
            </form>

            <!-- Formulário de edição -->
            <div class="edit-form" id="edit-<?= $id ?>">
                <form method="POST">
                    <input type="hidden" name="acao" value="atualizar">
                    <input type="hidden" name="nomeAntigo" value="<?= $bebida->getNome(); ?>">

                    <input type="text" name="nomeNovo" value="<?= $bebida->getNome(); ?>" required>
                    <select name="categoria" required>
                        <?php
                        foreach ($categorias as $cat) {
                            $selected = $bebida->getCategoria() === $cat ? 'selected' : '';
                            echo "<option value=\"$cat\" $selected>$cat</option>";
                        }
                        ?>
                    </select>
                    <input type="text" name="volume" value="<?= $bebida->getVolume(); ?>" required>
                    <input type="number" name="valor" step="0.01" value="<?= $bebida->getValor(); ?>" required>
                    <input type="number" name="qtde" value="<?= $bebida->getQtde(); ?>" required>
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>    
</table>
</body>
</html>
