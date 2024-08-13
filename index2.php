<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Galeria Zdjęć</h1>

    <!-- Formularz do przesyłania zdjęć, widoczny tylko dla zalogowanych użytkowników -->
    <div id="upload-section" style="display: none;">
        <h2>Upload Photo</h2>
        <form id="upload-form" enctype="multipart/form-data">
            <input type="file" id="file-input" name="photo" accept="image/*">
            <button type="submit">Upload Photo</button>
        </form>
    </div>

    <!-- Galeria zdjęć -->
    <div id="gallery">
        <!-- Zdjęcia zostaną załadowane tutaj przez JavaScript -->
    </div>

    <script src="script.js"> </script>
    <script>

        document.addEventListener('DOMContentLoaded', loadGallery);

        async function loadGallery() {
            try {
                const response = await fetch('gallery.php');
                const data = await response.json();
                
                const galleryDiv = document.getElementById('gallery');
                const uploadSection = document.getElementById('upload-section');
                
                galleryDiv.innerHTML = '';  // Wyczyść galerię przed załadowaniem nowych zdjęć

                data.photos.forEach(photo => addPhotoToGallery(photo.filename, photo.id));

                // Jeśli użytkownik jest zalogowany, pokaż sekcję przesyłania zdjęć
                if (data.logged_in) {
                    uploadSection.style.display = 'block';
                }
            } catch (error) {
                console.error('Error loading gallery:', error);
            }
        }

 </script>
</body>
</html>
