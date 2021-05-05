<div class="container-fluid">

    <!-- Create Stock  -->
    <div class="modal fade" wire:ignore.self id="createmodal" tabindex="-1" role="dialog" aria-labelledby="createmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('sucmessage'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            {{ session('sucmessage') }}
                        </div>

                    @endif
                    <form role="form" wire:submit.prevent="submit" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Name</label>

                                    <input type="text" class="form-control" wire:model.defer="name"
                                        placeholder="Enter Full Name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" wire:model.lazy="email"
                                        placeholder="Enter email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Contact</label>
                                    <input type="text" class="form-control" wire:model.defer="contact"
                                        placeholder="Enter 10 digit Contact Number">
                                    @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">address</label>
                                    <textarea class="form-control" rows="3" wire:model.defer="address"
                                        placeholder="Enter Address"></textarea>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div> <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Aadhar</label>
                                    <input type="text" class="form-control" wire:model.defer="aadhar"
                                        placeholder="Enter 12 digit Aadhar Number">
                                    @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->




                        <!-- /.card-body -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:loading.attr="disabled"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn  btn-primary" wire:loading.attr="disabled">Submit</button>

                </div>
            </div>
        </div>
    </div>



    <!-- Edit Stock  -->
    <div class="modal fade" wire:ignore.self id="editmodal"  tabindex="-1" role="dialog" aria-labelledby="editmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('sucmessage'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            {{ session('sucmessage') }}
                        </div>

                    @endif
                    <form role="form"  method="POST" wire:submit.prevent="update">
                        @csrf

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Name</label>

                                    <input type="text" class="form-control" wire:model.defer="name"
                                        placeholder="Enter Full Name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" wire:model.lazy="email"
                                        placeholder="Enter email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Contact</label>
                                    <input type="text" class="form-control" wire:model.defer="contact"
                                        placeholder="Enter 10 digit Contact Number">
                                    @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">address</label>
                                    <textarea class="form-control" rows="3" wire:model.defer="address"
                                        placeholder="Enter Address"></textarea>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Aadhar</label>
                                    <input type="text" class="form-control" wire:model.defer="aadhar"
                                        placeholder="Enter 12 digit Aadhar Number">
                                    @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:loading.attr="disabled"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-primary"  wire:loading.attr="disabled">Submit</button>

                    </div>
                </div>

                <!-- /.card-body -->

        </div>
    </div>






    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#createmodal"
                            title="Add">
                            <i class="fas fa-plus"></i>&nbsp;Add Customer</button>


                                </div>

                    </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row ">
                        <div class="form-group col-md-2">
                            <label for="exampleInputBorder">Search</label>
                            <input type="text" wire:ignore.self wire:model.debounce.500ms="search" class="form-control" placeholder="Search">
                        </div>

                      <div class="form-group col-md-2">
                        <label for="exampleSelectBorder">Items Per Page</label>
                        <select class="custom-select form-control-border"  wire:model="pagesize" id="exampleSelectBorder">
                            <option value="10">10</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                        </select>
                      </div>

    <div class="form-group col-md-2">
                        <label for="exampleSelectBorder">Sort By</label>
                        <select class="custom-select form-control-border"  wire:model="sortby" id="exampleSelectBorder">
                            <option value="name">Name</option>
                            <option value="email">Email</option>
                            <option value="contact">Contact</option>
                        </select>
                      </div>

                </div>
                    <div>
                    <table id="" class="table table-bordered table-head-fixed table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>{{ $row->contact }}</td>
                                    <td>

                                        <button class="btn btn-info btn-sm" wire:click="edit({{ $row->id }})">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $row->id }})">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

            <div class="card-footer ">

<div class="float-right">

    {{ $data->links() }}
</div>
</div>

</div>
              </div>
        </div>
    </div>
</div>
@push('scripts')


<script>
        window.addEventListener('contentChanged', event => {
            $( "#example1" ).DataTable();

        });
 </script>

    <script>
        function vat() {
            $('.select2').select2();
        }
        document.addEventListener("DOMContentLoaded", () => {



      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

});

    </script>
    <script>
        window.livewire.on('userStore', () => {
            console.log("working");
            $('#createmodal').modal('hide');
        });

    </script>
    <script>
        window.livewire.on('editmod', () => {
            console.log("working");
            $('#editmodal').modal('toggle');
        });

    </script>
    <script>
        window.livewire.on('addmod', () => {
            $('#addstock').modal('toggle');
        });

    </script>
        <script>
            window.addEventListener('form-submitted', event => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: true,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: event.detail.msg
                })
            })

        </script>
@endpush
