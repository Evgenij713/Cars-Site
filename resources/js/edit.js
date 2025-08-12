import { clearErrors, displayValidationErrors } from './form-validation.js';

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
        // Получаем id из скрытого поля
        const idValue = formData.get('id');
        formData.append('_method', 'PUT');

        // Отправляем запрос
        fetch(route(routeName, {id: idValue}), {
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
                window.location.href = data.redirect;
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
    // Форма автомобиля
    if (document.getElementById('carForm')) {
        handleFormSubmit('carForm', 'cars.show');
    }

    // Форма тега
    if (document.getElementById('tagForm')) {
        handleFormSubmit('tagForm', 'tags.show');
    }

    // Форма марки автомобиля
    if (document.getElementById('brandForm')) {
        handleFormSubmit('brandForm', 'brands.show');
    }

    // Форма страны
    if (document.getElementById('countryForm')) {
        handleFormSubmit('countryForm', 'countries.show');
    }
});
