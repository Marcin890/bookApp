<!-- Pojedyncza notatka -->

<div class="show">
    <?php $note = $params['note'] ?? null; ?>
    <?php if ($note) : ?>
    <ul>
        <li>Id: <?php echo $note['id'] ?></li>
        <li>
            <label>Tytuł <span class="required">*</span></label>
            <input type="text" name="title" class="field-long" value="<?php echo $note['title'] ?>" />
        </li>
        <li>Author: <?php echo $note['author'] ?></li>
        <li>Description: <?php echo $note['description'] ?></li>
        <li>Publication date: <?php echo $note['date'] ?></li>
    </ul>
    <a href="/?action=edit&id=<?php echo $note['id'] ?>">
        <button>Edit</button>
    </a>
    <?php else : ?>
    <div>Brak notatki do wyświetlenia</div>
    <?php endif; ?>
    <a href="/">
        <button>Powrót do listy notatek</button>
    </a>
</div>