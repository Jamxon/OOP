<div class="container">
    <br><br>
    <?php
        $author = new \models\Author();
        $cat = new \models\Category();
        $nashr = new \models\Nashr();
        $nashrId = $nashr->getList();
        $catId = $cat->getList();
        $authorId = $author->getList();
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="title">
            <input type="text" value="<?=$post->title?>" width="600"  name="title" class="form-control" placeholder="Kategoriya nomini kiriting">
        </label><br><br>
        <label for="content">
            <textarea name="content" id="" cols="30" rows="5" class="form-control"><?=$post->content?></textarea>
        </label><br>
        <select class="form-control" name="category_id" id="">
            <?php
            foreach ($cat->getList() as $category){?>
                <option value="<?=$category->id?>"><?=$category->title?></option>
            <?php }
            ?>
        </select><br>
        <select name="author_id" class="form-control" id="">
            <?php
            foreach ($author->getList() as $author){?>
                <option value="<?=$author->id?>"><?=$author->username?></option>
            <?php }
            ?>
        </select><br>
        <img src="../../images/<?=$post->image?>" width="200px" alt="">
        <input type="file" name="img" class="form-control"><br>
        <select name="nashr_id" class="form-control" id="">
            <?php
            foreach ($nashr->getList() as $nashr){?>
                <option value="<?=$nashr->id?>"><?=$nashr->title?></option>
            <?php }
            ?>
        </select><br>
        </label><br>
        <input type="hidden" value="<?=$post->id?>" name="id">
        <br><button type="submit" name="post_update" class="btn btn-primary">Save</button>
    </form>
</div>