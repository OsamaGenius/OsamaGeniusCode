import './bootstrap';
import '@fortawesome/fontawesome-free/js/fontawesome';
import '@fortawesome/fontawesome-free/js/solid';
import '@fortawesome/fontawesome-free/js/regular'; // Uncomment if needed
import '@fortawesome/fontawesome-free/js/brands'; // Uncomment if needed
import { Chart } from 'chart.js/auto';

window.Chart = Chart;

const description = document.querySelector('#descShow'),
    viewArea = document.querySelector('#viewDesc');

function showDescription() {
    viewArea.innerHTML = description.dataset.description;
}

if(description) {
    setInterval(() => {
        showDescription();
    }, 100);
} else {}

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
        }, 1500);
    }
});

// Wait until livewire finishes rendering
document.addEventListener('livewire:navigated', () => console.log('Livewire DOM Ready'));

// Listen for livewire browser events
window.addEventListener('show-alert', event => {
    const { message, type } = event.detail;
    Alpine.store('alert').trigger(message, type);
});

window.addEventListener('livewire:load', function () {
    const modal = new bootstrap.Modal(document.getElementById('skills-edit-modal'));
    window.addEventListener('modal:keep-open', () => modal.show() );
    window.addEventListener('modal:close', () => modal.hide() );
});

Livewire.on('copy', (text) => {
    if(text !== '') {
        navigator.clipboard.writeText(text).then(() => Livewire.dispatch('show-alert', {message: 'Password copyed successfully'}));
    } else {
        Livewire.dispatch('show-alert', {message: 'Write or generate password first', type: 'error'});
    }
});