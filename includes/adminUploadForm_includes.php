<div class="upload_form_container">
    <form method="post" action="../includes/adminUpload.includes.php" id="fileupload" enctype="multipart/form-data">
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
        <div class="uploadInput_field_container">
            <input type="file" name="file" class="file" required>
        </div>
        <div class="upload-button-admin">
            <button type="submit" name="upload" class="upload">Upload</button>
        </div>
    </form>
</div>

<style>
    .close-icon-container {
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 2% auto;
        width: 90%;
    }

    .close-modal:hover {
        background-color: lightgray;
    }

    .uploadInput_field_container {
        margin: 5% auto;
        width: 90%;
    }

    .input-field {
        width: 100%;
        border-radius: 10px;
        outline: none;
        border: 1px solid lightgray;
        font-size: .9em;
        padding: 4px;
    }

    .upload-button-admin {
        width: 90%;
        margin: 5% auto;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .upload {
        border: none;
        background-color: #1c065c;
        border-radius: 8px;
        width: 100px;
        color: #fefefe;
    }

    .upload:hover {
        background-color: darkblue;
    }
</style>