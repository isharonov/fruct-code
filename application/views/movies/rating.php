<h1>Рейтинг фильмов</h1>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Фильм</th>
            <th class="text-center">Год</th>
            <th class="text-center">Рейтинг</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($films_rating as $value): ?>
            <tr>
                <td class="col-lg-1 col-md-1 col-xs-2"><img class="img-responsive img-thumbnail" src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>"></td>
                <td class="vert-align"><a href="/movies/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></td>
                <td class="text-center vert-align"><?php echo $value['year']; ?></td>
                <td class="text-center vert-align"><span class="badge"><?php echo $value['rating']; ?></span></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php echo $pagination; ?>
<div class="margin-8 clear"></div>