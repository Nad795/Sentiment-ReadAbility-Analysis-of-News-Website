<template>
  <div class="absolute -bottom-10 -left-20 w-[400px] h-[400px] mesh-left"></div>
  <div class="absolute -bottom-20 right-0 w-[500px] h-[500px] mesh-right"></div>
  <div class="relative overflow-hidden bg-transparent">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-[1fr_2fr]">
      <div
        class="flex flex-col items-center p-6 text-center bg-transparent border-4 border-white shadow rounded-2xl"
      >
        <div class="flex flex-col items-center md:items-start">
          <h2
            class="flex items-center gap-2 mb-2 text-3xl font-bold text-primarypurple"
          >
            Skor Keterbacaan
            <span
              class="flex items-center justify-center bg-transparent rounded-full w-7 h-7"
              title="Tingkat kemudahan teks dibaca oleh pembaca umum"
            >
              <Icon
                icon="mdi:help-circle-outline"
                class="text-xl text-primarypurle"
              />
            </span>
          </h2>
          <p class="mb-4 text-xl text-primarypurple">Skor</p>
        </div>

        <div class="relative flex items-center justify-center w-48 h-48 mb-6">
          <svg class="absolute top-0 left-0 w-full h-full transform -rotate-90">
            <circle
              cx="96"
              cy="96"
              r="80"
              stroke="#E5E7EB"
              stroke-width="10"
              fill="none"
            />
            <circle
              cx="96"
              cy="96"
              r="80"
              stroke="#22C55E"
              stroke-width="10"
              fill="none"
              stroke-linecap="round"
              stroke-dasharray="502"
              stroke-dashoffset="125"
            />
          </svg>
          <span class="text-5xl font-bold text-green-500">75.0</span>
        </div>

        <p class="mb-1 text-sm font-semibold text-primarypurple">
          Deskripsi Skor
        </p>
        <p class="max-w-xs text-sm leading-relaxed text-black">
          Berdasarkan Flesch Kincaid Reading Ease, teks ini memiliki tingkat
          kemudahan membaca sekitar 75.0 dari 100. Teks ini dapat dengan mudah
          dipahami oleh remaja berusia 12 hingga 15 tahun.
        </p>
      </div>

      <div class="flex flex-col gap-6">
        <!-- Statistik -->
        <div class="p-6 bg-transparent border-4 border-white rounded-2xl">
          <div class="grid grid-cols-5 text-center">
            <div>
              <p class="text-2xl font-semibold text-gray-800">548</p>
              <p class="text-sm text-gray-500">Suku Kata</p>
            </div>
            <div>
              <p class="text-2xl font-semibold text-gray-800">132</p>
              <p class="text-sm text-gray-500">Kata</p>
            </div>
            <div>
              <p class="text-2xl font-semibold text-gray-800">21</p>
              <p class="text-sm text-gray-500">Kalimat</p>
            </div>
            <div>
              <p class="text-2xl font-semibold text-gray-800">3.2</p>
              <p class="text-sm text-gray-500">Pjg Kata</p>
            </div>
            <div>
              <p class="text-2xl font-semibold text-gray-800">6.5</p>
              <p class="text-sm text-gray-500">Pjg Kalimat</p>
            </div>
          </div>
        </div>

        <div
          class="flex flex-col p-6 overflow-hidden bg-transparent border-4 border-white shadow rounded-2xl"
        >
          <h2 class="mb-4 text-lg font-semibold text-primarypurple">
            Flesch Kincaid Metrics
          </h2>
          <div class="pr-2 overflow-y-auto" style="max-height: 350px">
            <div
              v-for="(item, i) in fleschData"
              :key="i"
              class="pb-4 mb-6 border-b last:border-none last:pb-0"
            >
              <h3 class="font-semibold text-md text-primarypurple">
                {{ item.title }}
              </h3>
              <div class="flex items-center mt-2">
                <span class="mr-2 font-bold text-green-500">{{
                  item.score
                }}</span>
                <span class="text-sm text-gray-500">/ 100</span>
              </div>
              <div class="w-full h-2 mt-2 bg-gray-200 rounded-full">
                <div
                  class="h-2 bg-green-500 rounded-full"
                  :style="{ width: item.score + '%' }"
                ></div>
              </div>
              <p class="mt-2 text-sm text-gray-500">{{ item.level }}</p>
              <p class="mt-1 text-xs text-gray-400">
                Rumus: {{ item.formula }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const fleschData = [
  {
    title: "Flesch Kincaid Reading Ease",
    score: 75,
    level: "Mudah dibaca",
    formula: "206.835 - 1.015 × (words/sentences) - 84.6 × (syllables/words)",
  },
  {
    title: "Flesch Kincaid Grade Level",
    score: 75,
    level: "Mudah dibaca",
    formula: "206.835 - 1.015 × (words/sentences) - 84.6 × (syllables/words)",
  },
  {
    title: "Gunning Fog Index",
    score: 68,
    level: "Sedikit sulit",
    formula: "0.4 × [(words/sentences) + 100 × (complex_words/words)]",
  },
  {
    title: "SMOG Index",
    score: 72,
    level: "Cukup mudah",
    formula: "1.0430 × √(polysyllables × (30/sentences)) + 3.1291",
  },
  {
    title: "Coleman Liau Index",
    score: 70,
    level: "Mudah dibaca",
    formula: "0.0588 × L - 0.296 × S - 15.8",
  },
];
</script>

<style scoped>
.text-primarypurple {
  color: #7c3aed;
}

.mesh-left {
  background: radial-gradient(
    circle at 0% 0%,
    rgba(80, 148, 241, 0.5) 0%,
    transparent 70%
  );
  filter: blur(90px);
  border-radius: 1000px;
}

.mesh-right {
  background: radial-gradient(
    circle at 70% 80%,
    rgba(80, 148, 241, 0.5) 0%,
    transparent 70%
  );
  filter: blur(100px);
  border-radius: 1000px;
}
</style>
