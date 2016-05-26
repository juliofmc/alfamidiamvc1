
<link rel="stylesheet" type="text/css" href="js/plupload-2.1.8/js/jquery.plupload.queue/css/jquery.plupload.queue.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<!-- production -->
<script src="js/plupload-2.1.8/js/plupload.full.min.js"></script>
<script src="js/plupload-2.1.8/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>

<div id="flash_uploader" style="width: 100%; ">Your browser doesn't have Flash installed.</div>

<table>
	<tr>
	<?
    	$query = "SELECT *FROM galeria_fotos WHERE id_galeria='{$_GET['id']}'";
		$query = mysql_query($query);
		$x = 1;
		while($dados = mysql_fetch_array($query)){
			if($x % 5 == 0){
				echo "</tr><tr>";
			}					
			echo "<td>";
			echo "	<img src=\"conteudos/galerias/t_{$dados['foto']}\">";
			echo "</td>";
			$x++;
		}
	?>
    </tr>
</table>

<script type="text/javascript">
$(function() {
	// Setup flash version
	$("#flash_uploader").pluploadQueue({
		// General settings
		runtimes : 'flash',
		url : 'js/plupload-2.1.8/upload.php',
		chunk_size : '1mb',
		unique_names : true,
		
		filters : {
			max_file_size : '10mb',
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "Zip files", extensions : "zip"}
			]
		},

		// Resize images on clientside if we can
		//resize : {width : 320, height : 240, quality : 90},
		multipart_params : {
			"idGaleria" : "<?=$_GET['id']?>"
		},
		// Flash settings
		flash_swf_url : 'js/plupload-2.1.8/js/Moxie.swf'
	});
});
</script>
<script>
$(document).ready(function(upload) {

        var uploader = $('#flash_uploader').pluploadQueue();

        uploader.bind('FileUploaded', function() {
            if (uploader.files.length == (uploader.total.uploaded + uploader.total.failed)) {
				document.location.replace('painel.php?m=galerias&a=fotos&id=<?=$_GET['id']?>');
            }
        });
});
</script>