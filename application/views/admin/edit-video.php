<style>
	#main-video {		
		display: none;
		max-width: 400px;
	}
	#canvas{
		display: none;
	}

</style>
<div class="card mt-5">
	<div class="card-body">
		<?= form_open_multipart('admin/edit_video/'.$video['id'])?>
			<div class="mb-3">
				<label for="formFileSm" class="form-label">Video Blog</label>				
				<div id="prev-img" style="width:500px; height:300px;background-size:cover;background-position:center;background-image:url(data:image/png;base64,<?=base64_encode($video['thumbnail'])?>)">				
				</div>				
			</div>
			<div class="mb-3">
				<label for="inputDescription" class="form-label">Description</label>
				<input name="desc" type="text" value="<?=$video['desc']?>" class="form-control" id="inputDescription">
			</div>
			<input type="submit" class="btn btn-primary" value="Save">
		</form>
	</div>
</div>

