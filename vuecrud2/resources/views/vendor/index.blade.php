@extends('layouts.app')

@section('content')
<div id="app">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Vendor Dashboard</h2>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="col-md-2 col-md-offset-8">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Desc</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(row,key) in vendor">
                      <td>@{{++key}}</td>
                      <td>@{{row.name}}</td>
                      <td>@{{row.desc}}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" v-on:click="onEdit(row.id)" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> </button>
                        <button class="btn btn-sm btn-danger" v-on:click="onDelete(row.id)"><i class="glyphicon glyphicon-trash"></i> </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">New Vendor</h4>
        </div>
        <form v-on:submit.prevent="onAdd()" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="fill the name" v-model="form.name" name="name">
          </div>
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="desc" class="form-control" placeholder="fill the description" v-model="form.desc"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Edit @{{form.name}}</h4>
        </div>
        <div class="modal-body">
          <form v-on:submit.prevent="onAdd()" method="post">
            {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" placeholder="fill the name" v-model="form.name" name="name">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea name="desc" class="form-control" placeholder="fill the description" v-model="form.desc"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
  <script type="text/javascript">
    
  </script>
  <script type="text/javascript">
   var app = new Vue({
    el: '#app',
    data: {
      vendor: {
        id: '',
        name: '',
        desc: '',
      },
      form: {
        id: '',
        name: '',
        desc: '',
      }
    },
    methods: {
      onAdd: function(){
        Axios.post("{{route('vendor.store')}}",this.form).then((response) =>{
          console.log(response.data);
          swal(
            'Good job!',
            'You clicked the button!',
            'success'
          );
          this.refreshData();
          $('#myModal').modal('hide');
        })
        .catch((e) => {
          console.log(e);
          swal(
            'Oops...',
            'Something went wrong!',
            'error'
          )
        });
      },
      onDelete: function(id){
        Axios.delete("http://localhost:8000/vendor/"+id)
        .then((response) => {
          alert('Delete success');
          this.refreshData();
        })
        .catch((e) => {
          console.log(e)
        })
      },
      onEdit: function(id){
        Axios.get("http://localhost:8000/vendor/"+id).then((response) => {
          this.form = response.data;
        })
        .catch((e) => {
          console.log(e)
        })
      },
      refreshData: function(){
        Axios.get("{{route('vendor.all')}}").then((response) => {
          this.vendor = response.data;
        })
        .catch((e) => {
          console.log(e)
        })
      }
    },
    mounted: function(){
      this.refreshData();
    }
  });
  </script>
@endpush
