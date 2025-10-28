@extends('layouts.app')

@section('title', 'Dashboard - Rental Car')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated Background Particles */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        animation: pulse 8s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    .container {
        position: relative;
        z-index: 1;
    }

    .dashboard-title {
        font-weight: 700;
        color: #fff;
        letter-spacing: 2px;
        margin-bottom: 50px;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        animation: fadeInDown 0.8s ease-out;
        font-size: 2.5rem;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card {
        border: none;
        border-radius: 25px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: #fff;
        overflow: hidden;
        position: relative;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: fadeInUp 0.8s ease-out backwards;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .stat-card .icon-bg {
        position: absolute;
        right: -30px;
        bottom: -30px;
        font-size: 140px;
        opacity: 0.15;
        transition: all 0.4s ease;
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .stat-card:hover .icon-bg {
        opacity: 0.25;
        right: -20px;
        bottom: -20px;
    }

    .stat-card h3 {
        font-size: 56px;
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        animation: countUp 1s ease-out;
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: scale(0.5);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .stat-card h5 {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }

    .btn-manage {
        border-radius: 30px;
        padding: 10px 28px;
        font-weight: 600;
        font-size: 0.9rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.9);
        color: #333;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-manage::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-manage:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-manage:hover {
        transform: scale(1.08);
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 255, 255, 0.6);
    }

    /* Warna Tema dengan Glassmorphism */
    .bg-primary-gradient {
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.8), rgba(0, 180, 255, 0.8));
    }

    .bg-success-gradient {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.8), rgba(93, 214, 139, 0.8));
    }

    .bg-warning-gradient {
        background: linear-gradient(135deg, rgba(243, 156, 18, 0.8), rgba(241, 196, 15, 0.8));
    }

    .bg-danger-gradient {
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.8), rgba(255, 107, 129, 0.8));
    }

    .bg-info-gradient {
        background: linear-gradient(135deg, rgba(23, 162, 184, 0.8), rgba(91, 192, 235, 0.8));
    }

    .bg-purple-gradient {
        background: linear-gradient(135deg, rgba(111, 66, 193, 0.8), rgba(167, 139, 250, 0.8));
    }

    .footer-text {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 60px;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1.5s ease-out 0.5s backwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Floating Animation for Card Body */
    .card-body {
        animation: float 3s ease-in-out infinite;
    }

    .stat-card:nth-child(1) .card-body { animation-delay: 0s; }
    .stat-card:nth-child(2) .card-body { animation-delay: 0.5s; }
    .stat-card:nth-child(3) .card-body { animation-delay: 1s; }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Shine Effect */
    .stat-card::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent,
            rgba(255, 255, 255, 0.1),
            transparent
        );
        transform: rotate(45deg);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    /* Statistics Section */
    .stats-section {
        margin-top: 50px;
        animation: fadeInUp 1s ease-out 0.4s backwards;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    .info-card h4 {
        color: #333;
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1.3rem;
    }

    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 12px;
        margin-bottom: 12px;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-item .label {
        font-weight: 600;
        color: #555;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .stat-item .value {
        font-weight: 700;
        font-size: 1.3rem;
        color: #667eea;
    }

    .stat-item .icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .progress-bar-custom {
        height: 10px;
        border-radius: 10px;
        background: #e9ecef;
        overflow: hidden;
        margin-top: 8px;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 10px;
        transition: width 1.5s ease-out;
        animation: progressAnimation 2s ease-out;
    }

    @keyframes progressAnimation {
        from { width: 0; }
    }

    /* Recent Activity */
    .activity-item {
        display: flex;
        align-items: center;
        padding: 15px;
        background: #f8f9fa;
        border-left: 4px solid #667eea;
        border-radius: 8px;
        margin-bottom: 12px;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }

    .activity-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 1.2rem;
        color: #fff;
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-weight: 600;
        color: #333;
        margin-bottom: 3px;
    }

    .activity-time {
        font-size: 0.85rem;
        color: #888;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 2rem;
        }
        .stat-card h3 {
            font-size: 42px;
        }
    }
</style>

