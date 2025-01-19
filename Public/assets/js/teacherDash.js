function toggleContentType(type) {
    const videoBtn = document.getElementById("videoBtn");
    const documentBtn = document.getElementById("documentBtn");
    const contentTypeInput = document.getElementById("contentTypeInput");
    const contentPathInput = document.getElementById("contentPathInput");

    if (type === "video") {
        // Set to video content type
        contentTypeInput.value = "video";
        contentPathInput.setAttribute("accept", ".mp4");

        // Update button styles
        videoBtn.classList.add("bg-primary", "text-white");
        videoBtn.classList.remove("bg-gray-200", "text-gray-800");
        documentBtn.classList.add("bg-gray-200", "text-gray-800");
        documentBtn.classList.remove("bg-primary", "text-white");
    } else if (type === "document") {
        // Set to document content type
        contentTypeInput.value = "document";
        contentPathInput.setAttribute("accept", ".pdf");

        // Update button styles
        documentBtn.classList.add("bg-primary", "text-white");
        documentBtn.classList.remove("bg-gray-200", "text-gray-800");
        videoBtn.classList.add("bg-gray-200", "text-gray-800");
        videoBtn.classList.remove("bg-primary", "text-white");
    }
}

// Ensure the script executes after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    $(".chosen-select").chosen(); // Initialize Chosen.js
});
