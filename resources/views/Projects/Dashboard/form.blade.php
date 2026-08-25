@extends('Projects.Dashboard.layout.app')
 
@section('title', 'Professional Bootstrap Dashboard')

@section('css')
@endsection
 
@section('content')

<div class="page-heading d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div>
        <h1>Dashboard Form</h1>
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
            <h5>Create New Order</h5>
            <small>Enter the order information below</small>
        </div>
        <button type="submit" form="orderForm" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-floppy-disk me-1"></i>
            Save Order
        </button>
    </div>

    <div class="p-3 p-md-4">
        <form id="orderForm" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="row g-3">
                <!-- Customer Name -->
                <div class="col-12 col-md-6 col-xl-4">
                    <label for="customerName" class="form-label form-label-sm">Customer Name<span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input type="text" class="form-control form-control-sm" id="customerName" name="customer_name" placeholder="Enter customer name" required>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-12 col-md-6 col-xl-4">
                    <label for="email" class="form-label form-label-sm">Email Address</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="name@example.com">
                    </div>
                </div>
                <!-- Phone -->
                <div class="col-12 col-md-6 col-xl-4">
                    <label for="phone" class="form-label form-label-sm">Phone</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        <input type="tel" class="form-control form-control-sm" id="phone" name="phone" placeholder="+90 555 000 00 00">
                    </div>
                </div>
                <!-- Order Date -->
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="orderDate" class="form-label form-label-sm">Order Date<span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-sm" id="orderDate" name="order_date" required>
                </div>
                <!-- Amount -->
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="amount" class="form-label form-label-sm">Amount<span class="text-danger">*</span></label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                        <input type="number" class="form-control form-control-sm" id="amount" name="amount" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                </div>
                <!-- Status -->
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="status" class="form-label form-label-sm">Status</label>
                    <select class="form-select form-select-sm" id="status" name="status">
                        <option value="">Select status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <!-- Payment Method -->
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="paymentMethod" class="form-label form-label-sm">Payment Method</label>
                    <select class="form-select form-select-sm" id="paymentMethod" name="payment_method">
                        <option value="">Select Payment</option>
                        <option value="cash">Cash</option>
                        <option value="card">Credit Card</option>
                        <option value="bank">Bank Transfer</option>
                    </select>
                </div>
                <!-- Address -->
                <div class="col-12 col-md-6">
                    <label for="address" class="form-label form-label-sm">Address</label>
                    <textarea class="form-control form-control-sm" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
                </div>
                <!-- Notes -->
                <div class="col-12 col-md-6">
                    <label for="notes" class="form-label form-label-sm">Notes</label>
                    <textarea class="form-control form-control-sm" id="notes" name="notes" rows="3" placeholder="Write notes..."></textarea>
                </div>
                <!-- File -->
                <div class="col-12">
                    <label for="attachment" class="form-label form-label-sm">Attachment</label>
                    <input type="file" class="form-control form-control-sm" id="attachment" name="attachment">
                    <div class="form-text">JPG, PNG or PDF — max 5 MB</div>
                </div>
            </div>
            <!-- Footer -->
            <div class="form-actions mt-4">
                <button type="reset" class="btn btn-light btn-sm"><i class="fa-solid fa-rotate-left me-1"></i>Reset</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-check me-1"></i>Save Order</button>
            </div>
        </form>
    </div>

</section>
@endsection

@section('javascript')
@endsection