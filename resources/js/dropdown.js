document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('[data-toggle="dropdown"]');
    const dropdownMenu = document.getElementById('dropdown-categories');

    // Aggiunge l'evento al pulsante
    toggleButton.addEventListener('click', () => {
        const isHidden = dropdownMenu.classList.contains('hidden');
        // Nascondi o mostra il dropdown
        if (isHidden) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    });

    // Chiudi il dropdown quando clicchi fuori
    document.addEventListener('click', (event) => {
        if (!toggleButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
});