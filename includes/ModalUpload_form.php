<div class="upload_form_container">
    <div class="close_modal_container" data-bs-dismiss="modal">
        <span>
            <h5>upload file</h5>
        </span>
        <span><i class="fa-solid fa-circle-xmark"></i></span>
    </div>
    <form method="post" action="../includes/upload.includes.php" id="fileupload" enctype="multipart/form-data">
        <div class="uploadInput_field_container">
            <input type="text" name="title" class="input-field" required placeholder="Enter Title">
        </div>
        <div class="uploadInput_field_container">
            <input type="text" name="author" class="input-field" required placeholder="Enter Author">
        </div>
        <div class="uploadInput_field_container">
            <input type="number" name="year" class="input-field" required placeholder="Enter Year">
        </div>
        <div class="uploadInput_field_container">
            <select name="course" id="course" class="input-field" required>
                <option value="" disabled selected>Choose Course</option>
                <option value="bsit">Bachelor of Science in Information Techology</option>
                <option value="bscs">Bachelor of Science in Computer Science</option>
            </select>
        </div>
        <div class="uploadInput_field_container">
            <input type="text" name="description" class="input-field" required placeholder="Enter Description">
        </div>
        <div class="uploadInput_field">
            <input type="file" name="file" class="file" required>
        </div>
        <div class="upload-button">
            <button type="submit" name="upload" class="upload">Upload</button>
        </div>
    </form>
</div>