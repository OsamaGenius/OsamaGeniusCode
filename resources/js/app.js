import './bootstrap';
import '@fortawesome/fontawesome-free/js/fontawesome';
import '@fortawesome/fontawesome-free/js/solid';
import '@fortawesome/fontawesome-free/js/regular'; // Uncomment if needed
import '@fortawesome/fontawesome-free/js/brands'; // Uncomment if needed

// Create a global Alpine store for alerts
Alpine.store('alert', {
    show: false,
    message: '',
    type: 'success',
    trigger(message, type = 'success') {
        this.message = message;
        this.type = type;
        this.show = true;
        setTimeout(() => {
            this.show = false
        }, 3000);
    }
});

// Wait until livewire finishes rendering
document.addEventListener('livewire:navigated', () => console.log('Livewire DOM Ready'));

// Listen for livewire browser events
window.addEventListener('show-alert', event => {
    const {message, type} = event.detail;
    Alpine.store('alert').trigger(message, type);
});

document.addEventListener('livewire:load', function() {
    const modal = new bootstrap.Modal(document.getElementById('social-edit-modal'));
    window.addEventListener('modal:keep-open', () => { modal.show(); });
    window.addEventListener('modal:close', () => { modal.hide(); });
});