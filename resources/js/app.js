// import Alpine from 'alpinejs'
// window.Alpine = Alpine
// Alpine.start()
// Theme persistence for DaisyUI
document.addEventListener('DOMContentLoaded', function() {
    const themeControllers = document.querySelectorAll('.theme-controller');
    const html = document.documentElement;
    
    // Load saved theme or default to 'dark'
    const savedTheme = localStorage.getItem('theme') || 'dark';
    html.setAttribute('data-theme', savedTheme);
    
    // Set the correct radio button as checked
    themeControllers.forEach(controller => {
        if (controller.value === savedTheme) {
            controller.checked = true;
        }
    });
    
    // Handle theme changes
    themeControllers.forEach(controller => {
        controller.addEventListener('change', function() {
            if (this.checked) {
                const selectedTheme = this.value;
                html.setAttribute('data-theme', selectedTheme);
                localStorage.setItem('theme', selectedTheme);
            }
        });
    });
});