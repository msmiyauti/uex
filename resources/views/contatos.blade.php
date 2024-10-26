<x-app-layout>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<div class="py-6">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table-responsive">
            <a href="{{ route('contatos.create') }}" class="button create-button p-4 btn btn-large btn-primary openbutton">Add Novo Cadastro</a> 
            <table id="contatos" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
var table = new DataTable('#contatos', {
    ajax: '{{ route("api.contatos") }}',
    processing: true,
    // serverSide: true,
   
    columns: [
        { data: 'nome' },
        { data: 'cpf' },
        { data: 'email' },
        { data: 'cidade' },
        { data: 'uf' },
        { data: 'cep' }
    ]
});

let baseUrl = '{{ route("contatos.edit","") }}';

$('#contatos').on( 'click', 'tr', function(  ) {
        let data =  table.row(this).data();
        var id = data['id']; /// How can i get the UUID
        console.log(id);
        window.location.href = baseUrl + '/' + id;
    } );
</script>


</x-app-layout>
