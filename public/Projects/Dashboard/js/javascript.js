"use strict";

document.addEventListener("DOMContentLoaded", () => {

    /* =========================================================
       GLOBAL
    ========================================================= */

    const root = document.documentElement;

    const sidebar = document.getElementById("sidebar");
    const appContent = document.getElementById("appContent");
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebarClose = document.getElementById("sidebarClose");
    const sidebarOverlay = document.getElementById("sidebarOverlay");

    const themeToggle = document.getElementById("themeToggle");

    const dashboardCharts = [];


    /* =========================================================
       HELPERS
    ========================================================= */

    function isMobile() {
        return window.innerWidth < 992;
    }


    /* =========================================================
       SIDEBAR
    ========================================================= */

    function openMobileSidebar() {
        if (!sidebar) return;

        sidebar.classList.add("mobile-open");
        sidebarOverlay?.classList.add("show");
        document.body.classList.add("sidebar-open");
    }

    function closeMobileSidebar() {
        sidebar?.classList.remove("mobile-open");
        sidebarOverlay?.classList.remove("show");
        document.body.classList.remove("sidebar-open");
    }

    sidebarToggle?.addEventListener("click", () => {
        if (!sidebar) return;

        if (isMobile()) {
            sidebar.classList.contains("mobile-open")
                ? closeMobileSidebar()
                : openMobileSidebar();

            return;
        }

        sidebar.classList.toggle("collapsed");
        appContent?.classList.toggle("sidebar-collapsed");
    });

    sidebarClose?.addEventListener(
        "click",
        closeMobileSidebar
    );

    sidebarOverlay?.addEventListener(
        "click",
        closeMobileSidebar
    );

    window.addEventListener("resize", () => {
        if (!isMobile()) {
            closeMobileSidebar();
        }

        resizeDashboardCharts();
    });


    /* =========================================================
       DARK / LIGHT MODE
    ========================================================= */

    function setTheme(theme) {
        const validTheme =
            theme === "dark"
                ? "dark"
                : "light";

        const isDark =
            validTheme === "dark";

        root.setAttribute(
            "data-bs-theme",
            validTheme
        );

        localStorage.setItem(
            "dashboard-theme",
            validTheme
        );

        if (themeToggle) {
            themeToggle.innerHTML =
                isDark
                    ? '<i class="fa-solid fa-sun"></i>'
                    : '<i class="fa-solid fa-moon"></i>';

            themeToggle.title =
                isDark
                    ? "Light Mode"
                    : "Dark Mode";

            themeToggle.setAttribute(
                "aria-label",
                isDark
                    ? "Switch to light mode"
                    : "Switch to dark mode"
            );
        }

        updateChartsTheme();
    }


    const savedTheme =
        localStorage.getItem(
            "dashboard-theme"
        );

    setTheme(
        savedTheme === "dark"
            ? "dark"
            : "light"
    );


    themeToggle?.addEventListener(
        "click",
        () => {

            const currentTheme =
                root.getAttribute(
                    "data-bs-theme"
                ) || "light";

            setTheme(
                currentTheme === "dark"
                    ? "light"
                    : "dark"
            );

        }
    );


    /* =========================================================
       CUSTOM TABLE
       VANILLA JAVASCRIPT
       NO DATATABLE LIBRARY
    ========================================================= */

    initializeCustomTable();


    function initializeCustomTable() {

        const table =
            document.getElementById(
                "ordersTable"
            );

        if (!table) {
            console.warn(
                "ordersTable not found."
            );

            return;
        }


        const tbody =
            table.querySelector(
                "tbody"
            );

        if (!tbody) {
            console.warn(
                "ordersTable tbody not found."
            );

            return;
        }


        const searchInput =
            document.getElementById(
                "ordersSearch"
            );

        const lengthSelect =
            document.getElementById(
                "ordersLength"
            );

        const pagination =
            document.getElementById(
                "ordersPagination"
            );

        const info =
            document.getElementById(
                "ordersInfo"
            );

        const sortableHeaders =
            table.querySelectorAll(
                "thead th.sortable"
            );


        const originalRows =
            Array.from(
                tbody.querySelectorAll(
                    "tr"
                )
            );


        let filteredRows = [
            ...originalRows
        ];

        let currentPage = 1;

        let sortColumn = null;

        let sortDirection = "asc";


        /* =====================================================
           PAGE LENGTH
        ===================================================== */

        function getPerPage() {

            const value =
                Number.parseInt(
                    lengthSelect?.value ?? "10",
                    10
                );

            return (
                Number.isFinite(value) &&
                value > 0
            )
                ? value
                : 10;

        }


        /* =====================================================
           NORMALIZE SORT VALUE
        ===================================================== */

        function normalizeValue(
            value,
            column
        ) {

            const text =
                String(value).trim();


            /*
             * Order
             */

            if (column === 0) {

                return (
                    Number.parseInt(
                        text.replace(
                            /[^0-9]/g,
                            ""
                        ),
                        10
                    ) || 0
                );

            }


            /*
             * Date
             */

            if (column === 2) {

                const timestamp =
                    Date.parse(text);

                return Number.isNaN(timestamp)
                    ? text.toLowerCase()
                    : timestamp;

            }


            /*
             * Amount
             */

            if (column === 3) {

                return (
                    Number.parseFloat(
                        text.replace(
                            /[^0-9.-]/g,
                            ""
                        )
                    ) || 0
                );

            }


            return text.toLowerCase();

        }


        /* =====================================================
           SEARCH
        ===================================================== */

        function filterRows() {

            const query =
                searchInput
                    ?.value
                    .trim()
                    .toLowerCase()
                ?? "";


            filteredRows =
                originalRows.filter(
                    (row) =>

                        row.innerText
                            .toLowerCase()
                            .includes(query)

                );


            currentPage = 1;

            applySorting();

        }


        /* =====================================================
           SORT
        ===================================================== */

        function applySorting() {

            if (sortColumn !== null) {

                filteredRows.sort(
                    (rowA, rowB) => {

                        const cellA =
                            rowA.children[
                                sortColumn
                            ];

                        const cellB =
                            rowB.children[
                                sortColumn
                            ];


                        if (
                            !cellA ||
                            !cellB
                        ) {

                            return 0;

                        }


                        const valueA =
                            normalizeValue(
                                cellA.innerText,
                                sortColumn
                            );

                        const valueB =
                            normalizeValue(
                                cellB.innerText,
                                sortColumn
                            );


                        if (valueA < valueB) {

                            return (
                                sortDirection === "asc"
                                    ? -1
                                    : 1
                            );

                        }


                        if (valueA > valueB) {

                            return (
                                sortDirection === "asc"
                                    ? 1
                                    : -1
                            );

                        }


                        return 0;

                    }
                );

            }


            renderTable();

        }


        /* =====================================================
           RENDER TABLE
        ===================================================== */

        function renderTable() {

            const perPage =
                getPerPage();

            const totalRows =
                filteredRows.length;

            const totalPages =
                Math.max(
                    1,
                    Math.ceil(
                        totalRows /
                        perPage
                    )
                );


            if (
                currentPage >
                totalPages
            ) {

                currentPage =
                    totalPages;

            }


            const startIndex =
                (
                    currentPage - 1
                ) * perPage;


            const endIndex =
                Math.min(
                    startIndex + perPage,
                    totalRows
                );


            const pageRows =
                filteredRows.slice(
                    startIndex,
                    endIndex
                );


            tbody.innerHTML = "";


            /* EMPTY RESULTS */

            if (
                pageRows.length === 0
            ) {

                const emptyRow =
                    document.createElement(
                        "tr"
                    );


                const columnCount =
                    table.querySelectorAll(
                        "thead th"
                    ).length;


                emptyRow.className =
                    "custom-table-empty";


                emptyRow.innerHTML = `
                    <td colspan="${columnCount}">
                        <div class="py-4 text-center">

                            <i class="
                                fa-solid
                                fa-magnifying-glass
                                fa-2x
                                mb-3
                            "></i>

                            <div>
                                No matching records found
                            </div>

                        </div>
                    </td>
                `;


                tbody.appendChild(
                    emptyRow
                );

            } else {

                pageRows.forEach(
                    (row) => {

                        tbody.appendChild(
                            row
                        );

                    }
                );

            }


            updateTableInfo(
                startIndex,
                endIndex,
                totalRows
            );


            renderPagination(
                totalPages
            );

        }


        /* =====================================================
           TABLE INFO
        ===================================================== */

        function updateTableInfo(
            start,
            end,
            total
        ) {

            if (!info) {
                return;
            }


            info.textContent =
                total === 0

                    ? "Showing 0 to 0 of 0 entries"

                    : `Showing ${start + 1} to ${end} of ${total} entries`;

        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        function renderPagination(
            totalPages
        ) {

            if (!pagination) {
                return;
            }


            pagination.innerHTML = "";


            /*
             * Previous
             */

            createPaginationButton(
                '<i class="fa-solid fa-angle-left"></i>',
                currentPage - 1,
                currentPage === 1,
                false,
                "Previous page"
            );


            const startPage =
                Math.max(
                    1,
                    currentPage - 2
                );


            const endPage =
                Math.min(
                    totalPages,
                    currentPage + 2
                );


            /*
             * First Page
             */

            if (startPage > 1) {

                createPaginationButton(
                    "1",
                    1
                );


                if (startPage > 2) {

                    createPaginationDots();

                }

            }


            /*
             * Page Numbers
             */

            for (
                let page = startPage;
                page <= endPage;
                page++
            ) {

                createPaginationButton(
                    String(page),
                    page,
                    false,
                    page === currentPage,
                    `Page ${page}`
                );

            }


            /*
             * Last Page
             */

            if (
                endPage < totalPages
            ) {

                if (
                    endPage <
                    totalPages - 1
                ) {

                    createPaginationDots();

                }


                createPaginationButton(
                    String(totalPages),
                    totalPages,
                    false,
                    false,
                    `Page ${totalPages}`
                );

            }


            /*
             * Next
             */

            createPaginationButton(
                '<i class="fa-solid fa-angle-right"></i>',
                currentPage + 1,
                currentPage === totalPages,
                false,
                "Next page"
            );

        }


        /* =====================================================
           PAGINATION BUTTON
        ===================================================== */

        function createPaginationButton(
            label,
            page,
            disabled = false,
            active = false,
            ariaLabel = ""
        ) {

            if (!pagination) {
                return;
            }


            const li =
                document.createElement(
                    "li"
                );


            li.className =
                "page-item";


            if (disabled) {

                li.classList.add(
                    "disabled"
                );

            }


            if (active) {

                li.classList.add(
                    "active"
                );

            }


            const button =
                document.createElement(
                    "button"
                );


            button.type =
                "button";

            button.className =
                "page-link";

            button.innerHTML =
                label;

            button.disabled =
                disabled;


            if (ariaLabel) {

                button.setAttribute(
                    "aria-label",
                    ariaLabel
                );

            }


            if (active) {

                button.setAttribute(
                    "aria-current",
                    "page"
                );

            }


            button.addEventListener(
                "click",
                () => {

                    if (disabled) {
                        return;
                    }

                    currentPage =
                        page;

                    renderTable();

                }
            );


            li.appendChild(
                button
            );


            pagination.appendChild(
                li
            );

        }


        /* =====================================================
           PAGINATION DOTS
        ===================================================== */

        function createPaginationDots() {

            if (!pagination) {
                return;
            }


            const li =
                document.createElement(
                    "li"
                );


            li.className =
                "page-item disabled";


            li.innerHTML = `
                <span class="page-link">
                    ...
                </span>
            `;


            pagination.appendChild(
                li
            );

        }


        /* =====================================================
           SORT HEADERS
        ===================================================== */

        sortableHeaders.forEach(
            (header) => {

                header.addEventListener(
                    "click",
                    () => {

                        const column =
                            Number.parseInt(
                                header.dataset.column,
                                10
                            );


                        if (
                            Number.isNaN(column)
                        ) {

                            return;

                        }


                        if (
                            sortColumn === column
                        ) {

                            sortDirection =
                                sortDirection === "asc"
                                    ? "desc"
                                    : "asc";

                        } else {

                            sortColumn =
                                column;

                            sortDirection =
                                "asc";

                        }


                        sortableHeaders.forEach(
                            (item) => {

                                item.classList.remove(
                                    "sorting-asc",
                                    "sorting-desc"
                                );


                                item.setAttribute(
                                    "aria-sort",
                                    "none"
                                );

                            }
                        );


                        header.classList.add(
                            sortDirection === "asc"
                                ? "sorting-asc"
                                : "sorting-desc"
                        );


                        header.setAttribute(
                            "aria-sort",
                            sortDirection === "asc"
                                ? "ascending"
                                : "descending"
                        );


                        currentPage = 1;

                        applySorting();

                    }
                );

            }
        );


        /* =====================================================
           SEARCH EVENT
        ===================================================== */

        searchInput?.addEventListener(
            "input",
            filterRows
        );


        /* =====================================================
           LENGTH EVENT
        ===================================================== */

        lengthSelect?.addEventListener(
            "change",
            () => {

                currentPage = 1;

                renderTable();

            }
        );


        /* =====================================================
           INITIAL TABLE
        ===================================================== */

        renderTable();

    }


    /* =========================================================
       CHART.JS
    ========================================================= */

    if (
        typeof Chart !== "undefined"
    ) {

        Chart.defaults.font.family =
            "Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif";

        Chart.defaults.responsive =
            true;

        Chart.defaults.maintainAspectRatio =
            false;


        initializeRevenueChart();

        initializeCategoryChart();

        initializeOrdersChart();

    } else {

        console.warn(
            "Chart.js is not loaded."
        );

    }


    /* =========================================================
       REVENUE CHART
    ========================================================= */

    function initializeRevenueChart() {

        if (
            typeof Chart === "undefined"
        ) {
            return;
        }


        const canvas =
            document.getElementById(
                "revenueChart"
            );


        if (!canvas) {
            return;
        }


        const chart =
            new Chart(
                canvas,
                {

                    type: "line",

                    data: {

                        labels: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug"
                        ],

                        datasets: [

                            {
                                label:
                                    "Revenue",

                                data: [
                                    12000,
                                    15000,
                                    13200,
                                    19000,
                                    22800,
                                    21100,
                                    28200,
                                    32600
                                ],

                                borderColor:
                                    "#6366f1",

                                backgroundColor:
                                    "rgba(99, 102, 241, .12)",

                                borderWidth:
                                    3,

                                tension:
                                    0.38,

                                fill:
                                    true,

                                pointRadius:
                                    3,

                                pointHoverRadius:
                                    5
                            },

                            {
                                label:
                                    "Expenses",

                                data: [
                                    8000,
                                    9300,
                                    8800,
                                    11000,
                                    12500,
                                    11900,
                                    14100,
                                    15100
                                ],

                                borderColor:
                                    "#ef4444",

                                backgroundColor:
                                    "rgba(239, 68, 68, .08)",

                                borderWidth:
                                    3,

                                tension:
                                    0.38,

                                fill:
                                    false,

                                pointRadius:
                                    3,

                                pointHoverRadius:
                                    5
                            }

                        ]

                    },

                    options: {

                        responsive:
                            true,

                        maintainAspectRatio:
                            false,

                        interaction: {

                            intersect:
                                false,

                            mode:
                                "index"

                        },

                        plugins: {

                            legend: {

                                position:
                                    "top",

                                align:
                                    "end",

                                labels: {

                                    usePointStyle:
                                        true,

                                    padding:
                                        15

                                }

                            }

                        },

                        scales: {

                            x: {

                                grid: {
                                    display:
                                        false
                                }

                            },

                            y: {

                                beginAtZero:
                                    true,

                                ticks: {

                                    callback:
                                        (value) =>
                                            `$${value / 1000}k`

                                }

                            }

                        }

                    }

                }
            );


        dashboardCharts.push(
            chart
        );

    }


    /* =========================================================
       CATEGORY CHART
    ========================================================= */

    function initializeCategoryChart() {

        if (
            typeof Chart === "undefined"
        ) {
            return;
        }


        const canvas =
            document.getElementById(
                "categoryChart"
            );


        if (!canvas) {
            return;
        }


        const chart =
            new Chart(
                canvas,
                {

                    type:
                        "doughnut",

                    data: {

                        labels: [
                            "Electronics",
                            "Fashion",
                            "Home",
                            "Other"
                        ],

                        datasets: [

                            {

                                data: [
                                    38,
                                    27,
                                    21,
                                    14
                                ],

                                backgroundColor: [
                                    "#6366f1",
                                    "#22c55e",
                                    "#f59e0b",
                                    "#38bdf8"
                                ],

                                borderWidth:
                                    0,

                                hoverOffset:
                                    8

                            }

                        ]

                    },

                    options: {

                        responsive:
                            true,

                        maintainAspectRatio:
                            false,

                        cutout:
                            "72%",

                        plugins: {

                            legend: {

                                position:
                                    "bottom",

                                labels: {

                                    usePointStyle:
                                        true,

                                    padding:
                                        18

                                }

                            }

                        }

                    }

                }
            );


        dashboardCharts.push(
            chart
        );

    }


    /* =========================================================
       ORDER STATUS CHART
    ========================================================= */

    function initializeOrdersChart() {

        if (
            typeof Chart === "undefined"
        ) {
            return;
        }


        const canvas =
            document.getElementById(
                "ordersChart"
            );


        if (!canvas) {
            return;
        }


        const chart =
            new Chart(
                canvas,
                {

                    type:
                        "doughnut",

                    data: {

                        labels: [
                            "Completed",
                            "Processing",
                            "Pending",
                            "Cancelled"
                        ],

                        datasets: [

                            {

                                data: [
                                    52,
                                    24,
                                    16,
                                    8
                                ],

                                backgroundColor: [
                                    "#22c55e",
                                    "#3b82f6",
                                    "#f59e0b",
                                    "#ef4444"
                                ],

                                borderWidth:
                                    0,

                                hoverOffset:
                                    8

                            }

                        ]

                    },

                    options: {

                        responsive:
                            true,

                        maintainAspectRatio:
                            false,

                        cutout:
                            "70%",

                        plugins: {

                            legend: {

                                position:
                                    "bottom",

                                labels: {

                                    usePointStyle:
                                        true,

                                    padding:
                                        15

                                }

                            }

                        }

                    }

                }
            );


        dashboardCharts.push(
            chart
        );

    }


    /* =========================================================
       CHART THEME
    ========================================================= */

    function updateChartsTheme() {

        if (
            typeof Chart === "undefined"
        ) {
            return;
        }


        const dark =
            root.getAttribute(
                "data-bs-theme"
            ) === "dark";


        const textColor =
            dark
                ? "#adb5bd"
                : "#6b7280";


        const borderColor =
            dark
                ? "rgba(255,255,255,.10)"
                : "rgba(0,0,0,.08)";


        Chart.defaults.color =
            textColor;


        Chart.defaults.borderColor =
            borderColor;


        dashboardCharts.forEach(
            (chart) => {

                const legendLabels =
                    chart.options
                        .plugins
                        ?.legend
                        ?.labels;


                if (legendLabels) {

                    legendLabels.color =
                        textColor;

                }


                const xAxis =
                    chart.options
                        .scales
                        ?.x;


                const yAxis =
                    chart.options
                        .scales
                        ?.y;


                if (xAxis) {

                    if (xAxis.ticks) {

                        xAxis.ticks.color =
                            textColor;

                    }


                    if (xAxis.grid) {

                        xAxis.grid.color =
                            borderColor;

                    }

                }


                if (yAxis) {

                    if (yAxis.ticks) {

                        yAxis.ticks.color =
                            textColor;

                    }


                    if (yAxis.grid) {

                        yAxis.grid.color =
                            borderColor;

                    }

                }


                chart.update();

            }
        );

    }


    /* =========================================================
       RESIZE CHARTS
    ========================================================= */

    function resizeDashboardCharts() {

        dashboardCharts.forEach(
            (chart) => {

                chart.resize();

            }
        );

    }


    updateChartsTheme();


    /* =========================================================
       BOOTSTRAP TOOLTIPS
    ========================================================= */

    if (
        typeof bootstrap !== "undefined"
    ) {

        document
            .querySelectorAll(
                '[data-bs-toggle="tooltip"]'
            )
            .forEach(
                (element) => {

                    new bootstrap.Tooltip(
                        element
                    );

                }
            );

    }


    /* =========================================================
       DEBUG
    ========================================================= */

    console.log(
        "%cAdminPro JavaScript loaded successfully ✓",
        "color:#22c55e;font-weight:bold;font-size:14px;"
    );

});