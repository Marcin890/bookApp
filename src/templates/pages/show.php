<!-- Pojedyncza notatka -->

<div class="show">
    <?php $note = $params['note'] ?? null; ?>
    <?php if ($note) : ?>

    <h3>
        Title:
    </h3>
    <p class="details__text">
        <?php echo $note['title'] ?>
    </p>
    <h3>
        Author:
    </h3>
    <p class="details__text">
        <?php echo $note['author'] ?>
    </p>
    <h3>
        Description:
    </h3>
    <p class="details__text">
        <?php echo $note['description'] ?>
    </p>
    <h3>
        Publication date:
    </h3>
    <p class="details__text">
        <?php echo $note['date'] ?>
    </p>

    <a href="/?action=edit&id=<?php echo $note['id'] ?>">
        <button>Edit</button>
    </a>
    <?php else : ?>
    <div>Brak notatki do wyświetlenia</div>
    <?php endif; ?>
    <a href="/">
        <button class="btn">Back to book list</button>
    </a>
</div>