<table id="categoriesTable" class="w-full">
        <thead class="border-b border-gray-200 bg-gray-50 dark:border-white/[0.05] dark:bg-gray-900">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                    Image
                </th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                    Category Name
                </th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                    Slug
                </th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                    Description
                </th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                    Status
                </th>
                <th class="px-6 py-4 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                    Actions
                </th>
            </tr>
        </thead>

   <tbody class="divide-y divide-gray-100 dark:divide-white/[0.05]">
    @foreach($categories as $category)
        <tr id="category-{{ $category->id }}"
            class="hover:bg-gray-50 dark:hover:bg-white/[0.02]">

            <td class="px-6 py-4">
                @if($category->image)
                    <img src="{{ Storage::url($category->image) }}"
                         class="h-12 w-12 rounded-xl object-cover">
                @else
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <span class="text-xl text-gray-400">📦</span>
                    </div>
                @endif
            </td>

            <td class="px-6 py-4 font-medium text-gray-800 dark:text-white">
                {{ $category->name }}
            </td>

            <td class="px-6 py-4">
                <code class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $category->slug }}
                </code>
            </td>

            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                {{ $category->description }}
            </td>

            <td class="px-6 py-4">
                <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium
                    {{ $category->status
                        ? 'bg-green-100 text-green-700'
                        : 'bg-red-100 text-red-700' }}">
                    {{ $category->status ? 'Active' : 'Inactive' }}
                </span>
            </td>

            <td class="px-5 py-4 text-center">
                    <div class="flex justify-center gap-2">

                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="rounded bg-blue-500 px-3 py-1 text-white">
                            Edit
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST"
                              class="deleteCategoryForm"
                              data-id="{{ $category->id }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="rounded bg-red-500 px-3 py-1 text-white">
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
                    $('#categoriesTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush