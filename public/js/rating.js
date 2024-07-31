document.addEventListener('DOMContentLoaded', function() {
    var ratingContainers = document.querySelectorAll('.rating-stars');

    ratingContainers.forEach(function(container) {
        var stars = container.querySelectorAll('.star');

        stars.forEach(function(star, index) {
            star.addEventListener('click', function() {
                // Очищаем все звезды в контейнере
                stars.forEach(function(s, i) {
                    s.classList.remove('selected');
                });

                // Закрашиваем выбранное количество звезд
                for (var i = 0; i <= index; i++) {
                    stars[i].classList.add('selected');
                }

                // Обновляем скрытое поле с рейтингом
                var ratingValueField = container.parentElement.querySelector('.rating-value');
                if (ratingValueField) {
                    ratingValueField.value = index + 1; // Индексация с нуля, поэтому добавляем 1
                }
            });
        });
    });
});

