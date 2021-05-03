<div class="container-fluid">

    {{-- create User Modal --}}
    <div class="modal fade" wire:ignore.self id="createmodal" tabindex="-1" role="dialog" aria-labelledby="createmodal"
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
                    <form method="POST" action="/superadmin/users">
                        @csrf
                        <div class="row">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name"
                                    :value="old('name')" required autofocus autocomplete="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    :value="old('email')" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" type="password"
                                    name="password" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password"
                                    type="password" name="password_confirmation" required autocomplete="new-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">

                                <select class="form-control select2" id="roles" name="roles" style="width: 100%;">
                                    <option>Select a Roles</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('stock') <span class="text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>

                        </div>
                    </form>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:loading.attr="disabled"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Change Password Modal --}}

    <div class="modal fade" wire:ignore.self id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" type="password"
                                wire:model.defer="password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Retype password" type="password"
                                wire:model.defer="password_confirmation" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:loading.attr="disabled"
                        data-dismiss="modal">Close</button>
                    <button type="submit" wire:click.prevent="change()" class="btn btn-primary">Update Password</button>
                </div>
            </div>
        </div>
    </div>







    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All User Details</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#createmodal"
                            title="Add">
                            <i class="fas fa-plus"></i>&nbsp;Add users</button>
                    </div>
                </div>

                <div class="card-body">
                    <div wire:ignore>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Status</th> --}}
                                    <th>roles</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>

                                        <td>{{ $row->email }}</td>
                                        {{-- <td>

                                            @if ($row->status == 1) Active
                                            @else
                                                Deactivated
                                            @endif
                                        </td> --}}
                                        <td>
                                            @foreach ($row->roles as $role)
                                                {{ $role->title }}
                                            @endforeach
                                        </td>
                                        <td>

                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                wire:click.prevent="changepass({{ $row->id }})">
                                                <i class="fas fa-key">
                                                </i>
                                                Change Password </button>


                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                wire:click.prevent="delete({{ $row->id }})">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete User </button>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

    <script>
        // function vat() {
        //     $('.select2').select2();
        // }



        window.livewire.on('editmod', () => {

            $('#editmodal').modal('toggle');
        });

    </script>
    <script>
        window.livewire.on('logmod', () => {
            console.log("working");
            $('#logmodal').modal('toggle');
        });

    </script>
    <script>
        $(document).on('change', '#abc', function(e) {
            @this.set('status', e.target.value);
        });

    </script>
@endpush
