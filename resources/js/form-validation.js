export function displayValidationErrors(errors) {
    // Сначала скроем все сообщения об ошибках
    document.querySelectorAll('.error-message').forEach(el => {
        el.classList.remove('show');
    });

    for (const [field, messages] of Object.entries(errors)) {
        // Обработка обычных полей
        if (!field.includes('.')) {
            const input = document.querySelector(`[name="${field}"]`);
            const errorElement = document.getElementById(`${field}-error`);

            if (input && errorElement) {
                input.classList.add('is-invalid');
                errorElement.textContent = messages.join(', ');
                errorElement.classList.add('show'); // Показываем сообщение об ошибке
            }
        }
        // Обработка ошибок тегов
        else if (field.startsWith('tags.')) {
            // Находим общий элемент ошибок для тегов
            const errorElement = document.getElementById('tags-error');
            if (errorElement) {
                errorElement.textContent = messages.join(', ').replace(/tags\.\d+/g, 'тег');
                errorElement.classList.add('show'); // Показываем сообщение об ошибке

                // Добавляем класс is-invalid ко всем чекбоксам тегов
                document.querySelectorAll('[name="tags[]"]').forEach(el => {
                    el.classList.add('is-invalid');
                });
            }
        }
    }
}

export function clearErrors() {
    // Очищаем все ошибки
    document.querySelectorAll('.error-message').forEach(el => {
        el.textContent = '';
        el.classList.remove('show');
    });

    document.querySelectorAll('.is-invalid').forEach(el => {
        el.classList.remove('is-invalid');
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Маска для VIN-кода
    const vinInput = document.querySelector('#carForm input[name="vin"]');
    if (vinInput) {
        vinInput.addEventListener('input', function(e) {
            // Разрешаем только буквы (латинские) и цифры
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');

            // Ограничиваем длину 17 символами
            if (this.value.length > 17) {
                this.value = this.value.substring(0, 17);
            }
        });
    }
});
