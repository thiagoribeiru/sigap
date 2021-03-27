<?
$sql = "";
function conectaSql($local,$user,$pass,$db) {
	global $sql;
	$sql = mysqli_connect($local,$user,$pass,$db);
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit;
	} else {
		$sql->query("SET TIME_ZONE = 'America/Sao_Paulo'");
		date_default_timezone_set('America/Sao_Paulo');
    	tabelasIniciais();
	}
}
function tabelasIniciais() {
	global $sql;
	$sql->query("create table if not exists usuarios (id int not null primary key auto_increment)") or die (mysqli_error($sql));
		addCol("nome","usuarios","varchar(50) not null","id");
		addCol("sobrenome","usuarios","varchar(50) not null","nome");
		addCol("nascimento","usuarios","date not null","sobrenome");
		addCol("email","usuarios","varchar(50) not null","nascimento");
		addCol("telefone","usuarios","varchar(11) not null","email");
		addCol("celular","usuarios","varchar(11) not null","telefone");
		addCol("funcao","usuarios","varchar(50) not null","celular");
		addCol("turno","usuarios","varchar(50) not null","funcao");
		addCol("foto","usuarios","varchar(50) not null","turno");
		addCol("senha","usuarios","varchar(50) not null","foto");
		addCol("permissoes","usuarios","varchar(1000) not null","senha");
		addCol("data","usuarios","datetime not null","permissoes");
		addCol("ativo","usuarios","tinyint(1) not null","data");
	$usuarios = $sql->query("select id from usuarios where id > 0") or die (mysqli_error($sql));
	if (mysqli_num_rows($usuarios)==0) $sql->query("insert into usuarios (nome,sobrenome,nascimento,email,telefone,celular,funcao,turno,foto,senha,permissoes,data,ativo) values ('Thiago','Ribeiro','1991-11-07','thiago.cja@gmail.com','','51997697027','Suporte SIGAP','Diurno','sem-imagem-avatar.jpg','".sha1('12345')."','a:13:{s:26:\"cadastro_adicionarnovoitem\";i:1;s:19:\"cadastro_editaritem\";i:1;s:20:\"cadastro_excluiritem\";i:1;s:26:\"producao_adicionarnovoitem\";i:1;s:21:\"producao_baixaremlote\";i:1;s:22:\"producao_finalizaritem\";i:1;s:19:\"producao_editaritem\";i:1;s:20:\"producao_excluiritem\";i:1;s:21:\"usuarios_editarperfil\";i:1;s:20:\"usuarios_alterarfoto\";i:1;s:21:\"usuarios_alterarsenha\";i:1;s:26:\"usuarios_alterarpermissoes\";i:1;s:32:\"usuarios_gerenciaroutrosusuarios\";i:1;}',now(),'1')") or die (mysqli_error($sql));
}
function addCol($nomeCol,$nomeTab,$tipo,$after) {
	global $sql;
	ini_set('max_execution_time', 300);
	$numArg = func_num_args();
	$qtabs = $sql->query("show columns from $nomeTab like '$nomeCol'") or die(mysqli_error($sql));
	if ($qtabs->num_rows==0) {
		$sql->query("ALTER TABLE $nomeTab ADD COLUMN $nomeCol $tipo after $after;") or die(mysqli_error($sql));
		if ($numArg==5) {
			$stringComando = func_get_arg(4);
			$sql->query($stringComando) or die(mysqli_error($sql));
		}
	}
}
function delCol($nomeCol,$nomeTab) {
	global $sql;
	$qtabs = $sql->query("show columns from $nomeTab like '$nomeCol'") or die(mysqli_error($sql));
	if (mysqli_num_rows($qtabs)!=0) {
		$sql->query("ALTER TABLE $nomeTab DROP $nomeCol") or die(mysqli_error($sql));
	}
}
?>