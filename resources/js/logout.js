document.getElementById('logoutForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Отправляем запрос
    fetch(route('login.destroy'), {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    window.location.reload();
                }
            }
        })
        .catch(error => {
            if (error.errors) {
            } else {
                console.error('Error:', error);
                alert('Произошла ошибка при отправке формы');
            }
        });
});
