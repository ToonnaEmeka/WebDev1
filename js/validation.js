document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const email = form.querySelector('[name="email"]');
            const password = form.querySelector('[name="password"]');

            if (email && !email.value.includes('@')) {
                alert('Please enter a valid email address.');
                e.preventDefault();
            }

            if (password && password.value.length < 6) {
                alert('Password must be at least 6 characters.');
                e.preventDefault();
            }
        });
    });
});
