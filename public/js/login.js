// document.addEventListener('DOMContentLoaded', function () {
//
//     document.getElementById('login-form').addEventListener('submit', function (event) {
//         event.preventDefault();
//
//         const email = document.getElementById('email').value;
//         const password = document.getElementById('password').value;
//
//         fetch('/api/login', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({email: email, password: password})
//         })
//             .then(response => response.json())
//             .then(data => {
//                 console.log(data)
//                 if (data.message === 'Authenticated') {
//                     window.location.href = data.redirect;
//                     document.getElementById('greeting').innerText = 'Hello, ' + data.user + '!';
//                 } else {
//                     document.getElementById('error-message').innerText = data.message;
//                 }
//             })
//             .catch(error => console.error('Error:', error));
//     });
// });
