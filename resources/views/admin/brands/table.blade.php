 <table id="brandsTable" class="min-w-full">

            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700">

                    <th class="px-5 py-3 text-left">
                        Logo
                    </th>

                    <th class="px-5 py-3 text-left">
                        Brand Name
                    </th>
                  
                     <th class="px-5 py-3 text-left">
                        Slug
                    </th>

                    <th class="px-5 py-3 text-left">
                        Status
                    </th>

                    <th class="px-5 py-3 text-left">
                        Created
                    </th>

                    <th class="px-5 py-3 text-center">
                        Actions
                    </th>

                </tr>
            </thead>

            <tbody>

                @foreach($brands as $brand)

                    <tr id="brand-{{ $brand->id }}"
                        class="border-b border-gray-200 dark:border-gray-700">

                        <!-- Logo -->
                        <td class="px-5 py-4">

                            @if($brand->logo)
                                <img
                                    src="{{ asset('storage/'.$brand->logo) }}"
                                    class="h-14 w-14 rounded-lg border object-cover"
                                    alt="{{ $brand->name }}"
                                >
                            @else
                                <span class="text-gray-400">
                                    No Logo
                                </span>
                            @endif

                        </td>

                        <!-- Name -->
                        <td class="px-5 py-4 font-medium">
                            {{ $brand->name }}
                        </td>
                              
<td class="px-5 py-4 font-medium">
                            {{ $brand->slug }}
                        </td>

                        <!-- Status -->
                        <td class="px-5 py-4">

                            @if($brand->status)

                                <span class="rounded-full bg-green-100 px-3 py-1 text-sm text-green-700">
                                    Active
                                </span>

                            @else

                                <span class="rounded-full bg-red-100 px-3 py-1 text-sm text-red-700">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <!-- Created -->
                        <td class="px-5 py-4">
                            {{ $brand->created_at->format('d M Y') }}
                        </td>

                        <!-- Actions -->
                        <td class="px-5 py-4 text-center">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                    class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.brands.destroy', $brand->id) }}"
                                    method="POST"
                                    class="deleteBrandForm"
                                    data-id="{{ $brand->id }}">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

        @push('scripts')
<script>
$(document).ready(function(){

    $('#global-search').on('keyup', function(){

        let search = $(this).val();

        $.ajax({

            url: window.location.href,

            type:'GET',

            data:{
                search: search
            },

            headers:{
                'X-Requested-With':'XMLHttpRequest'
            },

            success:function(response){

                $('#ajax-table').html(response);
                    $('#brandsTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush