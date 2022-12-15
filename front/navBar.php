<nav class="navbar navbar-expand-lg round-bt-corner navbar-bg navbar-dark justify-content-end">
  <div class="container-fluid">
    <a class="navbar-brand opacity-100" href="home.php">
      <h1 style="font-family: verdana; margin-right: 5%;" class="nav-text">Julius</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
        <li class="nav-item h5">
          <a class="nav-link active " aria-current="page" href="home.php">Home</a>
        </li>
        <li>
          <span class="navbar-text">
            <li class="nav-item dropdown" style="list-style-type: none;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Assinaturas</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="novaAssinatura.php" style="color: black;">Criar</a></li>
                <li><a class="dropdown-item" href="listagemAssinatura.php" style="color: black;">Listar</a></li>
              </ul>
            </li>
          </span>
        </li>
        <li>
          <span class="navbar-text">
            <li class="nav-item dropdown" style="list-style-type: none;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Movimentações</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="novoMovimento.php" style="color: black;">Criar</a></li>
                <li><a class="dropdown-item" href="listagemMovimentacao.php" style="color: black;">Listar</a></li>
              </ul>
            </li>
          </span>
        </li>
      </ul>
      <span class="navbar-text" style="margin-right: 60px;">
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./assets/imagens/noUserProfilePic.png" class="rounded-circle z-depth-2" alt="User Profile Pic" style="width:50px;">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="editarUsuario.php" style="color: black;">Editar Usuario</a></li>
            <li><a class="dropdown-item" href="logOut.php" style="color: black;">Log Out</a></li>
          </ul>
        </li>
      </span>
    </div>
  </div>
</nav>