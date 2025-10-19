<template>
  <section
    data-aos="fade-up"
    class="bg-primarywhite flex flex-col-reverse md:flex-row items-center justify-between px-6 md:px-16 py-12 relative overflow-hidden"
  >
    <div class="flex-1 text-center md:text-left z-10 md:ml-20">
      <h1 class="text-3xl md:text-5xl font-bold text-primarypurple mb-4">
        Kenali nada dan<br />
        <span class="text-primarypurple">makna di balik berita.</span>
      </h1>
      <p class="text-black font-medium mb-6 max-w-md mx-auto md:mx-0">
        ReadaSense membantu memahami sentimen serta tingkat keterbacaan secara
        instan.
      </p>
      <button
        class="flex items-center gap-2 bg-[#6540EF] text-white px-5 py-3 rounded-lg hover:bg-[#5532d6] transition-all duration-300 mx-auto md:mx-0"
      >
        <Icon icon="material-symbols:upload" />
        Upload Document
      </button>
    </div>

    <div class="flex-1 flex justify-center md:justify-end z-10 mb-6 md:mb-0">
      <img
        src="@/assets/image/main-image.png"
        alt="Main Image"
        class="w-[280px] md:w-[750px] drop-shadow-lg"
      />
    </div>

    <div class="absolute inset-0 -z-0 hero-mesh-bg"></div>
  </section>
</template>

<style scoped>
.hero-mesh-bg {
  background:
    radial-gradient(
      circle at 10% 50%,
      rgba(101, 64, 239, 0.5) 0%,
      transparent 40%
    ),
    radial-gradient(
      circle at 75% 70%,
      rgba(255, 192, 203, 0.4) 0%,
      transparent 40%
    ),
    radial-gradient(
      circle at 50% 100%,
      rgba(255, 255, 255, 0.5) 0%,
      transparent 50%
    );
  filter: blur(90px);
  border-radius: 1000px;
  width: 700px;
  height: 700px;
  margin: auto;
}
</style>
