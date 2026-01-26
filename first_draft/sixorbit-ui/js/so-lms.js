/**
 * SixOrbit LMS - Learning Management System
 * Video tutorials, courses, quizzes, and report cards
 * Version: 1.0.0
 */

// ============================================
// LMS Data Service
// ============================================
class LMSDataService {
    constructor() {
        this.courses = [];
        this.categories = [];
        this.progress = this.loadProgress();
    }

    async loadCourses() {
        try {
            const response = await fetch('data/courses.json');
            const data = await response.json();
            this.categories = data.categories;
            this.courses = data.courses;
            return data;
        } catch (error) {
            console.error('Error loading courses:', error);
            return { categories: [], courses: [] };
        }
    }

    loadProgress() {
        try {
            const saved = localStorage.getItem('so-lms-progress');
            return saved ? JSON.parse(saved) : {
                courses: {},
                categoryProgress: {}
            };
        } catch (e) {
            return { courses: {}, categoryProgress: {} };
        }
    }

    saveProgress() {
        try {
            localStorage.setItem('so-lms-progress', JSON.stringify(this.progress));
        } catch (e) {
            console.error('Error saving progress:', e);
        }
    }

    getCourseProgress(courseId) {
        return this.progress.courses[courseId] || {
            status: 'not_started',
            completedLessons: [],
            completedTasks: [],
            progress: 0,
            quizAttempts: [],
            bestScore: 0
        };
    }

    updateCourseProgress(courseId, updates) {
        if (!this.progress.courses[courseId]) {
            this.progress.courses[courseId] = {
                status: 'not_started',
                completedLessons: [],
                completedTasks: [],
                progress: 0,
                quizAttempts: [],
                bestScore: 0
            };
        }
        Object.assign(this.progress.courses[courseId], updates);
        this.saveProgress();
        this.updateCategoryProgress();
    }

    markLessonComplete(courseId, lessonId) {
        const courseProgress = this.getCourseProgress(courseId);
        if (!courseProgress.completedLessons.includes(lessonId)) {
            courseProgress.completedLessons.push(lessonId);
        }

        const course = this.courses.find(c => c.id === courseId);
        if (course) {
            const totalItems = course.lessons.length;
            const completedItems = courseProgress.completedLessons.length + courseProgress.completedTasks.length;
            courseProgress.progress = Math.round((completedItems / totalItems) * 100);

            if (courseProgress.status === 'not_started') {
                courseProgress.status = 'in_progress';
            }
        }

        this.updateCourseProgress(courseId, courseProgress);
    }

    markTaskComplete(courseId, taskId) {
        const courseProgress = this.getCourseProgress(courseId);
        if (!courseProgress.completedTasks.includes(taskId)) {
            courseProgress.completedTasks.push(taskId);
        }

        const course = this.courses.find(c => c.id === courseId);
        if (course) {
            const totalItems = course.lessons.length;
            const completedItems = courseProgress.completedLessons.length + courseProgress.completedTasks.length;
            courseProgress.progress = Math.round((completedItems / totalItems) * 100);
        }

        this.updateCourseProgress(courseId, courseProgress);
    }

    saveQuizAttempt(courseId, score, passed) {
        const courseProgress = this.getCourseProgress(courseId);
        courseProgress.quizAttempts.push({ score, passed, date: new Date().toISOString() });

        if (score > courseProgress.bestScore) {
            courseProgress.bestScore = score;
        }

        if (passed) {
            courseProgress.status = 'completed';
        }

        this.updateCourseProgress(courseId, courseProgress);
    }

    updateCategoryProgress() {
        const categoryStats = {};

        this.categories.forEach(cat => {
            categoryStats[cat.id] = { completed: 0, total: 0, totalScore: 0, quizCount: 0 };
        });

        this.courses.forEach(course => {
            const catId = course.categoryId;
            if (categoryStats[catId]) {
                categoryStats[catId].total++;

                const progress = this.getCourseProgress(course.id);
                if (progress.status === 'completed') {
                    categoryStats[catId].completed++;
                }
                if (progress.bestScore > 0) {
                    categoryStats[catId].totalScore += progress.bestScore;
                    categoryStats[catId].quizCount++;
                }
            }
        });

        Object.keys(categoryStats).forEach(catId => {
            const stats = categoryStats[catId];
            this.progress.categoryProgress[catId] = {
                completed: stats.completed,
                total: stats.total,
                averageScore: stats.quizCount > 0 ? Math.round(stats.totalScore / stats.quizCount) : 0
            };
        });

        this.saveProgress();
    }

    getCoursesByCategory(categoryId) {
        if (categoryId === 'all') {
            return this.courses;
        }
        return this.courses.filter(c => c.categoryId === categoryId);
    }

    getCourse(courseId) {
        return this.courses.find(c => c.id === courseId);
    }

    getCategory(categoryId) {
        return this.categories.find(c => c.id === categoryId);
    }

    calculateGrade(score) {
        if (score >= 90) return 'A';
        if (score >= 80) return 'B';
        if (score >= 70) return 'C';
        if (score >= 60) return 'D';
        return 'F';
    }

    getOverallStats() {
        let totalCompleted = 0;
        let totalCourses = this.courses.length;
        let totalScore = 0;
        let quizCount = 0;

        this.courses.forEach(course => {
            const progress = this.getCourseProgress(course.id);
            if (progress.status === 'completed') {
                totalCompleted++;
            }
            if (progress.bestScore > 0) {
                totalScore += progress.bestScore;
                quizCount++;
            }
        });

        const averageScore = quizCount > 0 ? Math.round(totalScore / quizCount) : 0;

        return {
            completed: totalCompleted,
            total: totalCourses,
            averageScore,
            grade: this.calculateGrade(averageScore)
        };
    }

    // Parse duration string like "5:30" or "10:15" to seconds
    parseDuration(durationStr) {
        if (!durationStr) return 0;
        const parts = durationStr.split(':');
        if (parts.length === 2) {
            return parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
        }
        return 0;
    }

    // Format seconds to "Xm Ys" or "Xh Ym" format
    formatDuration(seconds) {
        if (seconds < 60) return `${seconds}s`;
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        if (mins < 60) {
            return secs > 0 ? `${mins}m ${secs}s` : `${mins}m`;
        }
        const hours = Math.floor(mins / 60);
        const remainingMins = mins % 60;
        return remainingMins > 0 ? `${hours}h ${remainingMins}m` : `${hours}h`;
    }

    // Get time-based completion stats for a course
    getCourseTimeStats(courseId) {
        const course = this.getCourse(courseId);
        if (!course) return { completedTime: 0, totalTime: 0, percentage: 0 };

        const progress = this.getCourseProgress(courseId);
        let totalTime = 0;
        let completedTime = 0;

        course.lessons.forEach(lesson => {
            if (lesson.type === 'video') {
                const lessonTime = this.parseDuration(lesson.duration);
                totalTime += lessonTime;
                if (progress.completedLessons.includes(lesson.id)) {
                    completedTime += lessonTime;
                }
            } else if (lesson.type === 'task') {
                // Estimate task time as 5 minutes per task
                const taskTime = 5 * 60;
                totalTime += taskTime;
                if (progress.completedTasks.includes(lesson.id)) {
                    completedTime += taskTime;
                }
            }
        });

        const percentage = totalTime > 0 ? Math.round((completedTime / totalTime) * 100) : 0;

        return {
            completedTime,
            totalTime,
            percentage,
            completedFormatted: this.formatDuration(completedTime),
            totalFormatted: this.formatDuration(totalTime)
        };
    }
}

