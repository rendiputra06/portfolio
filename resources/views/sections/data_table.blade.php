<div>
    @if($dataTable->description)
        <p class="text-gray-600 mb-4">{{ $dataTable->description }}</p>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    @foreach($dataTable->columns as $column)
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($dataTable->rows as $row)
                    <tr>
                        @foreach($dataTable->columns as $column)
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $row->values[$column['key']] ?? '-' }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                
                @if($dataTable->rows->isEmpty())
                    <tr>
                        <td colspan="{{ count($dataTable->columns) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                            Belum ada data tersedia.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div> 