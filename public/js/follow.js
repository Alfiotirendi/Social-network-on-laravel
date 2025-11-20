document.querySelectorAll('.follow').forEach(button => {
    button.addEventListener('click', async (e) => {
        const userDiv = e.target.closest('.follower');
        
        if (!userDiv) {
            console.error('Elemento post non trovato');
            return;
        }

        const userId = userDiv.dataset.id;
        
        if (!userId) {
            console.error('ID user non trovato');
            return;
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            if (!csrfToken) {
                throw new Error('Token CSRF non trovato');
            }

            console.log(`Invio richiesta like per il post: ${userId}`);
            
            const response = await fetch(`/footballbook/public/follow/${userId}`, {
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

            // Aggiorna il conteggio dei follower
            const followersCountElement = userDiv.querySelector('.followers-count');
            if (followersCountElement) {
                followersCountElement.textContent = `Followers: ${data.followers_count}`;
            }

            // Cambia il testo del bottone
            if (data.followed) {
                e.target.textContent = 'Segui già';
            } else {
                e.target.textContent = 'Segui';
            }
            
        } catch (error) {
            console.error('Errore completo:', error);
            alert('Errore durante il processo: ' + error.message);
        }
    });
});