<!-- Modal -->
<div>
    <div class="modal fade" id="registerUserModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1" aria-labelledby="registerUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerUserModalLabel"><span class="">Register</span> New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body register-modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <h4>User ID #</h4>
                            </div>
                        </div>
                        <div class="row pb-2 top-input-row">
                            <div class="col">
                                <select name="" id="" class="border-radius-25">
                                    <option value="">New</option>
                                </select>
                                <input type="text" class="border-radius-25" name="" id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img src="{{ URL::asset('img/profiles/profile-2.jpg') }}" alt="" class="rounded border border-success " height="150" width="150" capture>
                            </div>
                            <div class="image-dropdown">
                                <div class="dropdownCust">
                                    <i onclick="registerUser()"
                                        class="fa-solid fa-camera dropBtn user-group border-radius-25"></i>
                                    <div id="registerUserDropdown" class="dropdown-content">
                                        <a href="">Camera</a>
                                        <a href="">Upload</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="register-col-1 px-1">
                               <input type="text" placeholder="Last Name" class="border-radius-25 ">
                            </div>
                            <div class="register-col-1 px-1">
                                <input type="text" placeholder="First Name" class="border-radius-25 ">
                             </div>
                             <div class="register-col-1 px-1">
                                <input type="text" placeholder="Middle Name" class="border-radius-25 ">
                             </div>
                             <div class="register-col-2 px-1">
                                <input type="text" placeholder="Ext" class="border-radius-25">
                             </div>
                        </div>
                        <div class="row pt-2">
                            <div class="register-col-3">
                                <label for="">Username</label>
                                <input type="text" name="" id="" class="border-radius-25">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="register-col-3">
                                <label for="">Email</label>
                                <input type="text" name="" id="" class="border-radius-25">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="register-col-3">
                                <label for="">User Role</label>
                                <select name="" id="" class="border-radius-25">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="row pt-2">
                            <div class="col">
                                <button type="button" class="btn btn-primary border-radius-25" id="registerUserBtn">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>