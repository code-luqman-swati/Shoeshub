  <table id="InventoryTable" class="w-full">
            <thead class="border-b border-gray-200 dark:border-gray-700">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Shoe
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Brand
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Size
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Color
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Stock
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Status
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                @foreach($variants as $variant)
                    <tr>

                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-white">
                            {{ $variant->shoe->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $variant->shoe->brand->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $variant->size->size }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            <span class="inline-flex items-center gap-2">
                                <span
                                    class="h-4 w-4 rounded-full border"
                                    style="background-color: {{ $variant->color->hex_code }}">
                                </span>

                                {{ $variant->color->name }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $variant->stock }}
                        </td>

                        <td class="px-6 py-4">
                            @if($variant->stock == 0)
                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs text-red-700">
                                    Out of Stock
                                </span>
                            @elseif($variant->stock <= 5)
                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs text-yellow-700">
                                    Low Stock
                                </span>
                            @else
                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700">
                                    In Stock
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <a
                                href="{{ route('inventory.edit', $variant->id) }}"
                                class="rounded-lg bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700"
                            >
                                Edit
                            </a>
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
                    $('#InventoryTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush