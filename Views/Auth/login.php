<h1>Вход</h1>
<form method='post' action='#'>
    <div class="form-group row">
        <label for="login" class="col-sm-2 col-form-label">Логин</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="login" placeholder="Введите логин" name="login" value="<?= $login?>"  >
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
        <label for="password" class="col-sm-2 col-form-label">Пароль</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" id="password" placeholder="Введите пароль" name="password" value="<?=$password?>" >
        </div>
        <?if(!empty($errors["password_error"])):?>
            <div class="col-sm-3">
                <small class="text-danger">
                    <?= $errors["password_error"]?>
                </small>
            </div>
        <?endif;?>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>