<form action="controller/controller.php?action=changeImg" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto" id="foto">
    <br>
    <input type="submit" value="Subir Foto">
</form>

<?php
if (isset($_REQUEST['error'])) {
    
}