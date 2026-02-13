document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('enableProfileEdit').addEventListener('click', () => {
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const saveBtn = document.getElementById('saveProfileBtn');

        if (saveBtn.style.display === 'none' || saveBtn.style.display === '') {

            nameInput.removeAttribute('readonly');
            emailInput.removeAttribute('readonly');
            nameInput.focus();
            saveBtn.style.display = 'block';
        }
    });

    const buttons = document.querySelectorAll('.togglePasswordForm');
    const passwordFields = document.getElementById('passwordFields');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const isHidden = passwordFields.style.display === 'none' || passwordFields.style.display === '';

            if (isHidden) {
                passwordFields.style.display = 'block';
            } else {
                passwordFields.style.display = 'none';
                passwordFields.querySelectorAll('input').forEach(input => input.value = '');
            }
        });
    });


    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = document.getElementById(targetId + '_icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🔓';
            } else {
                input.type = 'password';
                icon.textContent = '🔒';
            }
        });
    });

});

