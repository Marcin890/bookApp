<div>
    <h2>Add book</h2>
    <div>
        <form class="form" action="/?action=create" method="post">
            <ul>
                <li class="form-row">
                    <label>Title <span class="required">*</span></label>
                    <input type="text" name="title" class="field-long" required />
                </li>
                <li class="form-row">
                    <label>Author <span class="required">*</span></label>
                    <input type="text" name="author" class="field-long" required />
                </li>
                <li class="form-row">
                    <label>Description</label>
                    <textarea name="description" id="field5" class="field-long field-textarea" required></textarea>
                </li>
                <li class="form-row">
                    <label>Published Date</label>
                    <input type="number" name="date" class="field-long" required />
                </li>
                <li class="form-row">
                    <input type="submit" value="Submit" required />
                </li>
            </ul>
        </form>
    </div>
</div>