<div class="container py-5">
    <h2 class="dashboard-title text-center">🚗 Dashboard Rental Car</h2>

    <!-- Main Stats Cards -->
    <div class="row g-4 justify-content-center">
        <!-- Total Cars -->
        <div class="col-md-4">
            <div class="card stat-card bg-primary-gradient shadow-lg">
                <div class="card-body text-center">
                    <i class="bi bi-car-front icon-bg"></i>
                    <h5 class="fw-semibold">Total Cars</h5>
                    <h3>{{ $totalCars }}</h3>
                    <a href="{{ route('cars.index') }}" class="btn btn-manage mt-3">
                        <i class="bi bi-gear-fill me-2"></i>Manage Cars
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="col-md-4">
            <div class="card stat-card bg-success-gradient shadow-lg">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill icon-bg"></i>
                    <h5 class="fw-semibold">Total Customers</h5>
                    <h3>{{ $totalCustomers }}</h3>
                    <a href="{{ route('customers.index') }}" class="btn btn-manage mt-3">
                        <i class="bi bi-person-check-fill me-2"></i>Manage Customers
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Rentals -->
        <div class="col-md-4">
            <div class="card stat-card bg-warning-gradient shadow-lg">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-check icon-bg"></i>
                    <h5 class="fw-semibold">Total Rentals</h5>
                    <h3>{{ $totalRentals }}</h3>
                    <a href="{{ route('rentals.index') }}" class="btn btn-manage mt-3">
                        <i class="bi bi-list-check me-2"></i>Manage Rentals
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Statistics Section -->
    <div class="stats-section">
        <div class="row g-4">
            <!-- Car Statistics -->
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="bi bi-bar-chart-fill me-2" style="color: #667eea;"></i>Car Statistics</h4>
                    
                    <div class="stat-item">
                        <div class="label">
                            <div class="icon bg-primary-gradient">
                                <i class="bi bi-check-circle-fill text-white"></i>
                            </div>
                            Available Cars
                        </div>
                        <div class="value">{{ $totalCars - ($activeRentals ?? 0) }}</div>
                    </div>

                    <div class="stat-item">
                        <div class="label">
                            <div class="icon bg-danger-gradient">
                                <i class="bi bi-clock-fill text-white"></i>
                            </div>
                            Currently Rented
                        </div>
                        <div class="value">{{ $activeRentals ?? 0 }}</div>
                    </div>

                    <div class="stat-item">
                        <div class="label">
                            <div class="icon bg-warning-gradient">
                                <i class="bi bi-tools text-white"></i>
                            </div>
                            Under Maintenance
                        </div>
                        <div class="value">{{ $maintenanceCars ?? 0 }}</div>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted">Utilization Rate</small>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: {{ $totalCars > 0 ? round((($activeRentals ?? 0) / $totalCars) * 100) : 0 }}%"></div>
                        </div>
                        <small class="text-muted">{{ $totalCars > 0 ? round((($activeRentals ?? 0) / $totalCars) * 100) : 0 }}% cars currently in use</small>
                    </div>
                </div>
            </div>

            <!-- Revenue Statistics -->
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="bi bi-currency-dollar me-2" style="color: #28a745;"></i>Revenue Overview</h4>
                    
                    <div class="stat-item">
                        <div class="label">
                            <div class="icon bg-success-gradient">
                                <i class="bi bi-cash-stack text-white"></i>
                            </div>
                            Total Revenue
                        </div>
                        <div class="value">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</div>
                    </div>

                    <div class="stat-item">
                        <div class="label">
                            <div class="icon bg-info-gradient">
                                <i class="bi bi-calendar-month text-white"></i>
                            </div>
                            This Month
                        </div>
                        <div class="value">Rp {{ number_format($monthlyRevenue ?? 0, 0, ',', '.') }}</div>
                    </div>

                    <div class="stat-item">
                        <div class="label">
                            <div class="icon bg-purple-gradient">
                                <i class="bi bi-graph-up-arrow text-white"></i>
                            </div>
                            Average per Rental
                        </div>
                        <div class="value">Rp {{ number_format($totalRentals > 0 ? ($totalRevenue ?? 0) / $totalRentals : 0, 0, ',', '.') }}</div>
                    </div>

                    <div class="mt-3">
                        <small class="text-muted">Monthly Target Progress</small>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: {{ ($monthlyRevenue ?? 0) > 0 ? min(100, round((($monthlyRevenue ?? 0) / 50000000) * 100)) : 0 }}%"></div>
                        </div>
                        <small class="text-muted">{{ ($monthlyRevenue ?? 0) > 0 ? min(100, round((($monthlyRevenue ?? 0) / 50000000) * 100)) : 0 }}% of Rp 50.000.000 target</small>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="col-lg-12">
                <div class="info-card">
                    <h4><i class="bi bi-activity me-2" style="color: #f39c12;"></i>Recent Activities</h4>
                    
                    @if(isset($recentActivities) && count($recentActivities) > 0)
                        @foreach($recentActivities as $activity)
                        <div class="activity-item">
                            <div class="activity-icon" style="background: {{ $activity['color'] ?? '#667eea' }}">
                                <i class="bi bi-{{ $activity['icon'] ?? 'circle-fill' }}"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">{{ $activity['title'] }}</div>
                                <div class="activity-time">{{ $activity['time'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="activity-item">
                            <div class="activity-icon bg-primary-gradient">
                                <i class="bi bi-car-front-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New car added: Toyota Avanza 2024</div>
                                <div class="activity-time">2 hours ago</div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon bg-success-gradient">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New customer registered: John Doe</div>
                                <div class="activity-time">5 hours ago</div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon bg-warning-gradient">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Rental completed: Honda CR-V</div>
                                <div class="activity-time">1 day ago</div>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon bg-info-gradient">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Payment received: Rp 2.500.000</div>
                                <div class="activity-time">1 day ago</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="footer-text text-center mt-5">
        <p>© {{ date('Y') }} Rental Car Management System | Designed with ❤️ using Laravel & Bootstrap</p>
    </div>
</div>
@endsection