<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    {{-- <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-angle-right"></i> FAQ</a></li>
                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_page') }}"><i class="fas fa-angle-right"></i> Blog</a></li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fas fa-angle-right"></i> Terms of Use</a></li>
                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-angle-right"></i> Contact</a></li>
                    <li class="{{ Request::is('admin/job-category-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category_page') }}"><i class="fas fa-angle-right"></i> Job Category</a></li>
                    <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_pricing_page') }}"><i class="fas fa-angle-right"></i> Pricing</a></li>
                    <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_other_page') }}"><i class="fas fa-angle-right"></i> Others</a></li>
                </ul>
            </li>

            <li class=""><a class="nav-link" href="setting.html" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Setting"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Form"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Table"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Invoice"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>