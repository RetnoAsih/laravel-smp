<!DOCTYPE html>
<html>
<head>
    <title>Daftar Admin</title>
</head>
<body>
    <h1>Data Admin</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataadmin as $da)
                <tr>
                    <td>{{ $da->id }}</td>
                    <td>{{ $da->username }}</td>
                    <td>{{ $da->nama_lengkap }}</td>
                    <td>{{ $da->roles }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data admin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
