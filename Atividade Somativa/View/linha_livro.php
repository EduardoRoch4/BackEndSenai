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
            <button type="submit">Excluir</button>
        </form>
        <button type="button" onclick="toggleEditForm('<?= htmlspecialchars($livro->getTítulo()) ?>')">Editar</button>
    </td>
</tr>

<!-- Formulário de edição oculto -->
<tr id="edit-<?= htmlspecialchars($livro->getTítulo()) ?>" class="edit-form">
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