// ============================================
// LMS Router
// ============================================
class LMSRouter {
    constructor(lms) {
        this.lms = lms;
        this.routes = {
            'catalog': () => this.lms.showCatalog(),
            'course': (id) => this.lms.showCourse(id),
            'lesson': (courseId, lessonId) => this.lms.showLesson(courseId, lessonId),
            'task': (courseId, taskId) => this.lms.showTask(courseId, taskId),
            'quiz': (courseId) => this.lms.showQuiz(courseId),
            'report-card': () => this.lms.showReportCard()
        };

        window.addEventListener('hashchange', () => this.handleRoute());
    }

    handleRoute() {
        const hash = window.location.hash.slice(1) || 'catalog';
        const parts = hash.split('/');
        const route = parts[0];
        const params = parts.slice(1);

        if (this.routes[route]) {
            this.routes[route](...params);
        } else {
            this.routes['catalog']();
        }
    }

    navigate(path) {
        window.location.hash = path;
    }
}

// ============================================
// LMS Catalog View
// ============================================
class LMSCatalogView {
    constructor(lms) {
        this.lms = lms;
        this.currentCategory = 'all';
        this.searchQuery = '';
        this.searchDebounceTimer = null;
        this.viewMode = localStorage.getItem('so-lms-view-mode') || 'grid';
        this.filterMenuOpen = false;
    }

    getCurrentCategoryName() {
        const data = this.lms.dataService;
        if (this.currentCategory === 'all') return 'All Categories';
        const cat = data.getCategory(this.currentCategory);
        return cat ? cat.name : 'All Categories';
    }

