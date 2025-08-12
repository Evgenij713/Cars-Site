// Закрытие flash сообщений
document.querySelectorAll('.flash-close-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        const message = e.target.closest('.flash-message');
        hideFlashMessage(message);
    });
});

// Автоматическое скрытие через 5 секунд
document.querySelectorAll('.flash-message').forEach(message => {
    setTimeout(() => {
        hideFlashMessage(message);
    }, 5000);
});

// Функция для плавного скрытия сообщения
function hideFlashMessage(message) {
    if (!message) return;

    // Добавляем класс для анимации скрытия
    message.classList.add('hiding');

    // Удаляем элемент после завершения анимации
    setTimeout(() => {
        message.remove();
    }, 300);
}
