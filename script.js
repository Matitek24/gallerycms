document.addEventListener('DOMContentLoaded', () => {
    loadGallery();

    const uploadForm = document.getElementById('upload-form');
    uploadForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const fileInput = document.getElementById('file-input');
        const formData = new FormData();

        // Iteracja po wszystkich wybranych plikach
        for (let i = 0; i < fileInput.files.length; i++) {
            formData.append('photos[]', fileInput.files[i]);
        }

        try {
            const response = await fetch('upload.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            console.log(result); // Sprawdź, co zwraca serwer

            if (result.success) {
                // Iteracja po wszystkich przesłanych plikach
                result.files.forEach((file, index) => {
                    addPhotoToGallery(file.filename, file.id);
                });
                alert('Zdjęcia zostały przesłane pomyślnie!');
            } else {
                alert('Błąd podczas przesyłania zdjęć: ' + result.message);
            }
        } catch (error) {
            console.error('Error uploading photos:', error);
            alert('Wystąpił błąd podczas przesyłania zdjęć.');
        }

        fileInput.value = ''; // Resetuje pole wyboru pliku
    });
});

async function loadGallery() {
    try {
        const response = await fetch('gallery.php');
        const data = await response.json();

        const galleryDiv = document.getElementById('gallery');
        galleryDiv.innerHTML = '';  // Wyczyść galerię przed dodaniem nowych zdjęć

        data.photos.forEach(photo => addPhotoToGallery(photo.filename, photo.id));

        if (data.logged_in) {
            document.getElementById('upload-section').style.display = 'block';
        }
    } catch (error) {
        console.error('Error loading gallery:', error);
    }
}

function addPhotoToGallery(filename, id) {
    const gallery = document.getElementById('gallery');

    // Tworzenie struktury HTML zgodnie z twoim wymaganiem
    const colDiv = document.createElement('div');
    colDiv.classList.add('col-md-6', 'col-xl-4');

    const galleryCardDiv = document.createElement('div');
    galleryCardDiv.classList.add('gallery-card');

    const galleryImgDiv = document.createElement('div');
    galleryImgDiv.classList.add('gallery-img');

    const img = document.createElement('img');
    img.src = `uploads/${filename}`;
    img.alt = 'gallery image';

    const anchor = document.createElement('a');
    anchor.href = `uploads/${filename}`;
    anchor.classList.add('play-btn', 'style3', 'popup-image');
    
    const icon = document.createElement('i');
    icon.classList.add('far', 'fa-search');
    
    anchor.appendChild(icon);
    galleryImgDiv.appendChild(img);
    galleryImgDiv.appendChild(anchor);
    galleryCardDiv.appendChild(galleryImgDiv);
    colDiv.appendChild(galleryCardDiv);

    // Tylko zalogowani użytkownicy mogą usuwać zdjęcia
    if (document.getElementById('upload-section').style.display !== 'none') {
        const deleteButton = document.createElement('button');
        deleteButton.textContent = '';
        deleteButton.classList.add('delete-button');
        deleteButton.addEventListener('click', () => deletePhoto(id, colDiv));
        galleryCardDiv.appendChild(deleteButton);
    }

    gallery.appendChild(colDiv);

    // Re-inicjalizacja Magnific Popup
    $('.popup-image').magnificPopup({
        type: 'image',
        mainClass: 'mfp-zoom-in',
        removalDelay: 260,
        gallery: {
            enabled: true
        }
    });
}

async function deletePhoto(id, photoDiv) {
    try {
        const response = await fetch('delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        });

        const result = await response.json();
        if (result.success) {
            photoDiv.remove();
            alert('Zdjęcie zostało usunięte pomyślnie!');
        } else {
            alert('Błąd podczas usuwania zdjęcia.');
        }
    } catch (error) {
        console.error('Error deleting photo:', error);
        alert('Wystąpił błąd podczas usuwania zdjęcia.');
    }
}
