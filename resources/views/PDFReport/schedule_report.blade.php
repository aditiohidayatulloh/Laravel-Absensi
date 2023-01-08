<!DOCTYPE html>
<html>
<head>
	<title>Shedule Report</title>
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
		<h3>Schedule Report</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Hari</th>
                <th>Shift</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($schedule as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->day }}</td>
                            <td>{{ $item->shifts }}</td>
                            <td>{{ $item->time_in }}</td>
                            <td>{{ $item->time_out }}</td>
                        </tr>
                        @empty

                        @endforelse
		</tbody>
	</table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
