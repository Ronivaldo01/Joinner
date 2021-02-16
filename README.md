# Joinner Sistemas #

## Teste de desenvolvimento ##

Obrigado por participar do nosso processo seletivo. Este teste serve para conhecermos melhor o candidato no quesito técnico.

Não vamos exigir muito esforço, é um teste simples, mas capricho é bem vindo.

Por favor, não poupe esforços para nos mostrar o seu conhecimento. 

### Descrição do Teste ###

Estamos disponibilizando neste repositório um projeto base para o teste. É um projeto em Laravel 7.25(versão mais nova). Para que ele rode, será necessário ter intalado o [Composer](https://getcomposer.org/) e executar o comando `composer install` no diretório do teste.

Fique a vontade para rodá-lo como preferir, mas recomendamos usar o [Homestead](https://laravel.com/docs/7.x/homestead). Ao enviar o projeto, nos especifique qual forma o escolheu.

### Especificações do Teste ###

O teste consiste em um cadastro de Pessoa, uma grid e um formulário simples com poucos campos. 

O banco de dados para este projeto deve ser criado utilizando o arquivo *base.sql* localizado no diretório raíz desse projeto.

Abaixo, as especificações de funcionamento do cadastro:

 - A visualização do cadastro deve ser iniciada com uma Grid exibindo os registros já cadastrados, com a possibilidade de Criar um novo registro, Editar ou Excluir um registro já existente;
 - As ações de Criar e Editar devem acontecer em um formulário aberto em uma Modal por cima da Grid, para que o usuário possa efetuar as alterações desejadas;
 - A ação de exclusão deve ter uma confirmação;
 - Não é necessário criar o cadastro de País, apenas de Pessoa.
 
Especificações da parte técnica:

 - O campo `id` da tabela de Pessoa deve ser preenchido com um valor baseado na sequence `seq_pessoa`;
 - A tabela de Pessoa tem ligação com a tabela País através do campo `pais_id`, o usuário deve selecionar o país desejado no formulário;
 - A data de nascimento não pode ser maior que a data corrente no ato do cadastro;
 - O campo `genero` deve ser preenchido com "Masculino", "Feminino" ou "Não informado". Onde a última opção pode ser salva como NULL no banco.

Bibliotecas:

 - Usar Bootstrap 4 para formatar o layout. Não precisa ser um layout completo, apenas o básico do formulário e da grid;
 - Gostaríamos que fossem usados componentes da biblioteca Kendo UI for jQuery, como por exemplo [KendoGrid](https://demos.telerik.com/kendo-ui/grid/index) para a grid, o [KendoDropDownList](https://demos.telerik.com/kendo-ui/dropdownlist/index) para a lista de países ou o [KendoDatePicker](https://demos.telerik.com/kendo-ui/datepicker/index) para a data de nascimento. Você pode ver como utilizar a biblioteca [neste link](https://docs.telerik.com/kendo-ui/intro/first-steps). 

    Dica: Existe um *sandbox* para a biblioteca [neste link](https://dojo.telerik.com/), nele é possível ver como são incluídos os arquivos JS e CSS da biblioteca no código por meio de um CDN. Por comodidade, recomendamos utilizar da mesma forma no projeto.
 
 **Boa sorte e obrigado por participar!**