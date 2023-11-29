<table class="table table-striped">
    <a href="/index.php/category/add/" class="btn btn-primary">Kategoriya qo'shish</a>
    <thead class="thead-light">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Kategoriya nomi</th>
        <th scope="col">#</th>
    </tr>
    </thead>
    <tbody class="text-body-light">
    <tr>
        <?php
        $i = 0;
        foreach ($list as $category){
        $i++;
        ?>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $category->title?></td>
        <td>
            <a href="/index.php/category/update/<?=$category->id?>" class="btn btn-primary">Tahrirlash</a>
            <a href="#<?=$category->id?>" class="ochirishBTN btn btn-danger">O'chirish</a>
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