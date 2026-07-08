<x-common.component-card
    title="Add Employee"
    subtitle="Add a new employee to the system."
>

<form action="{{ route('admin.employees.store') }}"
      method="POST">

    @csrf

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        <!-- Name -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Full Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter full name"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
            >

            @error('name')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="user@email.com"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
            >

            @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Phone
            </label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="03XXXXXXXXX"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
            >

            @error('phone')
                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Role
            </label>

            <select
                name="role"
                class="dark:bg-dark-900 shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 dark:border-gray-700 dark:text-white"
            >
                <option value="">Select Role</option>

                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="staff" {{ old('role')=='staff' ? 'selected' : '' }}>
                    Staff
                </option>

                <option value="customer" {{ old('role')=='customer' ? 'selected' : '' }}>
                    Customer
                </option>
            </select>

            @error('role')
                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Status
            </label>

            <select
                name="status"
                class="dark:bg-dark-900 shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 dark:border-gray-700 dark:text-white"
            >
                <option value="1" {{ old('status',1)==1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ old('status')==='0' ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>

            @error('status')
                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="dark:bg-dark-900 shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 dark:border-gray-700 dark:text-white"
            >

            @error('password')
                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Confirm Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                class="dark:bg-dark-900 shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 dark:border-gray-700 dark:text-white"
            >
        </div>

    </div>

    <div class="mt-6 flex gap-3">

        <button
            type="submit"
            class="rounded-lg bg-brand-500 px-6 py-3 text-white hover:bg-brand-600"
        >
            Save Employee
        </button>

        <a
            href="{{ route('admin.employees.index') }}"
            class="rounded-lg border border-gray-300 px-6 py-3"
        >
            Cancel
        </a>

    </div>

</form>

</x-common.component-card>