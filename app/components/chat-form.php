<form class="chat-form" >
    <div class="chat-container">
        <div class="form-input">
            <textarea class="textarea-control" placeholder="Type your message..." id="send_message"></textarea >
        </div>
        <!-- div.form-input -->
        <div class="form-input">
            <label for="upload-files" class="upload-label"><i class="fas fa-paperclip fa-uploads"></i> <i class="fas fa-file-image fa-uploads"></i> </label>
            <input type="file" id="upload-files" class="upload-files" name="upload-files">
        </div>
        <!-- div.form-input -->
    </div>
    <!-- div.chat-container -->
    <div class="files-error">
        <span class='files-cross-icon'>&#x2715;</span> Upload Proper Image/File!!!!
    </div>
    <div class="files-success">
        <span class='files-cross-icon'>&#10004;</span> Successfully Send!!!!
    </div>
</form>
<!-- div.chat-form -->