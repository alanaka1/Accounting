@extends('Projects.Dashboard.layout.app')
 
@section('title', 'Professional Bootstrap Dashboard')
 
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
@include('Projects.Dashboard.include.topcard')

@include('Projects.Dashboard.include.chart')

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
                    <tr>
                        <td>#1057</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=3" alt=""><span>Noah Williams</span></div></td>
                        <td>18 Aug 2026</td>
                        <td>$158.50</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1056</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=5" alt=""><span>Emma Brown</span></div></td>
                        <td>17 Aug 2026</td>
                        <td>$895.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1055</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=8" alt=""><span>Liam Wilson</span></div></td>
                        <td>17 Aug 2026</td>
                        <td>$75.40</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1058</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=1" alt="Olivia Martin"><span>Olivia Martin</span></div></td>
                        <td>18 Aug 2026</td>
                        <td>$420.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1057</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=3" alt="Noah Williams"><span>Noah Williams</span></div></td>
                        <td>18 Aug 2026</td>
                        <td>$158.50</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1056</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=5" alt="Emma Brown"><span>Emma Brown</span></div></td>
                        <td>17 Aug 2026</td>
                        <td>$895.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1055</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=8" alt="Liam Wilson"><span>Liam Wilson</span></div></td>
                        <td>17 Aug 2026</td>
                        <td>$75.40</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1054</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=9" alt="Sophia Johnson"><span>Sophia Johnson</span></div></td>
                        <td>16 Aug 2026</td>
                        <td>$1,250.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1053</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=11" alt="James Anderson"><span>James Anderson</span></div></td>
                        <td>16 Aug 2026</td>
                        <td>$340.75</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1052</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=12" alt="Ava Thompson"><span>Ava Thompson</span></div></td>
                        <td>15 Aug 2026</td>
                        <td>$670.20</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1051</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=13" alt="Oliver Taylor"><span>Oliver Taylor</span></div></td>
                        <td>15 Aug 2026</td>
                        <td>$215.99</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1050</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=14" alt="Isabella Moore"><span>Isabella Moore</span></div></td>
                        <td>14 Aug 2026</td>
                        <td>$980.50</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1049</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=15" alt="Elijah Jackson"><span>Elijah Jackson</span></div></td>
                        <td>14 Aug 2026</td>
                        <td>$145.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1048</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=16" alt="Mia White"><span>Mia White</span></div></td>
                        <td>13 Aug 2026</td>
                        <td>$560.80</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1047</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=17" alt="Lucas Harris"><span>Lucas Harris</span></div></td>
                        <td>13 Aug 2026</td>
                        <td>$2,140.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1046</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=18" alt="Charlotte Clark"><span>Charlotte Clark</span></div></td>
                        <td>12 Aug 2026</td>
                        <td>$385.60</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1045</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=19" alt="Henry Lewis"><span>Henry Lewis</span></div></td>
                        <td>12 Aug 2026</td>
                        <td>$92.25</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1044</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=20" alt="Amelia Walker"><span>Amelia Walker</span></div></td>
                        <td>11 Aug 2026</td>
                        <td>$760.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1043</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=21" alt="Benjamin Hall"><span>Benjamin Hall</span></div></td>
                        <td>11 Aug 2026</td>
                        <td>$1,475.30</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1042</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=22" alt="Emily Allen"><span>Emily Allen</span></div></td>
                        <td>10 Aug 2026</td>
                        <td>$230.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1041</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=23" alt="William Young"><span>William Young</span></div></td>
                        <td>10 Aug 2026</td>
                        <td>$615.45</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1040</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=24" alt="Luna King"><span>Luna King</span></div></td>
                        <td>09 Aug 2026</td>
                        <td>$188.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1039</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=25" alt="Alexander Wright"><span>Alexander Wright</span></div></td>
                        <td>09 Aug 2026</td>
                        <td>$845.70</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1038</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=26" alt="Harper Scott"><span>Harper Scott</span></div></td>
                        <td>08 Aug 2026</td>
                        <td>$1,125.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1037</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=27" alt="Michael Green"><span>Michael Green</span></div></td>
                        <td>08 Aug 2026</td>
                        <td>$310.25</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1036</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=28" alt="Evelyn Baker"><span>Evelyn Baker</span></div></td>
                        <td>07 Aug 2026</td>
                        <td>$525.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1035</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=29" alt="Ethan Adams"><span>Ethan Adams</span></div></td>
                        <td>07 Aug 2026</td>
                        <td>$69.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1034</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=30" alt="Abigail Nelson"><span>Abigail Nelson</span></div></td>
                        <td>06 Aug 2026</td>
                        <td>$940.40</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1033</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=31" alt="Sebastian Carter"><span>Sebastian Carter</span></div></td>
                        <td>06 Aug 2026</td>
                        <td>$1,860.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1032</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=32" alt="Ella Mitchell"><span>Ella Mitchell</span></div></td>
                        <td>05 Aug 2026</td>
                        <td>$275.35</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1031</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=33" alt="Daniel Perez"><span>Daniel Perez</span></div></td>
                        <td>05 Aug 2026</td>
                        <td>$715.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1030</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=34" alt="Scarlett Roberts"><span>Scarlett Roberts</span></div></td>
                        <td>04 Aug 2026</td>
                        <td>$1,320.60</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1029</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=35" alt="Matthew Turner"><span>Matthew Turner</span></div></td>
                        <td>04 Aug 2026</td>
                        <td>$110.00</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1028</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=36" alt="Grace Phillips"><span>Grace Phillips</span></div></td>
                        <td>03 Aug 2026</td>
                        <td>$455.25</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1027</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=37" alt="Jackson Campbell"><span>Jackson Campbell</span></div></td>
                        <td>03 Aug 2026</td>
                        <td>$680.90</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1026</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=38" alt="Chloe Parker"><span>Chloe Parker</span></div></td>
                        <td>02 Aug 2026</td>
                        <td>$2,275.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1025</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=39" alt="David Evans"><span>David Evans</span></div></td>
                        <td>02 Aug 2026</td>
                        <td>$330.50</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1024</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=40" alt="Victoria Edwards"><span>Victoria Edwards</span></div></td>
                        <td>01 Aug 2026</td>
                        <td>$590.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1023</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=41" alt="Joseph Collins"><span>Joseph Collins</span></div></td>
                        <td>01 Aug 2026</td>
                        <td>$205.75</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1022</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=42" alt="Aria Stewart"><span>Aria Stewart</span></div></td>
                        <td>31 Jul 2026</td>
                        <td>$775.80</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1021</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=43" alt="Samuel Sanchez"><span>Samuel Sanchez</span></div></td>
                        <td>31 Jul 2026</td>
                        <td>$1,040.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1020</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=44" alt="Layla Morris"><span>Layla Morris</span></div></td>
                        <td>30 Jul 2026</td>
                        <td>$128.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1019</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=45" alt="Andrew Rogers"><span>Andrew Rogers</span></div></td>
                        <td>30 Jul 2026</td>
                        <td>$640.30</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1018</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=46" alt="Nora Reed"><span>Nora Reed</span></div></td>
                        <td>29 Jul 2026</td>
                        <td>$365.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1017</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=47" alt="Christopher Cook"><span>Christopher Cook</span></div></td>
                        <td>29 Jul 2026</td>
                        <td>$890.60</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1016</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=48" alt="Hannah Morgan"><span>Hannah Morgan</span></div></td>
                        <td>28 Jul 2026</td>
                        <td>$1,550.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1015</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=49" alt="Joshua Bell"><span>Joshua Bell</span></div></td>
                        <td>28 Jul 2026</td>
                        <td>$245.50</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1014</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=50" alt="Zoey Murphy"><span>Zoey Murphy</span></div></td>
                        <td>27 Jul 2026</td>
                        <td>$735.25</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1013</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=51" alt="Ryan Bailey"><span>Ryan Bailey</span></div></td>
                        <td>27 Jul 2026</td>
                        <td>$485.80</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1012</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=52" alt="Lily Rivera"><span>Lily Rivera</span></div></td>
                        <td>26 Jul 2026</td>
                        <td>$920.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1011</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=53" alt="Nathan Cooper"><span>Nathan Cooper</span></div></td>
                        <td>26 Jul 2026</td>
                        <td>$175.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1010</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=54" alt="Aurora Richardson"><span>Aurora Richardson</span></div></td>
                        <td>25 Jul 2026</td>
                        <td>$1,680.90</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1009</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=55" alt="Thomas Cox"><span>Thomas Cox</span></div></td>
                        <td>25 Jul 2026</td>
                        <td>$299.99</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1008</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=56" alt="Sophie Bennett"><span>Sophie Bennett</span></div></td>
                        <td>24 Jul 2026</td>
                        <td>$645.20</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1007</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=57" alt="Jack Peterson"><span>Jack Peterson</span></div></td>
                        <td>24 Jul 2026</td>
                        <td>$214.75</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1006</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=58" alt="Madison Gray"><span>Madison Gray</span></div></td>
                        <td>23 Jul 2026</td>
                        <td>$1,245.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1005</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=59" alt="Leo Watson"><span>Leo Watson</span></div></td>
                        <td>23 Jul 2026</td>
                        <td>$89.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1004</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=60" alt="Alice Brooks"><span>Alice Brooks</span></div></td>
                        <td>22 Jul 2026</td>
                        <td>$780.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=61" alt="George Kelly"><span>George Kelly</span></div></td>
                        <td>22 Jul 2026</td>
                        <td>$330.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=62" alt="Ellie Howard"><span>Ellie Howard</span></div></td>
                        <td>21 Jul 2026</td>
                        <td>$515.85</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1001</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=63" alt="Oscar Ward"><span>Oscar Ward</span></div></td>
                        <td>21 Jul 2026</td>
                        <td>$1,890.50</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#1000</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=64" alt="Lucy Price"><span>Lucy Price</span></div></td>
                        <td>20 Jul 2026</td>
                        <td>$126.30</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#999</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=65" alt="Arthur Wood"><span>Arthur Wood</span></div></td>
                        <td>20 Jul 2026</td>
                        <td>$455.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#998</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=66" alt="Ruby Barnes"><span>Ruby Barnes</span></div></td>
                        <td>19 Jul 2026</td>
                        <td>$742.60</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#997</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=67" alt="Isaac Ross"><span>Isaac Ross</span></div></td>
                        <td>19 Jul 2026</td>
                        <td>$980.25</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#996</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=68" alt="Maya Henderson"><span>Maya Henderson</span></div></td>
                        <td>18 Jul 2026</td>
                        <td>$2,115.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#995</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=69" alt="Dylan Coleman"><span>Dylan Coleman</span></div></td>
                        <td>18 Jul 2026</td>
                        <td>$184.95</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#994</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=70" alt="Eva Jenkins"><span>Eva Jenkins</span></div></td>
                        <td>17 Jul 2026</td>
                        <td>$625.30</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#993</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=1" alt="Adam Perry"><span>Adam Perry</span></div></td>
                        <td>17 Jul 2026</td>
                        <td>$350.75</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#992</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=2" alt="Clara Powell"><span>Clara Powell</span></div></td>
                        <td>16 Jul 2026</td>
                        <td>$1,075.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#991</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=4" alt="Logan Long"><span>Logan Long</span></div></td>
                        <td>16 Jul 2026</td>
                        <td>$295.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#990</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=6" alt="Sarah Patterson"><span>Sarah Patterson</span></div></td>
                        <td>15 Jul 2026</td>
                        <td>$810.60</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#989</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=7" alt="Gabriel Hughes"><span>Gabriel Hughes</span></div></td>
                        <td>15 Jul 2026</td>
                        <td>$1,460.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#988</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=10" alt="Anna Flores"><span>Anna Flores</span></div></td>
                        <td>14 Jul 2026</td>
                        <td>$99.50</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#987</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=12" alt="Caleb Washington"><span>Caleb Washington</span></div></td>
                        <td>14 Jul 2026</td>
                        <td>$570.80</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#986</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=14" alt="Julia Butler"><span>Julia Butler</span></div></td>
                        <td>13 Jul 2026</td>
                        <td>$925.15</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#985</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=16" alt="Connor Simmons"><span>Connor Simmons</span></div></td>
                        <td>13 Jul 2026</td>
                        <td>$248.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#984</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=18" alt="Natalie Foster"><span>Natalie Foster</span></div></td>
                        <td>12 Jul 2026</td>
                        <td>$1,735.90</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#983</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=20" alt="Aaron Gonzales"><span>Aaron Gonzales</span></div></td>
                        <td>12 Jul 2026</td>
                        <td>$412.35</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#982</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=22" alt="Stella Bryant"><span>Stella Bryant</span></div></td>
                        <td>11 Jul 2026</td>
                        <td>$680.00</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#981</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=24" alt="Charles Alexander"><span>Charles Alexander</span></div></td>
                        <td>11 Jul 2026</td>
                        <td>$1,280.45</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#980</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=26" alt="Hazel Russell"><span>Hazel Russell</span></div></td>
                        <td>10 Jul 2026</td>
                        <td>$155.60</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#979</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=28" alt="Jonathan Griffin"><span>Jonathan Griffin</span></div></td>
                        <td>10 Jul 2026</td>
                        <td>$795.20</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#978</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=30" alt="Violet Diaz"><span>Violet Diaz</span></div></td>
                        <td>09 Jul 2026</td>
                        <td>$2,350.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#977</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=32" alt="Robert Hayes"><span>Robert Hayes</span></div></td>
                        <td>09 Jul 2026</td>
                        <td>$310.90</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#976</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=34" alt="Savannah Myers"><span>Savannah Myers</span></div></td>
                        <td>08 Jul 2026</td>
                        <td>$545.70</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#975</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=36" alt="Nicholas Ford"><span>Nicholas Ford</span></div></td>
                        <td>08 Jul 2026</td>
                        <td>$875.40</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#974</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=38" alt="Brooklyn Hamilton"><span>Brooklyn Hamilton</span></div></td>
                        <td>07 Jul 2026</td>
                        <td>$1,095.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#973</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=40" alt="Cameron Graham"><span>Cameron Graham</span></div></td>
                        <td>07 Jul 2026</td>
                        <td>$225.85</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#972</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=42" alt="Bella Sullivan"><span>Bella Sullivan</span></div></td>
                        <td>06 Jul 2026</td>
                        <td>$650.30</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#971</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=44" alt="Ian Wallace"><span>Ian Wallace</span></div></td>
                        <td>06 Jul 2026</td>
                        <td>$1,560.75</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#970</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=46" alt="Claire Woods"><span>Claire Woods</span></div></td>
                        <td>05 Jul 2026</td>
                        <td>$98.40</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#969</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=48" alt="Adrian Cole"><span>Adrian Cole</span></div></td>
                        <td>05 Jul 2026</td>
                        <td>$735.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#968</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=50" alt="Naomi West"><span>Naomi West</span></div></td>
                        <td>04 Jul 2026</td>
                        <td>$1,320.25</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#967</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=52" alt="Jordan Stone"><span>Jordan Stone</span></div></td>
                        <td>04 Jul 2026</td>
                        <td>$267.90</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#966</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=54" alt="Maria Fisher"><span>Maria Fisher</span></div></td>
                        <td>03 Jul 2026</td>
                        <td>$485.60</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#965</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=56" alt="Kevin Ellis"><span>Kevin Ellis</span></div></td>
                        <td>03 Jul 2026</td>
                        <td>$920.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#964</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=58" alt="Leah Harrison"><span>Leah Harrison</span></div></td>
                        <td>02 Jul 2026</td>
                        <td>$1,845.50</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#963</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=60" alt="Eric Gibson"><span>Eric Gibson</span></div></td>
                        <td>02 Jul 2026</td>
                        <td>$135.75</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#962</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=62" alt="Audrey McDonald"><span>Audrey McDonald</span></div></td>
                        <td>01 Jul 2026</td>
                        <td>$610.20</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#961</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=64" alt="Jason Marshall"><span>Jason Marshall</span></div></td>
                        <td>01 Jul 2026</td>
                        <td>$2,075.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#960</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=66" alt="Elena Owens"><span>Elena Owens</span></div></td>
                        <td>30 Jun 2026</td>
                        <td>$375.90</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#959</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=68" alt="Marcus Reynolds"><span>Marcus Reynolds</span></div></td>
                        <td>30 Jun 2026</td>
                        <td>$790.45</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#958</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=2" alt="Emily Carter"><span>Emily Carter</span></div></td>
                        <td>29 Jun 2026</td>
                        <td>$540.20</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#957</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=4" alt="Mason Lee"><span>Mason Lee</span></div></td>
                        <td>29 Jun 2026</td>
                        <td>$1,145.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#956</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=6" alt="Sofia Ramirez"><span>Sofia Ramirez</span></div></td>
                        <td>28 Jun 2026</td>
                        <td>$275.50</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#955</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=7" alt="Owen Foster"><span>Owen Foster</span></div></td>
                        <td>28 Jun 2026</td>
                        <td>$88.30</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#954</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=9" alt="Mila Bennett"><span>Mila Bennett</span></div></td>
                        <td>27 Jun 2026</td>
                        <td>$690.75</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#953</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=11" alt="Levi Brooks"><span>Levi Brooks</span></div></td>
                        <td>27 Jun 2026</td>
                        <td>$360.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#952</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=13" alt="Camila Turner"><span>Camila Turner</span></div></td>
                        <td>26 Jun 2026</td>
                        <td>$925.40</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#951</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=15" alt="Wyatt Murphy"><span>Wyatt Murphy</span></div></td>
                        <td>26 Jun 2026</td>
                        <td>$1,880.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#950</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=17" alt="Layla Hughes"><span>Layla Hughes</span></div></td>
                        <td>25 Jun 2026</td>
                        <td>$145.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#949</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=19" alt="Julian Ross"><span>Julian Ross</span></div></td>
                        <td>25 Jun 2026</td>
                        <td>$455.25</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#948</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=21" alt="Penelope Gray"><span>Penelope Gray</span></div></td>
                        <td>24 Jun 2026</td>
                        <td>$725.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#947</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=23" alt="Hudson Reed"><span>Hudson Reed</span></div></td>
                        <td>24 Jun 2026</td>
                        <td>$1,025.60</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#946</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=25" alt="Gianna Morris"><span>Gianna Morris</span></div></td>
                        <td>23 Jun 2026</td>
                        <td>$2,240.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#945</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=27" alt="Lincoln Price"><span>Lincoln Price</span></div></td>
                        <td>23 Jun 2026</td>
                        <td>$189.75</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#944</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=29" alt="Paisley Cox"><span>Paisley Cox</span></div></td>
                        <td>22 Jun 2026</td>
                        <td>$615.35</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#943</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=31" alt="Grayson Ward"><span>Grayson Ward</span></div></td>
                        <td>22 Jun 2026</td>
                        <td>$340.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#942</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=33" alt="Sarah Peterson"><span>Sarah Peterson</span></div></td>
                        <td>21 Jun 2026</td>
                        <td>$1,190.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#941</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=35" alt="Isaiah Coleman"><span>Isaiah Coleman</span></div></td>
                        <td>21 Jun 2026</td>
                        <td>$285.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#940</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=37" alt="Vivian Howard"><span>Vivian Howard</span></div></td>
                        <td>20 Jun 2026</td>
                        <td>$820.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#939</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=39" alt="Nathaniel Flores"><span>Nathaniel Flores</span></div></td>
                        <td>20 Jun 2026</td>
                        <td>$1,470.80</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#938</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=41" alt="Madeline Jenkins"><span>Madeline Jenkins</span></div></td>
                        <td>19 Jun 2026</td>
                        <td>$115.50</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#937</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=43" alt="Jeremiah Long"><span>Jeremiah Long</span></div></td>
                        <td>19 Jun 2026</td>
                        <td>$575.20</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#936</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=45" alt="Ariana Perry"><span>Ariana Perry</span></div></td>
                        <td>18 Jun 2026</td>
                        <td>$955.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#935</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=47" alt="Eli Powell"><span>Eli Powell</span></div></td>
                        <td>18 Jun 2026</td>
                        <td>$235.75</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#934</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=49" alt="Caroline Simmons"><span>Caroline Simmons</span></div></td>
                        <td>17 Jun 2026</td>
                        <td>$1,725.50</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#933</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=51" alt="Axel Bryant"><span>Axel Bryant</span></div></td>
                        <td>17 Jun 2026</td>
                        <td>$410.20</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#932</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=53" alt="Autumn Russell"><span>Autumn Russell</span></div></td>
                        <td>16 Jun 2026</td>
                        <td>$675.00</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#931</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=55" alt="Dominic Griffin"><span>Dominic Griffin</span></div></td>
                        <td>16 Jun 2026</td>
                        <td>$1,295.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#930</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=57" alt="Melanie Diaz"><span>Melanie Diaz</span></div></td>
                        <td>15 Jun 2026</td>
                        <td>$165.60</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#929</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=59" alt="Cole Hayes"><span>Cole Hayes</span></div></td>
                        <td>15 Jun 2026</td>
                        <td>$805.25</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#928</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=61" alt="Ivy Myers"><span>Ivy Myers</span></div></td>
                        <td>14 Jun 2026</td>
                        <td>$2,410.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#927</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=63" alt="Damian Ford"><span>Damian Ford</span></div></td>
                        <td>14 Jun 2026</td>
                        <td>$315.80</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#926</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=65" alt="Piper Hamilton"><span>Piper Hamilton</span></div></td>
                        <td>13 Jun 2026</td>
                        <td>$560.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#925</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=67" alt="Maxwell Graham"><span>Maxwell Graham</span></div></td>
                        <td>13 Jun 2026</td>
                        <td>$885.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#924</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=69" alt="Reagan Sullivan"><span>Reagan Sullivan</span></div></td>
                        <td>12 Jun 2026</td>
                        <td>$1,120.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#923</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=70" alt="Jace Wallace"><span>Jace Wallace</span></div></td>
                        <td>12 Jun 2026</td>
                        <td>$229.50</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#922</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=5" alt="Adeline Woods"><span>Adeline Woods</span></div></td>
                        <td>11 Jun 2026</td>
                        <td>$665.25</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#921</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=8" alt="Emmett Cole"><span>Emmett Cole</span></div></td>
                        <td>11 Jun 2026</td>
                        <td>$1,575.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#920</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=10" alt="Josephine West"><span>Josephine West</span></div></td>
                        <td>10 Jun 2026</td>
                        <td>$102.30</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#919</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=12" alt="Finn Stone"><span>Finn Stone</span></div></td>
                        <td>10 Jun 2026</td>
                        <td>$748.60</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#918</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=14" alt="Katherine Fisher"><span>Katherine Fisher</span></div></td>
                        <td>09 Jun 2026</td>
                        <td>$1,340.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#917</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=16" alt="Brayden Ellis"><span>Brayden Ellis</span></div></td>
                        <td>09 Jun 2026</td>
                        <td>$270.90</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#916</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=18" alt="Valeria Harrison"><span>Valeria Harrison</span></div></td>
                        <td>08 Jun 2026</td>
                        <td>$495.75</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#915</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=20" alt="Tucker Gibson"><span>Tucker Gibson</span></div></td>
                        <td>08 Jun 2026</td>
                        <td>$935.50</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#914</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=22" alt="Daisy McDonald"><span>Daisy McDonald</span></div></td>
                        <td>07 Jun 2026</td>
                        <td>$1,860.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#913</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=24" alt="Lane Marshall"><span>Lane Marshall</span></div></td>
                        <td>07 Jun 2026</td>
                        <td>$140.20</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#912</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=26" alt="Margaret Owens"><span>Margaret Owens</span></div></td>
                        <td>06 Jun 2026</td>
                        <td>$620.50</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#911</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=28" alt="Zachary Reynolds"><span>Zachary Reynolds</span></div></td>
                        <td>06 Jun 2026</td>
                        <td>$2,090.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#910</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=30" alt="Alina Spencer"><span>Alina Spencer</span></div></td>
                        <td>05 Jun 2026</td>
                        <td>$382.75</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#909</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=32" alt="Peter Warren"><span>Peter Warren</span></div></td>
                        <td>05 Jun 2026</td>
                        <td>$805.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#908</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=34" alt="Samantha Greene"><span>Samantha Greene</span></div></td>
                        <td>04 Jun 2026</td>
                        <td>$510.20</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#907</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=36" alt="Miles Turner"><span>Miles Turner</span></div></td>
                        <td>04 Jun 2026</td>
                        <td>$1,290.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#906</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=38" alt="Eliana Morris"><span>Eliana Morris</span></div></td>
                        <td>03 Jun 2026</td>
                        <td>$245.75</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#905</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=40" alt="Gavin Price"><span>Gavin Price</span></div></td>
                        <td>03 Jun 2026</td>
                        <td>$95.60</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#904</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=42" alt="Lucia Bennett"><span>Lucia Bennett</span></div></td>
                        <td>02 Jun 2026</td>
                        <td>$730.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#903</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=44" alt="Asher Brooks"><span>Asher Brooks</span></div></td>
                        <td>02 Jun 2026</td>
                        <td>$380.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#902</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=46" alt="Eva Howard"><span>Eva Howard</span></div></td>
                        <td>01 Jun 2026</td>
                        <td>$875.20</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#901</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=48" alt="Roman Clarke"><span>Roman Clarke</span></div></td>
                        <td>01 Jun 2026</td>
                        <td>$1,950.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#900</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=50" alt="Alice Morgan"><span>Alice Morgan</span></div></td>
                        <td>31 May 2026</td>
                        <td>$132.50</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#899</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=52" alt="Jasper Reed"><span>Jasper Reed</span></div></td>
                        <td>31 May 2026</td>
                        <td>$468.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#898</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=54" alt="Rose Sullivan"><span>Rose Sullivan</span></div></td>
                        <td>30 May 2026</td>
                        <td>$705.60</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#897</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=56" alt="Dean Peterson"><span>Dean Peterson</span></div></td>
                        <td>30 May 2026</td>
                        <td>$1,060.25</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#896</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=58" alt="Lola Campbell"><span>Lola Campbell</span></div></td>
                        <td>29 May 2026</td>
                        <td>$2,310.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#895</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=60" alt="Simon Russell"><span>Simon Russell</span></div></td>
                        <td>29 May 2026</td>
                        <td>$195.80</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#894</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=62" alt="Isla Foster"><span>Isla Foster</span></div></td>
                        <td>28 May 2026</td>
                        <td>$650.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#893</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=64" alt="Leonard Gray"><span>Leonard Gray</span></div></td>
                        <td>28 May 2026</td>
                        <td>$325.40</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#892</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=66" alt="Amara Jenkins"><span>Amara Jenkins</span></div></td>
                        <td>27 May 2026</td>
                        <td>$1,140.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#891</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=68" alt="Graham Perry"><span>Graham Perry</span></div></td>
                        <td>27 May 2026</td>
                        <td>$298.75</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#890</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=70" alt="Cecilia Long"><span>Cecilia Long</span></div></td>
                        <td>26 May 2026</td>
                        <td>$860.00</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#889</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=3" alt="Matteo Powell"><span>Matteo Powell</span></div></td>
                        <td>26 May 2026</td>
                        <td>$1,515.60</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#888</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=5" alt="Hope Adams"><span>Hope Adams</span></div></td>
                        <td>25 May 2026</td>
                        <td>$109.90</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#887</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=7" alt="Knox Rivera"><span>Knox Rivera</span></div></td>
                        <td>25 May 2026</td>
                        <td>$585.40</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#886</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=9" alt="Rebecca Carter"><span>Rebecca Carter</span></div></td>
                        <td>24 May 2026</td>
                        <td>$970.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#885</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=11" alt="Felix Sanchez"><span>Felix Sanchez</span></div></td>
                        <td>24 May 2026</td>
                        <td>$240.20</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#884</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=13" alt="Georgia Coleman"><span>Georgia Coleman</span></div></td>
                        <td>23 May 2026</td>
                        <td>$1,760.80</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#883</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=15" alt="Rhett Butler"><span>Rhett Butler</span></div></td>
                        <td>23 May 2026</td>
                        <td>$420.60</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#882</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=17" alt="Miriam Hughes"><span>Miriam Hughes</span></div></td>
                        <td>22 May 2026</td>
                        <td>$690.00</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#881</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=19" alt="Jensen Patterson"><span>Jensen Patterson</span></div></td>
                        <td>22 May 2026</td>
                        <td>$1,335.25</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#880</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=21" alt="Tessa Griffin"><span>Tessa Griffin</span></div></td>
                        <td>21 May 2026</td>
                        <td>$170.50</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#879</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=23" alt="Malcolm Ford"><span>Malcolm Ford</span></div></td>
                        <td>21 May 2026</td>
                        <td>$830.75</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#878</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=25" alt="Alayna Diaz"><span>Alayna Diaz</span></div></td>
                        <td>20 May 2026</td>
                        <td>$2,460.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#877</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=27" alt="Brady Hayes"><span>Brady Hayes</span></div></td>
                        <td>20 May 2026</td>
                        <td>$320.90</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#876</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=29" alt="Celeste Myers"><span>Celeste Myers</span></div></td>
                        <td>19 May 2026</td>
                        <td>$575.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#875</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=31" alt="Derek Hamilton"><span>Derek Hamilton</span></div></td>
                        <td>19 May 2026</td>
                        <td>$910.75</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#874</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=33" alt="Helena Wallace"><span>Helena Wallace</span></div></td>
                        <td>18 May 2026</td>
                        <td>$1,170.00</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#873</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=35" alt="Trevor Woods"><span>Trevor Woods</span></div></td>
                        <td>18 May 2026</td>
                        <td>$235.50</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#872</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=37" alt="Nadia Cole"><span>Nadia Cole</span></div></td>
                        <td>17 May 2026</td>
                        <td>$680.25</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#871</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=39" alt="Wesley West"><span>Wesley West</span></div></td>
                        <td>17 May 2026</td>
                        <td>$1,615.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#870</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=41" alt="Molly Stone"><span>Molly Stone</span></div></td>
                        <td>16 May 2026</td>
                        <td>$105.30</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#869</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=43" alt="Bryce Fisher"><span>Bryce Fisher</span></div></td>
                        <td>16 May 2026</td>
                        <td>$760.40</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#868</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=45" alt="Diana Ellis"><span>Diana Ellis</span></div></td>
                        <td>15 May 2026</td>
                        <td>$1,385.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#867</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=47" alt="Spencer Harrison"><span>Spencer Harrison</span></div></td>
                        <td>15 May 2026</td>
                        <td>$280.90</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#866</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=49" alt="Elsie Gibson"><span>Elsie Gibson</span></div></td>
                        <td>14 May 2026</td>
                        <td>$505.75</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#865</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=51" alt="Colin McDonald"><span>Colin McDonald</span></div></td>
                        <td>14 May 2026</td>
                        <td>$950.50</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#864</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=53" alt="Serena Marshall"><span>Serena Marshall</span></div></td>
                        <td>13 May 2026</td>
                        <td>$1,905.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#863</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=55" alt="Damon Owens"><span>Damon Owens</span></div></td>
                        <td>13 May 2026</td>
                        <td>$145.20</td>
                        <td><span class="status-pill status-danger">Cancelled</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#862</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=57" alt="April Reynolds"><span>April Reynolds</span></div></td>
                        <td>12 May 2026</td>
                        <td>$635.50</td>
                        <td><span class="status-pill status-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#861</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=59" alt="Kieran Spencer"><span>Kieran Spencer</span></div></td>
                        <td>12 May 2026</td>
                        <td>$2,140.00</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#860</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=61" alt="Rosa Warren"><span>Rosa Warren</span></div></td>
                        <td>11 May 2026</td>
                        <td>$390.75</td>
                        <td><span class="status-pill status-info">Processing</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
                    </tr>
                    <tr>
                        <td>#859</td>
                        <td><div class="table-user"><img src="https://i.pravatar.cc/40?img=63" alt="Hector Bryant"><span>Hector Bryant</span></div></td>
                        <td>11 May 2026</td>
                        <td>$820.40</td>
                        <td><span class="status-pill status-success">Completed</span></td>
                        <td><button class="btn btn-sm btn-light"><i class="fa-solid fa-ellipsis"></i></button></td>
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