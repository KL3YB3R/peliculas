function animationHeader(option) {
    document.querySelectorAll(".header-list li > a").forEach((link) => {
        if (link === option) return link.classList.add("active");
        return link.classList.remove("active");
    });
}

document.addEventListener("click", (e) => {
    if (e.target.matches(".header-list .item-links > a"))
        animationHeader(e.target);
});
