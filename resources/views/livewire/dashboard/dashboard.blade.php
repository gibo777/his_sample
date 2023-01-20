<div>
    <div>
        <div class="row mb-4">
                                <!-- Area Chart -->
            <div class="col-md">
                <div class="card shadow mb-4 w-100 h-100 overflow-auto">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="w-100 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: Nunito;">Patients per Year</h6>
                        {{-- <div class="dropdown no-arrow">
                                     <select name="perYear" id="perYear" >
                                        @foreach ($years as $year)
                                            <option value="{{$year->year}}" wire:key="{{$year->year}}">{{$year->year}}</option>
                                        @endforeach
                                    </select>
                        </div> --}}
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" id="patient-per-month">
                        {{-- <div class="chart-area w-100">
                            <canvas id="myAreaChartPatients" class="w-100"></canvas>
                        </div> --}}
                        
                        <livewire:dashboard.includes.patient-per-month-chart/>

                        <hr class="my-3">
            

                            
                        {{-- </table> --}}
                    </div>

                    
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow mb-4 w-100 h-100 overflow-auto">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="w-100 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: Nunito;">Patients per Month</h6>
                        {{-- <div class="dropdown no-arrow">
                                     <select name="perYear" id="perYear" >
                                        @foreach ($years as $year)
                                            <option value="{{$year->year}}" wire:key="{{$year->year}}">{{$year->year}}</option>
                                        @endforeach
                                    </select>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <livewire:dashboard.includes.patient-per-month-pie-chart/>
                    </div>
                </div>
            </div>

            
        </div>

        <div class="row mb-4">
                                <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4 w-100 h-100 overflow-auto">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="w-100 card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: Nunito;">Patients per Barangay</h6>
                        {{-- <div class="dropdown no-arrow">
                                     <select name="perYear" id="perYear" >
                                        @foreach ($years as $year)
                                            <option value="{{$year->year}}" wire:key="{{$year->year}}">{{$year->year}}</option>
                                        @endforeach
                                    </select>
                        </div> --}}
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" id="patient-per-month">
                        {{-- <div class="chart-area w-100">
                            <canvas id="myAreaChartPatients" class="w-100"></canvas>
                        </div> --}}
                        
                        <livewire:dashboard.includes.patient-per-brgy-line-chart/>

                        <hr class="my-3">
            

                            
                        {{-- </table> --}}
                    </div>

                    
                </div>
            </div>
            

            
            </div>
        </div>

</div>


</div>

</div>