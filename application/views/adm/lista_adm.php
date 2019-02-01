
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 inpad">
				<h1>Users Now</h1>
			
				<div class="datagrid">
				<table >
					<thead>
						<tr>
							<th>Enrollment</th>
							<th>Name</th>
							<th>Entry</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($lusers as $key) { ?>
						<tr>
							<td><?php echo $key['Matricula']; ?></td>
							<td><?php echo $key['Nombre']." ".$key['APaterno']." ".$key['AMaterno']; ?></td>
							<td><?php echo $key['Entrada']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
				<hr>
			</div>
		</div>
	</div>
</body>