<!DOCTYPE html>
<html>
<head>
	<title>Employee Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h3>Employee Report</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Kode Pegawai</th>
				<th>Email</th>
				<th>Divisi</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($employee as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->profile->employee_code }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->positions->division->division_name }}</td>
                            <td>{{ $item->positions->position_name }}</td>
                        </tr>
                        @empty

                        @endforelse
		</tbody>
	</table>

</body>
</html>
