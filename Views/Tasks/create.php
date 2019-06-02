<h1>Создать задачу</h1>
<form method='post' action='#'>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Имя пользователя</label>
        <div class="col-sm-7">
        <input type="text" class="form-control" id="username" placeholder="Введите имя" name="username" value="<?= $username?>"  >
        </div>
        <?if(!empty($errors["username_error"])):?>
        <div class="col-sm-3">
            <small class="text-danger">
                <?= $errors["username_error"]?>
            </small>
        </div>
        <?endif;?>
    </div>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-7">
        <input type="email" class="form-control" id="email" placeholder="Введите ваш email" name="email" value="<?=$email?>" >
        </div>
        <?if(!empty($errors["email_error"])):?>
            <div class="col-sm-3">
                <small class="text-danger">
                    <?= $errors["email_error"]?>
                </small>
            </div>
        <?endif;?>
    </div>


    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Описание</label>
        <div class="col-sm-7">
        <textarea rows = "5" cols = "50" class="form-control" id="description" placeholder="Введите описание" name="description" ><?=$description?></textarea>
        </div>
        <?if(!empty($errors["description_error"])):?>
            <div class="col-sm-3">
                <small class="text-danger">
                    <?= $errors["description_error"]?>
                </small>
            </div>
        <?endif;?>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>