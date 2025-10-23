<template>
  <div class="min-h-screen bg-primarywhite">
    <HeroSection 
      @file-uploaded="handleFileUpload"
    />
    <FiturSection />
    <CardSection 
      @file-uploaded="handleFileUpload"
    />
    <FileUpload 
      @file-uploaded="handleFileUpload" 
      @url-uploaded="handleUrlUpload"
    />

    <!-- Overlay loading -->
    <div
      v-if="loading"
      class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white backdrop-blur-sm"
    >
      <div class="animate-spin rounded-full h-16 w-16 border-4 border-white border-t-transparent mb-4"></div>
      <p class="text-lg font-medium">Sedang menganalisis dokumen...</p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent, ref, onMounted } from "vue"
import { useRouter } from 'vue-router'

const HeroSection = defineAsyncComponent(
  () => import("@/components/layout/HeroSection.vue")
);
const FiturSection = defineAsyncComponent(
  () => import("@/components/layout/FiturSection.vue")
);
const CardSection = defineAsyncComponent(
  () => import("@/components/layout/CardSection.vue")
);
const FileUpload = defineAsyncComponent(
  () => import("@/components/FileUpload.vue")
);

const router = useRouter()
const loading = ref(false)

onMounted(() => {
  localStorage.clear()
})

const handleFileUpload = (file: File) => {
  if (!file) return
  console.log("File diterima:", file);
  alert(`File berhasil diupload: ${file.name}`)
  router.push('/analisis/readability')

  /*
  try {
    // Munculkan overlay loading
    loading.value = true
    
    // Kirim file ke backend
    const formData = new FormData()
    formData.append('file', file)

    const response = await fetch('https://readasense.up.railway.app/analyze', {
      method: 'POST',
      body: formData,
    })

    if (!response.ok) throw new Error('Upload gagal')

    const result = await response.json()

    // Simpan hasil ke localStorage untuk digunakan di halaman analisis
    localStorage.setItem('analysisResult', JSON.stringify(result))

    // Arahkan ke halaman hasil
    router.push('/analisis/readability')
  } catch (error) {
    console.error(error)
    alert('Terjadi kesalahan saat mengupload file.')
  } finally {
    loading.value = false
  }
  */
}

const handleUrlUpload = async (url: string) => {
  console.log("URL diterima:", url);
  alert(`URL berhasil diupload: ${url}`)
  router.push('/analisis/readability')
};
</script>

<style scoped></style>
