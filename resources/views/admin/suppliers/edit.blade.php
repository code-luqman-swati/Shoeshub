@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            Edit Supplier
        </h2>
    </div>


    <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">

        @csrf
        @method('PUT')


        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


            {{-- Name --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Supplier Name
                </label>


                <input 
                    type="text"
                    name="name"
                    value="{{ old('name', $supplier->name) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >


                @error('name')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>



            {{-- Phone --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Phone
                </label>


                <input 
                    type="text"
                    name="phone"
                    value="{{ old('phone', $supplier->phone) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >

            </div>



            {{-- Email --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Email
                </label>


                <input 
                    type="email"
                    name="email"
                    value="{{ old('email', $supplier->email) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >


                @error('email')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>



            {{-- Status --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Status
                </label>


                <select 
                    name="status"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >

                    <option value="1"
                        {{ $supplier->status == 1 ? 'selected' : '' }}>
                        Active
                    </option>


                    <option value="0"
                        {{ $supplier->status == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>


            </div>



            {{-- Address --}}
            <div class="md:col-span-2">

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Address
                </label>


                <textarea
                    name="address"
                    rows="4"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >{{ old('address', $supplier->address) }}</textarea>


            </div>


        </div>



        <div class="mt-6 flex gap-3">


            <button
                type="submit"
                class="rounded-lg bg-brand-500 px-5 py-2 text-white hover:bg-brand-600"
            >
                Update Supplier
            </button>


            <a 
                href="{{ route('admin.suppliers.index') }}"
                class="rounded-lg border px-5 py-2"
            >
                Cancel
            </a>


        </div>


    </form>


</div>

@endsection