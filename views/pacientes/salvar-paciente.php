<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_paciente'];
			$email = $_POST['email_paciente'];
			$fone = $_POST['fone_paciente'];
			$endereco = $_POST['endereco_paciente'];
			$cpf = $_POST['cpf_paciente'];
			$data = $_POST['dt_nasc_paciente'];
			$sexo = $_POST['sexo_paciente'];

			$sql = "INSERT INTO paciente (
						nome_paciente,
						cpf_paciente,
						email_paciente,
						fone_paciente,
						dt_nasc_paciente,
						endereco_paciente,
						sexo_paciente) 
					VALUES (
						'{$nome}',
						'{$cpf}',
						'{$email}',
						'{$fone}',
						'{$data}',
						'{$endereco}',
						'{$sexo}' )";
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
					setTimeout(() => { location.href='?page=listar-paciente'; }, 3000);
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
					setTimeout(() => { location.href='?page=listar-paciente'; }, 3000);
				</script>";
			}
			break;
		
		case 'editar':
			$nome = $_POST['nome_paciente'];
			$email = $_POST['email_paciente'];
			$fone = $_POST['fone_paciente'];
			$endereco = $_POST['endereco_paciente'];
			$cpf = $_POST['cpf_paciente'];
			$data = $_POST['dt_nasc_paciente'];
			$sexo = $_POST['sexo_paciente'];

			$sql = "UPDATE paciente SET
						nome_paciente='{$nome}',
						cpf_paciente='{$cpf}',
						email_paciente='{$email}',
						fone_paciente='{$fone}',
						dt_nasc_paciente='{$data}',
						endereco_paciente='{$endereco}',
						sexo_paciente='{$sexo}'
					WHERE id_paciente=".$_REQUEST['id_paciente'];

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
					setTimeout(() => { location.href='?page=listar-paciente'; }, 3000);
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
					setTimeout(() => { location.href='?page=listar-paciente'; }, 3000);
				</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM paciente
					WHERE id_paciente=".$_REQUEST['id_paciente'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>
					Toastify({
						text: 'Excluiu com sucesso!',
						duration: 3000,
						gravity: 'bottom',
						position: 'right',
						backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)'
					}).showToast();
					setTimeout(() => { location.href='?page=listar-paciente'; }, 3000);
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
					setTimeout(() => { location.href='?page=listar-paciente'; }, 3000);
				</script>";
			}
			break;
	}