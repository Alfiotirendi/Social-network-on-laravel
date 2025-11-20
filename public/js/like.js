document.querySelectorAll('.like').forEach(button => {
    button.addEventListener('click', async (e) => {
        const postDiv = e.target.closest('.post');
        
        if (!postDiv) {
            console.error('Elemento post non trovato');
            return;
        }

        const postId = postDiv.dataset.id;
        
        if (!postId) {
            console.error('ID post non trovato');
            return;
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            if (!csrfToken) {
                throw new Error('Token CSRF non trovato');
            }

            console.log(`Invio richiesta like per il post: ${postId}`);
            
            const response = await fetch(`/footballbook/public/like/${postId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });
            
            console.log('Status response:', response.status);
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('Response error:', errorText);
                throw new Error(`Errore HTTP: ${response.status} - ${errorText}`);
            }
            
            const data = await response.json();
            console.log('Dati ricevuti:', data);

            // Aggiorna il conteggio dei like
            const likesCountElement = postDiv.querySelector('.likes-count');
            if (likesCountElement) {
                likesCountElement.textContent = `Likes: ${data.likes_count}`;
            }

            // Cambia il testo del bottone
            if (data.liked) {
                e.target.textContent = 'Non mi piace più';
            } else {
                e.target.textContent = 'Mi piace';
            }
            
        } catch (error) {
            console.error('Errore completo:', error);
            alert('Errore durante il processo: ' + error.message);
        }
    });
});