<div class="container">

<?php 

use App\Models\Author;

$articles = \App\Models\Article::paginate();

foreach ($articles as $article){
    echo 'Article:'.$article['Название'].'<br>';
    echo '<b>Categories:</b><br>';

        foreach ($article->categories as $category){
            echo $category['Название'].'<br>';
        }

        $authorName = Author::select('ФИО')->where('id','=',$article['author_id'])->first();
        $param=$authorName->ФИО;
        echo '<b>Author:</b> '.$param.'<br>';
        echo'-----------------------------<br>';
    }
?>

{{ $articles->links('pagination::bootstrap-4') }}
</div>

