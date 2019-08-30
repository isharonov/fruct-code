<h2>Новые фильмы</h2>
<hr>
<div class="row">
  <?php foreach ($movies as $value):?>
    <div class="filmsBlock col-lg-3 col-md-3 col-sm-3 col-xs-6">
      <a href="/movies/<?php echo $value['slug']; ?>"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>"></a>
      <div class="filmLabel"><a href="/movies/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></div>
    </div>
  <?php endforeach ?>
</div>
<div class="margin-8"></div>

<h2>Новые сериалы</h2>
<hr>
<div class="row">
  <?php foreach ($serials as $value):?>              
    <div class="filmsBlock col-lg-3 col-md-3 col-sm-3 col-xs-6">
      <a href="/movies/<?php echo $value['slug']; ?>"><img src="<?php echo $value['poster']; ?>" alt="<?php echo $value['name']; ?>"></a>
      <div class="filmLabel"><a href="/movies/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a></div>
    </div>
    <?php endforeach ?>
</div>
<div class="margin-8"></div>


  <h3><a href="/posts/">Пост</a></h3>
  <hr>
  <p>Текст поста</p>
  <a href="/posts/" class="btn btn-warning pull-right">читать</a>
  <div class="margin-8"></div>


