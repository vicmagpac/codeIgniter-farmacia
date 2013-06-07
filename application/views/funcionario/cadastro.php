<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema de farmacia</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"> <!-- Generic style (Boilerplate) -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/960.fluid.css"> <!-- 960.gs Grid System -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css"> <!-- Complete Layout and main styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/buttons.css"> <!-- Buttons, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/lists.css"> <!-- Lists, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/icons.css"> <!-- Icons, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/notifications.css"> <!-- Notifications, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/typography.css"> <!-- Typography -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/forms.css"> <!-- Forms, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/tables.css"> <!-- Tables, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/charts.css"> <!-- Charts, optional -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.8.15.custom.css"> <!-- jQuery UI, optional -->

		<script defer src="<?php echo base_url();?>assets/js/libs/jquery-1.6.2.js"></script> <!-- jQuery UI -->
		<script defer src="<?php echo base_url();?>assets/js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery-ui-1.8.15.custom.min.js"></script> <!-- jQuery UI -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.dataTables.min.js"></script> <!-- Tables -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/excanvas.js"></script> <!-- Charts -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.visualize.js"></script> <!-- Charts -->
		<script defer src="<?php echo base_url();?>assets/js/mylibs/jquery.slidernav.min.js"></script> <!-- Contact List -->
		<script defer src="<?php echo base_url();?>assets/js/common.js"></script> <!-- Generic functions -->
		<script defer src="<?php echo base_url();?>assets/js/script.js"></script> <!-- Generic scripts -->
</head>
<body id="top">
	<div id="container">
	
		<div id="header-surround">
			<header id="header">
				<!-- Place your logo here -->
				<!--<img src="/admin/img/logo.png" alt="Logo" class="logo">-->
				<div class="divider-header divider-vertical"></div>
				<div id="user-info">
					<p>
						<span class="messages">Hello <a href="javascript:void(0);">Usuario</a></span>
					</p>
				</div>
			</header>
		</div>
		<div class="fix-shadow-bottom-height"></div>
		<aside id="sidebar">
			<div id="search-bar">
				<!--
				<form id="search-form" name="search-form" action="search.php" method="post">
					<input type="text" id="query" name="query" value="" autocomplete="off" placeholder="Search">
				</form>
				-->
			</div>
			<section id="login-details">
				<img class="img-left framed" src="<?php echo base_url();?>assets/img/misc/avatar_small.png" alt="Hello Admin">
				<h3>Logged in as</h3>
				<h2><a class="user-button" href="javascript:void(0)">Usuario<span class="arrow-link-down"></span></a></h2>
				<div class="clearfix"></div>
			</section>
			<nav id="nav">
				<ul class="menu collapsible shadow-bottom">
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/packs/fugue/16x16/newspaper.png"/>Funcionario</a>
						<ul class="sub">
							<li><?php echo anchor('/', 'Listar funcionarios'); ?></li>
							<li><?php echo anchor('index.php/funcionario/cadastro', 'Cadastrar funcionario'); ?></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/packs/fugue/16x16/newspaper.png"/>Produtos</a>
						<ul class="sub">
							<li><?php echo anchor('/index.php/produto', 'Listar Produtos'); ?></li>
							<li><?php echo anchor('/index.php/produto/cadastro', 'Cadastrar Produtos'); ?></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/packs/fugue/16x16/newspaper.png"/>Fornecedor</a>
						<ul class="sub">
							<li><?php echo anchor('/index.php/fornecedor', 'Listar Fornecedores'); ?></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/icons/packs/fugue/16x16/newspaper.png"/>Relatórios</a>
						<ul class="sub">
							<li><?php echo anchor('/index.php/relatorio/produtos', 'Relatório de Produtos', array('target' => '_blank')); ?></li>	
							<li><?php echo anchor('/index.php/relatorio/fornecedor', 'Relatório de Fornecedores', array('target' => '_blank')); ?></li>	
						</ul>
					</li>
				</ul>
			</nav>
		</aside>

		<div id="main" role="main">
    	
			<div id="title-bar">
				<ul id="breadcrumbs">
					<li><a href="/admin/" title="Home"><span id="bc-home"></span></a></li>
				</ul>
			</div>
			<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Sistema de farmacia</h1><br />
				<h2>Cadastro Funcionario</h2>
			</div>	<br /><br /><br /><br /><br /><br /><br /><br /><br />
			
			<?php if($this->session->flashdata('sucess')): ?>
				<div class="alert success">
					<span class="hide">x</span>
					<strong>Sucesso</strong>  <?php echo $this->session->flashdata('sucess'); ?>
				</div>
			<?php endif; ?>
			<form id="validate-form" class="block-content form" action="<?php echo site_url('index.php/funcionario/cadastro'); ?>" method="post">
				<div class="_100">
					<p><label for="titulo">Nome</label><input id="nome" name="nome" class="required" required type="text" /></p>
				</div>
				<div class="_100">
					<p><label for="descricao">CPF</label><input id="cpf" name="cpf" class="required" required type="text" /></p>
				</div>
				<div class="_100">
					<p><label for="descricao">Telefone</label><input id="telefone" name="telefone" class="required" required type="text" /></p>
				</div>
				<div class="_100">
					<p>
						<label for="alvo">Cargo</label>
						<select name="cargo" required>
							<option value="">Selecione o Cargo</option>
							<option value="1">Gerente</option>
							<option value="2">Vendedor</option>
						</select>
					</p>
				</div>
				<div class="_100">
					<p>
						<label for="alvo">Sexo</label>
						<select name="sexo" required>
							<option value="">Selecione o sexo</option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select>
					</p>
				</div>
				<div class="_100">
					<p><label for="descricao">Rua</label><input id="rua" name="rua" class="required" required type="text" /></p>
				</div>

				<div class="_100">
					<p><label for="descricao">Número</label><input id="numero" name="numero" class="required" required type="text" /></p>
				</div>

				<div class="_100">
					<p><label for="descricao">Bairro</label><input id="bairro" name="bairro" class="required" required type="text" /></p>
				</div>

				<div class="_100">
					<p><label for="descricao">Complemento</label><input id="complemento" name="complemento" type="text" /></p>
				</div>
				<div class="_100">
					<p>
						<label for="alvo">Cidade</label>
						<select name="cidade" required>
							<option value="">Selecione a cidade</option>
							<?php foreach($cidades as $cid): ?>
								<option value="<?php echo $cid->id ?>"><?php echo $cid->nome ?></option>
							<?php endforeach; ?>
						</select>
					</p>
				</div>

				<div class="clear"></div>
				<div class="block-actions">
					<ul class="actions-left">
						<li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Reset</a></li>
					</ul>
					<ul class="actions-right">
						<li><input type="submit" class="button" value="Cadastrar"/></li>
					</ul>
				</div>
			</form>
					
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
		</div>

		<footer id="footer">
			<div class="container_12">
				<div class="grid_12">
					<div class="footer-icon align-center"><a class="top" href="#top"></a></div>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>