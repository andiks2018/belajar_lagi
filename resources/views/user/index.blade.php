<div class="card">
    <div class="card-body">
        <a href="user/create" class="btn btn-primary"><i class=" fas fa-plus"></i>Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="/user/{{ $item->id }}/edit" class="btn btn-info btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
