<form action="/news/edit/" method="post">
    <input class="form-control input-lg" type="text" name="slug" value="<?php echo $slug_news; ?>" placeholder="slug"><br>
    <input class="form-control input-lg" type="text" name="title" value="<?php echo $title_news; ?>" placeholder="Название новости"><br>
    <textarea class="form-control input-lg" name="text" placeholder="Текст новости"><?php echo $content_news; ?></textarea><br>
    <input class="btn btn-default" type="submit" value="Редактировать новость">
</form>