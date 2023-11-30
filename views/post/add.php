<div class="container">
    <br><br>
    <?php
        $cat = new \models\Category();
        $author = new \models\Author();
        $nashr = new \models\Nashr();
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="title">
            <h4>Titleni kiriting</h4>
            <input type="text" required name="title" class="form-control" placeholder="Title kiriting" style="width: 500px !important; background-color: #ffffff !important"><br>
            <h4>Content kiriting</h4>
            <textarea name="content" id="" class="form-control" cols="30" rows="5"></textarea><br>
            <h4>Categoriyani tanlang</h4>
            <select class="form-control" name="cat_id" id="">
                <option value="0">---</option>
                <?php
                    foreach ($cat->getList() as $category){?>
                        <option value="<?=$category->id?>"><?=$category->title?></option>
                    <?php }
                ?>
            </select><br>
            <h4>Authorni tanlang</h4>
            <select name="author_id" class="form-control" id="">
                <option value="0">---</option>
                <?php
                foreach ($author->getList() as $author){?>
                    <option value="<?=$author->id?>"><?=$author->username?></option>
                <?php }
                ?>
            </select><br>
            <h4>Rasm tanlang</h4>
            <input type="file" name="img" class="form-control"><br>
            <h4>Nashrni tanlang</h4>
            <select name="nashr_id" class="form-control" id="">
                <option value="0">---</option>
                <?php
                foreach ($nashr->getList() as $nashr){?>
                    <option value="<?=$nashr->id?>"><?=$nashr->title?></option>
                <?php }
                ?>
            </select><br>
        </label><br>
        <br>
        <button type="submit" name="post_add" class="btn btn-primary">Save</button>
    </form>
</div>