document.addEventListener("DOMContentLoaded", () => {
  const fadeInElements = document.querySelectorAll(".fade-in");

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          const delay = index * 0.5;

          entry.target.style.opacity = 1;
          entry.target.style.transform = "translateY(0)";
          entry.target.style.transition = `opacity 1s ease ${delay}s, transform 1s ease ${delay}s`;

          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2 }
  );

  fadeInElements.forEach((element) => {
    element.style.opacity = 0;
    element.style.transform = "translateY(20px)";
    observer.observe(element);
  });
});
