<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_medico'];
			$crm = $_POST['crm_medico'];
			$especialidade = $_POST['especialidade_medico'];

			$sql = "INSERT INTO medico
						(nome_medico,
						crm_medico,
						especialidade_medico)
					VALUES
						('{$nome}',
						'{$crm}',
						'{$especialidade}')";

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
			$nome = $_POST['nome_medico'];
			$crm = $_POST['crm_medico'];
			$especialidade = $_POST['especialidade_medico'];

			$sql = "UPDATE medico SET
						nome_medico='{$nome}',
						crm_medico='{$crm}',
						especialidade_medico='{$especialidade}'
					WHERE
						id_medico=".$_POST["id_medico"];

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
			
			$sql = "DELETE FROM medico 
					WHERE id_medico=".$_REQUEST["id_medico"];

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