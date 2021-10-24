<noscript>JS отключен</noscript>
<form>
    <p>
        <label for="s1">Выберете пиццу: </label>
        <select name="pizza" id="s1">
            <?= Main::print_option($names);?>
        </select>
    </p>
    <p>
        <label for="s2">Размер:</label>
        <select name="size" id="s2">
            <?= Main::print_option($sizes);?>
        </select>
    </p>
    <p>
        <label for="s3">Соус:</label>
        <select name="sauce" id="s3">
            <?= Main::print_option($sauces);?>
        </select>
    </p>
    <input type="submit" name="send" value="Заказать">
</form>