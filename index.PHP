<?php
header("Content-Type: text/html; charset=UTF-8", true);
//Conexão com BD MySQL
define("SERVER", getenv("DB_HOST") ?: "localhost");
define("USUARIO", getenv("DB_USER") ?: "root");
define("SENHA", getenv("DB_PASS") ?: "");
define("DB", getenv("DB_NAME") ?: "blog");
$conexao = mysqli_connect(SERVER, USUARIO, SENHA, DB);
/* verifica status da conexão */
if (mysqli_connect_errno()) {
  //avisa que aconteceu algo errado e apresenta o motivo do erro na conexão
  echo "Falha ao conectar com o MySQL. Motivo: " . mysqli_connect_error();
} else {
  //a conexão foi realizada com sucesso
  echo "Status OK. <br> Banco de dados " . DB . " conectado! <br>";
  $sql = "select * FROM T_Apres";
  if ($result = mysqli_query($conexao, $sql)) {
    while ($registro = mysqli_fetch_row($result)) {
      echo "Autor: " . $registro[0] . "<br>Descr: " . $registro[1] . "<br> Foto: " . $registro[2] . "<br>";
    }
    mysqli_free_result($result);
  }


  define("Autor_Blog", 'Daniel dos Santos');
  $Bloco_TOP5 = array(
    "Cânion Guartelá é um cânion brasileiro situado no planalto dos Campos Gerais, entre os municípios de Castro e Tibagi, no Paraná. É considerado um dos maiores cânions do mundo em extensão, o 6º mais longo do mundo e o mais longo do Brasil.<br> O Cânion do Guartelá é uma garganta retilínea com cerca de 30 km de extensão e desnível máximo de 450 metros. Foi escavado pelo Rio Iapó, que...",
    "nComent" => "2"
  );
  $NPostagens = 0;
}
?>

<!DOCTYPE html>
<?php
// Funções
function Monta_Cabecalho_Principal($autor)
{
  $Texto = "<header class='w3-container w3-center w3-padding-32'>";
  $Texto = $Texto . "<h1><b>Meu Blog Pessoal</b></h1>";
  $Texto = $Texto . "<p>Seja Bem vindo. Criado por <span class='w3-tag'>";
  $Texto = $Texto . $autor . "</span></p>";
  $Texto = $Texto . "</header>";

  return $Texto;
}
function Exibe_Categoria($Nome, $Selecionado)
{
  $Texto = "";
  if ($Selecionado)
    $Texto = "<span class='w3-tag w3-black w3-margin-bottom'>";
  else
    $Texto = "<span class='w3-tag w3-light-grey w3-small w3-margin-bottom'>";

  $Texto = $Texto . $Nome . "</span>";

  return $Texto;
}
$sql = "select * FROM T_Apres";
if ($result = mysqli_query($conexao, $sql)) {
  if ($registro = mysqli_fetch_row($result)) {
    $Bloco_Apres = array(
      "img" => $registro[2],
      "nome" => $registro[0],
      "descr" => $registro[1]
    );
  }
}
$NPostagens = 0;
// Matriz de postagens
$Bloco_Postagens = array(
  1 => array(
    "img" => "https://www.w3schools.com/w3images/woods.jpg",
    "titulo" => "GAMES",
    "sTitulo" => "O mundo virtual está cada vez mais real!",
    "data" => "Agosto 8, 2018",
    "texto" => "Cada vez mais as novas tecnologias estão a melhorar a capacidade dos games. Estão a se transformar em verdadeiras obras de arte. Muitas vezes fica difícil distinguir o real do virtual. Os últimos lançamentos da...",
    "nComent" => "2"
  ),
  2 => array(
    "img" => "https://www.w3schools.com/w3images/bridge.jpg",
    "titulo" => "GUARTELÁ",
    "sTitulo" => "Um Passeio Inesquecível",
    "data" => "Julho 14, 2018",
    "texto" => "Cânion Guartelá é um cânion brasileiro situado no planalto dos Campos Gerais, entre os municípios de Castro e Tibagi, no Paraná. É considerado um dos maiores cânions do mundo em extensão, o 6º mais longo do mundo e o mais longo do Brasil.<br> O Cânion do Guartelá é uma garganta retilínea com cerca de 30 km de extensão e desnível máximo de 450 metros. Foi escavado pelo Rio Iapó, que...",
    "nComent" => "2"
  )
);

