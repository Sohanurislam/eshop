<table border="1" style="width: 100%">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{!! $product->description !!} </td>
            <td>{{ $product->is_active? 'Active': 'Inactive' }}</td>
        </tr>
    @endforeach
    </tbody>


</table>
