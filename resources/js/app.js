import './bootstrap';
import '@fortawesome/fontawesome-free/js/fontawesome';
import '@fortawesome/fontawesome-free/js/solid';
import '@fortawesome/fontawesome-free/js/regular'; // Uncomment if needed
import '@fortawesome/fontawesome-free/js/brands'; // Uncomment if needed

document.addEventListener('livewire:load', function() {
    const modal = new bootstrap.Modal(document.getElementById('social-edit-modal'));
    window.addEventListener('modal:keep-open', () => { modal.show(); });
    window.addEventListener('modal:close', () => { modal.hide(); });
});