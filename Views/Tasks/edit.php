<h1>Редактировать задачу</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea rows = "5" cols = "50" class="form-control" id="description" placeholder="Введите описание" name="description" >
            <?php if (isset($task["description"])) echo $task["description"];?>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>