?>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Meu Blog Pessoal</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="w3-light-grey">

  <?php
  echo Monta_Cabecalho_Principal($Bloco_Apres["nome"]);
  ?>

  <div class="w3-row">
    <div class="w3-col m8 s12 w3-container">
      <?php
      while ($NPostagens < 2) {
        $NPostagens++;
      ?>
        <div class="w3-card-4 w3-margin w3-white">
          <img src="<?php echo $Bloco_Postagens[$NPostagens]["img"]; ?>" alt="Nature" style="width:100%">

          <div class="w3-container">
            <h3><b>
                <?php echo $NPostagens . " " . $Bloco_Postagens[$NPostagens]["titulo"]; ?>
              </b></h3>
            <h5>
              <?php echo $Bloco_Postagens[$NPostagens]["sTitulo"] . " , <span class='w3-opacity'>" . $Bloco_Postagens[$NPostagens]["data"] . "</span>"; ?>
            </h5>
          </div>

          <div class="w3-container">
            <?php echo "<p>" . $Bloco_Postagens[$NPostagens]["texto"] . "</p>"; ?>
            <div class="w3-row">
              <div class="w3-col" style="width:80%">
                <p><button class="w3-button w3-padding-large w3-white w3-border">
                    <b>Leia mais... »</b></button></p>
              </div>
              <div class="w3-col w3-hide-small" style="width:20%">
                <p>
                  <span class="w3-padding-large w3-right"><b>Comments </b>
                    <span class="w3-tag">
                      <?php echo $Bloco_Postagens[$NPostagens]["nComent"]; ?>
                    </span>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <hr>
      <?php
      }
      ?>
    </div>
    <div class="w3-col m4">
      <div class="w3-card w3-margin">
        <img src="https://www.w3schools.com/w3images/avatar_g.jpg" style="width:100%">
        <div class="w3-container w3-white">
          <h4><b><?php echo $Bloco_Apres["nome"]; ?></b></h4>
          <p><?php echo $Bloco_Apres["descr"]; ?></p>
        </div>
      </div>
      <hr>

      <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
          <h4>Postagens Mais Populares</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
          <li class="w3-padding-16">
            <img src="https://www.w3schools.com/w3images/workshop.jpg"
              class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Dez motivos para aprender HTML5 + W3.CSS</span>
            <br>
            <span>Comentários: 142</span>
          </li>
          <li class="w3-padding-16">
            <img src="https://www.w3schools.com/w3images/workshop.jpg"
              class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Experiência em Gravidade 0</span>
            <br>
            <span>Comentários: 10</span>
          </li>
          <li class="w3-padding-16">
            <img src="https://www.w3schools.com/w3images/gondol.jpg"
              class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Como morar sozinho</span>
            <br>
            <span>Comentários: 7</span>
          </li>
          <li class="w3-padding-16">
            <img src="https://www.w3schools.com/w3images/skies.jpg"
              class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Melhores músicas anos 90</span>
            <br>
            <span>Comentários: 3</span>
          </li>
          <li class="w3-padding-16 w3-hide-medium w3-hide-small">
            <img src="https://www.w3schools.com/w3images/rock.jpg"
              class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">O que fazer num sábado chuvoso</span>
            <br>
            <span>Comentários: 2</span>
          </li>
        </ul>
      </div>

      <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
          <h4>Categorias</h4>
        </div>
        <div class="w3-container w3-white">
          <p>
            <?php
            echo Exibe_Categoria("Todas", true);
            echo Exibe_Categoria("Viagens", false);
            echo Exibe_Categoria("Esportes", false);
            echo Exibe_Categoria("Política", false);
            echo Exibe_Categoria("Família", false);
            echo Exibe_Categoria("Games", false);
            ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>


  <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
    <div class="w3-row">
      <div class="w3-col m4 w3-container">
        <button class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">Anterior</button>
        <button class="w3-button w3-black w3-padding-large w3-margin-bottom">Próximo »</button>
      </div>
      <div class="w3-col m4 w3-container w3-center">
        <p>Introdução ao Coding (WEB) Daniel dos Santos</p>
      </div>
      <div class="w3-col m4 w3-container w3-center">
        <a href="#" class="w3-padding w3-xxlarge fa fa-facebook"></a>
        <a href="#" class="w3-padding w3-xxlarge fa fa-twitter"></a>
        <a href="#" class="w3-padding w3-xxlarge fa fa-instagram"></a>
      </div>
    </div>
  </footer>
</body>

</html>