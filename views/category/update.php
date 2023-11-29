<div class="container">
    <br><br>
    <form method="post">
        <label for="title">
            <input type="text" value="<?=$category->title?>" width="600"  name="name" class="form-control" placeholder="Kategoriya nomini kiriting">
        </label><br>
        <input type="hidden" value="<?=$category->id?>" name="id">
        <br><button type="submit" name="cat_update" class="btn btn-primary">Save</button>
    </form>
</div>