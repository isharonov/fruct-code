<form action="/news/edit/" method="post">
    <input type="text" name="slug" value="<?php echo $slug_news; ?>" placeholder="slug"><br>
    <input type="text" name="title" value="<?php echo $title_news; ?>" placeholder="Название новости"><br>
    <textarea name="text" placeholder="Текст новости"><?php echo $content_news; ?></textarea><br>
    <input type="submit" value="Редактировать новость">
</form>