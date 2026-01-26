/**
 * SixOrbit UI - Form Elements Library
 * JavaScript behaviors for form components
 * Version: 1.0.0
 */

(function() {
    'use strict';

    /**
     * SOForms - Form elements controller
     */
    class SOForms {
        constructor() {
            this.init();
        }

        init() {
            this.initDropdowns();
            this.initSearchableDropdowns();
            this.initOptionsDropdowns();
            this.initOutletDropdowns();
            this.initCheckboxes();
            this.initDocumentClickHandler();
        }

        /**
         * Close all dropdowns
         */
        closeAllDropdowns() {
            // Close custom dropdowns
            document.querySelectorAll('.so-dropdown').forEach(dropdown => {
                dropdown.classList.remove('open');
            });

            // Close searchable dropdowns
            document.querySelectorAll('.so-searchable-dropdown').forEach(dropdown => {
                dropdown.classList.remove('open');
            });

            // Close options dropdowns and remove position classes
            document.querySelectorAll('.so-options-dropdown').forEach(dropdown => {
                dropdown.classList.remove('open', 'position-left', 'position-top');
            });

            // Close outlet dropdowns
            document.querySelectorAll('.so-outlet-dropdown').forEach(dropdown => {
                dropdown.classList.remove('open');
            });
        }

        /**
         * Initialize custom dropdowns
         */
        initDropdowns() {
            document.querySelectorAll('.so-dropdown').forEach(dropdown => {
                const trigger = dropdown.querySelector('.so-dropdown-trigger');
                const menu = dropdown.querySelector('.so-dropdown-menu');

                if (!trigger || !menu) return;

                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();

                    // Close other dropdowns
                    document.querySelectorAll('.so-dropdown').forEach(d => {
                        if (d !== dropdown) d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-searchable-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-options-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('open');
                });

                // Handle option selection
                menu.querySelectorAll('.so-dropdown-item').forEach(item => {
                    item.addEventListener('click', (e) => {
                        e.stopPropagation();

                        const value = item.dataset.value;
                        const text = item.textContent.trim();
                        const selected = trigger.querySelector('.so-dropdown-selected');

                        if (selected) {
                            selected.textContent = text;
                        }

                        // Update selected state
                        menu.querySelectorAll('.so-dropdown-item').forEach(i => {
                            i.classList.remove('selected');
                        });
                        item.classList.add('selected');

                        // Dispatch change event
                        dropdown.dispatchEvent(new CustomEvent('change', {
                            detail: { value, text }
                        }));

                        // Close dropdown
                        dropdown.classList.remove('open');
                    });
                });

                // Prevent dropdown from closing when clicking inside menu
                menu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            });
        }

        /**
         * Initialize searchable dropdowns
         */
        initSearchableDropdowns() {
            document.querySelectorAll('.so-searchable-dropdown').forEach(dropdown => {
                const trigger = dropdown.querySelector('.so-searchable-trigger');
                const menu = dropdown.querySelector('.so-searchable-menu');
                const searchInput = dropdown.querySelector('.so-searchable-input');
                const itemsList = dropdown.querySelector('.so-searchable-items');

                if (!trigger || !menu) return;

                // Store original items for filtering
                const originalItems = itemsList ? Array.from(itemsList.querySelectorAll('.so-searchable-item')) : [];

                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();

                    // Close other dropdowns
                    document.querySelectorAll('.so-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-searchable-dropdown').forEach(d => {
                        if (d !== dropdown) d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-options-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('open');

                    // Focus search input when opened
                    if (dropdown.classList.contains('open') && searchInput) {
                        setTimeout(() => searchInput.focus(), 50);
                    }
                });

                // Search functionality
                if (searchInput && itemsList) {
                    searchInput.addEventListener('input', (e) => {
                        const query = e.target.value.toLowerCase().trim();

                        originalItems.forEach(item => {
                            const text = item.textContent.toLowerCase();
                            if (query === '' || text.includes(query)) {
                                item.style.display = '';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });

                    // Prevent dropdown from closing when typing in search
                    searchInput.addEventListener('click', (e) => {
                        e.stopPropagation();
                    });
                }

                // Handle item selection
                if (itemsList) {
                    itemsList.querySelectorAll('.so-searchable-item').forEach(item => {
                        item.addEventListener('click', (e) => {
                            e.stopPropagation();

                            const value = item.dataset.value;
                            const text = item.textContent.trim();
                            const selected = trigger.querySelector('.so-searchable-selected');

                            if (selected) {
                                selected.textContent = text;
                            }

                            // Update selected state
                            itemsList.querySelectorAll('.so-searchable-item').forEach(i => {
                                i.classList.remove('selected');
                            });
                            item.classList.add('selected');

                            // Clear search input
                            if (searchInput) {
                                searchInput.value = '';
                                // Reset filter
                                originalItems.forEach(i => {
                                    i.style.display = '';
                                });
                            }

                            // Dispatch change event
                            dropdown.dispatchEvent(new CustomEvent('change', {
                                detail: { value, text }
                            }));

                            // Close dropdown
                            dropdown.classList.remove('open');
                        });
                    });
                }

                // Prevent dropdown from closing when clicking inside menu
                menu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            });
        }

        /**
         * Initialize options dropdowns (icon-only menus)
         */
        initOptionsDropdowns() {
            document.querySelectorAll('.so-options-dropdown').forEach(dropdown => {
                const trigger = dropdown.querySelector('.so-options-trigger');
                const menu = dropdown.querySelector('.so-options-menu');

                if (!trigger || !menu) return;

                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();

                    // Close other dropdowns
                    document.querySelectorAll('.so-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-searchable-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-options-dropdown').forEach(d => {
                        if (d !== dropdown) {
                            d.classList.remove('open', 'position-left', 'position-top');
                        }
                    });

                    // Calculate and apply position before opening
                    if (!dropdown.classList.contains('open')) {
                        this.positionOptionsDropdown(dropdown, trigger, menu);
                    }

                    // Toggle current dropdown
                    dropdown.classList.toggle('open');
                });

                // Handle option click
                menu.querySelectorAll('.so-options-item').forEach(item => {
                    item.addEventListener('click', (e) => {
                        e.stopPropagation();

                        const action = item.dataset.action;

                        // Dispatch action event
                        dropdown.dispatchEvent(new CustomEvent('action', {
                            detail: { action, element: item }
                        }));

                        // Close dropdown
                        dropdown.classList.remove('open');
                    });
                });

                // Prevent dropdown from closing when clicking inside menu
                menu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            });
        }

        /**
         * Calculate and apply the best position for options dropdown
         * @param {HTMLElement} dropdown - The dropdown container
         * @param {HTMLElement} trigger - The trigger button
         * @param {HTMLElement} menu - The dropdown menu
         */
        positionOptionsDropdown(dropdown, trigger, menu) {
            // Reset position classes
            dropdown.classList.remove('position-left', 'position-top');

            // Get trigger position and dimensions
            const triggerRect = trigger.getBoundingClientRect();
            const menuWidth = menu.offsetWidth || 180; // Default min-width from CSS
            const menuHeight = menu.offsetHeight || 150; // Approximate height

            // Viewport dimensions
            const viewportWidth = window.innerWidth;
            const viewportHeight = window.innerHeight;

            // Calculate available space
            const spaceRight = viewportWidth - triggerRect.right;
            const spaceLeft = triggerRect.left;
            const spaceBottom = viewportHeight - triggerRect.bottom;
            const spaceTop = triggerRect.top;

            // Determine horizontal position
            // Default is right-aligned (menu opens to the left of trigger's right edge)
            // If not enough space on left side of trigger, open to the right
            if (spaceRight < menuWidth && spaceLeft > menuWidth) {
                // Not enough space on right, but enough on left - keep default (right: 0)
            } else if (spaceRight >= menuWidth) {
                // Enough space on right - open to left (position-left class)
                dropdown.classList.add('position-left');
            }

            // Determine vertical position
            // Default is below trigger
            // If not enough space below, open above
            if (spaceBottom < menuHeight + 10 && spaceTop > menuHeight + 10) {
                dropdown.classList.add('position-top');
            }
        }

        /**
         * Initialize outlet dropdowns (icon + searchable select)
         */
        initOutletDropdowns() {
            document.querySelectorAll('.so-outlet-dropdown').forEach(dropdown => {
                const trigger = dropdown.querySelector('.so-outlet-dropdown-trigger');
                const menu = dropdown.querySelector('.so-outlet-dropdown-menu');
                const searchInput = dropdown.querySelector('.so-outlet-dropdown-search input');
                const itemsList = dropdown.querySelector('.so-outlet-dropdown-list');

                if (!trigger || !menu) return;

                // Store original items for filtering
                const originalItems = itemsList ? Array.from(itemsList.querySelectorAll('.so-outlet-dropdown-item')) : [];

                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();

                    // Close other dropdowns
                    document.querySelectorAll('.so-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-searchable-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-options-dropdown').forEach(d => {
                        d.classList.remove('open');
                    });
                    document.querySelectorAll('.so-outlet-dropdown').forEach(d => {
                        if (d !== dropdown) d.classList.remove('open');
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('open');

                    // Focus search input when opened
                    if (dropdown.classList.contains('open') && searchInput) {
                        setTimeout(() => searchInput.focus(), 50);
                    }
                });

                // Search functionality
                if (searchInput && itemsList) {
                    searchInput.addEventListener('input', (e) => {
                        const query = e.target.value.toLowerCase().trim();

                        originalItems.forEach(item => {
                            const text = item.textContent.toLowerCase();
                            if (query === '' || text.includes(query)) {
                                item.style.display = '';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });

                    // Prevent dropdown from closing when typing in search
                    searchInput.addEventListener('click', (e) => {
                        e.stopPropagation();
                    });
                }

                // Handle item selection
                if (itemsList) {
                    itemsList.querySelectorAll('.so-outlet-dropdown-item').forEach(item => {
                        item.addEventListener('click', (e) => {
                            e.stopPropagation();

                            const value = item.dataset.value;
                            const text = item.querySelector('.outlet-item-text')?.textContent.trim() || item.textContent.trim();
                            const outletText = trigger.querySelector('.outlet-text');

                            if (outletText) {
                                outletText.textContent = text;
                            }

                            // Update selected state
                            itemsList.querySelectorAll('.so-outlet-dropdown-item').forEach(i => {
                                i.classList.remove('selected');
                            });
                            item.classList.add('selected');

                            // Clear search input
                            if (searchInput) {
                                searchInput.value = '';
                                // Reset filter
                                originalItems.forEach(i => {
                                    i.style.display = '';
                                });
                            }

                            // Dispatch change event
                            dropdown.dispatchEvent(new CustomEvent('change', {
                                detail: { value, text }
                            }));

                            // Close dropdown
                            dropdown.classList.remove('open');
                        });
                    });
                }

                // Prevent dropdown from closing when clicking inside menu
                menu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            });
        }

        /**
         * Initialize checkbox behaviors (indeterminate state support)
         */
        initCheckboxes() {
            // Handle checkboxes with data-indeterminate attribute
            document.querySelectorAll('.so-checkbox input[type="checkbox"][data-indeterminate="true"]').forEach(checkbox => {
                checkbox.indeterminate = true;
            });

            // Handle "select all" checkboxes
            document.querySelectorAll('[data-checkbox-group]').forEach(selectAllCheckbox => {
                const groupName = selectAllCheckbox.dataset.checkboxGroup;
                const groupCheckboxes = document.querySelectorAll(`[data-checkbox-member="${groupName}"]`);

                // Select all functionality
                selectAllCheckbox.addEventListener('change', () => {
                    const isChecked = selectAllCheckbox.checked;
                    groupCheckboxes.forEach(cb => {
                        cb.checked = isChecked;
                    });
                    selectAllCheckbox.indeterminate = false;
                });

                // Update "select all" state when individual checkboxes change
                groupCheckboxes.forEach(cb => {
                    cb.addEventListener('change', () => {
                        const checkedCount = Array.from(groupCheckboxes).filter(c => c.checked).length;
                        const totalCount = groupCheckboxes.length;

                        if (checkedCount === 0) {
                            selectAllCheckbox.checked = false;
                            selectAllCheckbox.indeterminate = false;
                        } else if (checkedCount === totalCount) {
                            selectAllCheckbox.checked = true;
                            selectAllCheckbox.indeterminate = false;
                        } else {
                            selectAllCheckbox.checked = false;
                            selectAllCheckbox.indeterminate = true;
                        }
                    });
                });
            });
        }

        /**
         * Document click handler to close dropdowns
         */
        initDocumentClickHandler() {
            document.addEventListener('click', () => {
                this.closeAllDropdowns();
            });

            // Close dropdowns on Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.closeAllDropdowns();
                }
            });
        }

        /**
         * Reinitialize all form elements (useful after dynamic content)
         */
        reinit() {
            this.init();
        }

        /**
         * Create a custom dropdown programmatically
         * @param {Object} options - Dropdown configuration
         * @returns {HTMLElement} The created dropdown element
         */
        static createDropdown(options = {}) {
            const {
                placeholder = 'Select option',
                items = [],
                className = ''
            } = options;

            const dropdown = document.createElement('div');
            dropdown.className = `so-dropdown ${className}`.trim();

            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'so-dropdown-trigger';
            trigger.innerHTML = `
                <span class="so-dropdown-selected">${placeholder}</span>
                <span class="material-icons so-dropdown-arrow">expand_more</span>
            `;

            const menu = document.createElement('div');
            menu.className = 'so-dropdown-menu';

            items.forEach(item => {
                const itemEl = document.createElement('div');
                itemEl.className = 'so-dropdown-item';
                itemEl.dataset.value = item.value;
                itemEl.textContent = item.label;
                if (item.selected) {
                    itemEl.classList.add('selected');
                    trigger.querySelector('.so-dropdown-selected').textContent = item.label;
                }
                menu.appendChild(itemEl);
            });

            dropdown.appendChild(trigger);
            dropdown.appendChild(menu);

            return dropdown;
        }

        /**
         * Create a searchable dropdown programmatically
         * @param {Object} options - Dropdown configuration
         * @returns {HTMLElement} The created dropdown element
         */
        static createSearchableDropdown(options = {}) {
            const {
                placeholder = 'Select option',
                searchPlaceholder = 'Search...',
                items = [],
                className = ''
            } = options;

            const dropdown = document.createElement('div');
            dropdown.className = `so-searchable-dropdown ${className}`.trim();

            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'so-searchable-trigger';
            trigger.innerHTML = `
                <span class="so-searchable-selected">${placeholder}</span>
                <span class="material-icons so-dropdown-arrow">expand_more</span>
            `;

            const menu = document.createElement('div');
            menu.className = 'so-searchable-menu';

            const searchWrapper = document.createElement('div');
            searchWrapper.className = 'so-searchable-search';
            searchWrapper.innerHTML = `
                <span class="material-icons">search</span>
                <input type="text" class="so-searchable-input" placeholder="${searchPlaceholder}">
            `;

            const itemsList = document.createElement('div');
            itemsList.className = 'so-searchable-items';

            items.forEach(item => {
                const itemEl = document.createElement('div');
                itemEl.className = 'so-searchable-item';
                itemEl.dataset.value = item.value;
                itemEl.textContent = item.label;
                if (item.selected) {
                    itemEl.classList.add('selected');
                    trigger.querySelector('.so-searchable-selected').textContent = item.label;
                }
                itemsList.appendChild(itemEl);
            });

            menu.appendChild(searchWrapper);
            menu.appendChild(itemsList);
            dropdown.appendChild(trigger);
            dropdown.appendChild(menu);

            return dropdown;
        }

        /**
         * Create an options dropdown (icon-only menu) programmatically
         * @param {Object} options - Dropdown configuration
         * @returns {HTMLElement} The created dropdown element
         */
        static createOptionsDropdown(options = {}) {
            const {
                icon = 'more_vert',
                items = [],
                className = ''
            } = options;

            const dropdown = document.createElement('div');
            dropdown.className = `so-options-dropdown ${className}`.trim();

            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'so-options-trigger';
            trigger.innerHTML = `<span class="material-icons">${icon}</span>`;

            const menu = document.createElement('div');
            menu.className = 'so-options-menu';

            items.forEach(item => {
                if (item.divider) {
                    const divider = document.createElement('div');
                    divider.className = 'so-options-divider';
                    menu.appendChild(divider);
                } else {
                    const itemEl = document.createElement('div');
                    itemEl.className = `so-options-item ${item.danger ? 'danger' : ''}`.trim();
                    itemEl.dataset.action = item.action || '';
                    itemEl.innerHTML = `
                        ${item.icon ? `<span class="material-icons">${item.icon}</span>` : ''}
                        <span>${item.label}</span>
                    `;
                    menu.appendChild(itemEl);
                }
            });

            dropdown.appendChild(trigger);
            dropdown.appendChild(menu);

            return dropdown;
        }

        /**
         * Create an outlet dropdown (icon + searchable select) programmatically
         * @param {Object} options - Dropdown configuration
         * @returns {HTMLElement} The created dropdown element
         */
        static createOutletDropdown(options = {}) {
            const {
                icon = 'storefront',
                placeholder = 'Select Outlet',
                searchPlaceholder = 'Search outlets...',
                items = [],
                className = '',
                size = '' // 'sm', 'lg', or empty for default
            } = options;

            const dropdown = document.createElement('div');
            let dropdownClass = `so-outlet-dropdown ${className}`.trim();
            if (size === 'sm') dropdownClass += ' so-outlet-sm';
            if (size === 'lg') dropdownClass += ' so-outlet-lg';
            dropdown.className = dropdownClass;

            // Find selected item for initial text
            const selectedItem = items.find(item => item.selected);
            const displayText = selectedItem ? selectedItem.label : placeholder;

            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'so-outlet-dropdown-trigger';
            trigger.innerHTML = `
                <span class="material-icons outlet-icon">${icon}</span>
                <span class="outlet-text">${displayText}</span>
                <span class="material-icons outlet-arrow">expand_more</span>
            `;

            const menu = document.createElement('div');
            menu.className = 'so-outlet-dropdown-menu';

            const searchWrapper = document.createElement('div');
            searchWrapper.className = 'so-outlet-dropdown-search';
            searchWrapper.innerHTML = `
                <input type="text" placeholder="${searchPlaceholder}">
            `;

            const itemsList = document.createElement('div');
            itemsList.className = 'so-outlet-dropdown-list';

            items.forEach(item => {
                const itemEl = document.createElement('div');
                itemEl.className = 'so-outlet-dropdown-item';
                itemEl.dataset.value = item.value;
                if (item.selected) {
                    itemEl.classList.add('selected');
                }
                itemEl.innerHTML = `
                    <span class="outlet-item-text">${item.label}</span>
                    <span class="material-icons check-icon">check</span>
                `;
                itemsList.appendChild(itemEl);
            });

            menu.appendChild(searchWrapper);
            menu.appendChild(itemsList);
            dropdown.appendChild(trigger);
            dropdown.appendChild(menu);

            return dropdown;
        }
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            window.soForms = new SOForms();
        });
    } else {
        window.soForms = new SOForms();
    }

    // Expose class for manual instantiation
    window.SOForms = SOForms;

})();
