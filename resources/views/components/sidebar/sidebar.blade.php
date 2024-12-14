<div
    class="vertical-menu rtl:right-0 fixed ltr:left-0 bottom-0 top-16 h-screen border-r bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700 z-10">

    <div data-simplebar class="h-full">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                @if (!auth()->guest())
                    <x-sidebar.divider title="Menu" />
                    @if (auth()->user()->getRoleNames()->first() == 'admin')
                        <x-sidebar.first-single title="Dashboard" key="dashboard" icon="home"
                            url="{{ route('admin.dashboard') }}" />
                        <x-sidebar.first-single title="Domain" key="domain" icon="globe"
                            url="{{ route('admin.domain.index') }}" />
                        <x-sidebar.first-single title="Content" key="dashboard" icon="briefcase"
                            url="{{ route('admin.content.index') }}" />
                        <x-sidebar.first-single title="Admin" key="admin" icon="key"
                            url="{{ route('admin.admin.index') }}" />
                    @endif
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
