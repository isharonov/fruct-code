<?php 
    if ($result) {
        echo "<div class=\"alert alert-info\" role=\"alert\">".$result."</div>";
    }
?>
<form action="/news/create/" method="post">
    <input class="form-control input-lg" type="text" name="slug" placeholder="slug"><br>
    <input class="form-control input-lg" type="text" name="title" placeholder="Название новости"><br>
    <textarea class="form-control input-lg" name="text" placeholder="Текст новости"></textarea><br>
    <input class="btn btn-default" type="submit" value="Добавить новость">
</form>