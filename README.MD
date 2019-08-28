# API

####### Métodos do controller para sistemas com HTML

- index: Listagem geral de dados (pode ser apresentado à uma página com twig ou html ou para api)
- create(): View HTML com formulário para inserção de dados
- store($request): grava todas as informações no banco de dados como cadastro
- show($id): Busca um unico registro que será visualizado (não pode conter formulário)
- $edit($id): Formulário com um único registro para edição
- update($request, $id): Atualiza os dados do formulário de edição ao banco de dados 
- destroy($id): Exclui um unico registro do qual foi dado o id