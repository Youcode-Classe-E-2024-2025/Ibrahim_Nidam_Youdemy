function toggleContentType(type) {
    const videoBtn = document.getElementById("videoBtn");
    const documentBtn = document.getElementById("documentBtn");
    const contentTypeInput = document.getElementById("contentTypeInput");

    if (type === 'video') {
        contentTypeInput.value = 'video';
        videoBtn.classList.add("bg-primary", "text-white");
        videoBtn.classList.remove("bg-gray-200", "text-gray-800");

        documentBtn.classList.add("bg-gray-200", "text-gray-800");
        documentBtn.classList.remove("bg-primary", "text-white");
    } else {
        contentTypeInput.value = 'document';
        documentBtn.classList.add("bg-primary", "text-white");
        documentBtn.classList.remove("bg-gray-200", "text-gray-800");

        videoBtn.classList.add("bg-gray-200", "text-gray-800");
        videoBtn.classList.remove("bg-primary", "text-white");
    }
}

$(document).ready(function () {
    $(".chosen-select").chosen();
});