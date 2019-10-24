# API

Solluzi framework é um framework desenvolvido com PHP e padrão de projetos. Este framework serve como API para todo o tipo de projeto, retornando os dados sempre em JSON. Neste framewolrk não 
como fazer layout com HTML inbubtido no PHP ou Vice-Versa.

---

## Configuração de banco de dados

para configurar os acessos de banco de dados, deve-se editar o arquivo /config/config.php.

- pode-se criar uma conexão unica:

~~~~php
// retorna as conexões
return [
    // Primeiro banco
    'api' => [
        'user' => getenv('api_user'),
        'pass' => getenv('api_pass'),
        'name' => getenv('api_name'),
        'host' => getenv('api_host'),
        'type' => getenv('api_type'),
        'port' => getenv('api_port')
    ],
];
~~~~

Ou multiplas conexões:

~~~~php
// retorna as conexões
return [
    // Primeiro banco
    'banco1' => [
        'user' => getenv('api_user'),
        'pass' => getenv('api_pass'),
        'name' => getenv('api_name'),
        'host' => getenv('api_host'),
        'type' => getenv('api_type'),
        'port' => getenv('api_port')
    ],
    // Segundo banco
    'banco2' => [
        'user' => getenv('api_user'),
        'pass' => getenv('api_pass'),
        'name' => getenv('api_name'),
        'host' => getenv('api_host'),
        'type' => getenv('api_type'),
        'port' => getenv('api_port')
    ],
];
~~~~

---

## Rota

Para criar rota de acesso aos dados, podemos faze-los de duas formas.

1.Criar a rora no arquivo base **index.php**:

~~~~php
// Instancia a classe AltoRouter
$router = new AltoRouter();

// Informa a pasta Raiz (Opcional)
$router->setBasePath('/v1');

// Cria as Rotas
$router->map('GET',     ''                      , 'App\Controller\HomeController@index');   // Via GET
$router->map('GET',     '/view'                 , 'App\Controller\ViewHandler@index');      // Via GET
$router->map('POST',    '/view/teste_post'      , 'App\Controller\ViewHandler@gravar');     // Via POST
$router->map('GET',     '/view/get/[a:nome]'    , 'App\Controller\ViewHandler@busca');      // Via GET
$router->map('PUT',     '/view/get/[a:nome]'    , 'App\Controller\ViewHandler@busca');      // Via PUT
$router->map('GET|POST','/view/get/teste_post'  , 'App\Controller\ViewHandler@busca');      // Via GET|POST
~~~~


2.Criar um arquivo separado dentro do diretorio /config/rotas e importar no arquivo **index.php**:

~~~~php
/ Instancia a classe AltoRouter
$router = new AltoRouter();

// Informa a pasta Raiz (Opcional)
$router->setBasePath('/v1');

// Cria as Rotas para Home
require 'config/rota-home.php';
require 'config/rota-usuario.php';

~~~~

---

## Listagem de dados

~~~~php
declare (strict_types = 1);
namespace App\Controller;
use Controller\Middleware;
class Listagem extends Middleware
{
    public function index()
    {
        try{
            // Pega os dados caso esteja sendo efetuado uma busca
            $dados = $this->formData();
            // Abre conexão com o banco desejado
            Transaction::open('banco');

            // Instancia o repositório (Model) sempre pelo namespace
            $repository = new Repository('App\Model\Usuario');

            // Abre citerio de busca
            $filtro = new Criteria();

            // Estabelece um critério de busca
            if(isset($dados->busca) && !empty($dados->busca)){
                // Filtra pelo nome
                $filtro->add(new Filter('nome', 'like', '%{$dados->nome}%'));
            }

            // Armazena os dados retornados
            $usuarios = $repository->load($filtro);

            // retorna os dados
            return $this->json($usuarios);

            // fecha a conexão
            Transaction::close();
        }catch(\Exception $e){
            return $this->json(['msg' => $e->getMessage()]);
        }
    }
}
>
~~~~

## Cadastro de usuarios

~~~~php
declare (strict_types = 1);
namespace App\Controller;
use Controller\Middleware;
use App\Model\Usuario;
class Cadastro extends Middlware
{
    public function index()
    {
        try{
            // Armazena os dados do formulário
            $dados = $this->formData();
            // Abre conexão com a base
            Transaction::open('banco');

            // Chama a Model
            $usuario = new Usuario();

            // Seta os dados
            $usuario->nome      = $dados->nome;
            $usuario->sobrenome = $dados->sobrenome;
            $usuario->cpf       = $dados->cpf;

            // Grava na base
            $usuario->store();

            // Fecha a conexão com a base
            Transaction::close();

            //retorn sucesso
            return $this->json(['status' => 200]);

        }catch(\Exception $e){
            Transaction::rollback();
            return $this->json(['status' => 400]);
        }
    }
}
~~~~

## Ediçao de dados

~~~~php
declare (strict_types = 1);
namespace App\Controller;
use Controller\Middleware;
use App\Model\Usuario;
class Edicao extends Middleware
{
    public function index($id)
    {

        try{
            // Abre conexão com a base
            Transaction::open('banco');

            // Instancia a Model
            $usuario = new Usuario($id);

            // Enterra a conexão
            Transaction::close();

            return $this->json($usuario->load());
        }catch(\Exception $e){
            return $this->json(['msg' => 404]);
        }
    }
}
~~~~

## Atualizar os dados

~~~~php
declare (strict_types = 1);
namespace App\Controller;
use Controller\Middleware;
use App\Model\Usuario;
class Atualizacao extends Middleware
{
    public function index($id)
    {
        try{
            // Pega as informaçoes do formulário
            $dados = $this->formData();

            // Abre Conexão com a base
            Transaction::open('banco');

            // instancia a model
            $usuario = new Usuario();

            // Atribui os dados
            $usuario->id       = $id;
            $usuario->cpf      = $dados->cpf;

            // Atualiza a base
            $usuario->store();

            // Encerra a conexão
            Transaction::close();

            // Retorna status
            return $this->json(['status' => 200]);
        }catch(\Exception $e){
            Transaction::rollback();
            return $this->json(['status' => 404]);
        }
    }
}
~~~~

## Exclusão de dados

~~~~php
declare (strict_types = 1);
namespace App\Controller;
use Controller\Middleware;
use App\Model\Usuario;
class Exclusao extends Middleware
{
    public function index($id)
    {
        try{
            // Abre conexão com o banco de dados
            Transaction::open('banco');

            // Instancia a Model
            $usuario = new Usuario($id);

            // Exclui o registro
            $usuario->delete();

            // Encerra a conexão
            Transaction::close();

            // retorna o status
            return $this->json(['status' => 200]);
        }catch(\Exception $e){
            Transaction::rollback();
            return $this->json(['status' => 404]);
        }
    }
}
~~~~
