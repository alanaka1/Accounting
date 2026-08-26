@extends('Projects.Dashboard.layout.app')
 
@section('title', 'Professional Bootstrap Dashboard')

@section('css')
@endsection
 
@section('content')

<div class="page-heading d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div>
        <h1>Dashboard</h1>
        <p>Welcome back. Here is what is happening today.</p>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="dashboard-card mb-4">
    <div class="card-header-custom flex-wrap gap-3">
        <div>
            <h5>Recent Orders</h5>
            <small>Manage latest transactions</small>
        </div>

        <button class="btn btn-primary btn-sm">
            <i class="fa-solid fa-plus me-1"></i>
            Add Order
        </button>
    </div>

    <div class="custom-datatable p-3">
        <!-- Controls -->
        <div class="custom-table-toolbar mb-3">
            <div class="custom-table-length">
                <label for="ordersLength">Show</label>
                <select id="ordersLength" class="form-select form-select-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="150">150</option>
                    <option value="200">200</option>
                </select>
                <span>entries</span>
            </div>
            <div class="custom-table-search">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="search" id="ordersSearch" class="form-control" placeholder="Search orders...">
                </div>
            </div>
        </div>
        
        <!-- Table -->
        <div class="table-responsive">
            <table id="ordersTable" class="table align-middle table-hover w-100 custom-table">
                <thead>
                    <tr>
                        <th class="sortable" data-column="0">Order <i class="fa-solid fa-sort sort-icon"></i></th>
                        <th class="sortable" data-column="1">Customer <i class="fa-solid fa-sort sort-icon"></i></th>
                        <th class="sortable" data-column="2">Date <i class="fa-solid fa-sort sort-icon"></i></th>
                        <th class="sortable" data-column="3">Amount <i class="fa-solid fa-sort sort-icon"></i></th>
                        <th class="sortable" data-column="4">Status <i class="fa-solid fa-sort sort-icon"></i></th>
                        <th class="sortable" data-column="5">Action <i class="fa-solid fa-sort sort-icon"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1058</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=1" alt=""><span>Olivia Martin</span></div></td>
                        <td>18 Aug 2026</td>
                        <td>$420.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="#" class="btn btn-outline-success btn-sm table-action-btn" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm table-action-btn" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="#" class="btn btn-outline-info btn-sm table-action-btn" title="Show"><i class="fa-solid fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="custom-table-footer mt-3">
            <div id="ordersInfo" class="custom-table-info"></div>
            <nav><ul id="ordersPagination" class="pagination pagination-sm mb-0"></ul></nav>
        </div>

    </div>
</section>
@endsection

@section('javascript')
@endsection