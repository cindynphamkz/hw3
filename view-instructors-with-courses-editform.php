<!-- Button trigger modal for editing -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editSectionModal">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706l-7.5 7.5a.5.5 0 0 1-.233.131l-3 1a.5.5 0 0 1-.652-.652l1-3a.5.5 0 0 1 .131-.233l7.5-7.5a.5.5 0 0 1 .707 0l2 2zm-1.768-.354l-1.5-1.5L13 1.293l1.5 1.5-1.266 1.266zm-1.07 1.07l-7.5 7.5L5 9.5l7.5-7.5 1.166 1.166z"/>
    <path fill-rule="evenodd" d="M1 13.5V16h2.5l7.397-7.397-2.5-2.5L1 13.5zM15 3v10.5a.5.5 0 0 1-.5.5H13V13h1.5V3H13V2h1.5A.5.5 0 0 1 15 3z"/>
  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editSectionModal" tabindex="-1" aria-labelledby="editSectionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editSectionModalLabel">Edit Section</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="iid" class="form-label">Instructor</label>
            <input type="text" class="form-control" id="iid" name="iid" value="">
          </div>
          <div class="mb-3">
            <label for="cid" class="form-label">Course</label>
            <input type="text" class="form-control" id="cid" name="cid" value="">
          </div>
          <div class="mb-3">
            <label for="sem" class="form-label">Semester</label>
            <input type="text" class="form-control" id="sem" name="sem" value="">
          </div>
          <div class="mb-3">
            <label for="room" class="form-label">Room</label>
            <input type="text" class="form-control" id="room" name="room" value="">
          </div>
          <div class="mb-3">
            <label for="daytime" class="form-label">Daytime</label>
            <input type="text" class="form-control" id="daytime" name="daytime" value="">
          </div>
          <input type="hidden" name="actionType" value="Edit">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
