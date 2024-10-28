<x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<div class="py-6">
    <div class="mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
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
                        <th></th>
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
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
var table = new DataTable('#contatos', {
    ajax: {
        url: '{{ route("api.contatos") }}',
        dataSrc: 'data',
        headers: {
            "Accept" : "application/json",
            "Content-Type": "application/json",
            "Authorization": "Bearer {{ $api_token }}"
        },
    },
    processing: true,   
    columns: [
        { data: 'nome' },
        { data: 'cpf' },
        { data: 'email' },
        { data: 'cidade' },
        { data: 'uf' },
        { data: 'cep' },
        { data: null, title: 'Excluir', "render": function (data, type, row, meta) { return '<div class="btn-group"> <button type="button" onclick="rowDataGet(); " class="btn btn-light btn-delete" >Excluir</button></div>' } }
    ]
});

let baseUrl = '{{ route("contatos.edit","") }}';

$('#contatos').on( 'click', 'td:not(:last-child)', function(  ) {
        let data =  table.row(this).data();
        var id = data['id']; /// How can i get the UUID
        console.log(id);
        window.location.href = baseUrl + '/' + id;
    } );

function rowDataGet () {
    temp=undefined;
    confirm("Tem certeza que quer excluir?");
    let deleteUrl = '{{ route("contatos.destroy","") }}';

    $('#contatos tbody').on( 'click', 'tr', function () {

        data = $('#contatos').DataTable().row( this ).data() ;
        var id = data['id']; 
        $.ajax({
            type: "DELETE",
            contentType: "application/json",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
              "Authorization": "Bearer {{ $api_token }}",
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: deleteUrl + '/' + id,
            success: (response) => {
                alert(response.message);
                location.reload();
            },
            error: function(response){
                alert(response.message);
            }
        });
    });
}
</script>
</x-app-layout>
