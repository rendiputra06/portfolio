<div>
    @if($dataTable->description)
        <p class="text-muted mb-4">{{ $dataTable->description }}</p>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    @foreach($dataTable->columns as $column)
                        <th scope="col" class="text-nowrap">
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($dataTable->rows as $row)
                    <tr>
                        @foreach($dataTable->columns as $column)
                            <td class="text-nowrap">
                                {{ $row->values[$column['key']] ?? '-' }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                
                @if($dataTable->rows->isEmpty())
                    <tr>
                        <td colspan="{{ count($dataTable->columns) }}" class="text-center text-muted">
                            Belum ada data tersedia.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div> 