<!DOCTYPE html>
<html>
<head>
	<title>Laporan Daftar Hadir</title>
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
		<h3>Laporan Daftar Hadir</h3>
		<h4>{{ $attendance->attendance_date }}</h4>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Kode Pegawai</th>
				<th>Jam Masuk</th>
				<th>Jam Pulang</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($attendance_report as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->profile->employee_code }}</td>
                            <td>{{ $item->employee_in }}</td>
                            <td>{{ $item->employee_in }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                        @empty

                        @endforelse
		</tbody>
	</table>

</body>
</html>
