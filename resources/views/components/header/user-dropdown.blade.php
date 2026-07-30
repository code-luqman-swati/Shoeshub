
    <!-- User Button -->
   
             <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <button
            type="submit"
            class="flex items-center wr-2 pl-8 py-2 font-medium text-gray-700 rounded-lg group text-theme-sm dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300 "
            @click="closeDropdown()"
        >

            <span class="text-gray-500 group-hover:text-gray-700 dark:group-hover:text-gray-300">

                <svg 
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>

                </svg>

            </span>

            Sign out

        </button>

    </form>
        </span>

      
    </button>


