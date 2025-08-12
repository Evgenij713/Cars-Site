import { clearErrors, displayValidationErrors } from './form-validation.js';

// Общая функция обработки формы
function handleFormSubmit(formId, routeName) {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        e.stopPropagation();

        // Очищаем предыдущие ошибки
        clearErrors();

        // Собираем данные формы
        const formData = new FormData(this);

        // Отправляем запрос
        fetch(route(routeName), {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
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
                // Обрабатываем ошибки валидации
                displayValidationErrors(error.errors);
            } else {
                console.error('Error:', error);
                alert('Произошла ошибка при отправке формы');
            }
        });
    });
}

// Инициализация форм после загрузки DOM
document.addEventListener('DOMContentLoaded', function() {
    // Форма авторизации
    if (document.getElementById('authForm')) {
        handleFormSubmit('authForm', 'login.store');
    }

    // Форма регистрации
    if (document.getElementById('registrationForm')) {
        handleFormSubmit('registrationForm', 'registration.store');
    }

    // Форма автомобиля
    if (document.getElementById('carForm')) {
        handleFormSubmit('carForm', 'cars.store');
    }

    // Форма тега
    if (document.getElementById('tagForm')) {
        handleFormSubmit('tagForm', 'tags.store');
    }

    // Форма марки автомобиля
    if (document.getElementById('brandForm')) {
        handleFormSubmit('brandForm', 'brands.store');
    }

    // Форма страны
    if (document.getElementById('countryForm')) {
        handleFormSubmit('countryForm', 'countries.store');
    }

    // Форма комментария
    if (document.getElementById('commentForm')) {
        handleFormSubmit('commentForm', 'comments.store');
    }
});
