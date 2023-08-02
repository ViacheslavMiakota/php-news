<form action="/index.php?page=logUp" method="post" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Введіть Ваше Ім'я" class="form-control"><br>
            <label for="">Зображення</label>
            <input type="file" name="avatar" id="avatar" class="form-control"><br>
            <input type="email" name="login" id="login"  placeholder="Введіть email" class="form-control"><br>
            <input type="pass" name="pass" placeholder="Введіть пароль" class="form-control"><br>
            <input type="pass" name="pass_confirm" placeholder="Введіть пароль ще раз" class="form-control"><br>
            <select name="role" id="role" class="form-control">
                <option value="user">Користувач</option>
                <option value="admin">Адміністратор</option>
            </select><br>
            <button type="submit" name="send" href="/index.php?page=postLogIn" class="btn btn-success">Зареєструватись</button>

</form>