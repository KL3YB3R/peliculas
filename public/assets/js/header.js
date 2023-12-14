function addActiveToOption(option) {
    document.querySelectorAll(".header-list li > a").forEach((link) => {
        if (link.textContent.toLocaleLowerCase() === option)
            return link.classList.add("active");
        return link.classList.remove("active");
    });
}

function showSubOptions(btn) {
    btn.nextElementSibling.classList.toggle("active");
}

document.addEventListener("DOMContentLoaded", () => {
    addActiveToOption(document.querySelector("#page").textContent);
});

document.addEventListener("click", (e) => {
    if (e.target.matches(".profile-settings")) showSubOptions(e.target);
});
