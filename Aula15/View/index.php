<?php
require_once __DIR__ . '/../Controller/bebidaController.php';

$controller = new BebidaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $acao = $_POST['acao'] ?? '';

    if ($acao === 'salvar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);

    } elseif ($acao === 'deletar') {
        $controller->deletar($_POST['nome']);

    } elseif ($acao === 'atualizar') {

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
$categorias = ['Refrigerante', 'Cerveja', 'Vinho', 'Destilado', 'Água', 'Suco', 'Energético'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Bebidas</title>

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

/* Botões */
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
            if (!form) return;

            form.style.display = (form.style.display === 'block') ? 'none' : 'block';
        }
    </script>

</head>

<body>

<h1>Gerenciamento de bebidas</h1>
<hr>

<!-- Formulário de cadastro -->
<form method="POST">
    <input type="hidden" name="acao" value="salvar">

    <input type="text" name="nome" placeholder="Nome da bebida" required>

    <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat ?>"><?= $cat ?></option>
        <?php endforeach; ?>
    </select>

    <input type="text" name="volume" placeholder="Volume (ex: 300ml)" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor (R$)" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque" required>

    <button type="submit">Cadastrar</button>
</form>

<h2>Bebidas cadastradas</h2>

<table>
    <tr>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Volume</th>
        <th>Valor (R$)</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($lista as $bebida): ?>
        <?php $id = urlencode($bebida->getNome()); ?>

        <tr>
            <td><?= $bebida->getNome(); ?></td>
            <td><?= $bebida->getCategoria(); ?></td>
            <td><?= $bebida->getVolume(); ?></td>
            <td><?= $bebida->getValor(); ?></td>
            <td><?= $bebida->getQtde(); ?></td>

            <td>

                <!-- Botão Editar -->
                <button type="button" onclick="toggleEditForm('<?= $id ?>')">Editar</button>

                <!-- Botão Excluir -->
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
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat ?>" <?= $bebida->getCategoria() === $cat ? 'selected' : '' ?>>
                                    <?= $cat ?>
                                </option>
                            <?php endforeach; ?>
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
