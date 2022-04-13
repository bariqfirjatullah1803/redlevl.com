<form action="<?php echo base_url('posting/save');?>" method="post">
    <input type="hidden" value="blog" name="db">
    <div class="mb-3">
        <label for="inputTitle" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="inputTitle">
    </div>
    <div class="mb-3">
        <label for="inputDescription" class="form-label">Description</label>
        <input name="desc" type="text" class="form-control" id="inputDescription">
    </div>
    <div class="mb-3">
        <label for="formFileSm" class="form-label">Image Cover</label>
        <input onchange="loadFile(event)" name="image" class="form-control form-control-sm" id="formFileSm" type="file"
            accept="image/gif, image/jpeg, image/png">
        <img id="output" class="img-thumbnail" style="width:200px;height:200px;object-fit:cover">
    </div>
    <div class="mb-3">
        <textarea name="content" id="summernote"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Save">
</form>
