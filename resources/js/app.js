/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const conf = window.confirm('Sei sicuro di voler cancellare questo piatto?');
            if (conf) this.submit();
        });
    });