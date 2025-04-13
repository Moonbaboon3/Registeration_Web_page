function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const img = document.getElementById("imagePreview");
        img.src = reader.result;
        img.style.display = ""
    };
    reader.readAsDataURL(event.target.files[0]);
}
document.addEventListener("DOMContentLoaded", function () {
    const dropArea = document.getElementById("dropArea");
    const fileInput = document.getElementById("fileInput");
    dropArea.addEventListener("dragover", function (event) {
        event.preventDefault();
    });
    dropArea.addEventListener("drop", function (event) {
        event.preventDefault();
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            const changeEvent = new Event("change", { bubbles: true });
            fileInput.dispatchEvent(changeEvent);
        }
    });
});