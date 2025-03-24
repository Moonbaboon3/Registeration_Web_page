function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const img = document.getElementById("imagePreview");
        img.src = reader.result;
        img.style.display = ""
    };
    reader.readAsDataURL(event.target.files[0]);
}