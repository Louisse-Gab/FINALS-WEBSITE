<script>
  const adoptionCarousel = document.getElementById("adoption-carousel");
  const prevAdoption = document.getElementById("adoption-prev");
  const nextAdoption = document.getElementById("adoption-next");

  let adoptionIndex = 0;
  const totalSlides = 6;

  prevAdoption.addEventListener("click", () => {
    adoptionIndex = (adoptionIndex === 0) ? totalSlides - 1 : adoptionIndex - 1;
    adoptionCarousel.style.transform = `translateX(-${adoptionIndex * 100}%)`;
  });

  nextAdoption.addEventListener("click", () => {
    adoptionIndex = (adoptionIndex === totalSlides - 1) ? 0 : adoptionIndex + 1;
    adoptionCarousel.style.transform = `translateX(-${adoptionIndex * 100}%)`;
  });
</script>

