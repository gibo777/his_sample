<div>
    <div class="container user-management-container border-radius-25">
        <div class="row">
            <h4>User Listing</h4>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <input type="text" name="search" id="search" placeholder="Enter Patient Name"
                    class="border-radius-25 searchbar" wire:model.debounce.600ms="search" autocomplete="off" />
            </div>
            <div class="col-sm-2">
                <a role="button" class="border-radius-25 btn btn-primary" id="registerUser">Register&nbsp;New&nbsp;User</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Ext.</th>
                            <th>User Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr ondblclick="userList('{{ $user->id }}')">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->middle_name }}</td>
                                <td>{{ $user->suffix }}</td>
                                <td>{{ $user->role_name }}</td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pagination-content float-right mt-3 mr-1">
            {{ $users->links('livewire.custom-pagination') }}
        </div>
        @include('modal.setup.register-user-modal')
        @include('modal.setup.user-information')
        @include('modal.setup.user-management.confirmation-modal')
    </div>
</div>
