"use strict";

document.addEventListener('DOMContentLoaded', function () {
    let booksIndexUrlElement = document.getElementById('books-index-url');
    window.sortBooks = function (element) {
        const sortField = element.getAttribute('data-sort-field');
        let sortOrder = element.getAttribute('data-sort-order');

        if (!sortField || !sortOrder) {
            console.error('Sort field or order not found on the element');
            return;
        }

        // Toggle the sort order for the next request
        sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';
        element.setAttribute('data-sort-order', sortOrder);

        const url = `${document.getElementById('books-index-url').value}?sort=${sortField}&order=${sortOrder}`;

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(data => {
                document.getElementById('book-list').innerHTML = data;

                updateSortArrows(sortField, sortOrder);
                initRatings();

            })
            .catch(error => console.error('Error:', error));
    }

    window.updateSortArrows = function (sortField, sortOrder) {
        document.querySelectorAll('.sort-arrow').forEach(arrow => {
            arrow.innerHTML = '';
        });

        const activeSortHeader = document.querySelector(`th a[data-sort-field="${sortField}"]`);

        if (activeSortHeader) {
            const arrowSpan = activeSortHeader.querySelector('.sort-arrow');
            if (arrowSpan) {
                arrowSpan.innerHTML = (sortOrder === 'asc') ? '&#9650;' : '&#9660;';
            }
        }
    }

    function updateBookList() {
        let booksIndexUrl = document.getElementById('books-index-url');
        if (booksIndexUrl) {
            let booksIndexUrlValue = document.getElementById('books-index-url').value;
            fetch(booksIndexUrlValue)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.text();
                })
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, 'text/html');
                    const newBookList = doc.getElementById('book-list');

                    if (newBookList) {
                        const bookList = document.getElementById('book-list');
                        bookList.innerHTML = newBookList.innerHTML;

                        initRatings();

                        // Cloning dynamically loaded styles
                        Array.from(doc.querySelectorAll('style')).forEach(style => {
                            if (!document.head.contains(style)) {
                                document.head.appendChild(style.cloneNode(true));
                            }
                        });

                    } else {
                        console.error('New book list not found in the response');
                    }
                })
                .catch(error => {
                    console.error('Error updating book list:', error);
                });
        }

    }

    //Initial loading of the book list
    updateBookList();

    // //Update the list of books every 10 seconds
    setInterval(updateBookList, 60000);


    let form = document.getElementById('add-book-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(form);

        fetch('/books/add', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.book) {
                    // Show toast and add highlight
                    const toastElement = document.getElementById('success-toast');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastElement);

                    toastElement.classList.add('highlight-toast');
                    toastBootstrap.show();

                    // Remove highlight after animation is complete
                    toastElement.addEventListener('animationend', () => {
                        toastElement.classList.remove('highlight-toast');
                    });

                    // Close the modal window and reset the form
                    const addBookModal = new bootstrap.Modal(document.getElementById('addBookModal'));
                    addBookModal.hide();
                    form.reset();
                    updateBookList(); // We update the list of books without reloading the page
                } else {
                    alert('Failed to add book! Check the entered data.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding a book: ' + error.message);
            });
    });


    document.querySelectorAll('.read-more').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const descriptionText = this.previousElementSibling;

            if (descriptionText.classList.contains('expanded')) {
                descriptionText.classList.remove('expanded');
                this.textContent = 'Read more';
            } else {
                descriptionText.classList.add('expanded');
                this.textContent = 'Read less';
            }
        });
    });

    let showLoginMessageButton = document.getElementById('show-login-message');
    let loginMessage = document.getElementById('login-message');

    if (showLoginMessageButton) {
        showLoginMessageButton.addEventListener('click', function () {
            loginMessage.style.display = 'block';
        });
    }

    function initRatings() {
        const ratings = document.querySelectorAll('.rating');

        ratings.forEach(rating => {
            initRating(rating);
        });

        function initRating(rating) {
            const ratingActive = rating.querySelector('.rating-active');
            const ratingValue = rating.querySelector('.rating-value');
            const initialRating = parseFloat(ratingValue.innerHTML) || 0;
            setRatingActiveWidth(initialRating);

            if (rating.classList.contains('rating-set')) {
                setRating(rating);
            }

            function setRatingActiveWidth(value) {
                const ratingActiveWidth = value > 0 ? value * 20 : 0;
                ratingActive.style.width = `${ratingActiveWidth}%`;
                ratingValue.innerHTML = value < 0.1 ? '' : value.toFixed(1);
            }

            function setRating(rating) {
                const ratingItems = rating.querySelectorAll('.rating-item');
                ratingItems.forEach(item => {
                    item.addEventListener('mouseenter', function () {
                        setRatingActiveWidth(parseFloat(item.value));
                    });

                    item.addEventListener('mouseleave', function () {
                        setRatingActiveWidth(parseFloat(ratingValue.innerHTML) || 0);
                    });

                    item.addEventListener('click', async function () {
                        const bookId = rating.dataset.bookId;
                        const ratingValue = parseFloat(item.value);
                        const ratingToast = document.getElementById('rating-toast');
                        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(ratingToast);
                        try {
                            const response = await fetch(`/books/${bookId}/rate`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({rating: ratingValue})
                            });

                            if (response.ok) {
                                const result = await response.json();

                                if (result.newRating) {
                                    const newRating = parseFloat(result.newRating);
                                    if (!isNaN(newRating)) {
                                        setRatingActiveWidth(newRating);
                                        ratingToast.classList.add('highlight-toast'); // Adding a class for highlighting
                                        toastBootstrap.show(); // Showing a toast
                                        ratingToast.addEventListener('animationend', () => {
                                            ratingToast.classList.remove('highlight-toast'); // Removing the class after animation
                                        });
                                    } else {
                                        alert("Error: Incorrect rating value.");
                                    }
                                } else {
                                    alert("Error: Incorrect server response.");
                                }
                            } else if (response.status === 401) {
                                alert("Only authorized users can rate. Please log in or register.");
                            } else {
                                const errorText = await response.text();
                                alert(`Error: ${errorText}`);
                            }
                        } catch (error) {
                            console.error('Error sending data:', error);
                            alert("Error!");
                        }
                    });
                });
            }
        }
    }

    initRatings();

    const commentForm = document.getElementById('comment-form');
    const commentToast = document.getElementById('comment-toast');
    const toastBootstrap = commentToast ? bootstrap.Toast.getOrCreateInstance(commentToast) : null;

    if (commentForm) {
        commentForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const formData = new FormData(commentForm);
            const bookId = formData.get('book_id');
            const commentContent = formData.get('content');

            if (!bookId) {
                console.error('Book ID is missing.');
                alert('Book ID is missing.');
                return;
            }

            try {
                const response = await fetch(commentForm.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({content: commentContent})
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.success) {
                        const commentList = document.getElementById('comment-list');
                        if (commentList) {
                            const newComment = document.createElement('div');
                            newComment.classList.add('comment');
                            newComment.innerHTML = `
                <p><strong>User ${result.comment.user_id}:</strong> ${result.comment.content}</p>
                <small>Added on: ${new Date(result.comment.created_at).toLocaleString()}</small>
            `;
                            commentList.appendChild(newComment);

                            if (toastBootstrap) {
                                const toastBody = commentToast.querySelector('.toast-body');
                                if (toastBody) {
                                    toastBody.textContent = 'Comment added successfully!';
                                } else {
                                    console.error('Toast body element not found.');
                                }

                                commentToast.classList.add('highlight-toast');
                                toastBootstrap.show();
                            } else {
                                console.error('Toast element not found or not initialized.');
                            }

                            commentForm.reset();
                        } else {
                            console.error('Comment list element not found.');
                            alert('Failed to find comment list element.');
                        }
                    } else {
                        alert(result.message || 'Failed to add comment!');
                    }
                } else {
                    const errorText = await response.text();
                    alert(`Error: ${errorText}`);
                }

            } catch (error) {
                console.error('Error sending data:', error);
                alert("An error occurred while adding the comment.");
            }
        });
    }

    document.getElementById('show-login-message')?.addEventListener('click', () => {
        document.getElementById('login-message').style.display = 'block';
    });

});
