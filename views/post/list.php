<table class="table table-striped">
    <a href="/index.php/post/add/" class="btn btn-primary">Post qo'shish</a>
    <thead class="thead-light">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Category</th>
        <th scope="col">Image</th>
        <th scope="col">Author</th>
        <th scope="col">Nashr</th>
        <th scope="col">#</th>
    </tr>
    </thead>
    <tbody class="text-body-light">
    <tr>
        <?php
        use models\Category;
        $i = 0;
        $cat = new Category();
        $user = new \models\Author();
        $nashr = new \models\Nashr();
        foreach ($list as $post){
        $i++;
        $category = $cat->getOne($post->category_id);
        $author = $user->getOne($post->author_id);
        $nashrId = $nashr->getOne($post->nashr_id);
        ?>
    <tr>
        <td><?php echo $i?></td>
        <td width="200px"><?php echo substr($post->title,0,50)?></td>
        <td width="350px"><?php echo substr($post->content,0,80)?></td>
        <td><?php echo $category->title?></td>
        <td><img src="../../images/<?=$post->image?>" width="200px" alt=""></td>
        <td width="100px"><?php echo $author->username?></td>
        <td><?php echo $nashrId->title?></td>
        <td>
            <a href="/post/update/<?=$post->id?>" class="btn btn-primary">Tahrirlash</a>
            <a href="#<?=$post->id?>" class="ochirishBTN btn btn-danger">O'chirish</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </tr>

    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $pageCount; $i++ ){?>
            <li class="page-item"><a class="page-link" href="?page=<?= $i?>"><?= $i?></a></li>
        <?php }
        ?>
    </ul>
</nav>
