<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$paciente = $_POST['paciente_id_paciente'];
			$medico = $_POST['medico_id_medico'];
			$data = $_POST['data_consulta'];
			$hora = $_POST['hora_consulta'];
			$descricao = $_POST['descricao_consulta'];

			$sql = "INSERT INTO consulta (
						paciente_id_paciente,
						medico_id_medico,
						data_consulta,
						hora_consulta, 
						descricao_consulta) 
					VALUES (
						'{$paciente}',
						'{$medico}',
						'{$data}',
						'{$hora}',
						'{$descricao}')";

			$res = $conn->query($sql);

			if($res==true){
				print "<script>
					Toastify({
						text: 'Cadastrado com sucesso!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-medico'; }, 3000);
				</script>";
			}else{
				print "<script>
					Toastify({
						text: 'Erro ao cadastrar!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #ff5f6d, #ffc371)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-medico'; }, 3000);
				</script>";
			}
			
			break;
		
		case 'editar':
			$paciente = $_POST['paciente_id_paciente'];
			$medico = $_POST['medico_id_medico'];
			$data = $_POST['data_consulta'];
			$hora = $_POST['hora_consulta'];
			$descricao = $_POST['descricao_consulta'];

			$sql = "UPDATE consulta SET
						paciente_id_paciente='{$paciente}',
						medico_id_medico='{$medico}',
						data_consulta='{$data}',
						hora_consulta='{$hora}', 
						descricao_consulta='{$descricao}'
					WHERE id_consulta=".$_REQUEST['id_consulta'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>
					Toastify({
						text: 'Editado com sucesso!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-medico'; }, 3000);
				</script>";
			}else{
				print "<script>
					Toastify({
						text: 'Erro ao editar!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #ff5f6d, #ffc371)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-medico'; }, 3000);
				</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM consulta
					WHERE id_consulta=".$_REQUEST['id_consulta'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>
					Toastify({
						text: 'Excluido com sucesso!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-medico'; }, 3000);
				</script>";
			}else{
				print "<script>
					Toastify({
						text: 'Erro ao excluir!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #ff5f6d, #ffc371)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-medico'; }, 3000);
				</script>";
			}
			break;
	}