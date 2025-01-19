<div class="faculty-entry mb-4">
    <div class="row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control"
                name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][nameOfTheCandidate]"
                placeholder="Name of the Candidate" value="{{ $faculty['nameOfTheCandidate'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control"
                name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][yearOfRegistration]"
                placeholder="Year of Registration" value="{{ $faculty['yearOfRegistration'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][regNo]"
                placeholder="Registration No" value="{{ $faculty['regNo'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control"
                name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][supervisorName]" placeholder="Supervisor Name"
                value="{{ $faculty['supervisorName'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control"
                name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][universityRegistered]"
                placeholder="University Registered" value="{{ $faculty['universityRegistered'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control"
                name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][areaOfResearch]" placeholder="Area of Research"
                value="{{ $faculty['areaOfResearch'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="ListOfDepartmentFacultiesPursuingPhd[{{ $index }}][status]"
                placeholder="Status" value="{{ $faculty['status'] ?? '' }}" required>
        </div>
        <div class="form-group col-md-1 text-end">
            <button type="button" class="btn btn-danger" onclick="removeFacultyEntry(this)">Remove</button>
        </div>
    </div>
</div>