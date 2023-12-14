function animationHeader(option) {
    document.querySelectorAll(".header-list li > a").forEach((link) => {
        if (link === option) return link.classList.add("active");
        return link.classList.remove("active");
    });
}

function addActiveToOption(option) {
    document.querySelectorAll(".header-list li > a").forEach((link) => {
        if (link.textContent.toLocaleLowerCase() === option)
            return link.classList.add("active");
        return link.classList.remove("active");
    });

    // switch (page) {
    //     case "home":
    //         document.querySelectorAll(".header-list li > a").forEach((link) => {
    //             if (link.textContent === "Novedades")
    //                 return link.classList.add("active");
    //             return link.classList.remove("active");
    //         });
    //         break;

    //     default:
    //         break;
    // }
}

document.addEventListener("DOMContentLoaded", () => {
    addActiveToOption(document.querySelector("#page").textContent);
});

// document.addEventListener("click", (e) => {
//     if (e.target.matches(".header-list .item-links > a"))
//         animationHeader(e.target);
// });
