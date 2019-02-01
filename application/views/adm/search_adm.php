
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 inpad">
				<h1>Access Summary</h1>
				
				<form class="form-inline" id="search_form">
					
					
					<label for="inicio">Start:</label>
					<input type="date" name="inicio" id="inicio" value="<?php 
						if($inicio=='0'){
							$inicio=date('Y-m-d');
						}
					echo($inicio); ?>" class="form-control">
					
					<label for="fin">End:</label>
					<input type="date" name="fin" id="fin" value="<?php
					if($fin=='0'){
						$fin=date('Y-m-d');
					}
					 echo($fin); ?>" class="form-control">

					<label for="matricula">Enrollment: </label>
					<input type="text" name="matricula" id="matricula" value="<?php
					if($matricula<>'0'){
						echo($matricula);
					}
					?>" class="form-control" required autofocus>

					<input type="submit" name="submit" value="Search" class="form-control btn btn-primary">
				</form>
				
				<div class="datagrid">
				<table >
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Entry</th>
							<th>Exit</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($summary as $key) { ?>
						<tr>
							<td><?php echo $key['idAccesos']; ?></td>
							<td><?php echo $key['Fecha']; ?></td>
							<td><?php echo $key['Entrada']; ?></td>
							<td><?php echo $key['Salida']; ?></td>
							<td><?php echo $key['Tiempo']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
				<hr>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			console.log('Ready');
		});
		$('#search_form').submit(function(e) {
			e.preventDefault();
			var url='<?php echo base_url();?>index.php/adm/buscar/'+$('#matricula').val()+'/'+$('#inicio').val()+'/'+$('#fin').val();
			console.log(url);
			window.location.href = url;
		});
	</script>
</body>