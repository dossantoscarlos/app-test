<x-app-layout>
    @section('scripts')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <style>
            #customer_filter {
                display: none;
            }
        </style> 
    @endsection
     <div class="mx-auto w-full bg-white px-4 py-3">
     <div class="grid grid-cols-12 gap-6 my-4">
        <div class="col-span-4">
            <input type="text" id="filterCodigoIdentificador" class="form-control" placeholder="Filtrar por Codigo Identificador">
        </div>
        
        <div class="col-span-2">
            <input type="text" id="buscarCidade" class="form-control" placeholder="Filtrar por cidade">
        </div>
        
        <div class="col-span-2">
            <input type="text" id="filterUF" class="form-control" placeholder="Filtrar por UF">
        </div>

        <div class="col-span-4">
            <select id="filterStatusCep" class="form-control">
                <option disabled selected>Filtrar status do Cep</option>
                <option value="">Todos</option>
                <option value="200">Ativo</option>
                <option value="400">Inativo</option>
            </select>
        </div>
     </div>   
     
        <table id="customer" class="table table-bordered data-table"></table>
    </div>
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">      
<script type="text/javascript">
$(function () {
    $.fn.dataTable.ext.type.search.string = function(data) {
        return !data ? '' : typeof data === 'string' ? data.replace(/[\áàãâä]/gi, 'a').replace(/[\éèêë]/gi, 'e').replace(/[\íìîï]/gi, 'i').replace(/[\óòõôö]/gi, 'o').replace(/[\úùûü]/gi, 'u').replace(/[\ç]/gi, 'c').toLowerCase() : '';
    };

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('datatable.post') }}",
        columns: [
            {title: "Codigo do cliente", data: 'id',          name: 'id'},
            {title: "Codigo do cliente", data: 'fantasia',    name: 'fantasia'},
            {title: "Cep",               data: 'cep',         name: 'cep'},
            {title: "Cidade",            data: 'localidade',  name: 'localidade' },
            {title: "Logradouro",        data: 'logradouro',  name: 'logradouro'},
            {title: "complemento",       data: 'complemento', name: 'complemento'},
            {title: "bairro",            data: 'bairro',      name: 'bairro'},
            {title: "UF",                data: 'uf',          name: 'uf'},
            {title:'Status do cep',      data: 'status',      name: 'status'}
        ],
        dom: 'Blfrtip', 
        buttons: [
            'csv', 'excel', 'pdf', 
        ],
        searching: true,
        lengthMenu: [10, 25, 50, 100, 150, 200, 300, 400, 1000],
        pageLength: 25
    });
    
    $('#filterCodigoIdentificador').on('keyup', function() {
        table.column(1).search(this.value).draw();
    });

    $('.dt-buttons').attr('style','padding:0.30rem')

    $('#buscarCidade').on('keyup', function() {
        table.column(3).search(this.value, true, false).draw();
    });

    $('#filterUF').on('keyup', function() {
        table.column(7).search(this.value, true, false).draw();
    });

    $('#filterStatusCep').on('change', function() {
        table.column(8).search(this.value).draw();
    });
    

  });
</script>
</x-app-layout>
   