    render() {
        const container = document.getElementById('lmsContainer');
        const data = this.lms.dataService;

        container.innerHTML = `
            <div class="so-lms-header-panel">
                <div class="so-lms-header-top">
                    <h1 class="so-lms-page-title">
                        <span class="material-icons">school</span>
                        Video Tutorials
                    </h1>
                    <div class="so-lms-header-actions">
                        <a href="#report-card" class="so-btn so-btn-outline so-btn-sm">
                            <span class="material-icons">assessment</span>
                            Report Card
                        </a>
                    </div>
                </div>

                <div class="so-lms-search-bar">
                    <div class="so-lms-search-wrapper">
                        <span class="material-icons so-lms-search-icon">search</span>
                        <input type="text"
                               class="so-lms-search-input"
                               id="courseSearchInput"
                               placeholder="Search courses..."
                               value="${this.escapeHtml(this.searchQuery)}">
                        <button class="so-lms-search-clear ${this.searchQuery ? 'visible' : ''}" id="searchClearBtn" type="button" title="Clear search">
                            <span class="material-icons">close</span>
                        </button>
                    </div>

                    <div class="so-lms-controls">
                        <div class="so-lms-filter-dropdown" id="categoryFilter">
                            <button class="so-lms-filter-btn" id="filterBtn">
                                <span class="material-icons filter-icon">filter_list</span>
                                <span id="filterLabel">${this.getCurrentCategoryName()}</span>
                                <span class="material-icons">expand_more</span>
                            </button>
                            <div class="so-lms-filter-menu" id="filterMenu">
                                <div class="so-lms-filter-option ${this.currentCategory === 'all' ? 'active' : ''}" data-category="all">
                                    <span class="material-icons">apps</span>
                                    All Categories
                                    <span class="filter-badge">${data.courses.length}</span>
                                </div>
                                ${data.categories.map(cat => {
                                    const courseCount = data.courses.filter(c => c.categoryId === cat.id).length;
                                    return `
                                        <div class="so-lms-filter-option ${this.currentCategory === cat.id ? 'active' : ''}" data-category="${cat.id}">
                                            <span class="material-icons">${cat.icon}</span>
                                            ${cat.name}
                                            <span class="filter-badge">${courseCount}</span>
                                        </div>
                                    `;
                                }).join('')}
                            </div>
                        </div>

                        <div class="so-lms-view-toggle">
                            <button class="so-lms-view-btn ${this.viewMode === 'grid' ? 'active' : ''}" data-view="grid" title="Grid View">
                                <span class="material-icons">grid_view</span>
                            </button>
                            <button class="so-lms-view-btn ${this.viewMode === 'list' ? 'active' : ''}" data-view="list" title="List View">
                                <span class="material-icons">view_list</span>
                            </button>
                        </div>
                    </div>

                    <div class="so-lms-search-stats" id="searchStats">
                        <strong>${data.courses.length}</strong> courses
                    </div>
                </div>
            </div>

            <div class="so-lms-course-grid ${this.viewMode === 'list' ? 'list-view' : ''}" id="courseGrid">
                ${this.renderCourseCards(this.getFilteredCourses())}
            </div>
        `;

        this.attachEventListeners();

        // Focus search if there was a previous query
        if (this.searchQuery) {
            const searchInput = document.getElementById('courseSearchInput');
            if (searchInput) {
                searchInput.focus();
                searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
            }
        }
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    highlightText(text, query) {
        if (!query) return this.escapeHtml(text);

        const escapedQuery = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        const regex = new RegExp(`(${escapedQuery})`, 'gi');
        return this.escapeHtml(text).replace(regex, '<span class="so-lms-highlight">$1</span>');
    }

    getFilteredCourses() {
        const data = this.lms.dataService;
        let courses = data.getCoursesByCategory(this.currentCategory);

        if (this.searchQuery.trim()) {
            const query = this.searchQuery.toLowerCase().trim();
            courses = courses.filter(course => {
                const category = data.getCategory(course.categoryId);
                const categoryName = category ? category.name.toLowerCase() : '';

                return course.title.toLowerCase().includes(query) ||
                       course.description.toLowerCase().includes(query) ||
                       categoryName.includes(query);
            });
        }

        return courses;
    }

    updateSearchResults() {
        const courses = this.getFilteredCourses();
        const grid = document.getElementById('courseGrid');
        const stats = document.getElementById('searchStats');

        if (grid) {
            grid.className = `so-lms-course-grid ${this.viewMode === 'list' ? 'list-view' : ''}`;
            grid.innerHTML = this.renderCourseCards(courses);
            this.attachCourseCardListeners();
        }

        if (stats) {
            if (this.searchQuery.trim()) {
                const totalInCategory = this.lms.dataService.getCoursesByCategory(this.currentCategory).length;
                stats.innerHTML = `<strong>${courses.length}</strong> of ${totalInCategory} match`;
            } else {
                const total = this.lms.dataService.getCoursesByCategory(this.currentCategory).length;
                stats.innerHTML = `<strong>${total}</strong> courses`;
            }
        }

        // Update clear button visibility
        const clearBtn = document.getElementById('searchClearBtn');
        if (clearBtn) {
            clearBtn.classList.toggle('visible', this.searchQuery.length > 0);
        }

        // Update filter label
        const filterLabel = document.getElementById('filterLabel');
        if (filterLabel) {
            filterLabel.textContent = this.getCurrentCategoryName();
        }

        // Update filter options active state
        document.querySelectorAll('.so-lms-filter-option').forEach(opt => {
            opt.classList.toggle('active', opt.dataset.category === this.currentCategory);
        });
    }

    renderCourseCards(courses) {
        if (courses.length === 0) {
            const isSearching = this.searchQuery.trim().length > 0;
            return `
                <div class="so-lms-empty-state" style="grid-column: 1 / -1;">
                    <div class="so-lms-empty-icon">
                        <span class="material-icons">${isSearching ? 'search_off' : 'school'}</span>
                    </div>
                    <h3 class="so-lms-empty-title">${isSearching ? 'No Results Found' : 'No Courses Found'}</h3>
                    <p class="so-lms-empty-text">
                        ${isSearching
                            ? `No courses match "${this.escapeHtml(this.searchQuery)}". Try a different search term.`
                            : 'No courses available in this category yet.'}
                    </p>
                    ${isSearching ? `
                        <button class="so-btn so-btn-outline" id="clearSearchBtn" style="margin-top: 16px;">
                            <span class="material-icons">clear</span>
                            Clear Search
                        </button>
                    ` : ''}
                </div>
            `;
        }

        return courses.map(course => {
            const progress = this.lms.dataService.getCourseProgress(course.id);
            const category = this.lms.dataService.getCategory(course.categoryId);
            const lessonCount = course.lessons.filter(l => l.type === 'video').length;
            const taskCount = course.lessons.filter(l => l.type === 'task').length;

            let statusClass = 'not-started';
            let statusText = 'Not Started';
            let statusIcon = 'radio_button_unchecked';

            if (progress.status === 'completed') {
                statusClass = 'completed';
                statusText = 'Completed';
                statusIcon = 'check_circle';
            } else if (progress.status === 'in_progress') {
                statusClass = 'in-progress';
                statusText = 'In Progress';
                statusIcon = 'pending';
            }

            // Highlight search terms in title and description
            const highlightedTitle = this.highlightText(course.title, this.searchQuery);
            const highlightedDescription = this.highlightText(course.description, this.searchQuery);

            return `
                <div class="so-lms-course-card" data-course-id="${course.id}">
                    <div class="so-lms-course-thumbnail">
                        <img src="${course.thumbnail}" alt="${course.title}" onerror="this.src='https://via.placeholder.com/400x225/1a73e8/ffffff?text=Course'">
                        <div class="so-lms-thumbnail-overlay">
                            <div class="so-lms-thumbnail-stats">
                                <span><span class="material-icons">play_circle</span> ${lessonCount} lessons</span>
                                <span><span class="material-icons">schedule</span> ${course.duration}</span>
                            </div>
                        </div>
                    </div>
                    <div class="so-lms-course-content">
                        <div class="so-lms-course-header">
                            <h3 class="so-lms-course-title">${highlightedTitle}</h3>
                            <span class="so-lms-category-badge" style="background: ${category.color}20; color: ${category.color};">
                                <span class="material-icons">${category.icon}</span>
                                ${category.name}
                            </span>
                        </div>
                        <p class="so-lms-course-description">${highlightedDescription}</p>
                        <div class="so-lms-course-footer">
                            <div class="so-lms-progress-wrapper">
                                <div class="so-lms-progress-bar">
                                    <div class="so-lms-progress-fill" style="width: ${progress.progress}%"></div>
                                </div>
                                <div class="so-lms-progress-text">${progress.progress}% complete</div>
                            </div>
                            <span class="so-lms-status-badge ${statusClass}">
                                <span class="material-icons">${statusIcon}</span>
                                ${statusText}
                            </span>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    filterByCategory(categoryId) {
        this.currentCategory = categoryId;
        this.updateSearchResults();
    }

    clearSearch() {
        this.searchQuery = '';
        const searchInput = document.getElementById('courseSearchInput');
        if (searchInput) {
            searchInput.value = '';
        }
        this.updateSearchResults();
    }

    attachEventListeners() {
        // Search input
        const searchInput = document.getElementById('courseSearchInput');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                // Debounce search
                clearTimeout(this.searchDebounceTimer);
                this.searchDebounceTimer = setTimeout(() => {
                    this.searchQuery = e.target.value;
                    this.updateSearchResults();
                }, 200);
            });

            // Handle Enter key
            searchInput.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.clearSearch();
                    searchInput.blur();
                }
            });
        }

        // Clear search button
        const clearBtn = document.getElementById('searchClearBtn');
        if (clearBtn) {
            clearBtn.addEventListener('click', () => {
                this.clearSearch();
                searchInput?.focus();
            });
        }

        // Category filter dropdown
        const filterBtn = document.getElementById('filterBtn');
        const filterMenu = document.getElementById('filterMenu');
        if (filterBtn && filterMenu) {
            filterBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.filterMenuOpen = !this.filterMenuOpen;
                filterMenu.classList.toggle('open', this.filterMenuOpen);
            });

            // Close on outside click
            document.addEventListener('click', () => {
                this.filterMenuOpen = false;
                filterMenu.classList.remove('open');
            });

            // Filter options
            document.querySelectorAll('.so-lms-filter-option').forEach(opt => {
                opt.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.filterByCategory(opt.dataset.category);
                    this.filterMenuOpen = false;
                    filterMenu.classList.remove('open');
                });
            });
        }

        // View toggle
        document.querySelectorAll('.so-lms-view-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                this.viewMode = btn.dataset.view;
                localStorage.setItem('so-lms-view-mode', this.viewMode);

                // Update button states
                document.querySelectorAll('.so-lms-view-btn').forEach(b => {
                    b.classList.toggle('active', b.dataset.view === this.viewMode);
                });

                // Update grid class
                const grid = document.getElementById('courseGrid');
                if (grid) {
                    grid.className = `so-lms-course-grid ${this.viewMode === 'list' ? 'list-view' : ''}`;
                }
            });
        });

        this.attachCourseCardListeners();
    }

    attachCourseCardListeners() {
        document.querySelectorAll('.so-lms-course-card').forEach(card => {
            card.addEventListener('click', () => {
                const courseId = card.dataset.courseId;
                this.lms.router.navigate(`course/${courseId}`);
            });
        });

        // Clear search button in empty state
        const clearSearchBtn = document.getElementById('clearSearchBtn');
        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', () => {
                this.clearSearch();
                document.getElementById('courseSearchInput')?.focus();
            });
        }
    }
}

// ============================================
// LMS Course View
// ============================================
class LMSCourseView {
    constructor(lms) {
        this.lms = lms;
    }

    render(courseId) {
        const course = this.lms.dataService.getCourse(courseId);
        if (!course) {
            this.lms.router.navigate('catalog');
            return;
        }

        const category = this.lms.dataService.getCategory(course.categoryId);
        const progress = this.lms.dataService.getCourseProgress(courseId);
        const timeStats = this.lms.dataService.getCourseTimeStats(courseId);
        const container = document.getElementById('lmsContainer');

        const lessonCount = course.lessons.filter(l => l.type === 'video').length;
        const taskCount = course.lessons.filter(l => l.type === 'task').length;
        const completedCount = progress.completedLessons.length + progress.completedTasks.length;

        container.innerHTML = `
            <div class="so-lms-course-detail">
                <div class="so-lms-course-main">
                    <div class="so-lms-course-banner">
                        <img src="${course.thumbnail}" alt="${course.title}" onerror="this.src='https://via.placeholder.com/800x340/1a73e8/ffffff?text=Course'">
                        <div class="so-lms-course-banner-overlay">
                            <h1 class="so-lms-course-banner-title">${course.title}</h1>
                            <div class="so-lms-course-banner-meta">
                                <span><span class="material-icons">play_circle</span> ${lessonCount} videos</span>
                                <span><span class="material-icons">assignment</span> ${taskCount} tasks</span>
                                <span><span class="material-icons">schedule</span> ${course.duration}</span>
                                <span><span class="material-icons">quiz</span> Final Quiz</span>
                            </div>
                        </div>
                    </div>
                    <div class="so-lms-course-info">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                            <span class="so-lms-category-badge" style="background: ${category.color}20; color: ${category.color};">
                                <span class="material-icons">${category.icon}</span>
                                ${category.name}
                            </span>
                        </div>
                        <h3>About This Course</h3>
                        <p>${course.description}</p>

                        ${progress.status === 'completed' ? `
                            <div style="margin-top: 20px; padding: 16px; background: rgba(52, 168, 83, 0.1); border-radius: 8px; display: flex; align-items: center; gap: 12px;">
                                <span class="material-icons" style="color: var(--so-accent-success); font-size: 32px;">verified</span>
                                <div>
                                    <div style="font-weight: 600; color: var(--so-accent-success);">Course Completed!</div>
                                    <div style="font-size: 13px; color: var(--so-text-secondary);">Your best score: ${progress.bestScore}%</div>
                                </div>
                            </div>
                        ` : ''}
                    </div>
                </div>

                <div class="so-lms-lesson-sidebar">
                    <div class="so-lms-lesson-header">
                        <h3>Course Content</h3>
                        <div class="so-lms-lesson-progress">${completedCount} of ${course.lessons.length} completed</div>
                        <div class="so-lms-time-progress" style="margin-top: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                                <span style="font-size: 12px; color: var(--so-text-muted);">Time Progress</span>
                                <span style="font-size: 13px; font-weight: 600; color: var(--so-accent-primary);">${timeStats.percentage}%</span>
                            </div>
                            <div class="so-lms-progress-bar" style="height: 6px;">
                                <div class="so-lms-progress-fill" style="width: ${timeStats.percentage}%;"></div>
                            </div>
                            <div style="font-size: 11px; color: var(--so-text-muted); margin-top: 4px;">
                                ${timeStats.completedFormatted} / ${timeStats.totalFormatted}
                            </div>
                        </div>
                    </div>
                    <div class="so-lms-lesson-list">
                        ${course.lessons.map((lesson, index) => {
                            const isCompleted = lesson.type === 'video'
                                ? progress.completedLessons.includes(lesson.id)
                                : progress.completedTasks.includes(lesson.id);

                            const iconClass = isCompleted ? 'completed' : lesson.type;
                            const icon = isCompleted ? 'check_circle' : (lesson.type === 'video' ? 'play_circle' : 'assignment');

                            return `
                                <div class="so-lms-lesson-item" data-lesson-id="${lesson.id}" data-type="${lesson.type}">
                                    <div class="so-lms-lesson-icon ${iconClass}">
                                        <span class="material-icons">${icon}</span>
                                    </div>
                                    <div class="so-lms-lesson-info">
                                        <div class="so-lms-lesson-title">${index + 1}. ${lesson.title}</div>
                                        <div class="so-lms-lesson-meta">
                                            ${lesson.type === 'video' ? `<span class="material-icons" style="font-size: 14px;">schedule</span> ${lesson.duration}` :
                                            `<span class="material-icons" style="font-size: 14px;">checklist</span> ${lesson.steps.length} steps`}
                                        </div>
                                    </div>
                                </div>
                            `;
                        }).join('')}
                    </div>
                    <div class="so-lms-lesson-actions">
                        ${this.getActionButton(course, progress)}
                    </div>
                </div>
            </div>
        `;

        this.attachEventListeners(courseId);
    }

    getActionButton(course, progress) {
        if (progress.status === 'not_started') {
            return `
                <button class="so-btn so-btn-primary" style="width: 100%;" id="startCourseBtn">
                    <span class="material-icons">play_arrow</span>
                    Start Course
                </button>
            `;
        } else if (progress.status === 'in_progress') {
            const allLessonsComplete = course.lessons.every(lesson => {
                return lesson.type === 'video'
                    ? progress.completedLessons.includes(lesson.id)
                    : progress.completedTasks.includes(lesson.id);
            });

            if (allLessonsComplete) {
                return `
                    <button class="so-btn so-btn-primary" style="width: 100%;" id="takeQuizBtn">
                        <span class="material-icons">quiz</span>
                        Take Final Quiz
                    </button>
                `;
            }

            return `
                <button class="so-btn so-btn-primary" style="width: 100%;" id="continueCourseBtn">
                    <span class="material-icons">play_arrow</span>
                    Continue Learning
                </button>
            `;
        } else {
            return `
                <button class="so-btn so-btn-outline" style="width: 100%;" id="retakeQuizBtn">
                    <span class="material-icons">refresh</span>
                    Retake Quiz (Best: ${progress.bestScore}%)
                </button>
            `;
        }
    }

    attachEventListeners(courseId) {
        const course = this.lms.dataService.getCourse(courseId);
        const progress = this.lms.dataService.getCourseProgress(courseId);

        // Lesson items
        document.querySelectorAll('.so-lms-lesson-item').forEach(item => {
            item.addEventListener('click', () => {
                const lessonId = item.dataset.lessonId;
                const type = item.dataset.type;

                if (type === 'video') {
                    this.lms.router.navigate(`lesson/${courseId}/${lessonId}`);
                } else {
                    this.lms.router.navigate(`task/${courseId}/${lessonId}`);
                }
            });
        });

        // Start course button
        const startBtn = document.getElementById('startCourseBtn');
        if (startBtn) {
            startBtn.addEventListener('click', () => {
                const firstLesson = course.lessons[0];
                if (firstLesson.type === 'video') {
                    this.lms.router.navigate(`lesson/${courseId}/${firstLesson.id}`);
                } else {
                    this.lms.router.navigate(`task/${courseId}/${firstLesson.id}`);
                }
            });
        }

        // Continue course button
        const continueBtn = document.getElementById('continueCourseBtn');
        if (continueBtn) {
            continueBtn.addEventListener('click', () => {
                // Find first incomplete lesson
                const nextLesson = course.lessons.find(lesson => {
                    return lesson.type === 'video'
                        ? !progress.completedLessons.includes(lesson.id)
                        : !progress.completedTasks.includes(lesson.id);
                });

                if (nextLesson) {
                    if (nextLesson.type === 'video') {
                        this.lms.router.navigate(`lesson/${courseId}/${nextLesson.id}`);
                    } else {
                        this.lms.router.navigate(`task/${courseId}/${nextLesson.id}`);
                    }
                }
            });
        }

        // Take quiz button
        const quizBtn = document.getElementById('takeQuizBtn');
        if (quizBtn) {
            quizBtn.addEventListener('click', () => {
                this.lms.router.navigate(`quiz/${courseId}`);
            });
        }

        // Retake quiz button
        const retakeBtn = document.getElementById('retakeQuizBtn');
        if (retakeBtn) {
            retakeBtn.addEventListener('click', () => {
                this.lms.router.navigate(`quiz/${courseId}`);
            });
        }
    }
}

// ============================================
// LMS Video Player
// ============================================
class LMSVideoPlayer {
    constructor(lms) {
        this.lms = lms;
    }

    render(courseId, lessonId) {
        const course = this.lms.dataService.getCourse(courseId);
        if (!course) {
            this.lms.router.navigate('catalog');
            return;
        }

        const lesson = course.lessons.find(l => l.id === lessonId);
        if (!lesson) {
            this.lms.router.navigate(`course/${courseId}`);
            return;
        }

        const progress = this.lms.dataService.getCourseProgress(courseId);
        const currentIndex = course.lessons.findIndex(l => l.id === lessonId);
        const container = document.getElementById('lmsContainer');

        container.innerHTML = `
            <div class="so-lms-player-container">
                <div class="so-lms-player-main">
                    <div class="so-lms-video-wrapper">
                        <iframe
                            src="${lesson.videoUrl}?autoplay=0&rel=0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div class="so-lms-player-info">
                        <h1 class="so-lms-player-title">${lesson.title}</h1>
                        <p class="so-lms-player-description">${lesson.description || ''}</p>
                        <div class="so-lms-player-nav">
                            ${currentIndex > 0 ? `
                                <button class="so-btn so-btn-outline" id="prevLessonBtn">
                                    <span class="material-icons">arrow_back</span>
                                    Previous
                                </button>
                            ` : '<div></div>'}

                            <button class="so-btn so-btn-primary" id="markCompleteBtn">
                                <span class="material-icons">${progress.completedLessons.includes(lessonId) ? 'check_circle' : 'check'}</span>
                                ${progress.completedLessons.includes(lessonId) ? 'Completed' : 'Mark as Complete'}
                            </button>

                            ${currentIndex < course.lessons.length - 1 ? `
                                <button class="so-btn so-btn-outline" id="nextLessonBtn">
                                    Next
                                    <span class="material-icons">arrow_forward</span>
                                </button>
                            ` : `
                                <button class="so-btn so-btn-success" id="goToQuizBtn">
                                    Take Quiz
                                    <span class="material-icons">quiz</span>
                                </button>
                            `}
                        </div>
                    </div>
                </div>

                <div class="so-lms-lesson-sidebar">
                    <div class="so-lms-lesson-header">
                        <h3>Course Content</h3>
                        <div class="so-lms-lesson-progress">${progress.completedLessons.length + progress.completedTasks.length} of ${course.lessons.length} completed</div>
                    </div>
                    <div class="so-lms-lesson-list">
                        ${course.lessons.map((l, index) => {
                            const isCompleted = l.type === 'video'
                                ? progress.completedLessons.includes(l.id)
                                : progress.completedTasks.includes(l.id);
                            const isActive = l.id === lessonId;
                            const iconClass = isCompleted ? 'completed' : l.type;
                            const icon = isCompleted ? 'check_circle' : (l.type === 'video' ? 'play_circle' : 'assignment');

                            return `
                                <div class="so-lms-lesson-item ${isActive ? 'active' : ''}" data-lesson-id="${l.id}" data-type="${l.type}">
                                    <div class="so-lms-lesson-icon ${iconClass}">
                                        <span class="material-icons">${icon}</span>
                                    </div>
                                    <div class="so-lms-lesson-info">
                                        <div class="so-lms-lesson-title">${index + 1}. ${l.title}</div>
                                        <div class="so-lms-lesson-meta">
                                            ${l.type === 'video' ? `<span class="material-icons" style="font-size: 14px;">schedule</span> ${l.duration}` :
                                            `<span class="material-icons" style="font-size: 14px;">checklist</span> ${l.steps.length} steps`}
                                        </div>
                                    </div>
                                </div>
                            `;
                        }).join('')}
                    </div>
                </div>
            </div>
        `;

        this.attachEventListeners(courseId, lessonId, course, currentIndex);
    }

    attachEventListeners(courseId, lessonId, course, currentIndex) {
        // Mark complete
        const markCompleteBtn = document.getElementById('markCompleteBtn');
        if (markCompleteBtn) {
            markCompleteBtn.addEventListener('click', () => {
                this.lms.dataService.markLessonComplete(courseId, lessonId);
                markCompleteBtn.innerHTML = '<span class="material-icons">check_circle</span> Completed';
                markCompleteBtn.disabled = true;

                // Refresh sidebar
                this.render(courseId, lessonId);
            });
        }

        // Previous lesson
        const prevBtn = document.getElementById('prevLessonBtn');
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                const prevLesson = course.lessons[currentIndex - 1];
                if (prevLesson.type === 'video') {
                    this.lms.router.navigate(`lesson/${courseId}/${prevLesson.id}`);
                } else {
                    this.lms.router.navigate(`task/${courseId}/${prevLesson.id}`);
                }
            });
        }

        // Next lesson
        const nextBtn = document.getElementById('nextLessonBtn');
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                const nextLesson = course.lessons[currentIndex + 1];
                if (nextLesson.type === 'video') {
                    this.lms.router.navigate(`lesson/${courseId}/${nextLesson.id}`);
                } else {
                    this.lms.router.navigate(`task/${courseId}/${nextLesson.id}`);
                }
            });
        }

        // Go to quiz
        const quizBtn = document.getElementById('goToQuizBtn');
        if (quizBtn) {
            quizBtn.addEventListener('click', () => {
                this.lms.router.navigate(`quiz/${courseId}`);
            });
        }

        // Lesson items
        document.querySelectorAll('.so-lms-lesson-item').forEach(item => {
            item.addEventListener('click', () => {
                const id = item.dataset.lessonId;
                const type = item.dataset.type;

                if (type === 'video') {
                    this.lms.router.navigate(`lesson/${courseId}/${id}`);
                } else {
                    this.lms.router.navigate(`task/${courseId}/${id}`);
                }
            });
        });
    }
}

// ============================================
// LMS Task View
// ============================================
class LMSTaskView {
    constructor(lms) {
        this.lms = lms;
        this.completedSteps = [];
    }

    render(courseId, taskId) {
        const course = this.lms.dataService.getCourse(courseId);
        if (!course) {
            this.lms.router.navigate('catalog');
            return;
        }

        const task = course.lessons.find(l => l.id === taskId);
        if (!task || task.type !== 'task') {
            this.lms.router.navigate(`course/${courseId}`);
            return;
        }

        const progress = this.lms.dataService.getCourseProgress(courseId);
        const isCompleted = progress.completedTasks.includes(taskId);
        this.completedSteps = isCompleted ? [...Array(task.steps.length).keys()] : [];

        const currentIndex = course.lessons.findIndex(l => l.id === taskId);
        const container = document.getElementById('lmsContainer');

        container.innerHTML = `
            <div class="so-lms-player-container">
                <div class="so-lms-task-panel" style="flex: 1;">
                    <div class="so-lms-task-header">
                        <h2>
                            <span class="material-icons">assignment</span>
                            ${task.title}
                        </h2>
                        <p>${task.description}</p>
                    </div>
                    <div class="so-lms-task-body">
                        <ul class="so-lms-task-steps">
                            ${task.steps.map((step, index) => `
                                <li class="so-lms-task-step ${this.completedSteps.includes(index) ? 'completed' : ''}" data-index="${index}">
                                    <label class="so-checkbox">
                                        <input type="checkbox" ${this.completedSteps.includes(index) ? 'checked' : ''}>
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                    </label>
                                    <span class="so-lms-task-step-text">${step}</span>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                    <div class="so-lms-task-footer">
                        <button class="so-btn so-btn-outline" id="skipTaskBtn">
                            Skip for now
                        </button>
                        <button class="so-btn so-btn-primary" id="markTaskCompleteBtn" ${isCompleted ? 'disabled' : ''}>
                            <span class="material-icons">${isCompleted ? 'check_circle' : 'check'}</span>
                            ${isCompleted ? 'Completed' : 'Mark as Complete'}
                        </button>
                    </div>
                </div>

                <div class="so-lms-lesson-sidebar">
                    <div class="so-lms-lesson-header">
                        <h3>Course Content</h3>
                        <div class="so-lms-lesson-progress">${progress.completedLessons.length + progress.completedTasks.length} of ${course.lessons.length} completed</div>
                    </div>
                    <div class="so-lms-lesson-list">
                        ${course.lessons.map((l, index) => {
                            const isLessonCompleted = l.type === 'video'
                                ? progress.completedLessons.includes(l.id)
                                : progress.completedTasks.includes(l.id);
                            const isActive = l.id === taskId;
                            const iconClass = isLessonCompleted ? 'completed' : l.type;
                            const icon = isLessonCompleted ? 'check_circle' : (l.type === 'video' ? 'play_circle' : 'assignment');

                            return `
                                <div class="so-lms-lesson-item ${isActive ? 'active' : ''}" data-lesson-id="${l.id}" data-type="${l.type}">
                                    <div class="so-lms-lesson-icon ${iconClass}">
                                        <span class="material-icons">${icon}</span>
                                    </div>
                                    <div class="so-lms-lesson-info">
                                        <div class="so-lms-lesson-title">${index + 1}. ${l.title}</div>
                                        <div class="so-lms-lesson-meta">
                                            ${l.type === 'video' ? `<span class="material-icons" style="font-size: 14px;">schedule</span> ${l.duration}` :
                                            `<span class="material-icons" style="font-size: 14px;">checklist</span> ${l.steps.length} steps`}
                                        </div>
                                    </div>
                                </div>
                            `;
                        }).join('')}
                    </div>
                </div>
            </div>
        `;

        this.attachEventListeners(courseId, taskId, course, currentIndex);
    }

    attachEventListeners(courseId, taskId, course, currentIndex) {
        // Checkbox toggles
        document.querySelectorAll('.so-lms-task-step input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', (e) => {
                const stepIndex = parseInt(e.target.closest('.so-lms-task-step').dataset.index);
                const stepEl = e.target.closest('.so-lms-task-step');

                if (e.target.checked) {
                    this.completedSteps.push(stepIndex);
                    stepEl.classList.add('completed');
                } else {
                    this.completedSteps = this.completedSteps.filter(i => i !== stepIndex);
                    stepEl.classList.remove('completed');
                }
            });
        });

        // Mark complete
        const markCompleteBtn = document.getElementById('markTaskCompleteBtn');
        if (markCompleteBtn) {
            markCompleteBtn.addEventListener('click', () => {
                this.lms.dataService.markTaskComplete(courseId, taskId);
                markCompleteBtn.innerHTML = '<span class="material-icons">check_circle</span> Completed';
                markCompleteBtn.disabled = true;

                // Move to next
                this.goToNext(courseId, course, currentIndex);
            });
        }

        // Skip
        const skipBtn = document.getElementById('skipTaskBtn');
        if (skipBtn) {
            skipBtn.addEventListener('click', () => {
                this.goToNext(courseId, course, currentIndex);
            });
        }

        // Lesson items
        document.querySelectorAll('.so-lms-lesson-item').forEach(item => {
            item.addEventListener('click', () => {
                const id = item.dataset.lessonId;
                const type = item.dataset.type;

                if (type === 'video') {
                    this.lms.router.navigate(`lesson/${courseId}/${id}`);
                } else {
                    this.lms.router.navigate(`task/${courseId}/${id}`);
                }
            });
        });
    }

    goToNext(courseId, course, currentIndex) {
        if (currentIndex < course.lessons.length - 1) {
            const nextLesson = course.lessons[currentIndex + 1];
            if (nextLesson.type === 'video') {
                this.lms.router.navigate(`lesson/${courseId}/${nextLesson.id}`);
            } else {
                this.lms.router.navigate(`task/${courseId}/${nextLesson.id}`);
            }
        } else {
            // Check if all lessons complete
            const progress = this.lms.dataService.getCourseProgress(courseId);
            const allComplete = course.lessons.every(l => {
                return l.type === 'video'
                    ? progress.completedLessons.includes(l.id)
                    : progress.completedTasks.includes(l.id);
            });

            if (allComplete) {
                this.lms.router.navigate(`quiz/${courseId}`);
            } else {
                this.lms.router.navigate(`course/${courseId}`);
            }
        }
    }
}

// ============================================
// LMS Quiz Controller
// ============================================
class LMSQuizController {
    constructor(lms) {
        this.lms = lms;
        this.currentQuestion = 0;
        this.answers = {};
        this.timeRemaining = 0;
        this.timerInterval = null;
    }

    render(courseId) {
        const course = this.lms.dataService.getCourse(courseId);
        if (!course || !course.quiz) {
            this.lms.router.navigate(`course/${courseId}`);
            return;
        }

        this.courseId = courseId;
        this.course = course;
        this.quiz = course.quiz;
        this.currentQuestion = 0;
        this.answers = {};
        this.timeRemaining = this.quiz.timeLimit * 60; // Convert to seconds

        const overlay = document.getElementById('quizOverlay');
        overlay.style.display = 'flex';

        this.renderQuiz();
        this.startTimer();
    }

    renderQuiz() {
        const overlay = document.getElementById('quizOverlay');
        const question = this.quiz.questions[this.currentQuestion];
        const progress = ((this.currentQuestion + 1) / this.quiz.questions.length) * 100;

        overlay.innerHTML = `
            <div class="so-lms-quiz-header">
                <h2 class="so-lms-quiz-title">${this.course.title} - Final Quiz</h2>
                <div class="so-lms-quiz-timer" id="quizTimer">
                    <span class="material-icons">timer</span>
                    <span id="timerDisplay">${this.formatTime(this.timeRemaining)}</span>
                </div>
            </div>

            <div class="so-lms-quiz-progress">
                <div class="so-lms-quiz-progress-bar">
                    <div class="so-lms-quiz-progress-fill" style="width: ${progress}%"></div>
                </div>
                <div class="so-lms-quiz-progress-text">Question ${this.currentQuestion + 1} of ${this.quiz.questions.length}</div>
            </div>

            <div class="so-lms-quiz-body">
                <div class="so-lms-quiz-content">
                    <div class="so-lms-question">
                        <div class="so-lms-question-number">Question ${this.currentQuestion + 1}</div>
                        <div class="so-lms-question-text">${question.question}</div>
                        ${question.type === 'multiple' ? '<div class="so-lms-question-hint">Select all that apply</div>' : ''}
                        <div class="so-lms-options">
                            ${question.options.map((option, index) => {
                                const isSelected = question.type === 'multiple'
                                    ? (this.answers[question.id] || []).includes(index)
                                    : this.answers[question.id] === index;

                                return `
                                    <div class="so-lms-option ${isSelected ? 'selected' : ''}" data-index="${index}">
                                        <label class="${question.type === 'multiple' ? 'so-checkbox' : 'so-radio'}">
                                            <input type="${question.type === 'multiple' ? 'checkbox' : 'radio'}"
                                                   name="q${question.id}"
                                                   value="${index}"
                                                   ${isSelected ? 'checked' : ''}>
                                            <span class="${question.type === 'multiple' ? 'so-checkbox-box' : 'so-radio-circle'}">
                                                ${question.type === 'multiple' ? '<span class="material-icons">check</span>' : ''}
                                            </span>
                                        </label>
                                        <span class="so-lms-option-text">${option}</span>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    </div>
                </div>
            </div>

            <div class="so-lms-quiz-footer">
                <button class="so-btn so-btn-outline" id="prevQuestionBtn" ${this.currentQuestion === 0 ? 'disabled' : ''}>
                    <span class="material-icons">arrow_back</span>
                    Previous
                </button>

                <div class="so-lms-quiz-dots">
                    ${this.quiz.questions.map((q, i) => `
                        <div class="so-lms-quiz-dot ${this.answers[q.id] !== undefined ? 'answered' : ''} ${i === this.currentQuestion ? 'current' : ''}"
                             data-question="${i}"></div>
                    `).join('')}
                </div>

                ${this.currentQuestion === this.quiz.questions.length - 1 ? `
                    <button class="so-btn so-btn-success" id="submitQuizBtn">
                        <span class="material-icons">check</span>
                        Submit Quiz
                    </button>
                ` : `
                    <button class="so-btn so-btn-primary" id="nextQuestionBtn">
                        Next
                        <span class="material-icons">arrow_forward</span>
                    </button>
                `}
            </div>
        `;

        this.attachQuizEventListeners();
    }

    attachQuizEventListeners() {
        const question = this.quiz.questions[this.currentQuestion];

        // Option selection
        document.querySelectorAll('.so-lms-option').forEach(option => {
            option.addEventListener('click', () => {
                const index = parseInt(option.dataset.index);
                const input = option.querySelector('input');

                if (question.type === 'multiple') {
                    input.checked = !input.checked;
                    option.classList.toggle('selected');

                    if (!this.answers[question.id]) {
                        this.answers[question.id] = [];
                    }

                    if (input.checked) {
                        this.answers[question.id].push(index);
                    } else {
                        this.answers[question.id] = this.answers[question.id].filter(i => i !== index);
                    }
                } else {
                    document.querySelectorAll('.so-lms-option').forEach(o => o.classList.remove('selected'));
                    option.classList.add('selected');
                    input.checked = true;
                    this.answers[question.id] = index;
                }

                // Update dots
                this.updateDots();
            });
        });

        // Previous
        const prevBtn = document.getElementById('prevQuestionBtn');
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                if (this.currentQuestion > 0) {
                    this.currentQuestion--;
                    this.renderQuiz();
                }
            });
        }

        // Next
        const nextBtn = document.getElementById('nextQuestionBtn');
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                if (this.currentQuestion < this.quiz.questions.length - 1) {
                    this.currentQuestion++;
                    this.renderQuiz();
                }
            });
        }

        // Submit
        const submitBtn = document.getElementById('submitQuizBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', () => {
                this.submitQuiz();
            });
        }

        // Dot navigation
        document.querySelectorAll('.so-lms-quiz-dot').forEach(dot => {
            dot.addEventListener('click', () => {
                this.currentQuestion = parseInt(dot.dataset.question);
                this.renderQuiz();
            });
        });
    }

    updateDots() {
        document.querySelectorAll('.so-lms-quiz-dot').forEach((dot, i) => {
            const q = this.quiz.questions[i];
            if (this.answers[q.id] !== undefined) {
                dot.classList.add('answered');
            } else {
                dot.classList.remove('answered');
            }
        });
    }

    startTimer() {
        this.timerInterval = setInterval(() => {
            this.timeRemaining--;

            const timerEl = document.getElementById('timerDisplay');
            const timerContainer = document.getElementById('quizTimer');

            if (timerEl) {
                timerEl.textContent = this.formatTime(this.timeRemaining);
            }

            if (this.timeRemaining <= 60 && timerContainer) {
                timerContainer.classList.add('warning');
            }

            if (this.timeRemaining <= 0) {
                this.submitQuiz();
            }
        }, 1000);
    }

    formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }

    submitQuiz() {
        clearInterval(this.timerInterval);

        // Calculate score
        let correct = 0;
        this.quiz.questions.forEach(question => {
            const userAnswer = this.answers[question.id];

            if (question.type === 'multiple') {
                const correctAnswers = question.correctAnswers.sort();
                const userAnswers = (userAnswer || []).sort();

                if (JSON.stringify(correctAnswers) === JSON.stringify(userAnswers)) {
                    correct++;
                }
            } else {
                if (userAnswer === question.correctAnswer) {
                    correct++;
                }
            }
        });

        const score = Math.round((correct / this.quiz.questions.length) * 100);
        const passed = score >= this.quiz.passingScore;

        // Save attempt
        this.lms.dataService.saveQuizAttempt(this.courseId, score, passed);

        // Show results
        this.showResults(score, correct, passed);
    }

    showResults(score, correct, passed) {
        const overlay = document.getElementById('quizOverlay');

        overlay.innerHTML = `
            <div class="so-lms-quiz-body" style="align-items: center;">
                <div class="so-lms-quiz-content">
                    <div class="so-lms-quiz-result">
                        <div class="so-lms-result-icon ${passed ? 'passed' : 'failed'}">
                            <span class="material-icons">${passed ? 'emoji_events' : 'sentiment_dissatisfied'}</span>
                        </div>
                        <h2 class="so-lms-result-title">${passed ? 'Congratulations!' : 'Better Luck Next Time'}</h2>
                        <p class="so-lms-result-subtitle">
                            ${passed
                                ? 'You have successfully completed this course!'
                                : `You need ${this.quiz.passingScore}% to pass. Don't give up!`}
                        </p>

                        <div class="so-lms-result-score">
                            <div class="so-lms-result-stat">
                                <div class="so-lms-result-stat-value">${score}%</div>
                                <div class="so-lms-result-stat-label">Your Score</div>
                            </div>
                            <div class="so-lms-result-stat">
                                <div class="so-lms-result-stat-value">${correct}/${this.quiz.questions.length}</div>
                                <div class="so-lms-result-stat-label">Correct Answers</div>
                            </div>
                            <div class="so-lms-result-stat">
                                <div class="so-lms-result-stat-value">${this.lms.dataService.calculateGrade(score)}</div>
                                <div class="so-lms-result-stat-label">Grade</div>
                            </div>
                        </div>

                        <div class="so-lms-result-actions">
                            ${!passed && this.quiz.retakeAllowed ? `
                                <button class="so-btn so-btn-outline" id="retakeQuizBtn">
                                    <span class="material-icons">refresh</span>
                                    Retake Quiz
                                </button>
                            ` : ''}
                            <button class="so-btn so-btn-primary" id="backToCatalogBtn">
                                <span class="material-icons">home</span>
                                Back to Courses
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Retake
        const retakeBtn = document.getElementById('retakeQuizBtn');
        if (retakeBtn) {
            retakeBtn.addEventListener('click', () => {
                this.render(this.courseId);
            });
        }

        // Back to catalog
        const backBtn = document.getElementById('backToCatalogBtn');
        if (backBtn) {
            backBtn.addEventListener('click', () => {
                overlay.style.display = 'none';
                this.lms.router.navigate('catalog');
            });
        }
    }

    hide() {
        clearInterval(this.timerInterval);
        const overlay = document.getElementById('quizOverlay');
        overlay.style.display = 'none';
    }
}

// ============================================
// LMS Report Card
// ============================================
class LMSReportCard {
    constructor(lms) {
        this.lms = lms;
    }

    render() {
        const container = document.getElementById('lmsContainer');
        const data = this.lms.dataService;
        const overallStats = data.getOverallStats();

        container.innerHTML = `
            <div class="so-lms-report-card">
                <div class="so-lms-report-header">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                        <h1 class="so-lms-report-title" style="margin-bottom: 0;">
                            <span class="material-icons">assessment</span>
                            My Learning Report Card
                        </h1>
                        <a href="#catalog" class="so-btn so-btn-outline so-btn-sm">
                            <span class="material-icons">arrow_back</span>
                            Back to Courses
                        </a>
                    </div>

                    <div class="so-lms-report-stats">
                        <div class="so-lms-report-stat">
                            <div class="so-lms-report-stat-value">${overallStats.completed}/${overallStats.total}</div>
                            <div class="so-lms-report-stat-label">Courses Completed</div>
                        </div>
                        <div class="so-lms-report-stat">
                            <div class="so-lms-report-stat-value">${overallStats.averageScore}%</div>
                            <div class="so-lms-report-stat-label">Average Score</div>
                        </div>
                        <div class="so-lms-report-stat">
                            <div class="so-lms-report-stat-value" style="color: ${this.getGradeColor(overallStats.grade)}">${overallStats.grade || 'N/A'}</div>
                            <div class="so-lms-report-stat-label">Overall Grade</div>
                        </div>
                    </div>
                </div>

                <div class="so-lms-report-categories">
                    ${data.categories.map(cat => this.renderCategoryCard(cat)).join('')}
                </div>
            </div>
        `;
    }

    renderCategoryCard(category) {
        const data = this.lms.dataService;
        const catProgress = data.progress.categoryProgress[category.id] || { completed: 0, total: 0, averageScore: 0 };
        const courses = data.getCoursesByCategory(category.id);
        const completedCourses = courses.filter(c => {
            const progress = data.getCourseProgress(c.id);
            return progress.status === 'completed';
        }).length;

        const progressPercent = catProgress.total > 0 ? Math.round((completedCourses / catProgress.total) * 100) : 0;
        const grade = catProgress.averageScore > 0 ? data.calculateGrade(catProgress.averageScore) : 'N/A';
        const circumference = 2 * Math.PI * 35;
        const offset = circumference - (progressPercent / 100) * circumference;

        return `
            <div class="so-lms-report-category">
                <div class="so-lms-report-category-header">
                    <div class="so-lms-report-category-icon" style="background: ${category.color};">
                        <span class="material-icons">${category.icon}</span>
                    </div>
                    <div class="so-lms-report-category-info">
                        <div class="so-lms-report-category-name">${category.name}</div>
                        <div class="so-lms-report-category-courses">${catProgress.total} courses</div>
                    </div>
                    <div class="so-lms-report-grade grade-${grade.toLowerCase()}">
                        ${grade}
                    </div>
                </div>
                <div class="so-lms-report-category-body">
                    <div class="so-lms-progress-circle">
                        <div class="so-lms-progress-ring">
                            <svg width="80" height="80">
                                <circle class="so-lms-progress-ring-bg" cx="40" cy="40" r="35"></circle>
                                <circle class="so-lms-progress-ring-fill" cx="40" cy="40" r="35"
                                    style="stroke: ${category.color}; stroke-dasharray: ${circumference}; stroke-dashoffset: ${offset};">
                                </circle>
                            </svg>
                            <div class="so-lms-progress-ring-text">${progressPercent}%</div>
                        </div>
                        <div class="so-lms-category-details">
                            <div class="so-lms-category-detail">
                                <span class="material-icons">check_circle</span>
                                ${completedCourses} completed
                            </div>
                            <div class="so-lms-category-detail">
                                <span class="material-icons">pending</span>
                                ${catProgress.total - completedCourses} remaining
                            </div>
                            <div class="so-lms-category-detail">
                                <span class="material-icons">quiz</span>
                                Avg: ${catProgress.averageScore || 0}%
                            </div>
                            <div class="so-lms-category-detail">
                                <span class="material-icons">school</span>
                                Grade: ${grade}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="so-lms-report-category-footer">
                    <a href="#catalog" class="so-btn so-btn-outline so-btn-sm" onclick="setTimeout(() => document.querySelector('[data-category=${category.id}]')?.click(), 100)">
                        <span class="material-icons">visibility</span>
                        View Courses
                    </a>
                </div>
            </div>
        `;
    }

    getGradeColor(grade) {
        const colors = {
            'A': '#34a853',
            'B': '#1a73e8',
            'C': '#f9ab00',
            'D': '#ff6d00',
            'F': '#ea4335'
        };
        return colors[grade] || 'var(--so-text-muted)';
    }
}

// ============================================
// Main LMS Controller
// ============================================
class SixOrbitLMS {
    constructor() {
        this.dataService = new LMSDataService();
        this.catalogView = new LMSCatalogView(this);
        this.courseView = new LMSCourseView(this);
        this.videoPlayer = new LMSVideoPlayer(this);
        this.taskView = new LMSTaskView(this);
        this.quizController = new LMSQuizController(this);
        this.reportCard = new LMSReportCard(this);
        this.router = new LMSRouter(this);
    }

    async init() {
        await this.dataService.loadCourses();
        this.dataService.updateCategoryProgress();
        this.router.handleRoute();
    }

    // Update the global breadcrumb bar
    updateBreadcrumbBar(items) {
        const breadcrumbBar = document.getElementById('lmsBreadcrumbBar');
        if (!breadcrumbBar) return;

        let html = `
            <a href="index.html" class="so-breadcrumb-bar-home" title="Dashboard">
                <span class="material-icons">home</span>
            </a>
            <span class="so-breadcrumb-bar-separator">
                <span class="material-icons">chevron_right</span>
            </span>
        `;

        items.forEach((item, index) => {
            const isLast = index === items.length - 1;
            if (isLast) {
                html += `<span class="so-breadcrumb-bar-item active">${item.title}</span>`;
            } else {
                html += `
                    <a href="${item.href}" class="so-breadcrumb-bar-item">${item.title}</a>
                    <span class="so-breadcrumb-bar-separator">
                        <span class="material-icons">chevron_right</span>
                    </span>
                `;
            }
        });

        breadcrumbBar.innerHTML = html;
    }

    showCatalog() {
        this.quizController.hide();
        this.updateBreadcrumbBar([
            { title: 'Video Tutorials', href: '#catalog' }
        ]);
        this.catalogView.render();
    }

    showCourse(courseId) {
        this.quizController.hide();
        const course = this.dataService.getCourse(courseId);
        this.updateBreadcrumbBar([
            { title: 'Video Tutorials', href: '#catalog' },
            { title: course ? course.title : 'Course', href: `#course/${courseId}` }
        ]);
        this.courseView.render(courseId);
    }

    showLesson(courseId, lessonId) {
        this.quizController.hide();
        const course = this.dataService.getCourse(courseId);
        const lesson = course ? course.lessons.find(l => l.id === lessonId) : null;
        this.updateBreadcrumbBar([
            { title: 'Video Tutorials', href: '#catalog' },
            { title: course ? course.title : 'Course', href: `#course/${courseId}` },
            { title: lesson ? lesson.title : 'Lesson', href: `#lesson/${courseId}/${lessonId}` }
        ]);
        this.videoPlayer.render(courseId, lessonId);
    }

    showTask(courseId, taskId) {
        this.quizController.hide();
        const course = this.dataService.getCourse(courseId);
        const task = course ? course.lessons.find(l => l.id === taskId) : null;
        this.updateBreadcrumbBar([
            { title: 'Video Tutorials', href: '#catalog' },
            { title: course ? course.title : 'Course', href: `#course/${courseId}` },
            { title: task ? task.title : 'Task', href: `#task/${courseId}/${taskId}` }
        ]);
        this.taskView.render(courseId, taskId);
    }

    showQuiz(courseId) {
        const course = this.dataService.getCourse(courseId);
        this.updateBreadcrumbBar([
            { title: 'Video Tutorials', href: '#catalog' },
            { title: course ? course.title : 'Course', href: `#course/${courseId}` },
            { title: 'Final Quiz', href: `#quiz/${courseId}` }
        ]);
        this.quizController.render(courseId);
    }

    showReportCard() {
        this.quizController.hide();
        this.updateBreadcrumbBar([
            { title: 'Video Tutorials', href: '#catalog' },
            { title: 'My Report Card', href: '#report-card' }
        ]);
        this.reportCard.render();
    }
}

// ============================================
// Initialize LMS
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    window.sixOrbitLMS = new SixOrbitLMS();
    window.sixOrbitLMS.init();
});
