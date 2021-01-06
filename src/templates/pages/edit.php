<div>
    <h3>Edycja notatki</h3>
    <div>
        <?php if (!empty($params['book'])) : ?>
        <?php $book = $params['book']; ?>
        <form class="book-form" action="/?action=edit" method="post">
            <input name="id" type="hidden" value="<?php echo $book['id'] ?>" />
            <ul>
                <li>
                    <label>Title <span class="required">*</span></label>
                    <input type="text" name="title" class="field-long" value="<?php echo $book['title'] ?>" />
                </li>
                <li>
                    <label>Author <span class="required">*</span></label>
                    <input type="text" name="author" class="field-long" value="<?php echo $book['author'] ?>" />
                </li>
                <li>
                    <label>Description</label>
                    <textarea name="description" id="field5"
                        class="field-long field-textarea"><?php echo $book['description'] ?></textarea>
                </li>
                <li>
                    <label>Date</label>
                    <textarea name="date" id="field5"
                        class="field-long field-textarea"><?php echo $book['date'] ?></textarea>
                </li>
                <li>
                    <input type="submit" value="Submit" />
                </li>
            </ul>
        </form>
        <?php else : ?>
        <div>
            Brak danych do wyświetlenia
            <a href="/"><button>Powrót do listy notatek</button></a>
        </div>
        <?php endif; ?>
    </div>
</div>