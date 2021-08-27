<div class="flex flex-col top-0 left-0 w-64 bg-white min-h-screen border-r">
    <div class="flex items-center justify-center h-14 border-b">
        <div>Server management</div>
    </div>
    <div class="overflow-y-auto overflow-x-hidden flex-grow">
        <ul class="flex flex-col py-4 space-y-1">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('server.parameters') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Parameters</span>
                </a>
            </li>
            <li>
                <a href="{{ route('server.reboot') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Reboot</span>
                </a>
            </li>
            <li>
                <a href="{{ route('server.reinstall') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Reinstall</span>
                </a>
            </li>
            <li>
                <a href="{{ route('server.password-change') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Password change</span>
                </a>
            </li>
            <li>
                <a href="{{ route('server.hostname-change') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Hostname change</span>
                </a>
            </li>
            <li>
                <a href="{{ route('server.web-console') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                    <span class="ml-2 text-sm tracking-wide truncate">Web console</span>
                </a>
            </li>
        </ul>
    </div>
</div>
