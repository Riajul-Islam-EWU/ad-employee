/* js/app.js */

// Add JavaScript code for the project

// Confirm deletion on delete button click
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-danger');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            const confirmation = confirm('Are you sure you want to delete this customer?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});
