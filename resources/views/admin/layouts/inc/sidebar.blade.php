<!-- Sidemenu -->
<div class="navbar-content scroll-div ps ps--active-y">
    <ul class="nav pcoded-inner-navbar">
        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-home"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_dashboard', 1) }}</span>
            </a>
        </li>
        @canany(['faculty-create', 'faculty-view', 'program-create', 'program-view', 'batch-create', 'batch-view',
        'session-create', 'session-view', 'semester-create', 'semester-view', 'section-create', 'section-view',
        'class-room-create', 'class-room-view', 'subject-create', 'subject-view', 'enroll-subject-create',
        'enroll-subject-view', 'class-routine-create', 'class-routine-view', 'class-routine-print',
        'exam-routine-create', 'exam-routine-view', 'exam-routine-print', 'class-routine-teacher',
        'routine-setting-class', 'routine-setting-exam'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/academic*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fab fa-accusoft"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_academic', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['department-create', 'department-view'])
                <li class="{{ Request::is('admin/staff/department*') ? 'active' : '' }}"><a
                        href="{{ route('admin.department.index') }}"
                        class="">{{ trans_choice('module_department', 2) }}</a></li>
                @endcanany

                @canany(['regulation-view', 'regulation-create'])
                <li class="{{ Request::is('admin/web/regulation*') ? 'active' : '' }}"><a
                        href="{{ route('admin.regulation.index') }}" class="">{{ trans_choice('Regulation', 2) }}</a>
                </li>
                @endcanany
                {{-- @canany(['faculty-create', 'faculty-view'])
                <li class="{{ Request::is('admin/academic/faculty*') ? 'active' : '' }}"><a
                    href="{{ route('admin.faculty.index') }}" class="">{{ trans_choice('module_faculty', 2) }}</a>
        </li>
        @endcanany
        @canany(['program-create', 'program-view'])
        <li class="{{ Request::is('admin/academic/program*') ? 'active' : '' }}"><a
                href="{{ route('admin.program.index') }}" class="">{{ trans_choice('module_program', 2) }}</a></li>
        @endcanany --}}
    </ul>
    </li>
    @endcanany
    @canany(['user-create', 'user-view', 'user-password-print', 'user-password-change', 'staff-daily-attendance-action',
    'staff-daily-attendance-report', 'staff-hourly-attendance-action', 'staff-hourly-attendance-report',
    'staff-note-create', 'staff-note-view', 'payroll-view', 'payroll-action', 'payroll-print', 'payroll-report',
    'staff-leave-manage-edit', 'staff-leave-manage-view', 'staff-leave-create', 'staff-leave-view', 'leave-type-create',
    'leave-type-view', 'work-shift-type-create', 'work-shift-type-view', 'designation-create', 'designation-view',
    'department-create', 'department-view', 'tax-setting-create', 'tax-setting-view', 'pay-slip-setting-view'])
    <li class="nav-item pcoded-hasmenu {{ Request::is('admin/staff*') ? 'pcoded-trigger active' : '' }}">
        <a href="#!" class="nav-link">
            <span class="pcoded-micon"><i class="fas fa-users-cog"></i></span>
            <span class="pcoded-mtext">{{ trans_choice('module_human_resource', 2) }}</span>
        </a>
        <ul class="pcoded-submenu">
            @canany(['user-create', 'user-view', 'user-password-print', 'user-password-change',])
            <li class="{{ Request::is('admin/staff/user*') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}"
                    class="">{{ trans_choice('module_staff', 1) }} {{ __('list') }}</a></li>
            @endcanany
            {{-- @canany(['staff-daily-attendance-action', 'staff-daily-attendance-report', 'staff-hourly-attendance-action', 'staff-hourly-attendance-report'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/staff-daily-attendance*') ? 'pcoded-trigger active' : '' }}
            {{ Request::is('admin/staff-daily-report*') ? 'pcoded-trigger active' : '' }}
            {{ Request::is('admin/staff-hourly-attendance*') ? 'pcoded-trigger active' : '' }}
            {{ Request::is('admin/staff-hourly-report*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-mtext">{{ trans_choice('module_staff_attendance', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @can('staff-daily-attendance-action')
                <li class="{{ Request::is('admin/staff-daily-attendance*') ? 'active' : '' }}"><a
                        href="{{ route('admin.staff-daily-attendance.index') }}"
                        class="">{{ trans_choice('module_staff_daily_attendance', 2) }}</a></li>
                @endcan
                @can('staff-daily-attendance-report')
                <li class="{{ Request::is('admin/staff-daily-report*') ? 'active' : '' }}"><a
                        href="{{ route('admin.staff-daily-attendance.report') }}"
                        class="">{{ trans_choice('module_staff_daily_report', 2) }}</a></li>
                @endcan
                @can('staff-hourly-attendance-action')
                <li class="{{ Request::is('admin/staff-hourly-attendance*') ? 'active' : '' }}"><a
                        href="{{ route('admin.staff-hourly-attendance.index') }}"
                        class="">{{ trans_choice('module_staff_hourly_attendance', 2) }}</a></li>
                @endcan
                @can('staff-hourly-attendance-report')
                <li class="{{ Request::is('admin/staff-hourly-report*') ? 'active' : '' }}"><a
                        href="{{ route('admin.staff-hourly-attendance.report') }}"
                        class="">{{ trans_choice('module_staff_hourly_report', 2) }}</a></li>
                @endcan
            </ul>
    </li>
    @endcanany
    @canany(['staff-note-create', 'staff-note-view'])
    <li class="{{ Request::is('admin/staff/staff-note*') ? 'active' : '' }}"><a
            href="{{ route('admin.staff-note.index') }}" class="">{{ trans_choice('module_staff_note', 2) }}</a></li>
    @endcanany
    @canany(['payroll-view', 'payroll-action', 'payroll-print'])
    <li class="{{ Request::is('admin/staff/payroll') ? 'active' : '' }}"><a href="{{ route('admin.payroll.index') }}"
            class="">{{ trans_choice('module_payroll', 2) }}</a></li>
    @endcanany
    @canany(['payroll-report'])
    <li class="{{ Request::is('admin/staff/payroll-report*') ? 'active' : '' }}"><a
            href="{{ route('admin.payroll.report') }}" class="">{{ trans_choice('module_payroll_report', 2) }}</a></li>
    @endcanany
    @canany(['staff-leave-manage-edit', 'staff-leave-manage-view'])
    <li class="{{ Request::is('admin/staff/leave-manage*') ? 'active' : '' }}"><a
            href="{{ route('admin.leave-manage.index') }}" class="">{{ trans_choice('module_leave_manage', 2) }}</a>
    </li>
    @endcanany
    @canany(['staff-leave-create', 'staff-leave-view'])
    <li class="{{ Request::is('admin/staff/staff-leave*') ? 'active' : '' }}"><a
            href="{{ route('admin.staff-leave.index') }}" class="">{{ trans_choice('module_apply_leave', 2) }}</a></li>
    @endcanany
    @canany(['leave-type-create', 'leave-type-view'])
    <li class="{{ Request::is('admin/staff/leave-type*') ? 'active' : '' }}"><a
            href="{{ route('admin.leave-type.index') }}" class="">{{ trans_choice('module_leave_type', 2) }}</a></li>
    @endcanany
    @canany(['work-shift-type-create', 'work-shift-type-view'])
    <li class="{{ Request::is('admin/staff/work-shift-type*') ? 'active' : '' }}"><a
            href="{{ route('admin.work-shift-type.index') }}"
            class="">{{ trans_choice('module_work_shift_type', 2) }}</a></li>
    @endcanany --}}
    @canany(['designation-create', 'designation-view'])
    <li class="{{ Request::is('admin/staff/designation*') ? 'active' : '' }}"><a
            href="{{ route('admin.designation.index') }}" class="">{{ trans_choice('module_designation', 2) }}</a></li>
    @endcanany
    {{-- @canany(['tax-setting-create', 'tax-setting-view', 'pay-slip-setting-view'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/staff/tax-setting*') ? 'pcoded-trigger active' : '' }}
    {{ Request::is('admin/staff/pay-slip-setting*') ? 'pcoded-trigger active' : '' }}">
    <a href="#!" class="nav-link">
        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
    </a>
    <ul class="pcoded-submenu">
        @canany(['tax-setting-create', 'tax-setting-view'])
        <li class="{{ Request::is('admin/staff/tax-setting*') ? 'active' : '' }}"><a
                href="{{ route('admin.tax-setting.index') }}" class="">{{ trans_choice('module_tax_setting', 2) }}</a>
        </li>
        @endcanany
        @can('pay-slip-setting-view')
        <li class="{{ Request::is('admin/staff/pay-slip-setting*') ? 'active' : '' }}"><a
                href="{{ route('admin.pay-slip-setting.index') }}"
                class="">{{ trans_choice('module_pay_slip_setting', 1) }}</a></li>
        @endcan
    </ul>
    </li>
    @endcanany --}}
    </ul>
    </li>
    @endcanany


    @if(Auth::user()->is_admin=='1')


    @canany(['topbar-setting-view', 'social-setting-view', 'slider-view', 'slider-create', 'about-us-view',
    'feature-view', 'feature-create', 'course-view', 'course-create', 'web-event-view', 'web-event-create', 'news-view',
    'news-create', 'gallery-view', 'gallery-create', 'faq-view', 'faq-create', 'testimonial-view', 'testimonial-create',
    'page-view', 'page-create', 'call-to-action-view'])
    <li class="nav-item pcoded-hasmenu {{ Request::is('admin/web*') ? 'pcoded-trigger active' : '' }}">
        <a href="#!" class="nav-link">
            <span class="pcoded-micon"><i class="fas fa-globe"></i></span>
            <span class="pcoded-mtext">{{ trans_choice('module_front_web', 2) }}</span>
        </a>
        <ul class="pcoded-submenu">

        
            {{-- @can('topbar-setting-view')
                <li class="{{ Request::is('admin/web/topbar-setting*') ? 'active' : '' }}"><a
                href="{{ route('admin.topbar-setting.index') }}"
                class="">{{ trans_choice('module_topbar_setting', 1) }}</a>
                 </li>
    @endcan
    @can('social-setting-view')
    <li class="{{ Request::is('admin/web/social-setting*') ? 'active' : '' }}"><a
            href="{{ route('admin.social-setting.index') }}" class="">{{ trans_choice('module_social_setting', 1) }}</a>
    </li>
    @endcan
    @canany(['slider-view', 'slider-create'])
    <li class="{{ Request::is('admin/web/slider*') ? 'active' : '' }}"><a href="{{ route('admin.slider.index') }}"
            class="">{{ trans_choice('module_slider', 2) }}</a></li>
    @endcanany --}}
    @canany(['slider-view', 'slider-create'])
    <li class="{{ Request::is('admin/home-slider*') ? 'active' : '' }}"><a href="{{ route('admin.home-slider.index') }}"
            class=""><i class="fas fa-home"></i> Home Page {{ trans_choice('module_slider', 2) }}</a></li>
    @endcanany
    {{--
    @can('about-us-view')
    <li class="{{ Request::is('admin/web/about-us*') ? 'active' : '' }}"><a href="{{ route('admin.about-us.index') }}"
            class="">{{ trans_choice('module_about_us', 1) }}</a></li>
    @endcan
    @can('achievements-view')
    <li class="{{ Request::is('admin/web/achievements*') ? 'active' : '' }}"><a
            href="{{ route('admin.achievements.index') }}" class="">{{ trans_choice('Achievements', 1) }}</a></li>
    @endcan
    @canany(['course-view', 'course-create'])
    <li class="{{ Request::is('admin/web/course*') ? 'active' : '' }}"><a href="{{ route('admin.course.index') }}"
            class="">{{ trans_choice('module_course', 2) }}</a></li>
    @endcanany
    @canany(['web-event-view', 'web-event-create'])
    <li class="{{ Request::is('admin/web/web-event*') ? 'active' : '' }}"><a href="{{ route('admin.web-event.index') }}"
            class="">{{ trans_choice('module_event', 2) }}</a></li>
    @endcanany
    @canany(['news-view', 'news-create'])
    <li class="{{ Request::is('admin/web/news*') ? 'active' : '' }}"><a href="{{ route('admin.news.index') }}"
            class="">{{ trans_choice('module_news', 2) }}</a></li>
    @endcanany
    @canany(['faq-view', 'faq-create'])
    <li class="{{ Request::is('admin/web/faq*') ? 'active' : '' }}"><a href="{{ route('admin.faq.index') }}"
            class="">{{ trans_choice('module_faq', 2) }}</a></li>
    @endcanany
    @canany(['gallery-view', 'gallery-create'])
    <li class="{{ Request::is('admin/web/gallery*') ? 'active' : '' }}"><a href="{{ route('admin.gallery.index') }}"
            class="">{{ trans_choice('module_gallery', 2) }}</a></li>
    @endcanany
    @canany(['testimonial-view', 'testimonial-create'])
    <li class="{{ Request::is('admin/web/testimonial*') ? 'active' : '' }}"><a
            href="{{ route('admin.testimonial.index') }}" class="">{{ trans_choice('module_testimonial', 2) }}</a></li>
    @endcanany --}}
    @canany(['testimonial-view', 'testimonial-create'])
    <li class="{{ Request::is('admin/home-testimonial*') ? 'active' : '' }}"><a
            href="{{ route('admin.home-testimonial.index') }}" class=""><i class="fas fa-home"></i> Home Page {{ trans_choice('module_testimonial', 2) }}</a></li>
    @endcanany
    {{--
    @can('call-to-action-view')
    <li class="{{ Request::is('admin/web/call-to-action*') ? 'active' : '' }}"><a
            href="{{ route('admin.call-to-action.index') }}" class="">{{ trans_choice('module_call_to_action', 1) }}</a>
    </li>
    @endcan --}}

    @canany(['page-view', 'page-create'])
    <li class="{{ Request::is('admin/web/page*') ? 'active' : '' }}"><a href="{{ route('admin.page.index') }}"
            class="">{{ trans_choice('module_footer_page', 2) }}</a></li>
    @endcanany
    </ul>
    </li>
    @endcanany

    @endif

    @canany(['setting-view', 'province-view', 'province-create', 'district-view', 'district-create', 'language-view',
    'language-create', 'translations-view', 'translations-create', 'mail-setting-view', 'sms-setting-view',
    'application-setting-view', 'schedule-setting-view', 'bulk-import-export-view', 'role-view', 'role-edit',
    'field-staff', 'field-student', 'field-application', 'student-panel-view'])
    <li
        class="nav-item pcoded-hasmenu {{ Request::is('admin/setting*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/translations*') ? 'pcoded-trigger active' : '' }}">
        <a href="#!" class="nav-link">
            <span class="pcoded-micon"><i class="fas fa-cog"></i></span>
            <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
        </a>
        <ul class="pcoded-submenu">
            @can('setting-view')
            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a href="{{ route('admin.setting.index') }}"
                    class="">{{ trans_choice('module_general_setting', 1) }}</a></li>
            @endcan
            {{-- @canany(['province-view', 'province-create'])
                <li class="{{ Request::is('admin/setting/province*') ? 'active' : '' }}"><a
                href="{{ route('admin.province.index') }}" class="">{{ trans_choice('module_province', 2) }}</a>
    </li>
    @endcanany
    @canany(['district-view', 'district-create'])
    <li class="{{ Request::is('admin/setting/district*') ? 'active' : '' }}"><a
            href="{{ route('admin.district.index') }}" class="">{{ trans_choice('module_district', 2) }}</a></li>
    @endcanany
    @canany(['language-view', 'language-create'])
    <li class="{{ Request::is('admin/setting/language*') ? 'active' : '' }}"><a
            href="{{ route('admin.language.index') }}" class="">{{ trans_choice('module_language', 2) }}</a></li>
    @endcanany
    @canany(['translations-view', 'translations-create'])
    <li class="{{ Request::is('admin/translations*') ? 'active' : '' }}"><a
            href="{{ route('admin.translations.index') }}" class="">{{ trans_choice('module_translate', 2) }}</a></li>
    @endcanany
    @can('mail-setting-view')
    <li class="{{ Request::is('admin/setting/mail-setting*') ? 'active' : '' }}"><a
            href="{{ route('admin.mail-setting.index') }}" class="">{{ trans_choice('module_mail_setting', 1) }}</a>
    </li>
    @endcan
    @can('sms-setting-view')
    <li class="{{ Request::is('admin/setting/sms-setting*') ? 'active' : '' }}"><a
            href="{{ route('admin.sms-setting.index') }}" class="">{{ trans_choice('module_sms_setting', 1) }}</a></li>
    @endcan
    @can('application-setting-view')
    <li class="{{ Request::is('admin/setting/application-setting*') ? 'active' : '' }}"><a
            href="{{ route('admin.application-setting.index') }}"
            class="">{{ trans_choice('module_application_setting', 1) }}</a></li>
    @endcan
    @can('schedule-setting-view')
    <li class="{{ Request::is('admin/setting/schedule-setting*') ? 'active' : '' }}"><a
            href="{{ route('admin.schedule-setting.index') }}"
            class="">{{ trans_choice('module_schedule_setting', 1) }}</a></li>
    @endcan --}}
    {{-- @can('bulk-import-export-view')
                <li class="{{ Request::is('admin/setting/bulk-import-export*') ? 'active' : '' }}"><a
        href="{{ route('admin.bulk.import-export') }}" class="">{{ trans_choice('module_bulk_import_export', 1) }}</a>
    </li>
    @endcan --}}
    @canany(['role-view', 'role-edit'])
    <li class="{{ Request::is('admin/setting/role*') ? 'active' : '' }}"><a href="{{ route('admin.role.index') }}"
            class="">{{ trans_choice('module_role', 2) }}</a></li>
    @endcanany
    {{-- @canany(['field-staff', 'field-student', 'field-application'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/setting/field*') ? 'pcoded-trigger active' : '' }}">
    <a href="#!" class="nav-link">
        <span class="pcoded-mtext">{{ trans_choice('module_field_setting', 2) }}</span>
    </a>
    <ul class="pcoded-submenu">
        @canany(['field-staff'])
        <li class="{{ Request::is('admin/setting/field-user*') ? 'active' : '' }}"><a
                href="{{ route('admin.field.user') }}" class="">{{ trans_choice('module_staff', 2) }}</a></li>
        @endcan
        @canany(['field-student'])
        <li class="{{ Request::is('admin/setting/field-student*') ? 'active' : '' }}"><a
                href="{{ route('admin.field.student') }}" class="">{{ trans_choice('module_student', 2) }}</a></li>
        @endcan
        @canany(['field-application'])
        <li class="{{ Request::is('admin/setting/field-application*') ? 'active' : '' }}"><a
                href="{{ route('admin.field.application') }}" class="">{{ trans_choice('module_application', 2) }}</a>
        </li>
        @endcan
    </ul>
    </li>
    @endcanany
    @canany(['student-panel-view'])
    <li class="{{ Request::is('admin/setting/student-panel*') ? 'active' : '' }}"><a
            href="{{ route('admin.student.panel') }}" class="">{{ trans_choice('module_student_panel', 2) }}</a></li>
    @endcanany --}}
    </ul>
    </li>
    @endcanany
    @canany(['profile-view', 'profile-edit'])
    <li class="nav-item {{ Request::is('admin/profile*') ? 'active' : '' }}">
        <a href="{{ route('admin.profile.index') }}" class="nav-link">
            <span class="pcoded-micon"><i class="fas fa-user-edit"></i></span>
            <span class="pcoded-mtext">{{ trans_choice('module_profile', 2) }}</span>
        </a>
    </li>
    @endcanany
    </ul>
</div>
<!-- End Sidebar -->