<template>
  <section
    id="fitur"
    data-aos="fade-up"
    class="relative flex flex-col items-center justify-between px-6 py-12 overflow-hidden bg-primarywhite md:flex-row md:px-16"
  >
    <div
      class="z-10 flex justify-center flex-1 mb-8 ml-0 md:justify-start md:mb-0 md:ml-20"
    >
      <img
        src="@/assets/image/hasilanalisis.png"
        alt="Hasil Analisis"
        class="w-[300px] md:w-[600px] drop-shadow-xl"
      />
    </div>

    <div class="z-10 flex-1 text-center md:text-left">
      <h2 class="mb-8 text-3xl font-bold md:text-5xl text-primarypurple">
        Fitur dari <span class="text-primarypurple">ReadaSense</span>
      </h2>

      <div class="space-y-8">
        <div class="flex flex-col items-start gap-4 md:flex-row md:items-start">
          <div
            class="flex items-center justify-center gap-2 px-5 py-2 font-semibold border rounded-full border-primarypurple text-primarypurple"
          >
            <Icon icon="mdi:search" class="text-xl text-black" />
            <span class="text-black">Deteksi Sentimen</span>
          </div>
          <p class="text-sm text-gray-700 text-start md:max-w-sm md:text-base">
            Deteksi nada emosional dalam teks berita—apakah positif, netral,
            atau negatif— dengan visualisasi yang mudah dipahami.
          </p>
        </div>
        <div class="px-5">
          <hr class="border-2 border-[#5094F1] md:w-[550px]" />
        </div>
        <div class="flex flex-col items-start gap-4 md:flex-row md:items-start">
          <div
            class="flex items-center justify-center gap-2 px-5 py-2 font-semibold border rounded-full border-primarypurple text-primarypurple"
          >
            <Icon icon="mdi:book-open-variant" class="text-xl text-black" />
            <span class="text-black">Nilai Keterbacaan</span>
          </div>
          <p class="text-sm text-gray-700 text-start md:max-w-sm md:text-base">
            Ukur tingkat keterbacaan artikel dengan metrik standar, lengkap
            dengan kategori (mudah, sedang, sulit) agar pembaca tahu seberapa
            kompleks teksnya.
          </p>
        </div>

        <div class="px-5">
          <hr class="border-2 border-[#5094F1] md:w-[550px]" />
        </div>

        <div class="flex flex-col items-start gap-4 md:flex-row md:items-start">
          <div
            class="flex items-center justify-center gap-2 px-5 py-2 font-semibold border rounded-full border-primarypurple text-primarypurple"
          >
            <Icon icon="mdi:chart-bar" class="text-xl text-black" />
            <span class="text-black">Statistik Teks</span>
          </div>
          <p class="text-sm text-gray-700 text-start md:max-w-sm md:text-base">
            Lihat statistik mendalam dari teks yang diunggah, termasuk jumlah
            kata, kalimat, serta distribusi emosi untuk analisis lebih lanjut.
          </p>
        </div>
      </div>
    </div>

    <div class="absolute inset-0 -z-0 hero-mesh-bg"></div>
  </section>
</template>

<script setup>
import { Icon } from "@iconify/vue";
</script>

<style scoped>
.hero-mesh-bg {
  background:
    radial-gradient(
      circle at 100% 40%,
      rgba(64, 132, 239, 0.4) 0%,
      transparent 60%
    ),
    radial-gradient(
      circle at 160% 90%,
      rgba(101, 64, 239, 0.2) 0%,
      transparent 70%
    );
  filter: blur(80px);
  border-radius: 1000px;
  width: 450px;
  height: 450px;
  margin: auto;
}
</style>
