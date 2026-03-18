<script>
    // Prevent flash of unstyled content
    (function() {
        const theme = localStorage.getItem('kbe-theme') || 'dark';
        if (theme === 'light') {
            document.documentElement.classList.add('light-mode');
            document.documentElement.setAttribute('data-theme', 'light');
        }
    })();
    
    // Define toggleTheme function immediately so onclick handlers work
    window.toggleTheme = function() {
        const themeKey = 'kbe-theme';
        const lightModeClass = 'light-mode';
        
        function getTheme() {
            try {
                return localStorage.getItem(themeKey) || 'dark';
            } catch (e) {
                return 'dark';
            }
        }
        
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
        
        function updateToggleButton(theme) {
            const icons = [document.getElementById('theme-icon'), document.getElementById('theme-icon-mobile')];
            
            icons.forEach(icon => {
                if (!icon) return;
                
                icon.innerHTML = '';
                
                if (theme === 'light') {
                    icon.setAttribute('viewBox', '0 0 24 24');
                    icon.setAttribute('fill', 'currentColor');
                    icon.removeAttribute('stroke');
                    icon.removeAttribute('stroke-width');
                    icon.removeAttribute('stroke-linecap');
                    icon.innerHTML = '<path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313-12.454z"/>';
                } else {
                    icon.setAttribute('viewBox', '0 0 24 24');
                    icon.setAttribute('fill', 'currentColor');
                    icon.setAttribute('stroke', 'currentColor');
                    icon.setAttribute('stroke-width', '2');
                    icon.setAttribute('stroke-linecap', 'round');
                    icon.innerHTML = '<circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>';
                }
            });
        }
        
        const currentTheme = getTheme();
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
        updateToggleButton(newTheme);
    };

    // Sync icon on initial page load
    document.addEventListener('DOMContentLoaded', function() {
        const theme = localStorage.getItem('kbe-theme') || 'dark';
        const icons = [document.getElementById('theme-icon'), document.getElementById('theme-icon-mobile')];
        
        icons.forEach(icon => {
            if (!icon) return;
            
            icon.innerHTML = '';
            if (theme === 'light') {
                icon.setAttribute('fill', 'currentColor');
                icon.removeAttribute('stroke');
                icon.removeAttribute('stroke-width');
                icon.removeAttribute('stroke-linecap');
                icon.innerHTML = '<path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313-12.454z"/>';
            } else {
                icon.setAttribute('fill', 'currentColor');
                icon.setAttribute('stroke', 'currentColor');
                icon.setAttribute('stroke-width', '2');
                icon.setAttribute('stroke-linecap', 'round');
                icon.innerHTML = '<circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>';
            }
        });
    });
</script>
