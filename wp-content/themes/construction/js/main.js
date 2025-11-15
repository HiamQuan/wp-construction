// Dark/Light Mode Toggle
(function () {
  'use strict';

  // Check for saved theme preference or default to light mode
  const currentTheme = localStorage.getItem('theme') || 'light';
  const htmlElement = document.documentElement;

  // Apply saved theme on page load
  if (currentTheme === 'dark') {
    htmlElement.classList.add('dark-mode');
  }

  // Initialize toggle button
  function initDarkModeToggle() {
    const toggleButton = document.getElementById('dark-mode-toggle');

    if (!toggleButton) {
      return;
    }

    // Update button icon based on current theme
    updateToggleIcon();

    // Toggle theme on button click
    toggleButton.addEventListener('click', function () {
      const isDarkMode = htmlElement.classList.toggle('dark-mode');

      // Save preference to localStorage
      localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

      // Update button icon
      updateToggleIcon();
    });
  }

  // Update toggle button icon
  function updateToggleIcon() {
    const toggleButton = document.getElementById('dark-mode-toggle');

    if (!toggleButton) {
      return;
    }

    const icon = toggleButton.querySelector('i');

    if (!icon) {
      return;
    }

    const isDarkMode = htmlElement.classList.contains('dark-mode');

    if (isDarkMode) {
      icon.className = 'fas fa-sun';
      toggleButton.setAttribute('aria-label', 'switch to light mode');
      toggleButton.title = 'switch to light mode';
    } else {
      icon.className = 'fas fa-moon';
      toggleButton.setAttribute('aria-label', 'switch to dark mode');
      toggleButton.title = 'switch to dark mode';
    }
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDarkModeToggle);
  } else {
    initDarkModeToggle();
  }
}());

