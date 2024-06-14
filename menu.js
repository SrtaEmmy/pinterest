document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.getElementById("menuButton");
    const foldersContainer = document.getElementById("foldersContainer");

    menuButton.addEventListener("click", function() {
        foldersContainer.classList.toggle("show-folders");
    });
});
