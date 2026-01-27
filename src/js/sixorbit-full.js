// ============================================
// SIXORBIT UI - FULL JAVASCRIPT
// Complete framework with all features
// ============================================

// Core modules (SixOrbit global is exposed to window in so-config.js)
import SixOrbit from './core/so-config.js';
import SOComponent from './core/so-component.js';

// Core components
import SOTheme from './components/so-theme.js';
import SODropdown from './components/so-dropdown.js';
import { SOSidebar, SONavbar } from './components/so-layout.js';
import SOModal from './components/so-modal.js';
import SORipple from './components/so-ripple.js';
import SOOtpInput from './components/so-otp.js';
import SOTabs from './components/so-tabs.js';
import SOTooltip from './components/so-tooltip.js';
import SOContextMenu from './components/so-context-menu.js';
import SOProgressButton from './components/so-progress-button.js';
import SOButtonGroup from './components/so-button-group.js';
import SOAlert from './components/so-alert.js';
import SOToast from './components/so-toast.js';
import SOSelect from './components/so-select.js';
import SOTable from './components/so-table.js';
import SOPagination from './components/so-pagination.js';

// Features
import SOForms from './features/so-forms.js';
import SOSearchOverlay from './features/so-search.js';
import { SOFeatureCarousel, SOAuth } from './features/so-auth.js';

// Auto-initialize all components when DOM is ready
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

  // Initialize search overlay if present
  const searchOverlay = document.querySelector('.so-search-overlay');
  if (searchOverlay) {
    new SOSearchOverlay(document.body);
  }

  // Initialize OTP inputs if present
  document.querySelectorAll('.so-otp-group').forEach(el => {
    SOOtpInput.getInstance(el);
  });

  // Initialize tooltips
  SOTooltip.initAll();

  // Initialize dropdowns
  SODropdown.initAll();

  // Initialize tabs
  SOTabs.initAll();

  // Initialize button groups
  SOButtonGroup.initAll();

  // Initialize progress buttons
  SOProgressButton.initAll();

  // Initialize dismissible alerts
  SOAlert.initAll();

  // Initialize custom selects
  SOSelect.initAll();

  // Initialize tables
  SOTable.initAll();

  // Initialize pagination
  SOPagination.initAll();

  console.log('SixOrbit UI Full initialized');
});

// Export everything for ES modules
export {
  SixOrbit,
  SOComponent,
  SOTheme,
  SODropdown,
  SOSidebar,
  SONavbar,
  SOModal,
  SORipple,
  SOOtpInput,
  SOTabs,
  SOTooltip,
  SOContextMenu,
  SOProgressButton,
  SOButtonGroup,
  SOAlert,
  SOToast,
  SOSelect,
  SOTable,
  SOPagination,
  SOForms,
  SOSearchOverlay,
  SOFeatureCarousel,
  SOAuth,
};

export default SixOrbit;
