document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("scroll-show");
                    entry.target.classList.remove("scroll-hide");
                } else {
                    entry.target.classList.remove("scroll-show");
                    entry.target.classList.add("scroll-hide");
                }
            });
        },
        {
            threshold: 0.1,
        }
    );

    document.querySelectorAll(".scroll-reveal").forEach((el) => {
        el.classList.add("scroll-hide");
        observer.observe(el);
    });
});
