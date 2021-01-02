<table border="1" style="width: 100%">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->title }}</td>
            <td>{!! $category->description  !!}</td>
            <td>{{ $category->is_active? 'Active': 'Inactive' }}</td>
        </tr>
    @endforeach
    </tbody>


</table>
