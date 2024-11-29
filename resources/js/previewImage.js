window.previewImage = function (event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden'); // Mostra l'immagine se nascosta
        };

        reader.readAsDataURL(input.files[0]); // Legge il file come URL
    } else {
        preview.src = '#';
        preview.classList.add('hidden'); // Nasconde l'immagine se non valida
    }
};
