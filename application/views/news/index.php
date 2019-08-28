<h1>Все новости</h1>
<p><a href="/news/create">Add</a></p>
<?php foreach ($news as $value) {
    echo "<p>
    <a href='/news/".$value['slug']."'>".$value['title']."</a> | 
    <a href='/news/edit/".$value['slug']."'>edit</a> | 
    <a href='/news/delete/".$value['slug']."'>X</a>
    </p>";
}
?>