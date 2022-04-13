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
		<?= form_open_multipart('admin/add_video')?>
			<div class="mb-3">
				<label for="formFileSm" class="form-label">Video Blog</label>
				<input onload="set_thumbnail()" name="video" class="form-control form-control-sm" id="formFileSm" type="file" accept="video/mp4">				
				<label class="pt-2">Preview :</label> <br>
				<canvas id="canvas"></canvas>
				<video id="main-video" autoplay="autoplay">
					<source type="video/mp4">
				</video>
				<input type="text" class="d-none" name="tmb-video" id="tmb-video">
				<div id="prev-img" style="width:500px; height:300px;background-size:cover;background-position:center;">				
				</div>				
			</div>
			<div class="mb-3">
				<label for="inputDescription" class="form-label">Description</label>
				<input onclick="capture()" name="desc" type="text" class="form-control" id="inputDescription">
			</div>
			<input type="submit" class="btn btn-primary" value="Save">
		</form>
	</div>
</div>


<script>
var canvas = document.getElementById('canvas');
var video = document.getElementById('main-video');
document.querySelector("#formFileSm").addEventListener('change', function() {
    if(['video/mp4'].indexOf(document.querySelector("#formFileSm").files[0].type) == -1) {
        alert('Error : Only MP4 format allowed');
        return;
    }
	
	document.querySelector("#main-video source").setAttribute('src', URL.createObjectURL(document.querySelector("#formFileSm").files[0]));
	video.load();
	video.pause();
	setTimeout(function(){ capture(); }, 3000);
	
});

function capture(){    
	canvas.width = video.videoWidth;
	canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
	let link = canvas.toDataURL();
	$('#prev-img').css('background-image',`url('${link}')`)
	$('#tmb-video').val(link)
}

</script>