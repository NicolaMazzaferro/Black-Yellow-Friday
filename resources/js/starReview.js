document.addEventListener('DOMContentLoaded', () => {
    const starsContainer = document.getElementById('rating-stars');
    const stars = starsContainer?.querySelectorAll('svg'); // Seleziona tutte le stelle all'interno del container
    const ratingInput = document.getElementById('rating'); // Campo nascosto per memorizzare la valutazione

    // Funzione per aggiornare il colore delle stelle in base al rating
    const updateStars = (rating) => {
        stars.forEach(star => {
            const starValue = parseInt(star.dataset.star);
            if (starValue <= rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-500');
            } else {
                star.classList.remove('text-yellow-500');
                star.classList.add('text-gray-300');
            }
        });
    };

    // Aggiungi eventi alle stelle
    stars?.forEach(star => {
        star.addEventListener('mouseover', () => {
            const hoverValue = parseInt(star.dataset.star);
            updateStars(hoverValue);
        });

        star.addEventListener('click', () => {
            const selectedRating = parseInt(star.dataset.star);
            ratingInput.value = selectedRating; // Salva la valutazione
            updateStars(selectedRating); // Aggiorna le stelle
        });

        star.addEventListener('mouseout', () => {
            const currentRating = parseInt(ratingInput.value) || 0;
            updateStars(currentRating);
        });
    });

    // Funzione per gestire l'accordion
    window.toggleAccordion = (button) => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');

        // Toggle visibilità del contenuto
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');

        if (!content.classList.contains('hidden')) {
            content.scrollIntoView({ behavior: 'smooth' });
        }
    };

    // Funzione per aprire l'accordion in base all'hash
    const openAccordionByHash = () => {
        const hash = decodeURIComponent(window.location.hash);
        if (hash === '#recensioni') {
            const accordionButton = document.querySelector('button[onclick="toggleAccordion(this)"]');
            if (accordionButton) {
                const content = accordionButton.nextElementSibling;
                const icon = accordionButton.querySelector('svg');

                // Apri l'accordion solo se è chiuso
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                    content.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }
    };

    // Controlla l'hash iniziale al caricamento della pagina
    openAccordionByHash();

    // Aggiungi un evento per rilevare i cambiamenti di hash
    window.addEventListener('hashchange', openAccordionByHash);
});
