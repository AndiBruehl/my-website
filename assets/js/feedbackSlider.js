document.addEventListener("DOMContentLoaded", () => {
  console.log("Feedback Images:", feedbackImages);

  const feedbackSlider = document.querySelector(".feedback-slider");

  if (
    !feedbackSlider ||
    !Array.isArray(feedbackImages) ||
    feedbackImages.length === 0
  ) {
    console.error("FeedbackSlider: Keine gültigen Daten gefunden.");
    return;
  }

  feedbackImages.forEach((src, index) => {
    const img = document.createElement("img");
    img.src = src;
    img.alt = `Feedback Image ${index + 1}`;
    img.classList.add("feedback-image");
    if (index === 0) img.classList.add("active");
    feedbackSlider.appendChild(img);
  });

  const images = feedbackSlider.querySelectorAll(".feedback-image");
  let currentIndex = 0;

  setInterval(() => {
    images[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.add("active");
  }, 3000);
});
