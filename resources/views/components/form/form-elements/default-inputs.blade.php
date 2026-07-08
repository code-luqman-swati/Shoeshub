<x-common.component-card title="Add User">
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <!-- First Name -->
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    First Name
                </label>

                <input
                    type="text"
                    name="first_name"
                    placeholder="Enter first name"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
                >
            </div>

            <!-- Last Name -->
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Last Name
                </label>

                <input
                    type="text"
                    name="last_name"
                    placeholder="Enter last name"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
                >
            </div>

            <!-- Email -->
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="user@email.com"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
                >
            </div>

            <!-- Phone -->
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    placeholder="03XXXXXXXXX"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white"
                >
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
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select>
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
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
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

            <!-- Profile Image -->
            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Profile Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="block w-full text-sm text-gray-700 dark:text-gray-300"
                >
            </div>

            <!-- Address -->
            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Address
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="dark:bg-dark-900 shadow-theme-xs w-full rounded-lg border border-gray-300 p-4 dark:border-gray-700 dark:text-white"
                ></textarea>
            </div>

        </div>

        <div class="mt-6 flex gap-3">
            <button
                type="submit"
                class="rounded-lg bg-brand-500 px-6 py-3 text-white hover:bg-brand-600"
            >
                Save User
            </button>

            <a
                href="{{ route('admin.users.index') }}"
                class="rounded-lg border border-gray-300 px-6 py-3"
            >
                Cancel
            </a>
        </div>

    </form>
</x-common.component-card>
