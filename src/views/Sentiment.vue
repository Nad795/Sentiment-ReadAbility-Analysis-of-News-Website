<template>
  <!-- Background Mesh -->
  <div class="absolute -bottom-10 -left-20 w-[400px] h-[400px] mesh-left"></div>
  <div class="absolute -bottom-20 right-0 w-[500px] h-[500px] mesh-right"></div>

  <div class="relative overflow-hidden bg-transparent">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-[1fr_2fr]">
      <!-- === KIRI: Skor Sentimen === -->
      <div
        class="flex flex-col items-center p-6 text-center bg-transparent border-4 border-white shadow rounded-2xl"
      >
        <div class="flex flex-col items-center md:items-start">
          <h2
            class="flex items-center gap-2 mb-2 text-3xl font-bold text-primarypurple"
          >
            Skor Sentimen
            <span
              class="flex items-center justify-center bg-transparent rounded-full w-7 h-7"
              title="Analisis proporsi sentimen teks"
            >
              <Icon
                icon="mdi:help-circle-outline"
                class="text-xl text-primarypurple"
              />
            </span>
          </h2>
          <p class="mb-4 text-xl text-primarypurple">Persentase</p>
        </div>

        <!-- Diagram Dummy -->
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
              stroke-dasharray="251"
              stroke-dashoffset="125"
              stroke-linecap="round"
            />
          </svg>
          <span class="text-5xl font-bold text-green-500">😊</span>
        </div>

        <div class="flex justify-between w-full px-8 text-sm">
          <div class="text-green-500">Positif<br />50%</div>
          <div class="text-red-500">Negatif<br />25%</div>
          <div class="text-yellow-500">Netral<br />25%</div>
        </div>

        <p class="mt-6 text-sm font-semibold text-primarypurple">
          Rating Keseluruhan
        </p>
        <p class="max-w-xs text-sm leading-relaxed text-black">
          Teks ini secara keseluruhan memiliki sentimen yang
          <span class="font-semibold text-green-500">positif (+0.50)</span>.
        </p>
      </div>

      <!-- === KANAN: Detail Sentimen === -->
      <div class="flex flex-col gap-6">
        <!-- 3 Box: Positif Negatif Netral -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
          <div
            class="flex flex-col items-center justify-center p-4 bg-transparent border-4 border-l-8 border-white rounded-xl border-l-green-500"
          >
            <h3
              class="flex items-center gap-2 text-lg font-semibold text-green-500"
            >
              Positif
              <Icon icon="mdi:help-circle-outline" />
            </h3>
            <p class="text-gray-800 text-md">0.50 dari 1.0</p>
          </div>
          <div
            class="flex flex-col items-center justify-center p-4 bg-transparent border-4 border-l-8 border-white rounded-xl border-l-red-500"
          >
            <h3
              class="flex items-center gap-2 text-lg font-semibold text-red-500"
            >
              Negatif
              <Icon icon="mdi:help-circle-outline" />
            </h3>
            <p class="text-gray-800 text-md">0.25 dari 1.0</p>
          </div>
          <div
            class="flex flex-col items-center justify-center p-4 bg-transparent border-4 border-l-8 border-white rounded-xl border-l-yellow-400"
          >
            <h3
              class="flex items-center gap-2 text-lg font-semibold text-yellow-400"
            >
              Netral
              <Icon icon="mdi:help-circle-outline" />
            </h3>
            <p class="text-gray-800 text-md">0.25 dari 1.0</p>
          </div>
        </div>

        <!-- Scrollable Table Section -->
        <div
          class="flex flex-col p-6 overflow-hidden bg-transparent border-4 border-white shadow rounded-2xl"
        >
          <h2 class="mb-4 text-lg font-semibold text-primarypurple">
            Entitas & Tema Terdeteksi
          </h2>
          <div class="pr-2 overflow-y-auto" style="max-height: 350px">
            <!-- Table Entitas -->
            <div class="mb-6">
              <h3 class="mb-2 font-semibold text-md text-primarypurple">
                Entitas Terdeteksi
              </h3>
              <table class="w-full text-sm text-left border-collapse">
                <thead class="text-gray-600">
                  <tr class="border-b border-gray-200">
                    <th class="p-2">Entitas</th>
                    <th class="p-2">Magnitudo</th>
                    <th class="p-2">Skor Sentimen</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(e, i) in entitasData"
                    :key="'entitas-' + i"
                    class="border-b border-gray-100"
                    :style="{
                      backgroundColor: i % 2 === 0 ? '#C9DEFB' : 'transparent',
                    }"
                  >
                    <td class="p-2">{{ e.nama }}</td>
                    <td class="p-2">{{ e.magnitudo }}</td>
                    <td
                      class="p-2 font-semibold text-center"
                      :style="{
                        backgroundColor:
                          e.sentimen > 0.5
                            ? '#9FE3B3'
                            : e.sentimen < 0
                              ? '#F5A8A8'
                              : '#FFF3A6',
                      }"
                    >
                      {{ e.sentimen > 0 ? "+" : "" }}{{ e.sentimen.toFixed(2) }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Table Tema -->
            <div>
              <h3 class="mb-2 font-semibold text-md text-primarypurple">
                Tema Terdeteksi
              </h3>
              <table class="w-full text-sm text-left border-collapse">
                <thead class="text-gray-600">
                  <tr class="border-b border-gray-200">
                    <th class="p-2">Tema</th>
                    <th class="p-2">Magnitudo</th>
                    <th class="p-2">Skor Sentimen</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(t, i) in temaData"
                    :key="'tema-' + i"
                    class="border-b border-gray-100"
                    :style="{
                      backgroundColor: i % 2 === 0 ? '#C9DEFB' : 'transparent',
                    }"
                  >
                    <td class="p-2">{{ t.nama }}</td>
                    <td class="p-2">{{ t.magnitudo }}</td>
                    <td
                      class="p-2 font-semibold text-center"
                      :style="{
                        backgroundColor:
                          t.sentimen > 0.5
                            ? '#9FE3B3'
                            : t.sentimen < 0
                              ? '#F5A8A8'
                              : '#FFF3A6',
                      }"
                    >
                      {{ t.sentimen > 0 ? "+" : "" }}{{ t.sentimen.toFixed(2) }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const entitasData = [
  { nama: "ITS", magnitudo: 2.0, sentimen: 0.78 },
  { nama: "Surabaya", magnitudo: 3.0, sentimen: 0.63 },
  { nama: "Gedung DPR", magnitudo: 5.4, sentimen: -0.88 },
];

const temaData = [
  { nama: "Kampus", magnitudo: 1.8, sentimen: 0.25 },
  { nama: "Mahasiswa", magnitudo: 2.5, sentimen: 0.2 },
  { nama: "Kebijakan", magnitudo: 4.0, sentimen: -0.65 },
];

const getSentimentColor = (value) => {
  if (value > 0.5) return "text-green-600";
  if (value < 0) return "text-red-600";
  return "text-yellow-600";
};
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
