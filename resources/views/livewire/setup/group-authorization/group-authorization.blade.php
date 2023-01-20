<div class="group-autorization-div border-radius-25">
    <div class="container">
        <div class="row setup-group-autorization-row" >
            <div class="col p-3">
                <div class="row">
                    <div class="col">
                        <h5>Select Group</h5>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col select-group-col">
                        <select class="w-100 border-radius-25" name="" id="userGroupAuthName">
                            <option value=""></option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->user_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Menu ID :</label> &nbsp;
                        <select name="" id="userGroupAuthMenuId" wire:model='menuId' class="border-radius-25">
                            <option value="HIS2.0">HIS 2.0</option>
                            <option value="sample">sample</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col setup-group-autorization-col overflow-auto" id="custom-scroll">
                        <div class="nav flex-column nav-pills me-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @if($menus!='')
                                @foreach($menus as $menu)
                                    <button class="nav-link text-start authTabs" id="userGroupAuthTabs" data-bs-toggle="pill" data-bs-target="#nav-setup" type="button" role="tab" aria-controls="nav-setup" aria-selected="true"><b>{{$menu->MENUNAME}}</b></button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="tab-content " id="v-pills-tabContent">
                            {{-- For Setup --}}
                            <div class="tab-pane fade show active" id="nav-setup" role="tabpanel"
                                aria-labelledby="nav-setup-tab" tabindex="0">
                                <div class="container">
                                    <div class="table-div row  border border-radius-25 shadow-sm" > 
                                        <div class="col p-2">
                                            <h5 class="m-0">Page Listing</h5>
                                        </div>
                                        <div class="table-col border-radius-25 overflow-auto" id="custom-scroll">
                                            <table class="table">
                                                <thead class="text-center position-sticky top-0">
                                                    <tr>
                                                        <th class="text-start">
                                                            Module Name
                                                        </th>
                                                        <th>
                                                            Access Type
                                                        </th>
                                                        <th>
                                                            Visibility
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" id="userGroupAuthTable">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end py-2">
                                        <div class="col-2 text-end px-0 ">
                                            <button type="button" class="border-radius-25 btn btn-primary">Remove</button>
                                        </div>
                                        <div class="col-2 text-end px-0">
                                            <button type="button" class="border-radius-25 btn btn-primary" id="saveUserGroupAuth">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End --}}
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
