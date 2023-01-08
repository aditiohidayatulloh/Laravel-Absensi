<!DOCTYPE html>
<html>
<head>
	<title>Position Report</title>
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
		<h3>Position Report</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Jabatan</th>
				<th>Divisi</th>
				<th>Gologan</th>
				<th>Gaji</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($position as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->position_name }}</td>
                            <td>{{ $item->division->division_name }}</td>
                            <td>{{ $item->salaries->class }}</td>
                            <td>{{ $item->salaries->salary }}</td>
                        </tr>
                        @empty

                        @endforelse
		</tbody>
	</table>

</body>
</html>
