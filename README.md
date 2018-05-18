# prova

QUESTÕES E SUAS RESOLUÇÕES:

1. Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
“Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
de ambos (3 e 5), imprima “FizzBuzz”.

Respondida na implementação do arquivo do diretório "Prova_Questao_1".
------------------------------------------------------------------------------------
2. Refatore o código abaixo, fazendo as alterações que julgar necessário.
1. <?
2.
3. if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
4. header("Location: http://www.google.com");
5. exit();
6. } elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
7. header("Location: http://www.google.com");
8. exit();
9. }

Respondida na implementação do arquivo do diretório "Prova_Questao_2".
------------------------------------------------------------------------------------
3. Refatore o código abaixo, fazendo as alterações que julgar necessário.
1. <?php
2.
3. class MyUserClass
4. {
5. public function getUserList()
6. {
7. $dbconn = new DatabaseConnection('localhost','user','password');
8. $results = $dbconn->query('select name from user');
9.
10. sort($results);
11.
12. return $results;
13. }
14. }

Respondida na implementação do arquivo do diretório "Prova_Questao_3".
------------------------------------------------------------------------------------

4. Desenvolva uma API Rest para um sistema gerenciador de tarefas
(inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por
prioridade.
Desenvolver utilizando:
• Linguagem PHP (ou framework CakePHP);
• Banco de dados MySQL;
Diferenciais:
• Criação de interface para visualização da lista de tarefas;
• Interface com drag and drop;
• Interface responsiva (desktop e mobile);

Os arquivos que implementam o que é pedido nessa questão (incluindo o arquivo MySql), estão
no diretório "api", onde o arquivo "tarefas.php" provê um webservice que é consumido no arquivo
"cliente.php", que apresenta uma interface simples onde é possível consultar, editar e excluir 
as tarefas através do webservice. Os arquivos "curl_1", "curl_2", "curl_3", "curl_4", e "curl_5" 
que contém implementações de consulta ao webservice, foram pensados para serem separados do 
"cliente.php", para que possam ser reutilizados no mesmo contexto. 
Para rodar esses arquivos bastar executar o "cliente.php", depois de haver criado o banco de 
dados com o arquivo "prova.sql".
------------------------------------------------------------------------------------
