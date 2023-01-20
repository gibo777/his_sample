<!-- Modal -->
<div>
    
    <div  class="modal fade" id="selectRequestModal" data-bs-backdrop="false" data-bs-keyboard="true"
        tabindex="-1" aria-labelledby="selectRequestLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="selectRequestLabel">
                        Select <span class="text-primary">Request</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body medical-body-mass-div overflow-auto ">
                    <div class="row text-center">
                        <div class="col">
                            <a role="button" class="btn border"
                                id="procedure">
                                <i class="fa-solid fa-file-prescription fs-1"></i>
                        </a>
                            <span class="d-block pt-2">Procedures</span>
                        </div>
                        <div class="col">
                            <a role="button" class="btn border" id="medicine">
                                <i class="fa-solid fa-capsules fs-1"></i>
                            </a>
                            <span class="d-block pt-2">Medicine</span>
                        </div>
                        <div class="col">
                            <a role="button" class="btn border" id="package">
                                <i class="fa-solid fa-box-archive fs-1"></i>
                            </a>
                            <span class="d-block pt-2">Packages</span>
                        </div>
                        <div class="col">
                            <a role="button" class="btn border" id="supplies">
                                <i class="fa-solid fa-syringe fs-1"></i>
                            </a>
                            <span class="d-block pt-2">Supplies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.outpatient.new-case.procedure-modal')
    @include('modal.outpatient.new-case.medicine-modal')
    @include('modal.outpatient.new-case.packages-modal')
    @include('modal.outpatient.new-case.supplies-modal')
    @include('modal.outpatient.new-case.confirmation-modal')
</div>
