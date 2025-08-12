// Глобальные переменные для хранения текущего элемента
let currentDeleteForm = null;
let currentDeleteRoute = null;

// Показать диалог подтверждения
function showConfirmation(form, route, message) {
    const dialog = document.getElementById('confirmationDialog');
    const messageElement = dialog.querySelector('#confirmationMessage');

    messageElement.textContent = message;
    currentDeleteForm = form;
    currentDeleteRoute = route;
    dialog.style.display = 'flex';
}

// Скрыть диалог подтверждения
function hideConfirmation() {
    document.getElementById('confirmationDialog').style.display = 'none';
    currentDeleteForm = null;
    currentDeleteRoute = null;
}

// Обработка подтверждения удаления
function confirmDelete() {
    if (!currentDeleteForm || !currentDeleteRoute) return;

    const formData = new FormData(currentDeleteForm);
    const idValue = formData.get('id');
    formData.append('_method', 'DELETE');

    fetch(route(currentDeleteRoute, {id: idValue}), {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
        .then(response => {
            if (!response.ok) throw new Error('Ошибка при удалении');
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
            console.error('Error:', error);
            alert('Произошла ошибка при удалении.');
            hideConfirmation();
        });
}

// Инициализация после загрузки DOM
document.addEventListener('DOMContentLoaded', function() {
    // Обработчики для кнопок удаления автомобилей
    document.querySelectorAll('.carForm').forEach(form => {
        const deleteBtn = form.querySelector('.delete-button');
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const carBrand = document.getElementById('carBrand').textContent;
            const carModel = document.getElementById('carModel').textContent;
            showConfirmation(form, 'cars.destroy', `Вы уверены, что хотите удалить автомобиль ${carBrand} ${carModel}?`);
        });
    });

    // Обработчики для кнопок удаления тега
    document.querySelectorAll('.tagForm').forEach(form => {
        const deleteBtn = form.querySelector('.delete-button');
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const tagTitle = form.closest('.card.item').querySelector('.card-title').textContent;
            showConfirmation(form, 'tags.destroy', `Вы уверены, что хотите удалить тег "${tagTitle}"?`);
        });
    });

    // Обработчики для кнопок удаления марки автомобиля
    document.querySelectorAll('.brandForm').forEach(form => {
        const deleteBtn = form.querySelector('.delete-button');
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const brandTitle = form.closest('.card.item').querySelector('.card-title').textContent;
            showConfirmation(form, 'brands.destroy', `Вы уверены, что хотите удалить марку автомобиля "${brandTitle}"?`);
        });
    });

    // Обработчики для кнопок удаления страны
    document.querySelectorAll('.countryForm').forEach(form => {
        const deleteBtn = form.querySelector('.delete-button');
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const countryTitle = form.closest('.card.item').querySelector('.card-title').textContent;
            showConfirmation(form, 'countries.destroy', `Вы уверены, что хотите удалить страну "${countryTitle}"?`);
        });
    });

    // Обработчики для диалога подтверждения
    const confirmBtn = document.getElementById('confirmDelete') || document.querySelector('#confirmationDialog .delete-button');
    const cancelBtn = document.getElementById('cancelDelete') || document.getElementById('cancelButton') || document.querySelector('#confirmationDialog .back-button');

    confirmBtn?.addEventListener('click', confirmDelete);
    cancelBtn?.addEventListener('click', hideConfirmation);
});
