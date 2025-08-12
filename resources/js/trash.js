// Копирование VIN по клику
document.querySelectorAll('.car-vin').forEach(vinElement => {
    vinElement.addEventListener('click', function() {
        navigator.clipboard.writeText(this.textContent.trim());
        const originalText = this.textContent;
        this.textContent = 'VIN скопирован!';
        setTimeout(() => {
            this.textContent = originalText;
        }, 2000);
    });
    vinElement.style.cursor = 'pointer';
    vinElement.title = 'Кликните для копирования VIN';
});

// Обработчики для кнопок восстановления
document.querySelectorAll('.btn-restore').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const form = this.closest('form');
        const carId = form.dataset.carId;

        restoreCar(carId, form);
    });
});

// Обработчики для кнопок окончательного удаления
document.querySelectorAll('.btn-delete-permanently').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const form = this.closest('form');
        const carId = form.dataset.carId;
        const carCard = form.closest('.car-card');
        const carMake = carCard.querySelector('.car-make').textContent;
        const carModel = carCard.querySelector('.car-model').textContent;

        // Показываем диалог подтверждения
        showConfirmationDialog(carMake, carModel, () => {
            forceDeleteCar(carId, form, carCard);
        });
    });
});

// Показ диалога подтверждения
function showConfirmationDialog(make, model, confirmCallback) {
    const dialog = document.getElementById('confirmationDialog');
    const message = dialog.querySelector('p');
    const confirmBtn = document.getElementById('confirmDelete');
    const cancelBtn = document.getElementById('cancelDelete');

    // Устанавливаем текст сообщения
    message.textContent = `Вы уверены, что хотите окончательно удалить автомобиль ${make} ${model}? Это действие нельзя отменить.`;

    // Показываем диалог
    dialog.style.display = 'flex';

    // Временные обработчики
    const handleConfirm = () => {
        confirmCallback();
        dialog.style.display = 'none';
        confirmBtn.removeEventListener('click', handleConfirm);
        cancelBtn.removeEventListener('click', handleCancel);
    };

    const handleCancel = () => {
        dialog.style.display = 'none';
        confirmBtn.removeEventListener('click', handleConfirm);
        cancelBtn.removeEventListener('click', handleCancel);
    };

    confirmBtn.addEventListener('click', handleConfirm);
    cancelBtn.addEventListener('click', handleCancel);
}

// Функция восстановления автомобиля
function restoreCar(carId, form) {
    const button = form.querySelector('button');
    const originalText = button.textContent;

    // Показываем индикатор загрузки
    button.disabled = true;
    button.textContent = 'Восстановление...';

    fetch(route('cars.restore', {car: carId}), {
        method: 'PATCH',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            // Обновляем страницу
            window.location.reload();
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
}

// Функция окончательного удаления автомобиля
function forceDeleteCar(carId, form, carCard) {
    const button = form.querySelector('button');
    const originalText = button.textContent;

    // Показываем индикатор загрузки
    button.disabled = true;
    button.textContent = 'Удаление...';

    fetch(route('cars.forceDelete', {car: carId}), {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Ошибка при удалении');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Анимация удаления карточки
            carCard.style.transition = 'all 0.3s ease';
            carCard.style.opacity = '0';
            carCard.style.height = '0';
            carCard.style.margin = '0';
            carCard.style.padding = '0';
            carCard.style.border = 'none';

            // Удаляем карточку из DOM после анимации
            setTimeout(() => {
                carCard.remove();
                // Обновляем страницу после успешного удаления
                window.location.reload();
            }, 300);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при окончательном удалении автомобиля');
        button.disabled = false;
        button.textContent = originalText;
    });
}
