
<div>
    @include('modal.report.printlogbook')

    <div class="overflow-auto outpatient-div pb-0 border-radius-25 px-3">

        <div class="container">
            <div class="row">
                <div class="col-2">
                    <label for="" >Select Date From <span class="text-danger">*</span></label>
                    <input   wire:model="dateFrom" type="date" id="startDate1"
                        class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy">
                </div>
                <div class="col-2">
                    <label for="">Select Date To <span class="text-danger">*</span></label>
                    <input  wire:model="dateTo" type="date" id="endDate1"
                        class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy" >
                </div>
                {{-- <div class="col-sm">
                    <label for="">Attending Doctor</label>

                        <select class="border-radius-25  d-block" id="doctor" name="doctor" wire:model="doctor" style="width: 55%;">
                            <option value=" ">All</option>

                            @foreach ($doctors as $com )
                                <option value="{{$com->NAME}}">{{$com->NAME}}</option>
                            @endforeach

                        </select>
                </div> --}}
                <div class="col-sm-5">
                    <label for="" >Export </label>
                    <i class="fa-solid fa-print report-buttons" id="logbook_report_printbtn"></i>
                    <i class="fa-solid fa-file-pdf report-buttons " id="logbook_report_pdfbtn"></i>
                    <i class="fa-solid fa-file-excel report-buttons " id="logbook_report_excelbtn"></i>
                </div>

            </div>

        <br>


        </div>

        {{-- <div class="row justify-content-between px-2">

            <div class="col">
                <div class="row">


                    <div class="col-size-5">
                        <label for="">Select Date From <span class="text-danger">*</span></label>
                        <input style="width:40%;" wire:model="dateFrom" type="date" id="startDate1"
                            name="U_DATEFROM" class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy">
                    </div>


                    <div class="col-size-5">
                        <label for="">Select Date To <span class="text-danger">*</span></label>
                        <input style="width:40%;" wire:model="dateTo" type="date" id="endDate1" name="U_DATETO"
                            class="border-radius-25 datetimepicker d-block" placeholder="mm-dd-yyyy">
                    </div>
                    <br><br> <br><br>
                    <div class="col-sm-5">
                        <label for="search">Search Patients:</label>
                        <input type="text" name="search" id="search" placeholder="Enter Patient Name"
                            class="border-radius-25 searchbar" wire:model.debounce.600ms="search" autocomplete="off" />
                    </div>
                </div>
            </div>

            <div class="col-sm-2 text-end">
                <label for="itemPerPage">Patients per Page:</label>
                <select name="itemPerPage" id="" wire:model="perPage" class="border-radius-25 select-filter">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>

                <label for="patientType">Patient Type</label>
                <select name="patientType" id="" wire:model="patientType"
                    class="border-radius-25 select-filter">
                    <option value="InPatients">Inpatient</option>
                    <option value="OutPatients">Outpatient</option>
                </select>

                <br><br> <br><br>
                <div class="col-sm">
                    <i class="fa-solid fa-print report-buttons" id="logbook_report_printbtn"></i>
                    <i class="fa-solid fa-file-pdf report-buttons " id="logbook_report_pdfbtn"></i>
                    <i class="fa-solid fa-file-excel report-buttons " id="logbook_report_excelbtn"></i>


                </div>
            </div>
        </div> --}}

        <div class="loading-div" wire:loading>
            <span style="font-size:1.5rem;">Loading...</span>
            <br />
            <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
        <div class='print' wire:loading.remove>
            <table class=" table table-striped" id="patients">
                <thead>
                    <th scope="col" class="table-code">
                        <span class="float-left" wire:click="sortBy('CODE')"> Case No.
                        </span>
                    </th>
                    <th class="table-name-lname">
                        <span class="float-left" wire:click="sortBy('U_LASTNAME')"> Station
                        </span>
                    </th>
                    <th class="table-name-fname">
                        <span class="float-left" wire:click="sortBy('U_FIRSTNAME')"> Date Admission
                        </span>
                    </th>
                    <th class="table-name-mname">
                        <span class="float-left" wire:click="sortBy('U_MIDDLENAME')"> Time Admission

                        </span>
                    </th>
                    <th>Full Name</th>
                    <th>
                        <span class="float-left" wire:click="sortBy('U_BIRTHDATE')"> Age
                        </span>
                    </th>
                    <th>
                        <span class="float-left table-name" wire:click="sortBy('U_GENDER')"> Sex
                        </span>
                    </th>
                    <th>Address</th>
                    {{-- <th>Status</th> --}}

                </thead>
                <tbody>
                    @if ($patients != '')
                        {{-- {{ var_dump($patients); }} --}}
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient->docno }}</td>
                                <td>{{ $patient->u_department }}</td>
                                <td>{{ $patient->u_startdate }}</td>
                                <td>{{ $patient->u_starttime }}</td>
                                <td>{{ $patient->u_patientname }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->u_gender }}</td>
                                <td>{{ $patient->u_address }}</td>
                                {{-- <td>
                                  @if ($patient->U_ACTIVE == 1)
                                      {{ ('Yes') }}

                                  @else
                                      {{('No')}}

                                  @endif
                              </td>          --}}
                            </tr>
                            {{-- @empty --}}
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="8">
                                Please Select Filter
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row pagination-content float-right mt-3 mr-1">
            {{ $patients != '' ? $patients->links('livewire.custom-pagination'): '' }}
        </div>

    </div>

    <div id="app">
        <v-app id="inspire">
          <v-row>
            <v-col cols="12" sm="6" md="4">
              <v-menu
                ref="menu"
                v-model="menu"
                :close-on-content-click="false"
                :return-value.sync="date"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="date"
                    label="Picker in menu"
                    prepend-icon="event"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="date" no-title scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                  <v-btn text color="primary" @click="$refs.menu.save(date)">OK</v-btn>
                </v-date-picker>
              </v-menu>
            </v-col>
            <v-spacer></v-spacer>
            <v-col cols="12" sm="6" md="4">
              <v-dialog
                ref="dialog"
                v-model="modal"
                :return-value.sync="date"
                persistent
                width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="date"
                    label="Picker in dialog"
                    prepend-icon="event"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="date" scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                  <v-btn text color="primary" @click="$refs.dialog.save(date)">Like</v-btn>
                </v-date-picker>
              </v-dialog>
            </v-col>
            <v-col cols="12" sm="6" md="4">
              <v-menu
                v-model="menu2"
                :close-on-content-click="false"
                :nudge-right="40"
                transition="scale-transition"
                offset-y
                min-width="290px"
              >
                <template v-slot:activator="{ on }">
                  <v-text-field
                    v-model="date"
                    label="Picker without buttons"
                    prepend-icon="event"
                    readonly
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="date" @input="menu2 = false"></v-date-picker>
              </v-menu>
            </v-col>
            <v-spacer></v-spacer>
          </v-row>
        </v-app>
      </div>
</div>

<script>
    new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    date: new Date().toISOString().substr(0, 10),
    menu: false,
    modal: false,
    menu2: false,
  }),
})
</script>