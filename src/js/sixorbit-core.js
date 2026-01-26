// ============================================
// SIXORBIT UI - CORE JAVASCRIPT
// Essential components for basic functionality
// ============================================

// Core modules
import './core/so-config.js';
import './core/so-component.js';

// Core components
import './components/so-theme.js';
import './components/so-dropdown.js';
import './components/so-layout.js';
import './components/so-modal.js';
import './components/so-ripple.js';

// Core features
import './features/so-forms.js';

// Auto-initialize core components when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  // Initialize sidebar if present
  const sidebar = document.querySelector('.so-sidebar');
  if (sidebar) {
    SOSidebar.getInstance(sidebar);
  }

  // Initialize navbar if present
  const navbar = document.querySelector('.so-navbar');
  if (navbar) {
    SONavbar.getInstance(navbar);
  }

  // Initialize theme controller if settings exist
  const themeSettings = document.querySelector('.so-navbar-theme');
  if (themeSettings) {
    SOTheme.getInstance(themeSettings);
  }

  // Initialize forms
  SOForms.initAll();

  console.log('SixOrbit UI Core initialized');
});
