<!-- Modal -->
<div>
    <div class="modal fade" id="vitalSignModal" data-bs-backdrop="false" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="vitalSignModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="vitalSignModalLabel"><span class="text-primary">Vital</span> Signs
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body vital-sign-modal">
                    <div class="row">
                        <div class="col overflow-auto">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>Temp</th>
                                        <th>BP</th>
                                        <th>HR</th>
                                        <th>RR</th>
                                        <th>OR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" class="first-input border-radius-25" name="" >
                                        </td>
                                        <td>
                                            <input type="number" class="second-input border-radius-25" name="" >
                                            <input type="number" class="second-input border-radius-25" name="" >
                                        </td>
                                        <td>
                                            <input type="number" class="second-input border-radius-25" name="" >
                                            <input type="number" class="second-input border-radius-25" name="" >
                                        </td>
                                        <td>
                                            <input type="number" class="first-input border-radius-25" name="" >
                                        </td>
                                        <td>
                                            <input type="number" class="first-input border-radius-25" name="" >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center pt-2">
                        <div class="col text-center">
                            <button type="button"  class="border-radius-25 btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
