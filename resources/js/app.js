import './bootstrap';
import 'preline';

// Initialize Preline
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Preline components
    if (typeof window.HSStaticMethods !== 'undefined') {
        window.HSStaticMethods.autoInit();
    }
});

// Re-initialize Preline after dynamic content loads (for SPA-like behavior)
document.addEventListener('preline:init', () => {
    // Preline has been initialized
});

// Re-initialize after AJAX requests or dynamic content changes
document.addEventListener('preline:update', () => {
    // Preline components have been updated
});
