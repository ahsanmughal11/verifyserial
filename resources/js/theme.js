// Theme Toggle System - Simplified and Robust
(function() {
    'use strict';
    
    const themeKey = 'kbe-theme';
    const lightModeClass = 'light-mode';
    
    // Get saved theme or default to dark
    function getTheme() {
        try {
            return localStorage.getItem(themeKey) || 'dark';
        } catch (e) {
            console.error('Error reading theme:', e);
            return 'dark';
        }
    }
    
    // Set theme
    function setTheme(theme) {
        try {
            localStorage.setItem(themeKey, theme);
            const html = document.documentElement;
            if (theme === 'light') {
                html.classList.add(lightModeClass);
                html.setAttribute('data-theme', 'light');
            } else {
                html.classList.remove(lightModeClass);
                html.setAttribute('data-theme', 'dark');
            }
        } catch (e) {
            console.error('Error setting theme:', e);
        }
    }
    
    // Update toggle button icon
    function updateToggleButton(theme) {
        const icon = document.getElementById('theme-icon');
        if (!icon) {
            console.warn('Theme icon not found');
            return;
        }
        
        // Clear existing content
        icon.innerHTML = '';
        
        if (theme === 'light') {
            // Show moon icon for light mode (click to go dark)
            icon.setAttribute('viewBox', '0 0 24 24');
            icon.setAttribute('fill', 'currentColor');
            icon.innerHTML = '<path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313-12.454z"/>';
        } else {
            // Show sun icon for dark mode (click to go light)
            icon.setAttribute('viewBox', '0 0 24 24');
            icon.setAttribute('fill', 'currentColor');
            icon.innerHTML = '<circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>';
        }
    }
    
    // Toggle theme
    function toggleTheme() {
        console.log('Toggle theme called');
        const currentTheme = getTheme();
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        console.log('Switching from', currentTheme, 'to', newTheme);
        setTheme(newTheme);
        updateToggleButton(newTheme);
    }
    
    // Setup toggle button event listener
    function setupToggleButton() {
        const toggleButton = document.getElementById('theme-toggle');
        if (!toggleButton) {
            console.warn('Theme toggle button not found');
            return false;
        }
        
        // Check if listener is already attached
        if (toggleButton.dataset.listenerAttached === 'true') {
            console.log('Event listener already attached');
            return true;
        }
        
        // Remove onclick attribute if present
        toggleButton.removeAttribute('onclick');
        
        // Add click event listener
        toggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Button clicked');
            toggleTheme();
        }, false);
        
        // Mark as attached
        toggleButton.dataset.listenerAttached = 'true';
        console.log('Event listener attached to theme toggle button');
        return true;
    }
    
    // Initialize everything
    function initialize() {
        console.log('Initializing theme system...');
        try {
            const theme = getTheme();
            console.log('Current theme:', theme);
            setTheme(theme);
            
            // Setup button after a short delay to ensure DOM is ready
            setTimeout(function() {
                updateToggleButton(theme);
                setupToggleButton();
            }, 100);
        } catch (error) {
            console.error('Theme initialization error:', error);
        }
    }
    
    // Multiple initialization strategies to ensure it works
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initialize);
    } else {
        // DOM is already ready
        initialize();
    }
    
    // Fallback initialization after delay
    setTimeout(function() {
        console.log('Fallback initialization...');
        try {
            const theme = getTheme();
            updateToggleButton(theme);
            setupToggleButton();
        } catch (error) {
            console.error('Theme fallback initialization error:', error);
        }
    }, 1000);
    
    // Export toggle function globally for direct calls
    window.toggleTheme = toggleTheme;
    
    // Also expose setup function for manual initialization if needed
    window.setupThemeToggle = setupToggleButton;
    
    console.log('Theme system loaded');
})();
