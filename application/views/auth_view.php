<section class="auth container-fiuid">
    <div class="popup">
        <h1>Авторизация</h1>
        <p>Для входа введите логин и пароль</p>
        <form method="POST" action="auth">
        <form >
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" placeholder="Ваш логин">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" placeholder="Ваш пароль">
            <input type="submit" value="Войти" id="submit_auth" name="submit_auth">
        </form>
    </div>
    <div class="message"><?php echo $data['message'];?></div>
</section>
