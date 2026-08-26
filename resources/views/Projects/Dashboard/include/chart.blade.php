<section class="row g-4 mb-4">
    <div class="col-12 col-xl-8">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div>
                    <h5>Revenue Overview</h5>
                    <small>Monthly income and expenses</small>
                </div>
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary active">Month</button>
                    <button class="btn btn-outline-secondary">Year</button>
                </div>
            </div>
            <div class="chart-wrap chart-lg">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div>
                    <h5>Sales by Category</h5>
                    <small>Current month</small>
                </div>
            </div>
            <div class="chart-wrap chart-lg">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>
</section>

<section class="row g-4 mb-4">
    <div class="col-12 col-lg-5">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div>
                    <h5>Order Status</h5>
                    <small>Live distribution</small>
                </div>
            </div>
            <div class="chart-wrap chart-md">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-7">
        <div class="dashboard-card h-100">
            <div class="card-header-custom">
                <div>
                    <h5>Recent Activity</h5>
                    <small>Latest account actions</small>
                </div>
                <a href="#" class="btn btn-sm btn-light">View all</a>
            </div>
            <div class="activity-list">
                <div class="activity-item">
                    <span class="activity-icon bg-primary-subtle text-primary">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </span>
                    <div>
                        <strong>Order #1058 was completed</strong>
                        <small>Customer payment confirmed</small>
                    </div>
                    <time>10 min</time>
                </div>
                <div class="activity-item">
                    <span class="activity-icon bg-success-subtle text-success">
                        <i class="fa-solid fa-user-plus"></i>
                    </span>
                    <div>
                        <strong>New customer registered</strong>
                        <small>John Miller joined your store</small>
                    </div>
                    <time>25 min</time>
                </div>
                <div class="activity-item">
                    <span class="activity-icon bg-warning-subtle text-warning">
                        <i class="fa-solid fa-box"></i>
                    </span>
                    <div>
                        <strong>Stock updated</strong>
                        <small>12 products were modified</small>
                    </div>
                    <time>1 hr</time>
                </div>
                <div class="activity-item">
                    <span class="activity-icon bg-danger-subtle text-danger">
                        <i class="fa-solid fa-file-invoice"></i>
                    </span>
                    <div>
                        <strong>Invoice #INV-438 overdue</strong>
                        <small>Payment reminder required</small>
                    </div>
                    <time>3 hr</time>
                </div>
            </div>
        </div>
    </div>
</section>