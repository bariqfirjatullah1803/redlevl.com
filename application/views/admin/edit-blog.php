<div class="card">
    <div class="card-body">
        <?= form_open_multipart('admin/edit_blog')?>
        <input type="hidden" name="id" value="<?= $sb['id']?>">
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="inputTitle" value="<?= $sb['title']?>">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Description</label>
            <input name="desc" type="text" class="form-control" id="inputDescription" value="<?= $sb['desc']?>">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image Blog</label>
            <input onchange="loadFile(event)" name="image" class="form-control form-control-sm" id="formFileSm"
                type="file" accept="image/gif, image/jpeg, image/png">
            <img id="output" src="<?= base_url('assets/blog/').$sb['image']?>" class="img-thumbnail"
                style="width:200px;height:200px;object-fit:cover" alt="...">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Content</label>
            <textarea name="content" id="summernote"><?= $sb['content']?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
</div>
