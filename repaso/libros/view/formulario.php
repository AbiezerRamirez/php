<form action="index.php?c=add" method="POST" enctype="multipart/form-data">
    <fieldset>
        <div>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn">
        </div>
        <div>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor">
        </div>
        <div>
            <label for="fp">Fehca de publicación:</label>
            <input type="text" name="fp" id="fp">
        </div>
        <div>
            <label for="paginas">Numero de Páginas:</label>
            <input type="number" name="paginas" id="paginas">
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/gif,image/webp,image/tiff ,.bmp ,.jpeg, .jpg,.png">
        </div>
    </fieldset>
    <div>
        <input type="submit" value="Agregar Libro">
    </div>
</form>