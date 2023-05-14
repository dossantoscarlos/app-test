# Recursos disponíveis

<ul>
    <li>Listagem dos dados importados</li>
    <li>Upload de arquivo(csv) para cadastro em massa</li>
    <li>Tela para verificar a quantidade de cep lida quantos foram validados</li>
    <li>Implementacao de uma coluna para informa a diferença de entre as colunas validado e lida </li>
    <li>Busca por filtro implentada</li>
    <li>Exportação dos dados da tela de listagem</li>
    <li>Posibilidade de mudar a quantidade de dados exibida</li>
</ul>

## Requerimento do ambiente

<ul>
    <li>PHP 8 </li>
    <li>Composer</li>
    <li>Mysql</li>
    <li>Docker(opcional)</li>
</ul>

<p>
    Para usar o mesmo ambiente de desenvolvimento, faça uso do sail.
    <code> php artisan sail:install</code>, nescessario ter o <b>docker</b> instalado.
</p>

## Usabilidade do sistema

<p>
    Necessário criar um usuário usando a rota <code>/register</code>. Ao fazer  login use a area de menu para navegar pelas funções: Upload, Listagem, Conferencia.
</p>
<div>
    <p>
        <b>Upload</b>: Converta o arquivo em csv para enviar pelo upload. Espere pelo retorno da mensagem apos a  submissão dos dados. A api de cep é a via cep recomendado enviar de 100 ou 300 ceps, limite ocorrido nos teste foram de 500 aproximado.
    </p>
    <p>
        <b>Listagem</b>: Lista todos os dados submetido pelo upload. Possui a funcionalidade de export de dados (da listagem exibida na paginação atual) em XLS, CSV e PDF. Possibilidade de mudar a quantidade de arquivos ate 1000 dados por paginação.<br/>
        <b>Filtro de status do cep</b>: Feito com um select retornando 400 para cep invalido, 200 para cep invalido e todos para limpar o filtro.
        <ul>
            <li>400: Cep invalido.</li>
            <li>200: Cep valido.</li>
        </ul>
        <br />
        <b>Filtro de código identificador</b>: basta informar os numero. <br/>
        <b>Filtro de cidade</b>: Ignora caixa alta, porem os texto devem possuir as mesmas acentuações.<br/>
        <b>Filtro de UF</b>: filtra a uf ignora caixa alta.
    </p>
    <p>
        <b>Tela de conferencia</b>: Exibe o nome do arquivo submetido e a quantidade de dados a qual possui, também exibe  a quantidade de dados validos retornado. O ultimo campo retorna a diferença entre  a quantidade de dados e os dados validos.
    </p>
</div>